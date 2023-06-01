<?php
require_once('database.php');

class MovieDetails{
    private $database;
    public function __construct()
    {
        $this->database = new Database();
    }
    public function outputMovieDetails(){
        $output = "";
        $result = $this->database->movieDetail();
        $resultDirector = $this->database->getDirector();
        $resultActor = $this->database->getActor();
        $review_result = $this->database->getReviews();
        $output .= "<h2><center>Movie Details<center></h2>
        <a href=\"add_movie_controller.php?action=add&id\"><center>Add Movie</a>
        <a href=\"\">Add People</a>
        <a href=\"\">Add Movie Review</a>
        </center>
        <hr>
        <table border=\"1\" align=\"center\">
        <tr>
        <th>Movie Title</th>
        <th>Year of Release</th>
        <th>Movie Director</th>
        <th>Movie Lead Actor</th>
        <th>Movie Running Time</th>
        <th>Movie Health</th>";
        while($row = $result->fetch_array()){
            $movie_name = $row['movie_name'];
            $movie_director = $row['movie_director'];
            $movie_leadactor = $row['movie_leadactor'];
            $movie_year = $row['movie_year'];
            $movie_running_time = $row['movie_running_time'] . " mins";
            $movie_takings = $row['movie_takings'];
            $movie_cost = $row['movie_cost'];
            $output .= "<tr>
            <td>$movie_name</td>
            <td>$movie_year</td>";
            $row_d = $resultDirector->fetch_array();
            extract($row_d);
            $director = $people_fullname;
            $output .= "<td>$director</td>";
            $row_a = $resultActor->fetch_array();
            extract($row_a);
            $leadactor = $people_fullname;
            $output .= "<td>$leadactor</td>
            <td>$movie_running_time</td>
            <td>" . $this->database->calculateLoseOrProfit($movie_takings, $movie_cost) . "</td>";
        }
        $output .= "</table>";
        $output .= "<h2><center>Movie Reviews<center></h2>
        <table border=\"1\" align=\"center\">
        <tr>
        <th>Date of Review</th>
        <th>Review Title</th>
        <th>Reviewer Name</th>
        <th>Movie Review Comments</th>
        <th>Rating</th>
        </tr>";
        $review_title = array();
        $review = array();
        $review_date = array();
        $reviewer_name = array();
        $review_rating = array();
        while($review_row = $review_result->fetch_array()){
            $review_flag = 1;
            $review_title[] = $review_row['review_name'];
            $reviewer_name[] = ucwords($review_row['review_reviewer_name']);
            $review[] = $review_row['review_comment'];
            $review_date[] = date('d-m-Y', strtotime($review_row['review_date']));
            $review_rating[] = $review_row['review_rating'];
        }
        for($i = 0; $i < count($review); $i++){
            $output .= "<tr>
            <td>$review_date[$i]</td>
            <td>$review_title[$i]</td>
            <td>$reviewer_name[$i]</td>
            <td>$review[$i]</td>
            <td>$review_rating[$i]</td>";
        }
        $output .= "</table>";
        return $output;
    }
}
