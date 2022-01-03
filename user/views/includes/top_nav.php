<!-- Navbar navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#"><?php echo $title; ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
            <a class="nav-link" disabled><?php echo $user["first_name"] . " " . $user["last_name"]; ?></a>
            <a href="logout.php" class="nav-link">Logout</a>
        </div>
    </div>
</nav>
<!-- End of navbar navigation -->