<?php

/**
 * Description of Model
 *
 * @author sunsingh
 */

namespace SKS\DB\Entity;

class BaseEntity {

    // obtaining the entity manager
    protected $entityManager;

    public function __construct() {
        
    }

    public function persist($flush = FALSE) {
        $entity = $this->getManager()->persist($this);
        if ($flush) {
            $this->flush();
        }
        return $entity;
    }

    public function update($flush = FALSE) {
        $entity = $this->getManager()->merge($this);
        if ($flush) {
            $this->flush();
        }
        return $entity;
    }

    public function flush() {
        $this->getManager()->flush();
    }

    public function detach() {
        return $this->getManager()->detach($this);
    }

    public function remove() {
        return $this->getManager()->remove($this);
    }
    
    public function merge() {
        return $this->getManager()->merge($this);
    }

    public function findById($id = NULL) {
        if ($id == NULL) {
            $id = $this . getId();
        }
        $table = get_class($this);
        $query = $this->getManager()->createQuery("SELECT t FROM $table t WHERE t.id = $id");
        $entities = $query->getResult();
        return $entities[0];
    }

    public function findAll() {
        $table = get_class($this);
        $query = $this->getManager()->createQuery("SELECT t FROM $table t");
        $entities = $query->getResult();
        return $entities;
    }

    public function getManager() {
        if (!isset($this->entityManager)) {
            $config = \Doctrine\ORM\Tools\Setup ::createAnnotationMetadataConfiguration(array(__DIR__), TRUE);
            $dbParams = array(
                'driver' => 'pdo_mysql',
                'user' => 'root',
                'password' => 'root',
                'dbname' => 'foo',
            );
            $this->entityManager = \Doctrine\ORM\EntityManager::create($dbParams, $config);
        }
        //print_r($entityManager);
        return $this->entityManager;
    }

}
