<?php
	session_start();
	include($_SERVER['DOCUMENT_ROOT'].'/moviedatabase/includes/database_connection.php');


	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn ,$_POST['password']);

	//-----Check if form datas are not filled-----

	if (empty($email)) {
		header ("Location://localhost/moviedatabase/login.php?error=empty");
		exit();
	}
	if (empty($password)) {
		header ("Location://localhost/moviedatabase/login.php?error=empty");
		exit();
	} 
	//----- End Check if form datas are not filled-----

	//-----Check For Hash Password and Dehash-----

	$sql = "SELECT * FROM admin WHERE email = '$email'";
	$result = $conn->query($sql);
	$row = mysqli_fetch_assoc($result);
	$hash_password = $row['password'];
	$dehash = password_verify($password, $hash_password);
	if ($dehash == 0) {
		header ("Location: //localhost/moviedatabase/login.php?error=not-found");
		exit();
	}

	//-----End Check For Hash Password and Dehash-----  

	else {
		$sql = "SELECT * FROM admin WHERE email = '$email'  AND password = '$hash_password' ";
		$result = $conn->query($sql);

		if (!$row = $result->fetch_assoc()) {
			echo "Your username or password is incorrect";
		} else {
			$_SESSION['admin_id'] = $row['admin_id'];
		}
		header ("Location: //localhost/moviedatabase/dashboard.php");


	}
?>