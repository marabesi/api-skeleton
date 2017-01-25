<?php

use Silex\Provider\DoctrineServiceProvider;
use Dflydev\Provider\DoctrineOrm\DoctrineOrmServiceProvider;

$app['db.options'] = array(
    "driver" => getenv('DB_DRIVER'),
    "dbname" => getenv('DB_DATABASE'),
    "host" => getenv('DB_HOST'),
    "user" => getenv('DB_USER'),
    "password" => getenv('DB_PASSWORD'),
);

$app->register(new DoctrineServiceProvider(), array(
    "db.options" => $app["db.options"]
));

$app->register(new DoctrineOrmServiceProvider, array(
    'orm.proxies_dir' => ROOT_PATH . '/storage/cache/proxies',
    'orm.em.options' => array(
        'mappings' => array(
            array(
                'type' => 'annotation',
                'namespace' => 'App\Entities',
                'path' => ROOT_PATH . '/src/App/Entities',
            ),
        ),
    ),
));