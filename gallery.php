<!DOCTYPE html>
<html>
	<head>
		<title>Gallery | Lancaster Home Builders PA Home Construction</title>
		<!--meta-->
		<meta name="format-detection" content="telephone=no" />
		<?php include 'stubs/head.php'; ?>
		<link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
		<link rel="stylesheet" href="style/bootstrap-image-gallery.min.css">
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
				$db_name = "lhb_db";
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
				<!-- <div class="col-xs-12"> -->
					<div class="col-xs-3 col-lg-1 col-md-1 col-sm-2">
						<button class="filter btn btn-dark active" data-filter="*">Show All</button>
					</div>
					<div class="col-xs-9 col-lg-11 col-md-11 col-sm-10">
						<?php
						if ($categories->num_rows > 0) {
							while($category = $categories->fetch_assoc()) {
								echo '<button class="filter btn btn-dark" data-filter=".' . strtolower($category["category"]) . '">' . ucfirst($category["category"]) . '</button>';
							}
						}
						?>
					</div>
				<!-- </div> -->
			</div>
			<div class="">
				Check out some of our floor plans <a href="documents.php">Here</a>!
			</div>
			<br>
			<div class="row">
				<div id="links" class="isotope">

					<?php
					if ($images->num_rows > 0) {
						while($image = $images->fetch_assoc()) {
							echo '<div class="col-lg-3 item ' . strtolower($image["category"]) . '">
									<a href="' . $image["source"] . '" id="' . $image["id"] . '" title="' . $image["description"] . '" data-gallery>
										<img class="img-responsive" src="' . $image["source"] . '" alt="img">
									</a>
								</div>';
						}
					}
					?>

				</div>
			</div>

			<?php include 'stubs/footer.php'; ?>

			<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
			<div id="blueimp-gallery" class="blueimp-gallery" data-use-bootstrap-modal="false">
    			<!-- The container for the modal slides -->
    			<div class="slides"></div>
    			<h3 class="title"></h3>
    			<a class="close">×</a>
    			<!-- Controls for the borderless lightbox -->
    			<!---
				<a class="prev">‹</a>
    			<a class="next">›</a>
    			<a class="play-pause"></a>
    			<ol class="indicator"></ol>
				-->
    			<!-- The modal dialog, which will be used to wrap the lightbox content -->
    			<div class="modal fade">
        			<div class="modal-dialog">
            			<div class="modal-content">
                			<div class="modal-header">
                    			<button type="button" class="close" aria-hidden="true">&times;</button>
                    			<h4 class="modal-title"></h4>
                			</div>
                			<div class="modal-body next"></div>
                			<div class="modal-footer">
                    			<button type="button" class="btn btn-default pull-left prev">
                        			<i class="glyphicon glyphicon-chevron-left"></i>
                        			Previous
                    			</button>
                    			<button type="button" class="btn btn-primary next">
                        			Next
                        			<i class="glyphicon glyphicon-chevron-right"></i>
                    			</button>
                			</div>
            			</div>
        			</div>
    			</div>
			</div>

		</div>
		<script src="//code.jquery.com/jquery-2.1.4.min.js" charset="utf-8"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.1/isotope.pkgd.min.js"></script>
		<script src="js/nav.js" charset="utf-8"></script>
		<script type="text/javascript">
		var quotes = [
			'We appreciated the ability to make adjustments to the home as we saw the progression of the build. Our design selections and the construction of the final product look beautiful.',
			'As the build progressed, we were able to add additional items into our design that we realized made more sense as the project began to take shape.',
			'We\'re looking forward to closing on our new home (a week ahead of schedule) and know that we will be very happy raising our family there for many years to come!'
		];
		</script>
		<script src="js/quote.js" charset="utf-8"></script>
		<script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
		<script src="js/bootstrap-image-gallery.min.js"></script>
		<script src="js/gallery.js" charset="utf-8"></script>
	</body>
</html>
