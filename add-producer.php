<?php

	include 'includes/header.php';
	echo "<title>Add Producer</title>";
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
            <h3>Add Producer</h3>
            <form action='includes/add-producer.php' method="post" class='form-center'>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Firstname</label>
                        <input type="text" class="form-control" name="fname" placeholder="Firstname" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Middlename</label>
                        <input type="text" name="mname" class="form-control" placeholder="Middle Name">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Lastname</label>
                        <input type="text" name="lname" class="form-control" placeholder="Lastname" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>
                </div>
                <button type="submit" name='submit' class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
    <?php
		include($_SERVER['DOCUMENT_ROOT'].'/moviedatabase/includes/footer.php');
	?>
</body>