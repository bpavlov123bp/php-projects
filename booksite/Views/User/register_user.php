<?php
session_start();
require_once(__DIR__ . '/../../Controllers/UserController.php');
if(isset($_POST['register'])){
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $email = $_POST['email'];
    $user = new UserController;
    $result = $user->registerUser($fullname, $username, $password, $email);
    if($result){
        header("Location: /booksite/Views/User/login_user.php");
        $_SESSION['response'] = "New user added!";
    } else {
        header("Location: /booksite/Views/User/login_user.php");
        $_SESSION['response'] = "Error inserting record!";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registration</title>
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
                            <h2>Registration Form</h2>
                            
                            <form action='' method="post">

                                <div class="mb-3">
                                    <label for="">Full name:</label>
                                    <input type="text" name="fullname" required class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label for="">Username:</label>
                                    <input type="text" name="username" required class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label for="">Password:</label>
                                    <input type="password" name="password" required class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label for="">Email:</label>
                                    <input type="email" name="email" required class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <input type="submit" name="register" class="btn btn-primary" value="Register">
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