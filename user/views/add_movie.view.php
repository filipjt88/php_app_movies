<?php require('./views/includes/head.php'); ?>
<?php require('./views/includes/top_nav.php'); ?>
<div class="container">
    <div class="row mt-5">
        <div class="col-md-6 offset-2">
            <!-- Add move -->
            <div class="form-group">
                <h1>Add new movie</h1><br>
                <form action="user/add_movie.php" method="POST" enctype="multipart/form-data">
                    <label for="">Name movie</label>
                    <div class=" input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope-open"></i></span>
                        </div>
                        <input type="text" name="name_movie" class="form-control" placeholder="Please enter name movie . . ." aria-label="#" aria-describedby="basic-addon1" value="<?php if (isset($name_movie)) echo $name_movie; ?>">
                    </div>
                    <?php if (isset($name_movie_error)) : ?>
                        <p><?php echo $name_movie_error; ?></p>
                    <?php endif; ?>

                    <label for="">Year movie</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope-open"></i></span>
                        </div>
                        <input type="number" name="year_movie" class="form-control" placeholder="Please enter year movie . . ." aria-label="#" aria-describedby="basic-addon1" value="<?php if (isset($year_movie)) echo $year_movie; ?>">
                    </div>
                    <?php if (isset($year_movie_error)) : ?>
                        <p><?php echo $year_movie_error; ?></p>
                    <?php endif; ?>

                    <label for="">Image movie</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope-open"></i></span>
                        </div>
                        <input type="file" name="file" class="form-control" aria-label="#" aria-describedby="basic-addon1">
                    </div>
                    <?php if (isset($file_error)) : ?>
                        <p><?php echo $file_error; ?></p>
                    <?php endif; ?>

                    <?php if (isset($file_type_error)) : ?>
                        <p><?php echo $file_type_error; ?></p>
                    <?php endif; ?>

                    <label for="">Genre</label>
                    <div class="input-group mb-3">
                        <select name="genre" class="form-control">
                            <?php foreach ($category as $categories) : ?>
                                <option value="<?php echo $categories['name']; ?>"><?php echo $categories['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="button-group">
                        <button type="submit" class="btn btn-outline-primary form-control mt-3">Add movie</button>
                    </div>
                </form>
            </div>
            <!-- End of login form -->
        </div>
    </div>
</div>