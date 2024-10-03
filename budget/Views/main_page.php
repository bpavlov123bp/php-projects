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
            <link rel="stylesheet" type="text/css" href="/budget/Styles/style.css">
        </head>
        <body>
        <div class="header">
            <h1>Budget Managemen System</h1>
            <div class="header-right">
                Welcome <?php echo $_SESSION['fullname']; ?>
            </div>
            <div class="sidenav">
            <a href="/budget/Views/Incomes/income_index.php">Incomes</a>
            <a href="/budget/Views/Expenses/index_expenses.php">Expenses</a>
            <a href="/budget/Views/Reports/reports.php">Reports</a>
            <a href="/budget/Views/logout.php">Log Out</a>
        </div>
        </body>    
    </html>
<?php
}