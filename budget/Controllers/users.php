<?php
require_once(__DIR__ . '/../Database/config.php');

function registration($fullname, $username, $email, $password){
    global $connect;
    $registration = "INSERT INTO users (fullname, username, email, password)
    VALUES ('$fullname', '$username', '$email', '$password')";
    $result = mysqli_query($connect, $registration)
        or die('Cannot create account!' . mysqli_error($connect));
    return $result;    
}

function login($username, $password){
    global $connect;
    $login = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($connect, $login)
        or die(mysqli_error($connect));
    return $result;    
}

function availability_username($username){
    global $connect;
    $available = "SELECT username FROM users WHERE username='$username'";
    $result = mysqli_query($connect, $available)
        or die(mysqli_error($connect));
    return $result;    
}

function logout(){
    session_start();
    session_destroy();
    
}