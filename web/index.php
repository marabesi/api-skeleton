<?php

$app = include __DIR__ . '/../resources/config/bootstrap.php';

$app['http_cache']->run();
