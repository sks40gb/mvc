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
       return $this->getRow(array("id"=>$id));
    }

    public function findAll() {
        return $this->find();
    }

    /**
     * Get array of entities by passing the conditional fields.
     * @param type $field_value_array
     * @return type
     */
    public function find($field_value_array=false) {
        $query = $this->buildDQL($field_value_array);
        $entities = $query->getResult();
         return $entities;
    }

    /**
     * Get single record
     * @param type $field_value_array
     * @return type
     */
    public function getRow($field_value_array) {
        $query = $this->buildDQL($field_value_array);
        $entities = $query->getResult();
        if (count($entities) > 0) {
            return $entities[0];
        } else {
            return null;
        }
    }

    /**
     * Build DQL - select the table on the basis of Entity Class name and Conditional section is being passed through
     * Array as an argument
     * @param type $field_value_array = Field and Value array
     * @return DQL
     */
    private function buildDQL($field_value_array = false) {
        $table = get_class($this);
        $sql = "SELECT t FROM $table t";
        if ($field_value_array) {
            $sql.=" WHERE ";
            //add where condition and remove the 'AND from the query';
            foreach ($field_value_array as $field => $value) {
                $sql .= " t.$field = :$field AND ";
            }
            $sql = rtrim($sql, "AND ");
            // get the query
            $query = $this->getManager()->createQuery($sql);
             #echo "QUERY : $sql";
            //bind the value
            foreach ($field_value_array as $field => $value) {
                $query->setParameter($field, $value);
            }
            return $query;
        }else{
            return $query = $this->getManager()->createQuery($sql);
        }
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
