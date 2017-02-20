<?php

use Silex\Provider\DoctrineServiceProvider;
use Saxulum\DoctrineMongoDb\Provider\DoctrineMongoDbProvider;
use Saxulum\DoctrineMongoDbOdm\Provider\DoctrineMongoDbOdmProvider;

$app['db.options'] = array(
//    'driver' => getenv('DB_DRIVER'),
    'dbname' => getenv('DB_DATABASE'),
    'host' => getenv('DB_HOST'),
    'user' => getenv('DB_USER'),
    'password' => getenv('DB_PASSWORD'),
);

$app->register(new DoctrineServiceProvider(), array(
    'db.options' => $app['db.options']
));

$app->register(new DoctrineMongoDbProvider, array(
    'mongodb.options' => array(
        'server' => 'mongodb://' . getenv('DB_HOST'),
//        'options' => array(
//            'username' => getenv('DB_USER'),
//            'password' => getenv('DB_PASSWORD'),
//            'db' => getenv('DB_DATABASE'),
//        ),
    ),
));

$app->register(new DoctrineMongoDbOdmProvider, array(
    'mongodbodm.proxies_dir' => __DIR__ . '/../../storage/cache/proxies',
    'mongodbodm.hydrator_dir' => __DIR__ . '/../../storage/cache/hydrator',
    'mongodbodm.dm.options' => array(
        'database' => $app['db.options']['dbname'],
        'mappings' => array(
            array(
                'type' => 'annotation',
                'namespace' => 'App\Entities',
                'path' => __DIR__ . '/../../src/App/Entities',
            ),
        ),
    ),
));
