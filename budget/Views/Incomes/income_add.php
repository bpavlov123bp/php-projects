<?php
session_start();
require_once(__DIR__ . '/../../Controllers/incomes.php');
if(isset($_POST['add'])){
    $date = $_POST['date'];
    $name = $_POST['income_name'];
    $amount = $_POST['amount'];
    $user = $_SESSION['id'];
    $result = addIncome($date, $name, $amount, $user);
    if($result){
        echo "<script>alert('Record added successfully');</script>";
        echo "<script>window.location.href='/budget/Views/Incomes/income_index.php'</script>";
    } else {
        echo "<script>alert('Something goes wrong');</script>";
        echo "<script>window.location.href='/budget/Views/Incomes/income_index.php'</script>";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Add Incomes</title>
    </head>
    <body>
        <h1 align="center">Budget Managemen System</h1>
        <h2>Add Income</h2>
        <form action='' method="post">
            <table border="0">
                <tr>
                    <td>Date</td>
                    <td>
                        <input type="date" name="date" value="">
                    </td>    
                </tr>
                <tr>
                    <td>Name of Income</td>
                    <td>
                        <input type="text" name="income_name" value="">
                    </td>
                </tr>
                <tr>
                    <td>Amount</td>
                    <td>
                        <input type="number" name="amount" value="">
                    </td>
                <tr>
                    <td>
                        <input type="submit" name="add" value="Add Record">
                    </td>    
                </tr>
            </table>
        </form>
    </body>
</html>