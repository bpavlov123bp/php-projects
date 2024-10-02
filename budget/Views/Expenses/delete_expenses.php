<?php
session_start();
require_once(__DIR__ . '/../../Controllers/expenses.php');
$expense_id = $_GET['id'];
$result = deleteExpense($expense_id);
if($result){
    echo "<script>alert('Record deleted successfully.');</script>";
    echo "<script>window.location.href='/budget/Views/Expenses/index_expenses.php'</script>";
} else {
    echo "<script>alert('Something goes wrong.');</script>";
    echo "<script>window.location.href='/budget/Views/Expenses/index_expenses.php'</script>";
}