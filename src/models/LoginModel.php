<?php
use SKS\DB\Entity\User;
class LoginModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function run() {
       
        $password = Hash::create('sha256', $_POST['password'], HASH_PASSWORD_KEY);
        $user = new User();
        $user = $user->getRow(["login"=>$_POST['login'],"password"=>$password]);       
        if(isset($user)){
            // login
            Session::init();
            Session::set('role', $user->getRole());
            Session::set('loggedIn', true);
            Session::set('userid', $user->getId());
            header("location:".URL."dashboard");
        } else {
            header("location:".URL."login");
        }
    }

}
