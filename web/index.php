<?php

define("ROOT_PATH", __DIR__ . "/..");

require_once ROOT_PATH . '/vendor/autoload.php';

use Silex\Application;
use Silex\Provider\HttpCacheServiceProvider;
use Silex\Provider\DoctrineServiceProvider;
use Silex\Provider\MonologServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Lcobucci\JWT\Configuration;

$app = new Silex\Application();

$dotenv = new \Dotenv\Dotenv(ROOT_PATH);
$dotenv->load();

require_once '../resources/config/routes.php';
require_once '../resources/config/database.php';
require_once '../resources/config/log.php';

$app->before(function (Request $request) {
    if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
        $data = json_decode($request->getContent(), true);
        $request->request->replace(is_array($data) ? $data : array());
    }

    if (!$request->get('token')) {
      throw new \Exception('Token not provided');
    }
});

$app->register(new \Euskadi31\Silex\Provider\CorsServiceProvider);

$app->register(new ServiceControllerServiceProvider());

$app->register(new DoctrineServiceProvider(), array(
  "db.options" => $app["db.options"]
));

$app->register(new HttpCacheServiceProvider(), array("http_cache.cache_dir" => ROOT_PATH . "/storage/cache",));

$app->register(new MonologServiceProvider(), array(
    "monolog.logfile" => ROOT_PATH . "/storage/logs/" . (new \DateTime())->format("Y-m-d") . ".log",
    "monolog.level" => $app["log.level"],
    "monolog.name" => "application"
));

$app->error(function (\Exception $e, $code) use ($app) {
    $app['monolog']->addError($e->getMessage());
    $app['monolog']->addError($e->getTraceAsString());
    return new JsonResponse(array("statusCode" => $code, "message" => $e->getMessage(), "stacktrace" => $e->getTraceAsString()));
});

$app['http_cache']->run();
