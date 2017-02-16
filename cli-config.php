<?php

require 'vendor/autoload.php';
require 'resources/config/bootstrap.php';

use Doctrine\MongoDB\Connection;
use Doctrine\ODM\MongoDB\Configuration;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;

if (!file_exists($file = 'vendor/autoload.php')) {
    throw new RuntimeException('Install dependencies to run this script.');
}

$connection = new Connection();
$config = new Configuration();

$config->setProxyDir(__DIR__ . '/storage/cache/proxies');
$config->setProxyNamespace('Proxies');
$config->setHydratorDir(__DIR__ . '/storage/cache/hydrators');
$config->setHydratorNamespace('Hydrators');

$config->setDefaultDB($app['db.options']['dbname']);
$config->setMetadataDriverImpl(AnnotationDriver::create(__DIR__ . '/src/App/Entities'));

AnnotationDriver::registerAnnotationClasses();

$dm = DocumentManager::create($connection, $config);

$helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
    'dm' => new \Doctrine\ODM\MongoDB\Tools\Console\Helper\DocumentManagerHelper($dm),
));

$app = new \Symfony\Component\Console\Application('Doctrine MongoDB ODM');
$app->setHelperSet($helperSet);
$app->addCommands(array(
    new \Doctrine\ODM\MongoDB\Tools\Console\Command\GenerateDocumentsCommand(),
    new \Doctrine\ODM\MongoDB\Tools\Console\Command\GenerateHydratorsCommand(),
    new \Doctrine\ODM\MongoDB\Tools\Console\Command\GenerateProxiesCommand(),
    new \Doctrine\ODM\MongoDB\Tools\Console\Command\GenerateRepositoriesCommand(),
    new \Doctrine\ODM\MongoDB\Tools\Console\Command\QueryCommand(),
    new \Doctrine\ODM\MongoDB\Tools\Console\Command\ClearCache\MetadataCommand(),
    new \Doctrine\ODM\MongoDB\Tools\Console\Command\Schema\CreateCommand(),
    new \Doctrine\ODM\MongoDB\Tools\Console\Command\Schema\DropCommand(),
    new \Doctrine\ODM\MongoDB\Tools\Console\Command\Schema\UpdateCommand(),
    new \Doctrine\ODM\MongoDB\Tools\Console\Command\Schema\ShardCommand(),
));

$app->run();