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
            <div class='back-arrow'>
                <i class="fas fa-arrow-left mt-5" onclick="goBack()"></i>
            </div>
            <div class="row">
                <div class="search-heading">
                    <h3>Search Result</h3>
                </div>
                <div class="col-sm-12">
                    <?php 
                        include($_SERVER['DOCUMENT_ROOT'].'/moviedatabase/includes/database_connection.php');
                        $search_query = mysqli_real_escape_string($conn, $_GET['search_query']);
                        if(empty($search_query)){
                            echo "<div class='no-result'>
                                    <h3>No Results Found!</h3>
                                </div>";
                        }else {
                            $sql = "SELECT * FROM movies WHERE mov_title LIKE '%".$search_query."%'";
                            $result = $conn->query($sql);
                            $result2 = $conn->query($sql);
                            if(mysqli_fetch_assoc($result) != 0){
                                while($row = mysqli_fetch_assoc($result2)){
                                    echo "
                                    <a href='movie-details.php?movie_id=$row[movie_id]' style='color: #fff'>
                                        <div class='search-card'>
                                            <div class='row'>
                                                <div class='col-sm-2'>
                                                    <img src='images/movie-images/$row[movie_id].jpg'>
                                                </div>
                                                <div class='col-sm-9'>
                                                    <h4>$row[mov_title]</h4>";
                                                    $sql3 = "SELECT * FROM genre JOIN movies ON movies.movie_id = genre.movie_id AND genre.movie_id = $row[movie_id]";
                                                    $result3 = $conn->query($sql3);
                                                    $count = 0;
                                                    while($row3 = mysqli_fetch_assoc($result3)){
                                                    if($count > 0 ){
                                                        echo " , ";
                                                        }
                                                        echo "$row3[genre]";
                                                        $count++;
                                                    }
                                                    echo "
                                                </div>
                                            </div>
                                        </div>
                                    </a>";
                                }
                            }else {
                                echo "<div class='no-result'>
                                    <h3>No Results Found!</h3>
                                </div>";
                            }                            
                        }
                        
                    ?>
                </div>
            </div>
        </div>
    </section>

    <?php
		include($_SERVER['DOCUMENT_ROOT'].'/moviedatabase/includes/footer.php');
	?>
</body>