<?php
require_once 'BASEEntity.php';
/**
 * @Entity @Table(name="products")
 * */
class Product extends BASEEntity {
    
    /** @Id @Column(type="integer") @GeneratedValue * */
    protected $id;

    /** @Column(type="string") * */
    protected $name;

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

}
