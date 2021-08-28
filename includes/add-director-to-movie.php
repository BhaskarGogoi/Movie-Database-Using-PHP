<?php
	session_start();

    if (isset($_POST['submit'])) {

		include($_SERVER['DOCUMENT_ROOT'].'/moviedatabase/includes/database_connection.php');
       

		//-----Check if form datas are not filled-----

        if(empty($_POST['dir_id'])) {
            header ("Location:../add-director-to-movie.php?error&movie_id=$_POST[movie_id]");
			exit();
        }
        if(empty($_POST['movie_id'])){
            header ("Location:../add-director-to-movie.php?error&movie_id=$_POST[movie_id]");
			exit();
        }

		//-----End Check if form datas are not filled-----

        else {

            foreach($_POST['dir_id'] as $index => $value) {
                $director_id =  $_POST['dir_id'][$index];

                $sql = "INSERT INTO directed_by ( movie_id, dir_id)
                VALUES ('$_POST[movie_id]', '$director_id')";
                $result = $conn->query($sql);
               
            }
            header ("Location:../add-producer-to-movie.php?movie_id=$_POST[movie_id]");
    }
        
    } else {
		header ("Location:../add-director-to-movie.php?error&movie_id=$_POST[movie_id]");
		exit();
	}		
	
?>