<?php

namespace SKS\DB\Entity;

/**
 * @Entity @Table(name="user")
 * */
class User extends BaseEntity {
    
    /** @Id @Column(type="integer") @GeneratedValue * */
    protected $id;

    /** @Column(type="string") * */
    protected $password;
    
    /** @Column(type="string") * */
    protected $login;
    
    /** @Column(type="string") * */
    protected $role;

    function getId() {
        return $this->id;
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

    function setLogin($login) {
        $this->login = $login;
    }

    function setRole($role) {
        $this->role = $role;
    }
    
    function getPassword() {
        return $this->password;
    }

    function setPassword($password) {
        $this->password = $password;
    }


}
