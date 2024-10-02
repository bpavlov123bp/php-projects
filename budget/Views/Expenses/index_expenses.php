<?php
session_start();
require_once(__DIR__ . '/../../Controllers/expenses.php');
$result = index($_SESSION['fullname']);
$row = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Expenses</title>
    </head>
    <body>
        <h1 align="center">Budget Management System</h1>
        <h3 align="center">Expenses of <?php echo $_SESSION['fullname']; ?></h3>
        <a href="/budget/Views/Expenses/add_expenses.php">Add Expenses</a>
        <table border="1" align="center">
            <tr>
                <th>Date</th>
                <th>Name</th>
                <th>Amount</th>
                <th>User</th>
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
                    $user = $_SESSION['fullname'];
                    echo "<tr>";
                    echo "<td>$date</td>";
                    echo "<td>$name</td>";
                    echo "<td>$amount</td>";
                    echo "<td>$user</td>";
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