<?php
require_once('model.php');
require_once('view.php');
class ConverterController{
    private $view;
    public function __construct()
    {
        $this->view = new ConverterViews();
    }
     public function showView(){
        $output = $this->view->output();
        return $output;
     }
}

$converter = new ConverterController();
echo $converter->showView();