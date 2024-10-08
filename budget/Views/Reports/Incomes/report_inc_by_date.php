<?php
session_start();
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
                <a href="/budget/Views/Incomes/income_index.php">Back to Incomes Page</a><br>
                <?php echo $_SESSION['fullname']; ?>
            </div>
        </div>
        <form action='' method="post">
        <table class="center">
            <tr>
                <td>Start date</td>
                <td>
                    <input type="date" name="start_date">
                </td>
            </tr>
            <tr>
                <td>End date</td>
                <td>
                    <input type="date" name="end_date">
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
        require_once(__DIR__ . '/../../../Controllers/incomes.php');
        if(isset($_POST['show'])){
            $user_id = $_SESSION['id'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $total = 0.0;
            $result = showByDate($start_date, $end_date, $user_id);
            $row = mysqli_num_rows($result);
            ?>
                <table class="center">
                    <tr>
                        <th>Date</th>
                        <th>Name</th>
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
                            echo "<td>" . $row['income_date'] . "</td>";
                            echo "<td>" . $row['income_name'] . "</td>";
                            echo "<td>" . $row['income_amount'] . "</td>";
                            $total += $row['income_amount'];
                        }
                        echo "<tr>";
                        echo "<td colspan=\"3\">Total incomes: " . $total;
                        echo "</tr>";
                    }
                    ?>
                </table>
            <?php
        }
    ?>
    </body>
</html>    