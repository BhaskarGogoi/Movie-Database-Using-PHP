<?php
	session_start();

    if (isset($_POST['submit'])) {

		include($_SERVER['DOCUMENT_ROOT'].'/moviedatabase/includes/database_connection.php');
       

		//-----Check if form datas are not filled-----

        if(empty($_POST['producer_id'])) {
            header ("Location:../add-producer-to-movie.php?error&movie_id=$_POST[movie_id]");
			exit();
        }
        if(empty($_POST['movie_id'])){
            header ("Location:../add-producer-to-movie.php?error&movie_id=$_POST[movie_id]");
			exit();
        }

		//-----End Check if form datas are not filled-----

        else {

            foreach($_POST['producer_id'] as $index => $value) {
                $producer_id =  $_POST['producer_id'][$index];

                $sql = "INSERT INTO produces ( movie_id, producer_id)
                VALUES ('$_POST[movie_id]', '$producer_id')";
                $result = $conn->query($sql);
               
            }

            if($result){
                $sql = "UPDATE movies SET status = 'completed' WHERE movie_id = '$_POST[movie_id]'";
                $result = $conn->query($sql);
                if($result){
                    header ("Location:../dashboard.php?success");
                }else {
		            header ("Location:../add-producer-to-movie.php?error&movie_id=$_POST[movie_id]");
                }
            }else {
		        header ("Location:../add-producer-to-movie.php?error&movie_id=$_POST[movie_id]");
            }
    }
        
    } else {
		header ("Location:../add-producer-to-movie.php?error&movie_id=$_POST[movie_id]");
		exit();
	}		
	
?>