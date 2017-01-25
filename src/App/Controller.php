<?php

namespace App;

use Doctrine\ORM\EntityManager;
use Silex\Application;

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
        $this->entityManager = $app['orm.em'];
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