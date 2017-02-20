<?php

namespace App;

use Doctrine\ORM\EntityManager;
use Silex\Application;

/**
 * @SWG\Info(
 *   title="ACME API",
 *   description="ACME API endpoints",
 *   version="1.0.0",
 *   @SWG\Contact(
 *     email="contact@2mundos.net",
 *     name="2Mundos ACME API Team",
 *     url="http://2mundos.net"
 *   ),
 *   @SWG\License(
 *     name="MIT",
 *     url="http://github.com/gruntjs/grunt/blob/master/LICENSE-MIT"
 *   ),
 *   termsOfService="http://swagger.io/terms/"
 * )
 * @SWG\Swagger(
 *   host="localhost",
 *   basePath="/api",
 *   schemes={"http"},
 *   produces={"application/json"},
 *   consumes={"application/json"},
 *   @SWG\ExternalDocumentation(
 *     description="find more info here",
 *     url="https://swagger.io/about"
 *   )
 * )
 */
class Controller
{

    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->entityManager = $app['mongodbodm.dm'];
    }

    /**
     * @return EntityManager
     */
    public function getEntityManager()
    {
        return $this->entityManager;
    }

    /**
     * @param EntityManager $entityManager
     * @return Controller
     */
    public function setEntityManager(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        return $this;
    }
}
