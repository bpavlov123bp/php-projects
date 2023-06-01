<?php
require_once('movie_details.php');
class Controller{
    private $view_details;
    public function __construct()
    {
        $this->view_details = new MovieDetails();
    }
    public function loadDetails(){
        echo $this->view_details->outputMovieDetails();
    }
}
$controller = new Controller();
$controller->loadDetails();