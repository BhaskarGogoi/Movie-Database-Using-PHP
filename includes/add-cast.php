<?php
	session_start();

    if (isset($_POST['submit'])) {

		include($_SERVER['DOCUMENT_ROOT'].'/moviedatabase/includes/database_connection.php');
		
        // $data = $_POST['text_field'];
       
        // foreach($data as $value){
        //     print $value."\n";
        // }
       

		//-----Check if form datas are not filled-----

        if(empty($_POST['cast'])) {
            header ("Location:../add-cast.php?error&movie_id=$_POST[movie_id]");
			exit();
        }
        if(empty($_POST['movie_id'])){
            header ("Location:../add-cast.php?error&movie_id=$_POST[movie_id]");
			exit();
        }

		//-----End Check if form datas are not filled-----

        else {
            // foreach($_POST['cast'] as $cast) {
            //    echo $cast;
            // }

            // foreach($_POST['character'] as $c) {
            //     echo $c;
            //  }

            //  $FirstArray = array('a', 'b', 'c', 'd');
            // $SecondArray = array('1', '2', '3', '4');

            foreach($_POST['cast'] as $index => $value) {
                $cast = $_POST['cast'][$index];
                $character = $_POST['character'][$index];

                $sql = "INSERT INTO cast ( movie_id, act_id, character_name)
                VALUES ('$_POST[movie_id]', '$cast', '$character')";
                $result = $conn->query($sql);
               
            }
            if($result){
                header("Location:../add-director-to-movie.php?movie_id=$_POST[movie_id]");
            }else {
		        header ("Location:../add-cast.php?error&movie_id=$_POST[movie_id]");
            }
        }   
        
    } else {
		header ("Location:../add-cast.php?error&movie_id=$_POST[movie_id]");
		exit();
	}		
	
?>