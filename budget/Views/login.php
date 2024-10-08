<?php
session_start();
require_once(__DIR__ . '/../Controllers/users.php');

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $login = login($username, $password);
    $row = mysqli_fetch_array($login);
    if($row > 0){
        $_SESSION['id'] = $row['id'];
        $_SESSION['fullname'] = $row['fullname'];
        echo "<script>window.location.href='/budget/Views/main_page.php'</script>";
    } else {
        echo "<script>alert('Invalid details. Please try again.');</script>";
        echo "<script>window.location.href='/budget/Views/login.php'</script>";
    }
}
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
        </div>
        <h2 style="text-align: center;">Login Form</h2>
        <form action='' method="post">
            <table class="center">
                <tr>
                    <td>Username</td>
                    <td>
                        <input type="text" name="username" value="" required>
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>
                        <input type="password" name="password" required>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="login" value="Login">
                        <p>
                            Not registred yet?&nbsp;<a href="/budget/Views/register.php">Register here</a>
                        </p>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>