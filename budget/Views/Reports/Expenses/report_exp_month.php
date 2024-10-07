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
                <a href="/budget/Views/main_page.php">Back to Main Page</a><br>
                <?php echo $_SESSION['fullname']; ?>
            </div>
        </div>
        <form action="show_exp_monthly.php" method="post">
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
    </body>
</html>        