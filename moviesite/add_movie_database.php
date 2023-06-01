<?php
require_once('database.php');
$add_movie = new Database();
if(isset($_POST['add_movie'])){
    $movie_name = $_POST['movie_name'];
    $movie_type = $_POST['movie_type'];
    $movie_year = $_POST['movie_year'];
    $movie_leadactor = $_POST['movie_leadactor'];
    $movie_director = $_POST['movie_director'];
    $movie_running_time = $_POST['movie_running_time'];
    $movie_cost = $_POST['movie_cost'];
    $movie_takings = $_POST['movie_takings'];
    $sql = $add_movie->addMovie($movie_name, $movie_type, $movie_year, $movie_leadactor, 
    $movie_director, $movie_running_time, $movie_cost, $movie_takings);
    if($sql){
        header('Location: add_movie_php');
    } else {
        echo "<script>alert('Data not inserted');</script>";
    }
}
