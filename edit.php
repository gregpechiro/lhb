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

                $imagesQuery = "SELECT * FROM images";
                $images = $conn->query($imagesQuery);

                $categoryQuery = "SELECT DISTINCT category  FROM images";
                $categories = $conn->query($categoryQuery);

                $imgQuery = "SELECT * FROM images WHERE id=" . $_GET["id"];
                $imgResult = $conn->query($imgQuery);
                $img = $imgResult->fetch_assoc();

                $conn->close();

                echo
    			'<form action="save.php" method="post" enctype="multipart/form-data">
    				<p>
    					Description:
    					<input type="text" name="description" id="description" value="' . $img["description"] . '">
    				</p>
    				<p>
    					Category:
    					<input type="text" name="category" id="category" value="' . $img["category"] . '">
    				</p>
            		<p>
                        <input type="hidden" name="id" id="id" value="' . $img["id"] . '">
                		<input type="submit" name="submit" value="Save">
            		</p>
            	</form>';
                ?>
            </div>
			<div class="row">
				<ul class="tabs-navigation small gray isotope-filters margin-top-70">
					<li><a class="selected" href="#filter-*" title="Renovation">All Projects</a></li>
					<?php
					if ($categories->num_rows > 0) {
						while($category = $categories->fetch_assoc()) {
							echo '<li><a href="#filter-' . $category["category"] . '" title="Renovation">' . ucfirst($category["category"]) . '</a></li>';
						}
					}
					?>
				</ul>
				<ul class="projects-list isotope">

					<?php
					if ($images->num_rows > 0) {
						while($image = $images->fetch_assoc()) {
							echo '<li class="' . $image["category"] . '">
									<a href="' . $image["source"] . '" class="prettyPhoto re-preload" title="' . $image["description"] . '<a href=\'edit.php?id=' . $image["id"] . '\'>EDIT</a>">
										<img src="' . $image["source"] . '" alt="img">
									</a>
								</li>';
						}
					}
					?>
				</ul>
			</div>
		</div>
		<script src="//code.jquery.com/jquery-2.1.4.min.js" charset="utf-8"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.1/isotope.pkgd.min.js"></script>
		<script type="text/javascript">
			$( document ).ready( function() {
				// init Isotope
				var $container = $('.isotope').isotope();

				// bind filter button click
				$('button.filter').click(function() {
					var filterValue = $( this ).attr('data-filter');
					$container.isotope({ filter: filterValue });
				});
			});
		</script>
	</body>
</html>
