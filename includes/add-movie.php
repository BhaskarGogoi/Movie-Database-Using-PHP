<?php
	session_start();

    if (isset($_POST['submit'])) {

		include($_SERVER['DOCUMENT_ROOT'].'/moviedatabase/includes/database_connection.php');

        $movie_title = mysqli_real_escape_string($conn, $_POST['movie_title']);
		$language = mysqli_real_escape_string($conn, $_POST['language']);
		$year = mysqli_real_escape_string($conn, $_POST['year']);
		
        // $data = $_POST['text_field'];
       
        // foreach($data as $value){
        //     print $value."\n";
        // }
       

		//-----Check if form datas are not filled-----
        if (empty($movie_title)) {
			header ("Location:../add-movie.php?error");

			exit();
        } 
       if (empty($language)) {
			header ("Location:../add-movie.php?error");

			exit();
		} 

        if (empty($year)) {
			header ("Location:../add-movie.php?error");

			exit();
		} 

        if(empty($_POST['genre'])) {
            header ("Location:../add-movie.php?error");
			exit();
        }

		//-----End Check if form datas are not filled-----

        	else {
                $sql = "INSERT INTO movies ( mov_title, mov_lang, year)
                VALUES ('$movie_title', '$language', '$year')";
                $result = $conn->query($sql);
                $last_id = $conn->insert_id;
                if($result){
                    foreach($_POST['genre'] as $check) {
                        $sql = "INSERT INTO genre ( movie_id, genre)
                        VALUES ('$last_id', '$check')";
                        $result = $conn->query($sql);
                    }
                }


                //Upload Image
				$file = $_FILES['image'];
				$fileName = $_FILES['image']['name'];
				$fileTmpName = $_FILES['image']['tmp_name'];
				$fileSize = $_FILES['image']['size'];
				$fileError = $_FILES['image']['error'];
				$fileType = $_FILES['image']['type'];

				$fileExt = explode('.', $fileName);
				$fileActualExt = strtolower(end($fileExt));

				$allowed = array('jpg', 'jpeg');
				if (in_array($fileActualExt, $allowed)) {
					if ($fileError === 0) {
						if ($fileSize < 100000000) {
							$fileNameNew = $last_id.".".$fileActualExt;
							$fileLocation = $_SERVER['DOCUMENT_ROOT'].'/moviedatabase/images/movie-images/'.$fileNameNew;
							move_uploaded_file($fileTmpName, $fileLocation);

                            header ("Location:../add-cast.php?movie_id=$last_id");
						} else {
							echo "Your file is too big";
						}

					} else{
						echo "Error uploading your file";
					}
				}
				else {
					echo "You Cannor upload files of this type";
				}
                
            }
    } else {
		header ("Location:../add-movie.php?error");
		exit();
	}		
	
?>