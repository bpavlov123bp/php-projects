<?php
require_once('database.php');
class AddMovie{
    private $database;
    public function __construct()
    {
        $this->database = new Database();
    }
    public function addMovie(){
        echo "Az sam";
    }
}