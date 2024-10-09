<?php
require_once(__DIR__ . '/../Database/config.php');

function index($user_id){
    global $connect;
    $index = "SELECT * FROM expenses WHERE user_id='$user_id'";
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
function editExpenses($exp_id, $date, $name, $amount){
    global $connect;
    $editExpenses = "UPDATE expenses SET exp_date='$date', exp_name='$name', exp_amount='$amount'
    WHERE id='$exp_id'";
    $result = mysqli_query($connect, $editExpenses)
        or die(mysqli_error($connect));
    return $result;    
}

function deleteExpense($id){
    global $connect;

    $deleteRecord = "DELETE FROM expenses WHERE id='$id' LIMIT 1";
    $result = mysqli_query($connect, $deleteRecord)
        or die(mysqli_error($connect));
    return $result;
}

function showBetweenTwoDates($start_date, $end_date, $user_id){
    global $connect;
    $showBetweenTwoDates = "SELECT * FROM expenses WHERE exp_date BETWEEN '$start_date' AND '$end_date' AND user_id='$user_id'";
    $result = mysqli_query($connect, $showBetweenTwoDates)
        or die(mysqli_error($connect));
    return $result;    
}

function showMonth($month, $user_id){
    global $connect;
    
    $showMonth = "SELECT * FROM expenses WHERE MONTH(exp_date) = '$month' AND user_id='$user_id'";
    $result = mysqli_query($connect, $showMonth)
        or die(mysqli_error($connect));

    return $result;
}

function showByName($exp_name, $user_id){
    global $connect;
    $showByName = "SELECT * FROM expenses WHERE exp_name LIKE'%$exp_name%' AND user_id='$user_id'";
    $result = mysqli_query($connect, $showByName)
        or die(mysqli_error($connect));
    return $result;    
}

