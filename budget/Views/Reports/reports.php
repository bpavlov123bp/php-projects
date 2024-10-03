<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>User Reports</title>
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
            <a href="#">Montly Report</a>
            <a href="#">Report by Name</a>
            <a href="#">Report by Amount</a>
        </div>
    </body>
</html>