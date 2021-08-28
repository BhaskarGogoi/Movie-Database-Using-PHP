<?php

	include 'includes/header.php';
	echo "<title>Contact</title>";
?>

</head>
<!-- body -->

<body class="main-layout">

    <?php
		include($_SERVER['DOCUMENT_ROOT'].'/moviedatabase/includes/nav.php');
	?>

    <section style='background-color: #000; color: #fff; margin-bottom: -20px; height: 90vh;'>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class='movie-details-section mt-5' style='height: 75vh;'>
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 style='border-left: 5px solid #F4BE2C; margin-left: 20px; padding: 14px;'>Contact
                                </h4>
                            </div>
                            <div class="col-sm-12 p-4">
                                <h5>Address: XYZ, Assam, INDIA, 786004</h5>
                                <h5>Phone: +91 0123456789</h5>
                                <h5>Email: admin@example.com</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <?php
		include($_SERVER['DOCUMENT_ROOT'].'/moviedatabase/includes/footer.php');
	?>
</body>