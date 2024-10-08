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
        <meta charset="UTF8">
        <title>Incomes</title>
        <link rel="stylesheet" type="text/css" href="/budget/Styles/style.css">
    </head>
    <body>
    <div class="header">
            <h1>Budget Management System</h1>
            <h2>Add Income</h2>
            <div class="header-right">
                <a href="/budget/Views/Incomes/income_index.php">Back to Incomes Page</a><br>
                <?php echo $_SESSION['fullname']; ?>
            </div>
        </div>
        <form action='' method="post">
            <table class="center">
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