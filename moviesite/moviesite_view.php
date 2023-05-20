<?php
require_once('database.php');
class View{
    private $database;
    public function __construct()
    {
        $this->database = new Database();
    }
    public function output(){
        $outputData = "";
        $result = $this->database->selectMovie();
        $resultDirector = $this->database->getDirector();
        $resultActor = $this->database->getActor();
        $outputData .= "<h2><center>Movie Review Database</center></h2>
        <table border=\"1\" align=\"center\">
        <tr>
        <th>Movie Title</th>
        <th>Movie Director</th>
        <th>Movie Lead Actor</th>
        </tr>";
        
        while($row = $result->fetch_array()){
            $movie_name = $row['movie_name'];
            $movie_director = $row['movie_director'];
            $movie_leadactor = $row['movie_leadactor'];
            $outputData .= "<tr>\n";
            $outputData .= "<td>$movie_name</td>";
            $outputData .= "<td>"; 
            $row_d = $resultDirector->fetch_array();
            extract($row_d);
            $director = $people_fullname;
            $outputData .= "$director</td>";
            $outputData .= "<td>";
            $row_a = $resultActor->fetch_array();
            extract($row_a);
            $leadActor = $people_fullname;
            $outputData .= "$leadActor</td>";
        }
       
        $outputData .= "</tr>";
        $outputData .= "<tr>
        <td colspan=\"3\">Total movies: " . $this->database->countMovies() . "</td>
        </tr>";
        $outputData .= "</table>\n";
        return $outputData;
    }
    
}

