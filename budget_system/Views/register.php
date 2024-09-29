<?php
require_once(__DIR__ . '/../Controllers/users.php');

if(isset($_POST['register'])){
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $available = availability_username($username);
    $row = mysqli_num_rows($available);
    if($row > 0){
        echo "<script>alert('Username ia already exist!');</script>";
        echo "<script>$('#submit').prop('disabled',true);</script>";
        echo "<script>window.location.href='/budget/index.php'</script>";
    } else {
        $sql = registration($fullname, $username, $email, $password);
    if($sql){
        echo "<script>alert('Registration is successfully completed!')</script>";
        echo "<script>window.location.href='/budget/index.php'</script>";

    } else {
        echo "<script>alert('Something goes wrong!);</script>";
        echo "<script>window.location.href='/budget/index.php'</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Register User</title>
    </head>
    <body>
        <h1 align="center">Budget Management System</h1>
        <h2>Registration Form</h2>
        <form action='' method="post">
            <table border="0">
                <tr>
                    <td>Full Name</td>
                    <td>
                        <input type="text" name="fullname" value="">
                    </td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td>
                        <input type="text" name="username">
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <input type="email" name="email">
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>
                        <input type="password" name="password">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="register" value="Create Account">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>