<?php
session_start();
require_once(__DIR__ . '/../../../Controllers/expenses.php');
if($_POST['show']){
    $month = $_POST['month'];
    switch($month){
        case "January":
            $month = 1;
            break;
        case "February":
            $month = 2;
            break;
        case "March":
            $month = 3;
            break;
        case "April":
            $month = 4;
            break;
        case "May":
            $month = 5;
            break;
        case "June":
            $month = 6;
            break;
        case "July":
            $month = 7;
            break;
        case "August":
            $month = 8;
            break;
        case "September":
            $month = 9;
            break;                                                ;                            
        case "October":
            $month = 10;
        break;
        case "November":
            $month = 11;
            break;
        case "December":
            $month = 12;
            break;        
    }
    $result = showMonth($month);
    $row = mysqli_num_rows($result);
}
$total = 0.0;
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
                echo "<tr>";
            }
            ?>
        </table>
    </body>
</html>        