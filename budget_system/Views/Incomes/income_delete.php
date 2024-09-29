<?php
session_start();
require_once(__DIR__ . '/../../Controllers/incomes.php');
$income_id = $_GET['id'];
$result = deleteIncome($income_id);
if($result){
    echo "<script>alert('Record deleted successfully!');</script>";
    echo "<script>window.location.href='/budget/Views/Incomes/income_index.php'</script>";
} else {
    echo "<script>alert('Something goes wrong!');</script>";
    echo "<script>window.location.href='/budget/Views/Incomes/income_index.php'</script>";
}