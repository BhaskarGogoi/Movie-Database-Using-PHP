<?php

	include 'includes/header.php';
	echo "<title>Movie Database</title>";
?>

</head>
<!-- body -->

<body class="main-layout">

    <?php
		include($_SERVER['DOCUMENT_ROOT'].'/moviedatabase/includes/nav.php');
	?>

    <section style='background-color: #000; color: #fff; margin-bottom: -20px;'>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <?php
                        include($_SERVER['DOCUMENT_ROOT'].'/moviedatabase/includes/database_connection.php');
                        $sql = "SELECT * FROM movies WHERE movie_id = '$_GET[movie_id]'";
                        $result = $conn->query($sql);
                        $row = mysqli_fetch_assoc($result);
                        $year =  $row['year'];
                        $language =  $row['mov_lang'];
                    ?>
                    <div class='movie-details-section mt-5'>
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="images/movie-images/<?php echo $row['movie_id'] ?>.jpg" alt=""
                                    style=' height: 300px; width: 100%;'>
                            </div>
                            <div class="col-sm-9 title">
                                <h1><?php echo $row['mov_title'] ?></h1>
                                <h5>Genre: &nbsp;
                                    <?php
                                        $sql2 = "SELECT * FROM genre JOIN movies ON movies.movie_id = genre.movie_id AND genre.movie_id = $row[movie_id]";
                                        $result2 = $conn->query($sql2);
                                        $count = 0;
                                        while($row2 = mysqli_fetch_assoc($result2)){
                                        if($count > 0 ){
                                            echo " , ";
                                            }
                                            echo "$row2[genre]";
                                            $count++;
                                        }
                                    ?>
                                </h5>
                                <h5>Directed By: &nbsp;
                                    <?php
                                        $sql2 = "SELECT * FROM directed_by JOIN director ON director.dir_id =
                                        directed_by.dir_id WHERE movie_id = $row[movie_id]";
                                        $result2 = $conn->query($sql2);
                                        $count = 0;
                                        while($row2 = mysqli_fetch_assoc($result2)){
                                        if($count > 0 ){
                                        echo " , ";
                                        }
                                        echo "$row2[fname] $row2[lname], &nbsp; Email: $row2[email_id], &nbsp; Office Phone: $row2[office_phone] ";
                                        $count++;
                                        }
                                    ?>
                                </h5>
                                <h5>Produced By: &nbsp;
                                    <?php
                                        $sql2 = "SELECT * FROM produces JOIN producer ON producer.producer_id =
                                        produces.producer_id WHERE movie_id = $row[movie_id]";
                                        $result2 = $conn->query($sql2);
                                        $count = 0;
                                        while($row2 = mysqli_fetch_assoc($result2)){
                                        if($count > 0 ){
                                        echo " , ";
                                        }
                                        echo "$row2[fname] $row2[lname], &nbsp; Email: $row2[email_id]";
                                        $count++;
                                        }
                                    ?>
                                </h5>
                                <h5>Language: <?php echo $language ?></h5>
                                <h5>Year: <?php echo $year ?></h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h3 class='cast-heading'>Cast</h3>
                                <table class="table table-dark mt-4">
                                    <thead>
                                        <tr>
                                            <th scope="col">Actor</th>
                                            <th scope="col">Gender</th>
                                            <th scope="col">Character</th>
                                            <th scope="col">Email Id</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql2 = "SELECT * FROM cast JOIN actor ON actor.act_id =
                                            cast.act_id WHERE movie_id = '$_GET[movie_id]'";
                                            $result2 = $conn->query($sql2);
                                            while($row2 = mysqli_fetch_assoc($result2)){                                        
                                                echo" <tr>
                                                    <th>$row2[fname] $row2[mname] $row2[lname]</th>
                                                    <td>$row2[gender]</td>
                                                    <td>$row2[character_name]</td>
                                                    <td>$row2[email_id]</td>
                                                </tr>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
		include($_SERVER['DOCUMENT_ROOT'].'/moviedatabase/includes/footer.php');
	?>
</body>