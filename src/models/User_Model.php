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
        return $this->db->select('SELECT userid, login, role FROM user WHERE userid = :userid', array(':userid' => $userid));
    }

    public function create($data) {
       /*$this->db->insert('user', array(
            'login' => $data['login'],
            'password' => Hash::create('sha256', $data['password'], HASH_PASSWORD_KEY),
            'role' => $data['role']
        ));*/       
        $password = Hash::create('sha256', $data['password'], HASH_PASSWORD_KEY);
        $user = new User();       
        $user->setLogin($data['login']);       
        $user->setPassword($password);      
        $user->setRole($data['role']);     
        $user->persist();
        $user->flush();    
    }
    

    public function editSave($data) {
        $postData = array(
            'login' => $data['login'],
            'password' => Hash::create('sha256', $data['password'], HASH_PASSWORD_KEY),
            'role' => $data['role']
        );

        $this->db->update('user', $postData, "`userid` = {$data['userid']}");
    }

    public function delete($userid) {
        $result = $this->db->select('SELECT role FROM user WHERE userid = :userid', array(':userid' => $userid));

        if ($result[0]['role'] == 'owner')
            return false;

        $this->db->delete('user', "userid = '$userid'");
    }

}
