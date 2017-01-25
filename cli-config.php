<?php

require 'vendor/autoload.php';
require 'resources/config/bootstrap.php';

$newDefaultAnnotationDrivers = array(
    ROOT_PATH . '/src/App',
);

$config = new \Doctrine\ORM\Configuration();
$config->setMetadataCacheImpl(new \Doctrine\Common\Cache\ApcCache);
$driverImpl = $config->newDefaultAnnotationDriver($newDefaultAnnotationDrivers);

$config->setMetadataDriverImpl($driverImpl);
$config->setProxyDir($app['orm.proxies_dir']);
$config->setProxyNamespace('Proxies');

$em = \Doctrine\ORM\EntityManager::create($app['db.options'], $config);
$helpers = new Symfony\Component\Console\Helper\HelperSet(array(
    'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($em->getConnection()),
    'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($em),
));
