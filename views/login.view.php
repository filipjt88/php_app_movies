<?php $title = "Login"; ?>
<?php require('views/includes/head.php');  ?>
<?php require('views/includes/top_nav.php'); ?>




<div class="container">
    <div class="row mt-5">
        <div class="col-md-6 offset-2">
            <!-- Login form -->
            <div class="form-group">
                <h1>Login</h1><br>
                <form action="login.php" method="POST">
                    <label for="">Email</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope-open"></i></span>
                        </div>
                        <input type="email" name="email" class="form-control" placeholder="Please enter your email . . ." aria-label="#" aria-describedby="basic-addon1" value="<?php if (isset($email)) echo $email; ?>">
                    </div>
                    <?php if (isset($email_error)) : ?>
                        <p class="text-danger"><?php echo $email_error; ?></p>
                    <?php endif; ?>
                    <label for="">Password</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="input"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" id="myInput" name="password" class="form-control" placeholder="Please enter your password . . ." aria-label="#" aria-describedby="basic-addon1">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <input type="checkbox" onclick="myFunction()">
                            </div>
                        </div>
                    </div>
                    <?php if (isset($password_error)) : ?>
                        <p class="text-danger"><?php echo $password_error; ?></p>
                    <?php endif; ?>

                    <?php if (isset($wrong_password_or_email)) : ?>
                        <p class="text-danger"><?php echo $wrong_password_or_email; ?></p>
                    <?php endif; ?>
                    <div class="button-group">
                        <button type="submit" class="btn btn-outline-primary form-control mt-3">Login</button>
                    </div>
                </form>
            </div>
            <!-- End of login form -->
        </div>
    </div>
</div>

<?php require('views/includes/bottom.php');  ?>