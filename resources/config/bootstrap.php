<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use Silex\Provider\HttpCacheServiceProvider;
use Silex\Provider\MonologServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Symfony\Component\HttpFoundation\JsonResponse;

$app = new Silex\Application();

$dotenv = new \Dotenv\Dotenv(__DIR__ . '/../../', '.env');
$dotenv->load();

require_once __DIR__ . '/../../resources/config/middleware.php';
require_once __DIR__ . '/../../resources/config/routes.php';
require_once __DIR__ . '/../../resources/config/database.php';
require_once __DIR__ . '/../../resources/config/log.php';

$app->register(new \Euskadi31\Silex\Provider\CorsServiceProvider);

$app->register(new ServiceControllerServiceProvider());

$app->register(new HttpCacheServiceProvider(), array("http_cache.cache_dir" =>  __DIR__ . '/../../storage/cache',));

$app->register(new MonologServiceProvider(), array(
    "monolog.logfile" => __DIR__ . '/../../storage/logs/' . (new \DateTime())->format("Y-m-d") . ".log",
    "monolog.level" => $app["log.level"],
    "monolog.name" => "application"
));

$app->error(function (\Exception $e, $code) use ($app) {
    $app['monolog']->addError($e->getMessage());
    $app['monolog']->addError($e->getTraceAsString());
    return new JsonResponse(array("statusCode" => $code, "message" => $e->getMessage(), "stacktrace" => $e->getTraceAsString()));
});


return $app;
