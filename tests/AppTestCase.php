<?php

use Silex\WebTestCase;
use Symfony\Component\HttpKernel\HttpKernelInterface;

class AppTestCase extends WebTestCase
{

    /**
     * Creates the application.
     *
     * @return HttpKernelInterface
     */
    public function createApplication()
    {
        $app = include_once './resources/config/bootstrap.php';

        $app["db.options"] = [
            "driver" => 'pdo_sqlite',
            "path" => './storage/tests/sqlite.db',
            "memory" => false,
        ];

        return $app;
    }
}