<?php

use Silex\WebTestCase;
use Symfony\Component\HttpKernel\HttpKernelInterface;

class TestCase extends WebTestCase
{

    /**
     * Creates the application.
     *
     * @return HttpKernelInterface
     */
    public function createApplication()
    {
        return include_once '../resources/config/bootstrap.php';
    }
}