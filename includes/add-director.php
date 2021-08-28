<?php
	session_start();

	if (isset($_POST['submit'])) {

		include($_SERVER['DOCUMENT_ROOT'].'/moviedatabase/includes/database_connection.php');

		$fname = mysqli_real_escape_string($conn, $_POST['fname']);
		$mname = mysqli_real_escape_string($conn, $_POST['mname']);
		$lname = mysqli_real_escape_string($conn, $_POST['lname']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$office_phone = mysqli_real_escape_string($conn, $_POST['office_phone']);

		//-----Check if form datas are not filled-----
         if (empty($email)) {
			header ("Location:../add-director.php?error");

			exit();
        }
        if (empty($office_phone)) {
			header ("Location:../add-director.php?error");

			exit();
		} 
       if (empty($fname)) {
			header ("Location:../add-director.php?error");

			exit();
		} 
     
        if (empty($lname)) {
			header ("Location:../add-director.php?error");

			exit();
		} 

		//-----End Check if form datas are not filled-----

		else {
            $sql = "INSERT INTO director ( fname, mname, lname, email_id, office_phone)
            VALUES ('$fname', '$mname', '$lname', '$email', '$office_phone')";
            $result = $conn->query($sql);
            header ("Location:../add-director.php?register=success");
        }
				
	} else {
		header ("Location:../add-director.php?error");
		exit();
	}
?>