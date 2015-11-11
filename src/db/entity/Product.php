<?php
require 'src/db/entity/Entity.php';
/**
 * @Entity @Table(name="products")
 * */
class Product extends Entity {
    
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
