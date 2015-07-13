<!DOCTYPE html>
<html>
	<head>
		<title>LHB |  - Construction Renovation Template</title>
		<!--meta-->
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.2" />
		<meta name="format-detection" content="telephone=no" />
		<meta name="keywords" content="Construction, Renovation" />
		<meta name="description" content="Responsive Construction Renovation Template"/>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	</head>
	<body>
		<div class="site-container">
			<div id="navbar"></div>
			<div class="theme-page padding-bottom-70">
				<div class="row gray full-width page-header vertical-align-table">
					<div class="row full-width padding-top-bottom-50 vertical-align-cell">
						<div class="row">
							<div class="page-header-left">
								<h1>GALLERY</h1>
							</div>
							<div class="page-header-right">
								<div class="bread-crumb-container">
									<label>You Are Here:</label>
									<ul class="bread-crumb">
										<li>
											<a title="Home" href="index.html">
												HOME
											</a>
										</li>
										<li class="separator">
											&#47;
										</li>
										<li>
											GALLERY
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="container">
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
						<ul class="tabs-navigation small gray isotope-filters margin-top-70">
							<li><a class="selected" href="#" title="Renovation">All Projects</a></li>
							<?php
							if ($categories->num_rows > 0) {
								while($category = $categories->fetch_assoc()) {
									echo '<li><a href="#" id="filters" data-filter="' . $category["category"] . '">' . ucfirst($category["category"]) . '</a></li>';
								}
							}
							?>

						</ul>
						<div class="items">

							<?php
							if ($images->num_rows > 0) {
								while($image = $images->fetch_assoc()) {

									echo '<div class="col-lg-3 ' . $image["category"] . '">
											<a href="' . $image["source"] . '" class="" title="' . $image["description"] . '">
												<img class="img-responsive" src="' . $image["source"] . '" alt="img">
											</a>
										</div>';
		    						//echo "id: " . $row["id"] . ", cat: " . $row["category"] . ", source: " . $row["source"] . "<br>";
								}
							}
							?>

							<!-- <li class="renovation">
								<a href="project_interior_renovation.html" title="Interior Renovation">
									<img src="images/samples/270x180/image_01.jpg" alt="">
								</a>
							</li>
							<li class="pavers">
								<a href="project_garden_renovation.html" title="Garden Renovation">
									<img src="images/samples/270x180/image_04.jpg" alt="">
								</a>
							</li>
							<li class="design-and-build painting">
								<a href="project_painting.html" title="Painting">
									<img src="images/samples/270x180/image_07.jpg" alt="">
								</a>
							</li>
							<li class="renovation design-and-build">
								<a href="project_design_build.html" title="Design and Build">
									<img src="images/samples/270x180/image_10.jpg" alt="">
								</a>
							</li>
							<li class="design-and-build solar-systems">
								<a href="project_design_build.html" title="Design and Build">
									<img src="images/samples/270x180/image_08.jpg" alt="">
								</a>
							</li>
							<li class="renovation">
								<a href="project_interior_renovation.html" title="Interior Renovation">
									<img src="images/samples/270x180/image_05.jpg" alt="">
								</a>
							</li>
							<li class="renovation painting">
								<a href="project_painting.html" title="Painting">
									<img src="images/samples/270x180/image_09.jpg" alt="">
								</a>
							</li>
							<li class="solar-systems">
								<a href="project_solar_systems.html" title="Solar Systems">
									<img src="images/samples/270x180/image_06.jpg" alt="">
								</a>
							</li> -->
						</div>
					</div>
				</div>
			</div>
			<div id="footer"></div>
		</div>
		<script src="//code.jquery.com/jquery-2.1.4.min.js" charset="utf-8"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/jquery.isotope.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				var items = $('.items').isotope({
					itemSelector: '.item'
				});

				$('#filters').click(function() {
    				var filterValue = $( this ).attr('data-filter');
					console.log(filterValue);
    				items.isotope({ filter: filterValue });
  				});
			});
		</script>
	</body>
</html>
