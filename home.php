<!DOCTYPE html>
<html>
	<head>
		<title>Home | Lancaster Home Builders PA Home Construction</title>
		<?php include 'stubs/head.php'; ?>
		<style>
			.carousel-caption {
				padding-bottom: 0px;
				text-align: left;
				left: 0%;
			}
		</style>
	</head>
	<body class="">
		<div id="container" class="container">
			<?php include 'stubs/navbar.php'; ?>

			<?php
			ini_set('display_errors',1);
			error_reporting(E_ALL);
			// server variables
			$server = "localhost";
			$user = "root";
			$pass = "root";
			$db_name = "lhb_db";
			// connect to server
			$conn = new mysqli($server, $user, $pass, $db_name);

			// check connection
			if ($conn->connect_error) {
				die("connection failed: " . $conn->connect_error);
			}

			$slideQuery = "SELECT * FROM slide WHERE id=1";
			$slideResult = $conn->query($slideQuery);
			$slide = $slideResult->fetch_assoc();
			if (is_null($slide)) {
				$slide['title'] = 'Watch For Upcoming Deals';
				$slide['body'] = '';
			}

			$conn->close();
			?>
			<div id="carousel-example-generic" class="carousel slide carousel-border" data-ride="carousel" data-interval="false">
			  <!-- Indicators -->
			  	<!-- <ol class="carousel-indicators hidden-xs">
					<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-example-generic" data-slide-to="1"></li>
					<li data-target="#carousel-example-generic" data-slide-to="2"></li>
					<li data-target="#carousel-example-generic" data-slide-to="3"></li>
			  	</ol> -->

			  	<!-- Wrapper for slides -->
			  	<div class="carousel-inner" role="listbox">
					<div class="item active">
			  			<img src="images/office.jpg" alt="...">
			  			<div class="carousel-caption col-xs-5">
							<div class="caption">
								<div class="caption-body">
									<h4 class="hidden-xs">LANCASTER HOME BUILDERS</h4>
									<h4 class="visible-xs">Lancaster Home Builders</h4>
								</div>
								<div class="caption-body hidden-xs">
			    					<p class="hidden-xs">
										Building for your future!<br>
										Our main office is located at 2760 Charlestown Rd. Lancaster, PA 17603
									</p>
								</div>
							</div>
			  			</div>
					</div>
					<div class="item">
			  			<img src="images/lhbImages/SYP_1781-2-2.jpg" alt="...">
			  			<div class="carousel-caption col-xs-5">
							<div class="caption">
								<div class="caption-body">
									<h4 class="hidden-xs">NEW HOME CONSTRUCTION</h4>
									<h4 class="visible-xs">New Home Construction</h4>
								</div>
								<div class="caption-body">
			    					<p class="hidden-xs">
										We have the experience, personel and resources to make the project run smoothly.
										We can ensure a job is done on time.
									</p>
								</div>
							</div>
			  			</div>
					</div>
					<div class="item">
			  			<img src="images/lhbImages/IMG_7303-slider.jpg" alt="...">
			  			<div class="carousel-caption col-xs-5">
							<div class="caption">
								<div class="caption-body">
									<h4 class="hidden-xs">PROFESSIONAL DESIGN</h4>
									<h4 class="visible-xs">Professional Design</h4>
								</div>
								<div class="caption-body">
			    					<p class="hidden-xs">
										We combine quality workmanship, superior knowledge and low prices to provide
										you with service unmatched by our competitors.
									</p>
								</div>
							</div>
			  			</div>
					</div>
					<div class="item">
			  			<img src="images/lhbImages/IMG_7321-slider.jpg" alt="...">
			  			<div class="carousel-caption col-xs-5">
							<div class="caption">
								<div class="caption-body">
									<h4 class="hidden-xs"><?php echo strtoupper($slide['title'])?></h4>
									<h4 class="visible-xs"><?php echo $slide['title']?></h4>
								</div>
								<div class="caption-body">
			    					<p class="hidden-xs"><?php echo $slide['body']?></p>
								</div>
							</div>
			  			</div>
					</div>
			  	</div>

			  	<!-- Controls -->
			  	<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
			  	</a>
			  	<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
			  	</a>
			</div>
			<!-- <link rel="import" href="stubs/footer.html"> -->
			<?php include 'stubs/footer.php'; ?>
		</div>

		<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script src="js/nav.js" charset="utf-8"></script>
		<script type="text/javascript">
		var quotes = [
			'We recently moved into our beautiful new home built by Lancaster Home Builders.',
			'We appreciated the ability to make adjustments to the home as we saw the progression of the build.',
			'Our design selections and the construction of the final product look beautiful.'
		];
		</script>
		<script src="js/quote.js" charset="utf-8"></script>
	</body>
</html>
