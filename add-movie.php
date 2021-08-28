<?php

	include 'includes/header.php';
	echo "<title>Add Movie</title>";
?>

</head>
<!-- body -->

<body class="main-layout">

    <?php
		include($_SERVER['DOCUMENT_ROOT'].'/moviedatabase/includes/nav.php');
		include($_SERVER['DOCUMENT_ROOT'].'/moviedatabase/includes/secondary-nav.php');

        if(!isset($_SESSION['admin_id'])){
            header ("Location: //localhost/moviedatabase/login.php?not-loggedin");
        }
	?>


    <div class="container shadow mt-5 p-5">
        <?php
            $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
            if (strpos($url, 'error')!== false) {
                echo "
                    <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        Something went wrong!
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>";
            } elseif (strpos($url, 'success')!== false) {
                echo "
                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                        Director data successully added!
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>";
            } 
        ?>

        <div class="row">
            <h3>Add Movie</h3>
            <form action='includes/add-movie.php' method="post" class='form-center' enctype='multipart/form-data'>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Movie Title</label>
                        <input type="text" class="form-control" name="movie_title" placeholder="Movie Title" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Language</label>
                        <input type="text" name="language" class="form-control" placeholder="Language">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Year</label>
                        <input type="digit" maxlength="4" class="form-control" name="year" placeholder="Year" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Movie Poster</label>
                        <input type="file" class="form-control-file" name="image">
                    </div>
                </div>
                <div class="form-check form-check">
                    <input class="form-check-input" type="checkbox" name="genre[]" value="Action">
                    <label class="form-check-label">Action</label>
                </div>
                <div class="form-check form-check">
                    <input class="form-check-input" type="checkbox" name="genre[]" value="Thriller">
                    <label class="form-check-label">Thriller</label>
                </div>
                <div class="form-check form-check">
                    <input class="form-check-input" type="checkbox" name="genre[]" value="Drama">
                    <label class="form-check-label">Drama</label>
                </div>
                <div class="form-check form-check">
                    <input class="form-check-input" type="checkbox" name="genre[]" value="Romance">
                    <label class="form-check-label">Romance</label>
                </div>
                <div class="form-check form-check">
                    <input class="form-check-input" type="checkbox" name="genre[]" value="Horror">
                    <label class="form-check-label">Horror</label>
                </div>
                <div class="form-check form-check">
                    <input class="form-check-input" type="checkbox" name="genre[]" value="Comedy">
                    <label class="form-check-label">Comedy</label>
                </div>
                <div class="form-check form-check">
                    <input class="form-check-input" type="checkbox" name="genre[]" value="Science Fiction">
                    <label class="form-check-label">Science Fiction</label>
                </div><br>
                <button type="submit" name='submit' class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
    <?php
		include($_SERVER['DOCUMENT_ROOT'].'/moviedatabase/includes/footer.php');
	?>
</body>