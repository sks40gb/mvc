<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

/**
 * Description of Model
 *
 * @author sunsingh
 */

class Entity {

    // obtaining the entity manager
    protected $entityManager;

    public function __construct() {
        
    }

    public function persist() {     
        $this->getManager()->persist($this);
    }

    public function flush() {     
        $this->getManager()->flush();
    }

    public function getManager() {
        if (!isset($this->entityManager)) {            
            $config = Setup::createAnnotationMetadataConfiguration(array(__DIR__), TRUE);
            $dbParams = array(
                'driver' => 'pdo_mysql',
                'user' => 'root',
                'password' => 'root',
                'dbname' => 'foo',
            );
            $this->entityManager = EntityManager::create($dbParams, $config);
        }
        //print_r($entityManager);
        return $this->entityManager;
    }

}
