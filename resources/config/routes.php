<?php

$app['annot.controllers'] = array(
    App\Controllers\Resource::class,
);

$app->register(new DDesrosiers\SilexAnnotations\AnnotationServiceProvider(), array(
    "annot.controllerDir" => realpath(ROOT_PATH . "/src/Controllers"),
));
