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
    'orm.proxies_dir' => __DIR__ . '/../../storage/cache/proxies',
    'orm.em.options' => array(
        'mappings' => array(
            array(
                'type' => 'annotation',
                'namespace' => 'App\Entities',
                'path' => __DIR__ . '/../../src/App/Entities',
            ),
        ),
    ),
));

use Doctrine\MongoDB\Connection;
use Doctrine\ODM\MongoDB\Configuration;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;

AnnotationDriver::registerAnnotationClasses();

$config = new Configuration();
$config->setProxyDir(__DIR__ . '/../../storage/cache/proxies');
$config->setProxyNamespace('Proxies');
$config->setHydratorDir(__DIR__ . '/../../storage/cache/hydrators');
$config->setHydratorNamespace('Hydrators');
$config->setMetadataDriverImpl(AnnotationDriver::create(__DIR__ . '/../../src/App/Documents'));

$dm = DocumentManager::create(new Connection(), $config);
