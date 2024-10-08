<?php
require_once(__DIR__ . '/../Database/config.php');

function index($user_id){
    global $connect;

    $showAll = "SELECT * FROM incomes WHERE 
    user_id='$user_id'";
    $result = mysqli_query($connect, $showAll)
        or die(mysqli_error($connect));
    return $result;     
}

function addIncome($date, $name, $amount, $user){
    global $connect;
    $addIncome = "INSERT INTO incomes(income_date, income_name, income_amount, user_id)
     VALUES('$date', '$name', '$amount', '$user')";
    $result = mysqli_query($connect, $addIncome)
        or die(mysqli_error($connect));
    return $result;     
}

function editIncome($id, $date, $name, $amount){
    global $connect;
    $editIncome = "UPDATE incomes SET income_date='$date', income_name='$name', income_amount='$amount' 
    WHERE id='$id'";
    $result = mysqli_query($connect, $editIncome)
        or die(mysqli_error($connect));
    return $result;    
}

function deleteIncome($id){
    global $connect;
    $deleteIncome = "DELETE FROM incomes WHERE id='$id' LIMIT 1";
    $result = mysqli_query($connect, $deleteIncome)
        or die(mysqli_error($connect));
    return $result;    
}

function showMonthly($month, $user_id){
    global $connect;
    $showMonth = "SELECT * FROM incomes WHERE MONTH(income_date) = '$month' AND user_id='$user_id'";
    $result = mysqli_query($connect, $showMonth)
        or die(mysqli_error($connect));
    return $result;    
}

function showByDate($start_date, $end_date, $user_id){
    global $connect;
    $showByDate = "SELECT * FROM incomes WHERE income_date BETWEEN '$start_date' AND '$end_date' AND user_id='$user_id'";
    $result = mysqli_query($connect, $showByDate)
        or die(mysqli_error($connect));
    return $result;    
}

function showByName($name, $user_id){
    global $connect;
    $showByName = "SELECT * FROM incomes WHERE income_name='$name' AND user_id='$user_id'";
    $result = mysqli_query($connect, $showByName)
        or die(mysqli_error($connect));
    return $result;    
}