<?php
$title = "Edit movie";
require("../core/init.php");

if (!isLogged()) {
    header('Location: /php_app_test/index.php');
}

$user      = getUser($_SESSION["id"]);
$category  = getGenreCategory();
$id        = $_GET['id'];
$movies    = getAllMovies();
$movie     = singleMovie($id);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];
    if (!isset($_POST["name_movie"]) || empty($_POST["name_movie"])) {
        $name_movie_error  = "<p class='alert alert-danger text-danger d-inline-block p-1'>This field is required!</p>";
        array_push($errors, $name_movie_error);
    } else {
        $name_movie = $_POST["name_movie"];
    }

    if (!isset($_POST["year_movie"]) || empty($_POST["year_movie"])) {
        $year_movie_error  = "<p class='alert alert-danger text-alert text-danger d-inline-block p-1'>This field is required!</p>";
        array_push($errors, $year_movie_error);
    } else {
        $year_movie = $_POST["year_movie"];
    }


    if (!isset($_POST["genre"]) || empty($_POST["genre"])) {
        $genre_error  = "<p class='alert alert-danger text-alert text-danger d-inline-block p-1'>This field is required!</p>";
        array_push($errors, $genre_error);
    } else {
        $genre = $_POST["genre"];
    }

    if (count($errors) == 0) {
        if (editMoves($name_movie, $year_movie, $genre, $id)) {
            header("Location: home.php");
        } else {
            $ups = "Something went wrong!";
        }
    }
}




require("./views/edit_movie.view.php");
