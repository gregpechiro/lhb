<!DOCTYPE html>
<html>
	<head>
		<title>Gallery | Lancaster Home Builders PA Home Construction</title>
		<!--meta-->
		<meta name="format-detection" content="telephone=no" />
		<?php include 'stubs/head.php'; ?>
	</head>
	<body>
		<div class="container">
			<?php include 'stubs/navbar.php'; ?>
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
				<div class="col-sm-12">
					<button class="filter btn btn-primary" data-filter="*">show all</button>

					<?php
					if ($categories->num_rows > 0) {
						while($category = $categories->fetch_assoc()) {
							echo '<button class="filter btn btn-primary" data-filter=".' . $category["category"] . '">' . ucfirst($category["category"]) . '</button>';
						}
					}
					?>
				</div>
			</div>
			<div class="row">
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
			<?php include 'stubs/footer.php'; ?>
		</div>
		<script src="//code.jquery.com/jquery-2.1.4.min.js" charset="utf-8"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.1/isotope.pkgd.min.js"></script>
		<script src="js/nav.js" charset="utf-8"></script>
		<script src="js/quote.js" charset="utf-8"></script>
		<script type="text/javascript">
			$( document ).ready( function() {
				// init Isotope
				var $container = $('.isotope').isotope({
					itemSelector: '.item',
					layoutMode: 'fitRows'
				// bind filter button click
				});
				$('button.filter').click(function() {
					var filterValue = $( this ).attr('data-filter');
					$container.isotope({ filter: filterValue });
				});
			});
		</script>
	</body>
</html>
