<?php

$app['log.level'] = getenv('DEBUG') ? Monolog\Logger::DEBUG : Monolog\Logger::ERROR;

