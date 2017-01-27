<?php

define("ROOT_PATH", __DIR__ . "/../..");

require_once ROOT_PATH . '/vendor/autoload.php';

$app = new Silex\Application();

$dotenv = new \Dotenv\Dotenv(ROOT_PATH, '.env.test');
$dotenv->load();

print_r(getenv('ENV'));
exit;

require_once ROOT_PATH . '/resources/config/middleware.php';
require_once ROOT_PATH . '/resources/config/routes.php';
require_once ROOT_PATH . '/resources/config/database.php';
require_once ROOT_PATH . '/resources/config/log.php';

return $app;
