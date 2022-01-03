<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5 text-center mb-3">
            <h2 class="display-4">All Movies</h2>
            <div class="row">
                <div class="col-md-6 offset-3 text-center">
                    <a href="user/add_movie.php"><button class="btn btn-primary"><i class="fas fa-user-plus"></i> Add movie</button></a>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Name movie</th>
                        <th scope="col">Year movie</th>
                        <th scope="col">Image</th>
                        <th scope="col">Genre</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($movies as $movie) : ?>
                        <tr>
                            <th scope="row"><?php echo $movie["name_movie"]; ?></th>
                            <td><?php echo $movie["year_movie"]; ?></td>
                            <td><img src="uploads/<?php echo $movie['image']; ?>" class="img-fluid" style="width:40px; height:40px;"></td>
                            <td><?php echo $movie["genre"]; ?></td>
                            <td>
                                <a href="user/add_movie.php" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i></a>
                                <a href="user/edit_movie.php?id=<?php echo $movie['id']; ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="user/delete_movie.php?id=<?php echo $movie["id"]; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>