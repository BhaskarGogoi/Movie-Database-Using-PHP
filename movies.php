<?php
    ob_start();
	include 'includes/header.php';
	echo "<title>Movies</title>";
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
        <div class="row">
            <div class="col-sm-12">
                <h4>Movies</h4><br>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Movie ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Director</th>
                            <th scope="col">Producer</th>
                            <th scope="col">Link</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            include($_SERVER['DOCUMENT_ROOT'].'/moviedatabase/includes/database_connection.php');
                            $sql = "SELECT * FROM movies";
                            $result = $conn->query($sql);                                      
                            while($row = mysqli_fetch_array($result)) {
                                echo "
                                    <tr>
                                        <th scope='row'>$row[movie_id]</th>
                                        <td>$row[mov_title]</td>";
                                        $sql2 = "SELECT * FROM directed_by JOIN director on director.dir_id = directed_by.dir_id WHERE movie_id = $row[movie_id]";
                                        $result2 = $conn->query($sql2);
                                        $count = 0;
                                        echo "<td>";                                      
                                        while($row2 = mysqli_fetch_array($result2)) {
                                            if($count > 0){
                                                echo " - ";
                                            }
                                            echo"$row2[fname] $row2[mname] $row2[lname]";
                                            $count++;
                                        }
                                        echo "</td>";
                                        $sql3 = "SELECT * FROM produces JOIN producer on producer.producer_id = produces.producer_id WHERE movie_id = $row[movie_id]";
                                        $result3 = $conn->query($sql3);
                                        $count2 = 0;
                                        echo "<td>";                                      
                                        while($row3 = mysqli_fetch_array($result3)) {
                                            if($count2 > 0){
                                                echo " - ";
                                            }
                                            echo"$row3[fname] $row3[mname] $row3[lname]";
                                            $count2++;
                                        }
                                        echo "</td>
                                        <td><a href='movie-details.php?movie_id=$row[movie_id]'><button class='btn btn-primary'>View</button> </a></td>
                                    </tr>
                                ";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div><br><br>
    </div>
    <?php
		include($_SERVER['DOCUMENT_ROOT'].'/moviedatabase/includes/footer.php');
	?>
</body>