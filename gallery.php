<!DOCTYPE html>
<html>
	<head>
		<title>Renovate - Construction Renovation Template</title>
		<!--meta-->
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.2" />
		<meta name="format-detection" content="telephone=no" />
		<meta name="keywords" content="Construction, Renovation" />
		<meta name="description" content="Responsive Construction Renovation Template" />
		<!--slider revolution-->
		<link rel="stylesheet" type="text/css" href="rs-plugin/css/settings.css" media="screen" />
		<!--style-->
		<link href='//fonts.googleapis.com/css?family=Raleway:100,300,400,500,600,700,900' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="style/reset.css">
		<link rel="stylesheet" type="text/css" href="style/superfish.css">
		<link rel="stylesheet" type="text/css" href="style/prettyPhoto.css">
		<link rel="stylesheet" type="text/css" href="style/jquery.qtip.css">
		<link rel="stylesheet" type="text/css" href="style/style.css">
		<link rel="stylesheet" type="text/css" href="style/animations.css">
		<link rel="stylesheet" type="text/css" href="style/responsive.css">
		<link rel="stylesheet" type="text/css" href="style/odometer-theme-default.css">
		<!--fonts-->
		<link rel="stylesheet" type="text/css" href="fonts/streamline-small/styles.css">
		<link rel="stylesheet" type="text/css" href="fonts/streamline-large/styles.css">
		<link rel="stylesheet" type="text/css" href="fonts/template/styles.css">
		<link rel="stylesheet" type="text/css" href="fonts/social/styles.css">
		<link rel="shortcut icon" href="images/favicon.ico">
		<link rel="import" id="nav" href="stubs/nav.html">
		<link rel="import" id="foot" href="stubs/footer.html">
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
				<div class="clearfix">
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
							<li><a class="selected" href="#filter-*" title="Renovation">All Projects</a></li>
							<?php
							if ($categories->num_rows > 0) {
								while($category = $categories->fetch_assoc()) {
									echo '<li><a href="#filter-' . $category["category"] . '" title="Renovation">' . ucfirst($category["category"]) . '</a></li>';
								}
							}
							?>
							<!-- <li><a class="selected" href="#filter-*" title="Renovation">All Projects</a></li>
							<li><a href="#filter-renovation" title="Renovation">Renovation</a></li>
							<li><a href="#filter-design-and-build" title="Design and Build">Design and Build</a></li>
							<li><a href="#filter-painting" title="Painting">Painting</a></li>
							<li><a href="#filter-pavers" title="Pavers">Pavers</a></li>
							<li><a href="#filter-solar-systems" title="Solar Systems">Solar Systems</a></li> -->

						</ul>
						<ul class="projects-list isotope">

							<?php
							if ($images->num_rows > 0) {
								while($image = $images->fetch_assoc()) {

									echo '<li class="' . $image["category"] . '">
											<a href="' . $image["source"] . '" class="prettyPhoto re-preload" title="' . $image["description"] . '">
												<img src="' . $image["source"] . '" alt="img">
											</a>
										</li>';
		    						//echo "id: " . $row["id"] . ", cat: " . $row["category"] . ", source: " . $row["source"] . "<br>";
								}
							}
							?>

							<!-- <li class="renovation">
								<a href="project_interior_renovation.html" title="Interior Renovation">
									<img src="images/samples/270x180/image_01.jpg" alt="">
								</a>
								<div class="view align-center">
									<div class="vertical-align-table">
										<div class="vertical-align-cell">
											<p class="description">Interior Renovation</p>
											<a class="more simple" href="project_interior_renovation.html" title="VIEW PROJECT">VIEW PROJECT</a>
										</div>
									</div>
								</div>
							</li>
							<li class="pavers">
								<a href="project_garden_renovation.html" title="Garden Renovation">
									<img src="images/samples/270x180/image_04.jpg" alt="">
								</a>
								<div class="view align-center">
									<div class="vertical-align-table">
										<div class="vertical-align-cell">
											<p class="description">Garden Renovation</p>
											<a class="more simple" href="project_garden_renovation.html" title="VIEW PROJECT">VIEW PROJECT</a>
										</div>
									</div>
								</div>
							</li>
							<li class="design-and-build painting">
								<a href="project_painting.html" title="Painting">
									<img src="images/samples/270x180/image_07.jpg" alt="">
								</a>
								<div class="view align-center">
									<div class="vertical-align-table">
										<div class="vertical-align-cell">
											<p class="description">Painting</p>
											<a class="more simple" href="project_painting.html" title="VIEW PROJECT">VIEW PROJECT</a>
										</div>
									</div>
								</div>
							</li>
							<li class="renovation design-and-build">
								<a href="project_design_build.html" title="Design and Build">
									<img src="images/samples/270x180/image_10.jpg" alt="">
								</a>
								<div class="view align-center">
									<div class="vertical-align-table">
										<div class="vertical-align-cell">
											<p class="description">Design and Build</p>
											<a class="more simple" href="project_design_build.html" title="VIEW PROJECT">VIEW PROJECT</a>
										</div>
									</div>
								</div>
							</li>
							<li class="design-and-build solar-systems">
								<a href="project_design_build.html" title="Design and Build">
									<img src="images/samples/270x180/image_08.jpg" alt="">
								</a>
								<div class="view align-center">
									<div class="vertical-align-table">
										<div class="vertical-align-cell">
											<p class="description">Design and Build</p>
											<a class="more simple" href="project_design_build.html" title="VIEW PROJECT">VIEW PROJECT</a>
										</div>
									</div>
								</div>
							</li>
							<li class="renovation">
								<a href="project_interior_renovation.html" title="Interior Renovation">
									<img src="images/samples/270x180/image_05.jpg" alt="">
								</a>
								<div class="view align-center">
									<div class="vertical-align-table">
										<div class="vertical-align-cell">
											<p class="description">Interior Renovation</p>
											<a class="more simple" href="project_interior_renovation.html" title="VIEW PROJECT">VIEW PROJECT</a>
										</div>
									</div>
								</div>
							</li>
							<li class="renovation painting">
								<a href="project_painting.html" title="Painting">
									<img src="images/samples/270x180/image_09.jpg" alt="">
								</a>
								<div class="view align-center">
									<div class="vertical-align-table">
										<div class="vertical-align-cell">
											<p class="description">Painting</p>
											<a class="more simple" href="project_painting.html" title="VIEW PROJECT">VIEW PROJECT</a>
										</div>
									</div>
								</div>
							</li>
							<li class="solar-systems">
								<a href="project_solar_systems.html" title="Solar Systems">
									<img src="images/samples/270x180/image_06.jpg" alt="">
								</a>
								<div class="view align-center">
									<div class="vertical-align-table">
										<div class="vertical-align-cell">
											<p class="description">Solar Systems</p>
											<a class="more simple" href="project_solar_systems.html" title="VIEW PROJECT">VIEW PROJECT</a>
										</div>
									</div>
								</div>
							</li> -->
						</ul>
					</div>
				</div>
			</div>
			<div id="footer"></div>
		</div>
		<a href="#top" class="scroll-top animated-element template-arrow-up" title="Scroll to top"></a>
		<!--js-->
		<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
		<script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>
		<!--slider revolution-->
		<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.tools.min.js"></script>
		<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
		<script type="text/javascript" src="js/jquery.ba-bbq.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.11.4.custom.min.js"></script>
		<script type="text/javascript" src="js/jquery.ui.touch-punch.min.js"></script>
		<script type="text/javascript" src="js/jquery.isotope.min.js"></script>
		<script type="text/javascript" src="js/jquery.easing.1.3.min.js"></script>
		<script type="text/javascript" src="js/jquery.carouFredSel-6.2.1-packed.js"></script>
		<script type="text/javascript" src="js/jquery.touchSwipe.min.js"></script>
		<script type="text/javascript" src="js/jquery.transit.min.js"></script>
		<script type="text/javascript" src="js/jquery.hint.min.js"></script>
		<script type="text/javascript" src="js/jquery.costCalculator.min.js"></script>
		<script type="text/javascript" src="js/jquery.parallax.min.js"></script>
		<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
		<script type="text/javascript" src="js/jquery.qtip.min.js"></script>
		<script type="text/javascript" src="js/jquery.blockUI.min.js"></script>
		<script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=false"></script>
		<script type="text/javascript" src="js/main.js"></script>
		<script type="text/javascript" src="js/odometer.min.js"></script>
		<script type="text/javascript" src="js/import.js">

		</script>
	</body>
</html>
