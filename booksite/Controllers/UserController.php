<?php
require_once(__DIR__ . '/../Model/User.php');
class UserController{
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function registerUser($fullname, $username, $password, $email){
        $register = $this->user->register($fullname, $username, $password, $email);
        if($register){
            return $register;
        } else {
            return false;
        }
    }

    public function loginUser($username, $password){
        $login = $this->user->login($username, $password);
        if($login){
            return $login;
        } else {
            return false;
        }
    }
}
