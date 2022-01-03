<?php require('./views/includes/head.php'); ?>
<?php require('./views/includes/top_nav.php'); ?>



<div class="container">
    <div class="row mt-5">
        <div class="col-md-8 offset-2">
            <!-- Add move -->
            <div class="form-group">
                <h1>Edit movie</h1><br>
                <form action="user/edit_movie.php?id=<?php echo $movie['id']; ?>" method="POST">
                    <label for="">Name movie</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-film"></i></span>
                        </div>
                        <input type="text" name="name_movie" class="form-control" aria-label="#" aria-describedby="basic-addon1" value="<?php echo $movie['name_movie']; ?>">
                    </div>

                    <?php if (isset($name_movie_error)) : ?>
                        <p><?php echo $name_movie_error; ?></p>
                    <?php endif; ?>

                    <label for="">Year movie</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope-open"></i></span>
                        </div>
                        <input type="number" name="year_movie" class="form-control" aria-label="#" aria-describedby="basic-addon1" value="<?php echo $movie['year_movie'] ?>">
                    </div>
                    <?php if (isset($year_movie_error)) : ?>
                        <p><?php echo $year_movie_error; ?></p>
                    <?php endif; ?>

                    <label for="">Image movie</label>
                    <div class="input-group mb-3">
                        <img src="uploads/<?php echo $movie['image']; ?>" class="img-fluid" style="width:100%; height:400px;">
                    </div>
                    <label for="">Genre</label>
                    <div class="input-group mb-3">
                        <select name="genre" class="form-control">
                            <?php foreach ($category as $cat) : ?>
                                <option value="<?php echo $cat['name']; ?>">
                                    <?php echo $cat['name']; ?></option>
                            <?php endforeach;
                            ?>
                        </select>
                    </div>
                    <?php if (isset($ups)) : ?>
                        <p><?php echo $ups; ?></p>
                    <?php endif; ?>
                    <div class="button-group">
                        <button type="submit" class="btn btn-outline-warning w-100 mt-3">Edit movie</button>
                    </div>
                </form>
            </div>
            <!-- End of Add move -->
        </div>
    </div>
</div>

<?php require('./views/includes/bottom.php'); ?>