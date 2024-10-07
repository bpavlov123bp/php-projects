<?php
session_start();
require_once(__DIR__ . '/../../../Controllers/expenses.php');
if(isset($_POST['show_expenses'])){
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $result = showBetweenTwoDates($start_date, $end_date);
    $row = mysqli_num_rows($result);
    $total = 0.0;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Report Expenses</title>
        <link rel="stylesheet" type="text/css" href="/budget/Styles/style.css">
    </head>
    <body>
    <div class="header">
            <h1>Budget Management System</h1>
            <div class="header-right">
                <a href="/budget/Views/main_page.php">Back to Main Page</a><br>
                <?php echo $_SESSION['fullname']; ?>
            </div>
        </div>
        <table class="center">
            <tr>
                <th>Date</th>
                <th>Name of Expense</th>
                <th>Amount</th>
            </tr>
            <?php
            if($row == 0){
                echo "<tr>";
                echo "<td>No Record Found</td>";
                echo "</tr>";
            } else {
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                    echo "<td>" . $row['exp_date'] . "</td>";
                    echo "<td>" . $row['exp_name'] . "</td>";
                    echo "<td>" . $row['exp_amount'] . "</td>";
                    echo "</tr>";
                    $total += $row['exp_amount'];
                }
                echo "<tr>";
                echo "<td colspan=\"3\">Total expenses: " . $total . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </body>
</html>