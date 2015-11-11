<?php
/**
 * Description of Model
 *
 * @author sunsingh
 */
namespace SKS\DB\Entity;

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
  /*  
    public function findById(){
        return 
    }
*/
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
