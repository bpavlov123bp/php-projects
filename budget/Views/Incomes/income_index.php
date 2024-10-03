<?php
session_start();
require_once(__DIR__ . '/../../Controllers/incomes.php');

$result = index($_SESSION['fullname']);
$row = mysqli_num_rows($result);

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
            <div class="header-right">
                <a href="/budget/Views/main_page.php">Back to Main Page</a><br>
                <?php echo $_SESSION['fullname']; ?>
            </div>
        </div>
        <div class="sidenav">
            <a href="/budget/Views/Incomes/income_add.php">Add Incomes</a>
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
                            $date = $row['income_date'];
                            $name = $row['income_name'];
                            $amount = $row['income_amount'];
                            echo "<tr>";    
                            echo "<td>$date</td>";
                            echo "<td>$name</td>";
                            echo "<td>$amount</td>";
                            echo "<td>" ?>
                            <a href="/budget/Views/Incomes/income_edit.php?id=<?php echo $row['id']; ?>">[EDIT]</a>
                            <a href="/budget/Views/Incomes/income_delete.php?id=<?php echo $row['id']; ?>">[DELETE]</a>
                            <?php
                            echo "</td>";
                            echo "</tr>";
                        }
                    }
                    
                    ?>
                </tr>
            </table>
    </body>
</html>