<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Report By Date</title>
        <link rel="stylesheet" type="text/css" href="/budget/Styles/style.css">
    </head>
    <body>
    <div class="header">
            <h1>Budget Management System</h1>
            <div class="header-right">
                <a href="/budget/Views/Expenses/index_expenses.php">Back to Expenses Page</a><br>
                <?php echo $_SESSION['fullname']; ?>
            </div>
        </div>
        <form action='' method="post">
            <table class="center">
                <tr>
                    <td>Start Date</td>
                    <td>
                        <input type="date" name="start_date">
                    </td>
                </tr>
                <tr>
                    <td>End Date</td>
                    <td>
                        <input type="date" name="end_date">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="show_expenses" value="Show Records">
                    </td>
                </tr>
            </table>
        </form>
        <?php
        require_once(__DIR__ . '/../../../Controllers/expenses.php');
        if(isset($_POST['show_expenses'])){
        $user_id = $_SESSION['id'];    
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $result = showBetweenTwoDates($start_date, $end_date, $user_id);
        $row = mysqli_num_rows($result);
        $total = 0.0;
        ?>
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
        }
            ?>
    </body>
</html>