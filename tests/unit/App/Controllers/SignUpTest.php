<?php

namespace Unit\App\Controllers;

use App\Controllers\SignUp;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class SignUpTest extends \Codeception\Test\Unit
{
    /**
     * @var SignUp
     */
    private $controller;

    protected function _before()
    {
        $app = $this->createMock(Application::class);

        $entityManager = $this->createMock(EntityManager::class);

        $this->controller = new SignUp($app);
        $this->controller->setEntityManager($entityManager);
    }

    protected function _after()
    {
        $this->controller = null;
    }

    public function testShouldCreateAuserSuccessfully()
    {
        // $this->assertTrue(true);
        // $this->markTestIncomplete();

        // $response = $this->controller->postIndex(new Request());

        // $decodedResponse = json_decode($response->getContent());

        // $this->assertEquals(false, $decodedResponse->error);
    }
}
