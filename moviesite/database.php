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
        movie_id, movie_name, movie_director, movie_leadactor 
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
    public function movieDetail(){
        $result_detail = $this->conn->query("SELECT 
        * FROM movie WHERE movie_id='" . $_GET['movie_id'] . "'");
        return $result_detail;
    }
    public function calculateLoseOrProfit($takings, $cost){
        $diff = $takings - $cost;
        if($diff < 0){
            $diff = substr($diff, 1);
            $font_color = 'red';
            $profit_or_loss = "$" . $diff . "m";
        } else if($diff > 0){
            $font_color = 'green';
            $profit_or_loss = "$" . $diff . "m";
        } else {
            $font_color = 'blue';
            $profit_or_loss = "Broke even";
        }
        return "<font color=\"$font_color\">" . $profit_or_loss . "</font>";
    }
    public function getReviews(){
        $review_query = $this->conn->query("SELECT * FROM reviews 
        WHERE review_movie_id='" . $_GET['movie_id'] . "' " . "ORDER BY review_date DESC");
        return $review_query;
    }
}

