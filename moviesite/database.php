<?php
class Database{
    private $db_host = 'localhost';
    private $db_user = 'bp5am';
    private $db_pass = 'bp5ampass';
    private $db_name = 'moviesite';
    private $conn;

    public function __construct()
    {
        $this->conn = mysqli_connect($this->db_host, $this-> db_user, $this->db_pass) or die(mysqli_error($this->conn));  
        mysqli_select_db($this->conn, $this->db_name) or die(mysqli_error($this->conn));  
    }
    public function select(){
        $result = $this->conn->query("SELECT movie_name, movie_type FROM movie WHERE movie_year>1990
        ORDER BY movie_name");
        return $result;
    }
}