<?php

require('../core/init.php');


$movies = getAllMovies();
$user   = getUser($_SESSION["id"]);
$id     = $_GET["id"];


if (deleteMovie($id)) {
    unlink(ROOT . "/uploads/" . $_GET['image']);
    header("Location:home.php");
} else {
    header("Location: error.php");
}
