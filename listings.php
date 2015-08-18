<!DOCTYPE html>
<html>
	<head>
		<title>LHB |  - Construction Renovation Template</title>
		<?php include 'stubs/head.php'; ?>
		<link rel="stylesheet" href="style/data-table-bootstrap.css">
		<style>input.uploader{position:absolute;left:-9999px;}label.uploader{cursor:pointer;}</style>
		<style>
			.form-horizontal .control-label {
				text-align: left;
			}
		</style>
	</head>
	<body>
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

		$listingQuery = "SELECT * FROM listings";
		$listings = $conn->query($listingQuery);

		if (isset($_GET["id"])) {
			$lstQuery = "SELECT * FROM listings WHERE id=" . $_GET["id"];
			$lstResult = $conn->query($lstQuery);
			$lst = $lstResult->fetch_assoc();
		}

		$conn->close();
		?>
		<div class="container">
			<?php include 'stubs/navbar.php'; ?>
			<div class="row">
				<div class="col-lg-3">
					<h1 class="text-center border-bottom text-green">Our Listings</h1>
					<p>
						Lancaster Home Builders works with the top realters in the area to bring you the best buying expericance possible.
					</p>
				</div>
                <div class="col-lg-9">
					<!-- <div class="panel panel-default">
						<div class="panel-heading">
							All Listings
						</div>
						<div class="panel-body"> -->

                    		<table id="listings" class="table table-striped table-bordered" style="background-color: white">
                        		<thead>
                            		<tr>
                                		<th>Address</th>
                                		<th>MLS #</th>
                                		<th>Agent</th>
                            		</tr>
                        		</thead>
                        		<tbody>

                            		<?php
            			        		if ($listings->num_rows > 0) {
            				        		while($listing = $listings->fetch_assoc()) {
            					    		echo '<tr>
            					            		<td>' . $listing["street"] . ' ' . $listing["city"] . ', ' . $listing["state"] . ' ' . $listing["zip"] . '</td>
            					            		<td>' . $listing["mls"] . '</td>
                                            		<td>' . $listing["agent"] . '</td>
                                        		</tr>';
            				        		}
            			        		}
            			    		?>
                        		</tbody>
                    		</table>
						<!-- </div>
					</div> -->
			</div>
		</div>

		<?php include 'stubs/footer.php'; ?>

		<script src="//code.jquery.com/jquery-2.1.4.min.js" charset="utf-8"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/datatables/1.10.7/js/jquery.dataTables.min.js"></script>
		<script src="js/data-table-bootstrap.js"></script>
		<script src="js/nav.js" charset="utf-8"></script>
		<script type="text/javascript">
		var quotes = [
			'We recently moved into our beautiful new home... Thank you to everyone at Lancaster Home Builders. We certainly recommend Lancaster Home Builders.',
			'We appreciated the ability to make adjustments to the home as we saw the progression of the build. Our design selections and the construction of the final product look beautiful.',
			'As the build progressed, we were able to add additional items into our design that we realized made more sense as the project began to take shape.'
		];
		</script>
		<script src="js/quote.js" charset="utf-8"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('#listings').DataTable();
			});
		</script>
    </body>
</html>
