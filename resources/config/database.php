<?php

$app['db.options'] = array(
    "driver" => getenv('DB_DRIVER'),
    "dbname" => "prod_db",
    "host" => getenv('DB_HOST'),
    "user" => getenv('DB_USER'),
    "password" => getenv('DB_PASSWORD'),
);