<?php
require_once(__DIR__ . '/../Database/config.php');

function index(){
    global $connect;
    $index = "SELECT expenses.*, users.fullname FROM expenses, users 
    WHERE expenses.user_id = users.id";
    $result = mysqli_query($connect, $index)
        or die(mysqli_error($connect));
    return $result;
}