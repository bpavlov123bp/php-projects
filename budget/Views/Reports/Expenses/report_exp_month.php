<?php
session_start();
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
                <a href="/budget/Views/Expenses/index_expenses.php">Back to Expenses Page</a><br>
                <?php echo $_SESSION['fullname']; ?>
            </div>
        </div>
        <form action='' method="post">
            <table class="center">
                <tr>
                    <th>Select Month</th>
                </tr>
                <tr>
                    <td>
                        <select name="month">
                            <option>Select......</option>
                            <option>January</option>
                            <option>February</option>
                            <option>March</option>
                            <option>April</option>
                            <option>May</option>
                            <option>June</option>
                            <option>July</option>
                            <option>August</option>
                            <option>September</option>
                            <option>October</option>
                            <option>November</option>
                            <option>December</option>
                        </select>
                    </td>    
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="show" value="Show Records">
                    </td>
                </tr>
            </table>
        </form>
        <?php
        require_once(__DIR__ . '/../../../Controllers/expenses.php');
        if($_POST['show']){
        $user_id = $_SESSION['id'];    
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
        $result = showMonth($month, $user_id);
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
                echo "<tr>";
            }
        }
            ?>
        </table>      
    </body>
</html>        