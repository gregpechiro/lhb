<!DOCTYPE html>
<html>
	<head>
		<title>LHB |  - Construction Renovation Template</title>
		<!--meta-->
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.2" />
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<form action="upload.php" method="post" enctype="multipart/form-data">
					<p>
	    				File:
	    				<input type="file" name="ourFile" id="ourFile">
					</p>
					<p>
						Description:
						<input type="text" name="description" id="description">
					</p>
					<p>
						Category:
						<input type="text" name="category" id="category">
					</p>
					<p>
	    				<input type="submit" name="submit" value="Upload">
					</p>
				</form>
			</div>
			<div class="row">
				<?php
				ini_set('display_errors',1);
				error_reporting(E_ALL);
				// server variables
				$server = "localhost";
				$user = "root";
				$pass = "root";
				$db_name = "php_test";
				// connect to server
				$conn = new mysqli($server, $user, $pass, $db_name);

				// check connection
				if ($conn->connect_error) {
					die("connection failed: " . $conn->connect_error);
				}

				$imageQuery = "SELECT * FROM images";
				$images = $conn->query($imageQuery);

				$categoryQuery = "SELECT DISTINCT category  FROM images";
				$categories = $conn->query($categoryQuery);

				$conn->close();
				?>

				<button class="filter" data-filter="*">show all</button>

				<?php
				if ($categories->num_rows > 0) {
					while($category = $categories->fetch_assoc()) {
						echo '<button class="filter" data-filter=".' . $category["category"] . '">' . ucfirst($category["category"]) . '</button>';
					}
				}
				?>

				<div class="isotope">

					<?php
					if ($images->num_rows > 0) {
						while($image = $images->fetch_assoc()) {
							echo '<div class="col-lg-3 item ' . $image["category"] . '">
									<a href="edit.php?id=' . $image["id"] . '">
										<img class="img-responsive" src="' . $image["source"] . '" alt="img">
									</a>
								</div>';
						}
					}
					?>

				</div>
			</div>
		</div>
		<script src="//code.jquery.com/jquery-2.1.4.min.js" charset="utf-8"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.1/isotope.pkgd.min.js"></script>
		<script type="text/javascript">
			$( document ).ready( function() {
				// init Isotope
				var $container = $('.isotope').isotope({
					itemSelector: '.item',
					layoutMode: 'fitRows'
				});

				// bind filter button click
				$('button.filter').click(function() {
					var filterValue = $( this ).attr('data-filter');
					$container.isotope({ filter: filterValue });
				});
			});
		</script>
    </body>
</html>
