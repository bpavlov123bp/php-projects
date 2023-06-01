<?php
require_once('add_movie.php');
class AddMovieController{
    private $addMovie;
    public function __construct()
    {
        $this->addMovie = new AddMovie();
    }
    public function AddMovie(){
        return $this->addMovie->addMovieForm();
    }
}

$addMovie = new AddMovieController();
echo $addMovie->AddMovie();