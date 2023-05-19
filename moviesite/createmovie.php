<?php
$connect = mysqli_connect("localhost", "bp5am", "bp5ampass") or
    die("Check your server connection.");
mysqli_select_db($connect, "moviesite");
$movie_type = "CREATE TABLE movietype(
    movietype_id int(11) NOT NULL auto_increment,
    movietype_label varchar(100) NOT NULL,
    PRIMARY KEY(movietype_id))";
$result = mysqli_query($connect, $movie_type)
    or die($mysqli_error($connect));
$people = "CREATE TABLE people (
    people_id int(11) NOT NULL auto_increment,
    people_fullname varchar(255) NOT NULL,
    people_isactor tinyint(1) NOT NULL default 0,
    people_isdirector tinyint(1) NOT NULL default 0,
    PRIMARY KEY (people_id))";
$result = mysqli_query($connect, $people)
    or die(mysqli_error($connect));
echo "Movie database successfully created!";            

