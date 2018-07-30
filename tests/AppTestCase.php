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
        return include_once __DIR__ . '/../resources/config/bootstrap.php';
    }
}