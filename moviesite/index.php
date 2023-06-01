<?php
require_once('moviesite_controller.php');
class Index{
    private $controller;
    public function __construct()
    {
        $this->controller = new Controller();
    }
    public function showAllFilms(){
        return $this->controller->showData();
    }
}

$index = new Index();
echo $index->showAllFilms(); 
