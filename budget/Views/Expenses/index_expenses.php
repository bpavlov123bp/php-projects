<?php
session_start();
require_once(__DIR__ . '/../../Controllers/expenses.php');
$result = index($_SESSION['id']);
$row = mysqli_num_rows($result);
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
            <div class="header-right">
                <a href="/budget/Views/main_page.php">Back to Main Page</a><br>
                <?php echo $_SESSION['fullname']; ?>
            </div>
        </div>
        <div class="sidenav">
            <a href="/budget/Views/Expenses/add_expenses.php">Add Expenses</a>
            <a href="/budget/Views/Reports/Expenses/report_exp_month.php">Montly Report</a>
            <a href="/budget/Views/Reports/Expenses/report_exp_by_date.php">Report by Date</a>
            <a href="/budget/Views/Reports/Expenses/report_exp_by_name.php">Report by Name</a>
        </div>
        <table class="center">
            <tr>
                <th>Date</th>
                <th>Name</th>
                <th>Amount</th>
                <th colspan="2">Action</th>
            </tr>
            <?php
            if($row == 0){
                echo "<tr>";
                echo "<td>No entries found</td>";
                echo "</tr>";
            } else {
                while($row = mysqli_fetch_array($result)){
                    $date = $row['exp_date'];
                    $name = $row['exp_name'];
                    $amount = $row['exp_amount'];
                    echo "<tr>";
                    echo "<td>$date</td>";
                    echo "<td>$name</td>";
                    echo "<td>$amount</td>";
                    echo "<td>";?>
                    <a href="/budget/Views/Expenses/edit_expenses.php?id=<?php echo $row['id']; ?>">[EDIT]</a>
                    <a href="/budget/Views/Expenses/delete_expenses.php?id=<?php echo $row['id']; ?>">[DELETE]</a>
                    <?php
                    echo "</td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>
    </body>
</html>