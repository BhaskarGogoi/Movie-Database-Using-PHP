<?php

	include 'includes/header.php';
	echo "<title>Movie Database</title>";
?>

</head>
<!-- body -->

<body class="main-layout">

	<?php
		include($_SERVER['DOCUMENT_ROOT'].'/moviedatabase/includes/nav.php');
	?>

	<section style='background-color: #000; color: #fff; margin-bottom: -20px;'>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="index-heading">
						Movies
					</div>
					<div class="index-content">
						<div class="row">
							<?php
									include($_SERVER['DOCUMENT_ROOT'].'/moviedatabase/includes/database_connection.php');
									$sql = "SELECT * FROM movies WHERE status = 'completed'";
									$result = $conn->query($sql);                                      
									while($row = mysqli_fetch_assoc($result)){
										echo "
										<a href='movie-details.php?movie_id=$row[movie_id]' class='index-card'>
											<div class='card' style='width: 16.5rem;'>
												<img src='images/movie-images/$row[movie_id].jpg' class='card-img-top'>
												<div class='card-body'>
													<h5 class='card-title'>$row[mov_title]</h5>";
													$sql2 = "SELECT * FROM genre JOIN movies ON movies.movie_id = genre.movie_id AND genre.movie_id = $row[movie_id]";
													$result2 = $conn->query($sql2);
													$count = 0;
													while($row2 = mysqli_fetch_assoc($result2)){
													if($count > 0 ){
														echo " , ";
														}
														echo "$row2[genre]";
														$count++;
													}
													echo"
													<button class='mt-2'>View Details</button>
												</div>
											</div>
										</a>
										";
									}
								?>
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