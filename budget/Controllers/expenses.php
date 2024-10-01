<?php
require_once(__DIR__ . '/../Database/config.php');

function index($fullname){
    global $connect;
    $index = "SELECT * FROM expenses WHERE user_id=(SELECT id FROM users WHERE fullname='$fullname')";
    $result = mysqli_query($connect, $index)
        or die(mysqli_error($connect));
    return $result;
}

function addExpenses($date, $name, $amount, $user_id){
    global $connect;
    $addExpenses = "INSERT INTO expenses(exp_date, exp_name, exp_amount,user_id)
    VALUES('$date', '$name', '$amount', '$user_id')";
    $result = mysqli_query($connect, $addExpenses)
        or die(mysqli_error($connect));
    return $result;    
}