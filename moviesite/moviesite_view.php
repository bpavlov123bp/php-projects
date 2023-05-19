<?php
require_once('database.php');
class MovieView{
    private $database;
    public function __construct()
    {
        $this->database = new Database();
    }
    public function output(){
        $array = array();
        $result = $this->database->select();
        while($row = $result->fetch_array()){
            extract($row);
            $array[] = $movie_name . " - " . $movie_type;
        }
        return $array;
    }
}
$view = new MovieView();
foreach($view->output() as $value){
    echo $value . "\n";
}