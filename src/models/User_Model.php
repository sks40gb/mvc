<?php

use SKS\DB\Entity\User;
class User_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function userList() {
        $user = new User();       
        $users =  $user->findAll();      
        return $users;
    }

    public function userSingleList($userid) {
        $user = new User();        
        return $user->findById($userid);        
    }

    public function create($data) {            
        $password = Hash::create('sha256', $data['password'], HASH_PASSWORD_KEY);
        $user = new User();       
        $user->setLogin($data['login']);       
        $user->setPassword($password);      
        $user->setRole($data['role']);     
        $user->persist(true);
    }
    

    public function editSave($data) {
        $password = Hash::create('sha256', $data['password'], HASH_PASSWORD_KEY);
        $user = new User();        
        $user->findById($data['id']);
        $user->setId($data['id']);
        $user->setLogin($data['login']);       
        $user->setPassword($password);      
        $user->setRole($data['role']);
        $user->update(true);
    }

    public function delete($userid) {
        $result = $this->db->select('SELECT role FROM user WHERE userid = :userid', array(':userid' => $userid));

        if ($result[0]['role'] == 'owner')
            return false;

        $this->db->delete('user', "userid = '$userid'");
    }

}
