<?php

use SKS\DB\Entity\User;
class UserModel extends Model {

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
        $existingUser = $user->findById($data['id']);
        $existingUser->setId($data['id']);
        $existingUser->setLogin($data['login']);       
        $existingUser->setPassword($password);      
        $existingUser->setRole($data['role']);
        $existingUser->update(true);
    }

    public function delete($userid) {        
        $user = new User();
        $user = $user->findById($userid);        
        print_r($user);
        if ($user->getRole() == 'owner')
            return false;
       $user->remove();
    }

}
