<?php
require_once('database.php');
class AddMovie{
    private $database;
    public function __construct()
    {
        $this->database = new Database();
    }
    public function addMovieForm(){
        $output = "";
        $result_t = $this->database->getMovieTypeLabel();
        //$resultActor = $this->database->getActor();
        //$resultDirector = $this->database->getDirector();
        $resultPeople = $this->database->getPeopleName();
        while($row = $resultPeople->fetch_array()){
            $people[$row['people_id']] = $row['people_fullname'];
        }
        $output .= "<h2><center>Add Movie</center></h2>
        <a href=\"add_movie_controller.php\"><center>Add Movie</a>
        <a href=\"\">Add People</a>
        <a href=\"\">Add Review</a>
        </center>
        <hr>
        <table>
        <form method=\"post\" action=\"add_movie_database.php\">
        <tr>
        <td>Movie Name</td>
        <td><input type=\"text\" name=\"movie_name\" style=\"width:150px\"></td>
        </tr>
        <tr>
        <td>Movie Type</td>
        <td>
        <select name=\"movie_type\" style=\"width:150px\">";
        while($row_t = $result_t->fetch_array()){
            $output .= "<option value='" . $row_t['movietype_id'] . "'>" . 
            $row_t['movietype_label'] . "</option>";
        }
        $output .= "</select>
        </td>
        </tr>
        <tr>
        <td>Movie Year</td>
        <td><input type=\"text\" name=\"movie_year\" style=\"width:150px\"></td>
        </tr>";
        $output .= "<tr>
        <td>Lead Actor</td>
        <td>
        <select name=\"movie_leadactor\" style=\"width:150px\">
        <option value=\"\" selected >Select an actor...</option>";
        foreach($people as $people_id => $people_fullname){
            $output .= "<option value='" . $people_id . "'>" . $people_fullname . "</option>"; 
        }
        $output .= "</select>
        </td>
        </tr>";
        $output .= "<tr>
        <td>Director</td>
        <td>
        <select name=\"movie_director\" style=\"width:150px\">
        <option value=\"\" selected >Select a director...</option>";
        foreach($people as $people_id => $people_fullname){
            $output .= "<option value='" . $people_id . "'>" . $people_fullname . "</option>"; 
        }
        $output .= "</select>
        </td>
        </tr>
        <tr>
        <td>Movie Running Time</td>
        <td><input type=\"text\" name=\"movie_running_time\" style=\"width:150px\"></td>
        </tr>
        <tr>
        <td>Movie Cost</td>
        <td><input type=\"text\" name=\"movie_cost\" style=\"width:150px\"></td>
        </tr>
        <tr>
        <td>Movie Takings</td>
        <td><input type=\"text\" name=\"movie_takings\" style=\"width:150px\"></td>
        </tr>
        <tr>
        <td><input type=\"submit\" name=\"add_movie\" value=\"Add\"></td>
        </tr>
        </form>
        </table>";
        return $output;
    }
}
