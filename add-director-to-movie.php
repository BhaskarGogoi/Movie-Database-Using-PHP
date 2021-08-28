<?php

	include 'includes/header.php';
	echo "<title>Add Directors to Movie</title>";
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
            <?php
                include($_SERVER['DOCUMENT_ROOT'].'/moviedatabase/includes/database_connection.php');
                $sql = "SELECT * FROM movies WHERE movie_id = $_GET[movie_id]";
                $result = $conn->query($sql);                                      
                $row = mysqli_fetch_assoc($result);
                echo "<h3>Add Director to Movie - $row[mov_title]</h3>";
            ?>
            <div class="col-sm-12 mt-4">
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 50%;" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100">2/4</div>
                </div>
            </div>
            <form id='form' action='includes/add-director-to-movie.php' method="post" class='form-center'>
                <div class="form-row">
                    <div class="form-group add-field">
                        <div class="partners">
                            <div class="partner">
                                <table>
                                    <tr>
                                        <td><br>
                                            <select name="dir_id[]" id="partnerSelect" class="form-control">
                                                <option disabled selected value> -- select a director -- </option>
                                                <?php 
                                                    $sql = "SELECT * FROM director";
                                                                $result = $conn->query($sql);                                      
                                                    while($row = mysqli_fetch_array($result)) {
                                                        echo "
                                                        <option value='$row[dir_id]'>$row[fname] $row[mname] $row[lname]</option>";
                                                    }
                                                ?>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="hidden" name='movie_id' value="<?php echo $_GET['movie_id'] ?>"
                                                required>
                                    </tr>
                                </table>
                            </div>
                        </div><br>
                        <div class="btn btn-warning add-more"><span>+ Add More</span></div>
                    </div>
                </div>
                <br>
                <button type="submit" name='submit' class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {

            var data_fo = $('.partner').html();
            var sd = '';
            var max_fields = 5; //maximum input boxes allowed
            var wrapper = $(".partners"); //Fields wrapper
            var add_button = $(".add-more"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button).click(function (e) { //on add input button click
                e.preventDefault();
                if (x < max_fields) { //max input box allowed
                    x++; //text box increment
                    var partnerClone = $('.partner').first().clone();
                    $(sd).appendTo(partnerClone);
                    $(wrapper).append(partnerClone);
                }
            });

            $(wrapper).on("click", ".remove-add-more", function (e) { //user click on remove text
                e.preventDefault();
                $(this).parent('.partner').remove();
                $(this).remove();
                x--;
            });
        });
    </script>

    <?php
		include($_SERVER['DOCUMENT_ROOT'].'/moviedatabase/includes/footer.php');
	?>
</body>