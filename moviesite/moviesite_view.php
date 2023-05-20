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
        $result = $this->database->select();
        $outputData .= "<table border=\"1\">\n";
        while($row = $result->fetch_assoc()){
           $outputData .= "<tr>\n";
           foreach($row as $value){
            $outputData .= "<td>\n" . $value . "</td>\n";
           }
           $outputData .= "</tr>";
        }
        $outputData .= "</table>\n";
        return $outputData;
    }
    
}

