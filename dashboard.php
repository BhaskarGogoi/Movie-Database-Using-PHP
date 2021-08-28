<?php
    ob_start();
	include 'includes/header.php';
	echo "<title>Movie Database</title>";
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

    <div class="container shadow mt-4 p-4">
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
                        Data successully added!
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>";
            } 
        ?>
        <div class="row">
            <a href="add-movie.php">
                <div class="card ml-5 mr-5 dashboard-card" style="width: 18rem;">
                    <img src="images/icons/movie.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title" style='text-align:center;'>Add Movie</h5>
                    </div>
                </div>
            </a>

            <a href="add-director.php">
                <div class="card ml-5 mr-5 dashboard-card" style="width: 18rem;">
                    <img src="images/icons/director.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title" style='text-align:center;'>Add Director</h5>
                    </div>
                </div>
            </a>

            <a href="add-actor.php">
                <div class="card dashboard-card" style="width: 18rem;">
                    <img src="images/icons/actor.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title" style='text-align:center;'>Add Actor</h5>
                    </div>
                </div>
            </a>

            <a href="add-producer.php" class='mt-4'>
                <div class=" card ml-5 mr-5 dashboard-card" style="width: 18rem;">
                    <img src="images/icons/producer.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title" style='text-align:center;'>Add Procuder</h5>
                    </div>
                </div>
            </a>

        </div>
    </div><br><br>
    <?php
        include 'includes/footer.php';
    ?>
</body>