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
					<div class="btn-group" role="group">
						<button class="filter btn btn-primary active" role="group" data-filter="*">Show All</button>
						<?php
						if ($categories->num_rows > 0) {
							while($category = $categories->fetch_assoc()) {
								echo '<button class="filter btn btn-primary" role="group" data-filter=".' . $category["category"] . '">' . ucfirst($category["category"]) . '</button>';
							}
						}
						?>
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div id="links" class="isotope">

					<?php
					if ($images->num_rows > 0) {
						while($image = $images->fetch_assoc()) {
							echo '<div class="col-lg-3 item ' . $image["category"] . '">
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
		<script src="js/quote.js" charset="utf-8"></script>
		<script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
		<script src="js/bootstrap-image-gallery.min.js"></script>
		<script type="text/javascript">
			$( document ).ready( function() {
				// init Isotope
				var $container = $('.isotope').isotope({
					itemSelector: '.item',
					layoutMode: 'fitRows'
				// bind filter button click
				});
				$('button.filter').click(function() {
					$('button.filter').removeClass('active');
					$(this).addClass('active');
					var filterValue = $(this).attr('data-filter');
					$container.isotope({ filter: filterValue });
				});
			});
		</script>
	</body>
</html>
