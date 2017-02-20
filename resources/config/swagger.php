<?php

$app->register(new Basster\Silex\Provider\Swagger\SwaggerProvider(), [
    "swagger.servicePath" => realpath(__DIR__ . '/../../src'),
]);