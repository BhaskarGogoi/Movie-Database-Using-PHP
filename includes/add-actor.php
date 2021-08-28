<?php
	session_start();

	if (isset($_POST['submit'])) {

		include($_SERVER['DOCUMENT_ROOT'].'/moviedatabase/includes/database_connection.php');

		$fname = mysqli_real_escape_string($conn, $_POST['fname']);
		$mname = mysqli_real_escape_string($conn, $_POST['mname']);
		$lname = mysqli_real_escape_string($conn, $_POST['lname']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$gender = mysqli_real_escape_string($conn, $_POST['gender']);

		//-----Check if form datas are not filled-----
         if (empty($email)) {
			header ("Location:../add-actor.php?error");

			exit();
        }
        if (empty($gender)) {
			header ("Location:../add-actor.php?error");

			exit();
		} 
       if (empty($fname)) {
			header ("Location:../add-actor.php?error");

			exit();
		}  
        if (empty($lname)) {
			header ("Location:../add-actor.php?error");

			exit();
		} 

		//-----End Check if form datas are not filled-----

		else {
            $sql = "INSERT INTO actor ( fname, mname, lname, gender, email_id)
            VALUES ('$fname', '$mname', '$lname', '$gender', '$email')";
            $result = $conn->query($sql);
            header ("Location:../add-actor.php?register=success");
        }
				
	} else {
		header ("Location:../add-actor.php?error");
		exit();
	}
?>