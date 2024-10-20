<?php
require_once(__DIR__ . '/../Database/Databse.php');
class User{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function register($user_fullname, $username, $password, $email){
        $sql = "INSERT INTO users(user_fullname, username, user_pass, user_email) 
        VALUES('$user_fullname', '$username', '$password', '$email')";
        $result = $this->db->query($sql);
        return $result;
    }

    public function login($username, $password){
        $sql = "SELECT * FROM users WHERE username='$username' AND user_pass='$password'";
        $result = $this->db->query($sql);
        return $result;
    }
}