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
                <a href="/budget/Views/main_page.php">Back to Main Page</a><br>
                <?php echo $_SESSION['fullname']; ?>
            </div>
        </div>
        <form action="/budget/Views/Reports/Expenses/show_expenses.php" method="post">
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
    </body>
</html>