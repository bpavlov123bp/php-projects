<?php
session_start();
require_once(__DIR__ . '/../../Controllers/incomes.php');

$result = index();
$row = mysqli_num_rows($result);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF8">
        <title>Incomes</title>
    </head>
    <body>
        <h1 align="center">Budget Managemen System</h1>
        <h3 align="center">Incomes of <?php echo $_SESSION['fullname']; ?></h3>
        <a href="/budget/Views/Incomes/income_add.php">Add Income</a>
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
                        $date = $row['income_date'];
                        $name = $row['income_name'];
                        $amount = $row['income_amount'];
                        $user = $_SESSION['fullname'];
                        echo "<tr>";    
                        echo "<td>$date</td>";
                        echo "<td>$name</td>";
                        echo "<td>$amount</td>";
                        echo "<td>$user</td>";
                        echo "<td>" ?>
                        <a href="/budget/Views/Incomes/income_edit.php?id=<?php echo $row['id']; ?>">[EDIT]</a>
                        <a href="/budget/Views/Incomes/income_delete.php?id=<?php echo $row['id']; ?>">[DELETE]</a>
                        <?php
                        echo "</tr>";
                    }
                }
                    
                ?>
            </tr>
        </table>
    </body>
</html>