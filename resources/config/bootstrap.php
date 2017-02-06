<?php

require_once __DIR__ . '/../../vendor/autoload.php';

$app = new Silex\Application();

$dotenv = new \Dotenv\Dotenv(__DIR__ . '/../../', '.env');
$dotenv->load();

require_once __DIR__ . '/../../resources/config/middleware.php';
require_once __DIR__ . '/../../resources/config/routes.php';
require_once __DIR__ . '/../../resources/config/database.php';
require_once __DIR__ . '/../../resources/config/log.php';

return $app;
