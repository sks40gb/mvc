<?php
require 'src/db/entity/Entity.php';
/**
 * @Entity @Table(name="user")
 * */
class User extends Entity {
    
    /** @Id @Column(type="integer") @GeneratedValue * */
    protected $id;

    /** @Column(type="string") * */
    protected $userid;
    
    /** @Column(type="string") * */
    protected $login;
    
    /** @Column(type="string") * */
    protected $role;

    function getId() {
        return $this->id;
    }

    function getUserid() {
        return $this->userid;
    }

    function getLogin() {
        return $this->login;
    }

    function getRole() {
        return $this->role;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setUserid($userid) {
        $this->userid = $userid;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setRole($role) {
        $this->role = $role;
    }
    
}
