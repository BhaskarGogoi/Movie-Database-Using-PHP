<?php
    ob_start();
	include 'includes/header.php';
	echo "<title>Actors</title>";
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
                <h4>Actors</h4><br>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            include($_SERVER['DOCUMENT_ROOT'].'/moviedatabase/includes/database_connection.php');
                            $sql = "SELECT * FROM actor";
                            $result = $conn->query($sql);                                      
                            while($row = mysqli_fetch_array($result)) {
                                echo "
                                    <tr>
                                        <th>$row[fname] $row[mname] $row[lname]</th>
                                        <td>$row[gender]</td>
                                        <td>$row[email_id]</td>
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
        include 'includes/footer.php';
    ?>
</body>