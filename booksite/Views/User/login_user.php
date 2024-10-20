<?php
session_start();
require_once(__DIR__ . '/../../Controllers/UserController.php');
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = md5($_POST['pass']);
    $user = new UserController;
    $result = $user->loginUser($username, $password);
    $row = mysqli_fetch_array($result);
    if($row > 0){
        $_SESSION['id'] = $row['user_id'];
        $_SESSION['fullname'] = $row['user_fullname'];
        echo "<script>window.location.href='/booksite/Views/main_page.php'</script>";
    } else {
        echo "<script>alert('Invalid details. Please try again.');</script>";
        echo "<script>window.location.href='/booksite/Views/User/login_user.php'</script>";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h1>Book Review Database</h1>
                        </div>
                        <div class="body">
                            <h2>Login Form</h2>
                            
                            <form action='' method="post">
                                <div class="mb-3">
                                    <label for="">Username:</label>
                                    <input type="text" name="username" required class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label for="">Password:</label>
                                    <input type="password" name="pass" required class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <input type="submit" name="login" class="btn btn-primary" value="Login">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>    
</html>