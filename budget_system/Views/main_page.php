<?php
session_start();
require_once(__DIR__ . '/../Controllers/users.php');
if($_SESSION['id'] == ""){
    logout();
} else{
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>Budget Management System</title>
        </head>
        <body>
            <h1 align="center">Budget Managemen System</h1>
            <h3 align="right">Welcome <?php echo $_SESSION['fullname']; ?></h3>
            <p><a href="/budget/Views/Incomes/income_index.php">Incomes</a></p>
            <p><a href="/budget/Views/Expenses/index_expenses.php">Expenses</a></p>
            <p><a href="/budget/Views/logout.php">Logout</a></p>
        </body>    
    </html>
<?php
}