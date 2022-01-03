<?php
$title = "Add movie";
require("../core/init.php");

if (!isLogged()) {
    header('Location: /php_app_test/index.php');
}

$user     = getUser($_SESSION["id"]);
$movies   = getAllMovies();
$category = getGenreCategory();


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

    if (!isset($_FILES["file"]['name']) || empty($_FILES["file"]['name'])) {
        $file_error  = "<p class='alert alert-danger text-alert text-danger d-inline-block p-1'>This field is required!</p>";
        array_push($errors, $file_error);
    }


    if (!isset($_POST["genre"]) || empty($_POST["genre"])) {
        $genre_error  = "<p class='alert alert-danger text-alert text-danger d-inline-block p-1'>This field is required!</p>";
        array_push($errors, $genre_error);
    } else {
        $genre = $_POST["genre"];
    }

    if (count($errors) == 0) {
        // file upload
        $name        = $_FILES['file']["name"];
        // define document image folder
        $target_dir  = $_SERVER['DOCUMENT_ROOT'] . "/php_app_test/uploads/"; // mesto gde se uploduje slika
        //define unique image name
        // $target_name = time().basename($_FILES['file']['name']);
        $target_name = time() . $name; // time function
        // define full path
        $target_file = $target_dir . $target_name;
        // select file type
        $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // valid file extensions
        $extensions_arr  = ['jpg', 'jpeg', 'png', 'gif'];
        // check extensions
        if (in_array($image_file_type, $extensions_arr)) {
            // upload file
            if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
                if (addMovies($name_movie, $year_movie, $target_name, $genre)) {
                    header("Location: home.php");
                } else {
                    $ups = "<p class='alert alert-light text-danger d-inline-block p-1'>Ups something went wrong</p>";
                }
            } else {
                $ups = "<p class='alert alert-light text-danger d-inline-block p-1'>Ups something went wrong</p>";
            }
        } else {
            $file_type_error = "<p class='alert alert-light text-danger d-inline-block p-1'>Image must be jpg,jpeg,png,gif</p>";
        }
    }
}




require("./views/add_movie.view.php");
