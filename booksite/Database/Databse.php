<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'booksite');

class Database{
    private $connect;

    public function __construct()
    {
        try{
            $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            return $this->connect = $conn;
        } catch(Exception $e){
            echo $e->getMessage();
        }
    }

    public function query($sql){
        return $this->connect->query($sql);
    }

    public function close(){
        $this->connect->close();
    }
}

