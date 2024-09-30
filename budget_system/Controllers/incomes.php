<?php
require_once(__DIR__ . '/../Database/config.php');

function index($fullname){
    global $connect;

    $showAll = "SELECT * FROM incomes WHERE 
    user_id=(SELECT id FROM users WHERE fullname='$fullname')";
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