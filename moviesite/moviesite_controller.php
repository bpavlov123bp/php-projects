<?php
require_once('moviesite_view.php');
class Controller{
    private $view;
    private $movie_details;
    public function __construct()
    {
        $this->view = new View();
    }
    public function showData(){
        return $this->view->output();
    }
}