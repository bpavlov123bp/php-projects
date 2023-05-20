<?php
require_once('moviesite_view.php');
class Controller{
    private $view;

    public function __construct()
    {
        $this->view = new View();
    }
    public function showData(){
        return $this->view->output();
    }
}