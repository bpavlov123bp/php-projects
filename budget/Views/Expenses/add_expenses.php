<?php
session_start();
require_once(__DIR__ . '/../../Controllers/expenses.php');
if($_POST['add_record']){
    $exp_date = $_POST['exp_date'];
    $exp_name = $_POST['exp_name'];
    $exp_amount = $_POST['exp_amount'];
    $user = $_SESSION['id'];
    $result = addExpenses($exp_date, $exp_name, $exp_amount, $user);
    if($result){
        echo "<script>alert('Record added successfully!');</script>";
        echo "<script>window.location.href='/budget/Views/Expenses/index_expenses.php'</script>";
    } else {
        echo "<script>alert('something goes wrong!');</script>";
        echo "<script>window.location.href='/budget/Views/Expenses/index_expenses.php'</script>";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Expenses</title>
        <link rel="stylesheet" type="text/css" href="/budget/Styles/style.css">
    </head>
    <body>
        <div class="header">
            <h1>Budget Management System</h1>
            <h2>Add Expenses</h2>
            <div class="header-right">
                <a href="/budget/Views/Expenses/index_expenses.php">Back to Expenses Page</a><br>
                <?php echo $_SESSION['fullname']; ?>
            </div>
        </div>
        <form action='' method="post">
            <table class="center">
                <tr>
                    <td>Date</td>
                    <td>
                        <input type="date" name="exp_date" value="">
                    </td>
                </tr>
                <tr>
                    <td>Name of Expenses</td>
                    <td>
                        <input type="text" name="exp_name" value="">
                    </td>
                </tr>
                <tr>
                    <td>Amount</td>
                    <td>
                        <input type="number" name="exp_amount" value="" step=".01">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="add_record" value="Add Record">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>