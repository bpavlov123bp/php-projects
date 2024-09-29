<?php
require_once(__DIR__ . '/../Controllers/users.php');
logout();
header('Location: /budget/index.php');