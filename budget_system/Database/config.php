<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'budget');

$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS)
    or die("Check your server connection!");
mysqli_select_db($connect, DB_NAME);    