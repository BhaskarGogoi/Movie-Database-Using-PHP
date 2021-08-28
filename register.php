<?php

	include 'includes/header.php';
	echo "<title>Register</title>";
?>

</head>
<!-- body -->

<body class="main-layout">

    <?php
		include($_SERVER['DOCUMENT_ROOT'].'/moviedatabase/includes/nav.php');
	?>

    <div class="container">

        <div class="row">
            <form action="includes/register.php" method="POST" class='login-form'>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="email" required aria-describedby="emailHelp"
                        placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password" required placeholder="Password">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Register</button><br><br>
            </form>
        </div>
    </div>

    <?php
		include($_SERVER['DOCUMENT_ROOT'].'/moviedatabase/includes/footer.php');
	?>
</body>