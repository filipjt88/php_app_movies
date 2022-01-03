<?php

function register_user($first_name, $last_name, $email, $password)
{
    global $db;
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $sql = $db->prepare("INSERT INTO users(first_name,last_name,email,password) VALUES (?,?,?,?)"); // pripremi sql
    $sql->bind_param('ssss', $first_name, $last_name, $email, $password_hash); // stavi sta su znakovi pitanja 
    $sql->execute(); // izvrsi

    if ($sql->errno == 0) { //errno je error number
        $_SESSION["id"] = $sql->insert_id;
        header('Location: user/home.php');
    } else {
        header('Location: error.php');
    }
}



function login_user($email, $password)
{  // PASSWORD = 12345
    global $db;
    $user_password = getPasswordFromDb($email); // primer hesovanog passworda $2y$10$MMfqcUeWZdnuk1ak2FcW5uBg5Kh.QdSqSNUqn36lcq5WaEYilRTVC
    if (!$user_password) { // PITAM DA LI UOPSTE POSTOJI PASSWORD
        return false; // vracamo false u slucaju da nema passworda
    }
    if (!password_verify($password, $user_password)) { // WRONG PASSWORD 
        return false;
    }
    $sql = $db->prepare("SELECT id FROM users WHERE email = ? AND password = ?");
    $sql->bind_param('ss', $email, $user_password);
    $sql->execute();
    if ($sql->errno == 0) {
        $result = $sql->get_result();
        $id = $result->fetch_assoc()["id"];
        $_SESSION["id"] = $id;
        return true;
    } else {
        header('Location: error.php');
    }
}

function getPasswordFromDb($email)
{ // filip88ks
    global $db;
    $sql = $db->prepare("SELECT password FROM users WHERE email = ?");
    $sql->bind_param('s', $email); // bind param povezuje znak pitanja sa email-om
    $sql->execute();
    $result = $sql->get_result(); // GET RESULT FROM MYSQL U OVOM SLUCAJU JE PASSWORD
    if ($result->num_rows == 0) { // num row je broj redova tj koliko redova mi je vratila baza
        return false;
    }
    $password = $result->fetch_assoc()["password"];  // primer $2y$10$MMfqcUeWZdnuk1ak2FcW5uBg5Kh.QdSqSNUqn36lcq5WaEYilRTVC   ["password"=>"$2y$10$MMfqcUeWZdnuk1ak2FcW5uBg5Kh.QdSqSNUqn36lcq5WaEYilRTVC"];
    return $password; // varaca mi hesovan password $2y$10$MMfqcUeWZdnuk1ak2FcW5uBg5Kh.QdSqSNUqn36lcq5WaEYilRTVC
}

function addMovies($name_movie, $year_movie, $image, $genre)
{
    global $db;
    $sql = $db->prepare("INSERT INTO movie(name_movie,year_movie,image,genre) VALUES (?,?,?,?)");
    $sql->bind_param("siss", $name_movie, $year_movie, $image, $genre);
    $sql->execute();
    if ($sql->errno == 0) {
        header("Location: home.php");
    } else {
        header("Location: error.php");
    }
}

function getAllMovies()
{
    global $db;
    $sql = $db->prepare("SELECT * FROM movie");
    $sql->execute();
    if ($sql->errno == 0) {
        $result = $sql->get_result();
        $movies = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $movies;
    } else {
        return false;
    }
}

function deleteMovie($id)
{
    global $db;
    $sql = $db->prepare("DELETE FROM movie WHERE id = ?");
    $sql->bind_param("i", $id);
    $sql->execute();
    if ($sql->errno == 0) {
        return true;
    } else {
        return false;
    }
}

function editMoves($name_movie, $year_movie, $genre, $id)
{
    global $db;
    $sql = $db->prepare("UPDATE movie SET name_movie = ?, year_movie = ?, genre = ?, updated_at = NOW() WHERE id = ?");
    $sql->bind_param("sisi", $name_movie, $year_movie, $genre, $id);
    $sql->execute();
    if ($sql->errno == 0) {
        return true;
    } else {
        return false;
    }
}




function getGenreCategory()
{
    global $db;
    $sql = $db->prepare("SELECT * FROM category");
    $sql->execute();
    if ($sql->errno == 0) {
        $result = $sql->get_result();
        $category = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $category;
    } else {
        header("Location: error.php");
    }
}

function singleMovie($id)
{
    global $db;
    $sql = $db->prepare("SELECT * FROM movie WHERE id = ?");
    $sql->bind_param('i', $id);
    $sql->execute();
    if ($sql->errno == 0) {
        $result = $sql->get_result();
        $movie = $result->fetch_assoc();
        return $movie;
    } else {
        return false;
    }
}

function getUser($id)
{
    global $db;
    $sql = $db->prepare("SELECT * FROM users WHERE id = ?");
    $sql->bind_param('i', $id);
    $sql->execute();
    $result = $sql->get_result();
    $user = $result->fetch_assoc();
    return $user;
}



function isLogged()
{
    if (isset($_SESSION["id"])) {
        return true;
    } else {
        return false;
    }
}
