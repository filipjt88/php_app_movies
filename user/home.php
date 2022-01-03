<?php $title = "Admin panel"; ?>
<?php require('../core/init.php');

if (!isLogged()) {
    header('Location: /php_app_test/index.php');
}
$movies = getAllMovies();
$user = getUser($_SESSION["id"]);
$category = getGenreCategory();
?>
<?php $title = "Admin panel"; ?>
<?php require('./views/includes/head.php'); ?>
<?php require('./views/includes/top_nav.php'); ?>

<?php

if (!isLogged()) {
    header('Location: /php_app_test/index.php');
} ?>

<?php require('./views/home.view.php'); ?>
<?php require('./views/includes/bottom.php'); ?>