<?php
require_once('moviesite_view.php');
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
    public function selectMovie(){
        $result = $this->conn->query("SELECT 
        movie_name, movie_director, movie_leadactor 
        FROM movie");
        return $result;
    }
    public function countMovies(){
        $count_movies = mysqli_num_rows($this->selectMovie());
        return $count_movies;
    }
    public function getDirector(){
        $resultDirector = $this->conn->query("SELECT 
        people_fullname FROM people LEFT JOIN movie ON people.people_id = movie.movie_director");
        return $resultDirector;
    }
    public function getActor(){
        $resultActor = $this->conn->query("SELECT 
        people_fullname FROM people LEFT JOIN movie ON people.people_id = movie.movie_leadactor");
        return $resultActor;
    }
}

