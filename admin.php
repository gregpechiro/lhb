<!DOCTYPE html>
<html>
	<head>
		<title>LHB |  - Construction Renovation Template</title>
		<?php include 'stubs/head.php'; ?>
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

		$imageQuery = "SELECT * FROM images";
		$images = $conn->query($imageQuery);

		$categoryQuery = "SELECT DISTINCT category  FROM images";
		$categories = $conn->query($categoryQuery);

		$slideQuery = "SELECT * FROM slide WHERE id=1";
		$slideResult = $conn->query($slideQuery);
		$slide = $slideResult->fetch_assoc();

		if (isset($_GET["id"])) {
			$imgQuery = "SELECT * FROM images WHERE id=" . $_GET["id"];
			$imgResult = $conn->query($imgQuery);
			$img = $imgResult->fetch_assoc();
		}

		$conn->close();
		?>
		<div class="container">
			<?php include 'stubs/adminNav.php'; ?>
			<div class="row">
				<div class="col-lg-offset-2 col-lg-4 text-black">
					<div class="panel panel-primary">
						<div class="panel-heading">Gallery</div>
						<div class="panel-body">
							<?php
							if (isset($_GET["id"])) {
								echo '<form action="save.php" method="post" class="form-horizontal" enctype="multipart/form-data">
										<div class="form-group">
											<label class="control-label col-xs-3">Description:</label>
											<div class="col-xs-9">
												<input class="form-control" type="text" name="description" id="description" value="' . $img["description"] . '">
												</div>
												</div>
												<div class="form-group">
												<label class="control-label col-xs-3">Category:</label>
												<div class="col-xs-9">
												<input type="text" class="form-control" name="category" id="category" value="' . $img["category"] . '">
												</div>
												</div>
												<input type="hidden" name="id" id="id" value="' . $img["id"] . '">
	    								<button class="btn btn-primary btn-block">Save</button>
									</form>';
							} else {
								echo '<form action="upload.php" method="post" class="form-horizontal" enctype="multipart/form-data">
										<div class="form-group">
											<div class="col-xs-12">
												<label class="btn btn-default btn-block uploader" for="file">Select File</label>
												<input class="uploader" id="file" type="file" name="front" required>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-xs-3">Description:</label>
											<div class="col-xs-9">
												<input class="form-control" type="text" name="description" id="description">
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-xs-3">Category:</label>
											<div class="col-xs-9">
												<input type="text" class="form-control" name="category" id="category">
											</div>
										</div>
			    						<button class="btn btn-primary btn-block">Upload</button>
									</form>';
							}
							?>
						</div>
					</div>
				</div>
				<div class="col-lg-4 text-black">
					<div class="panel panel-primary">
						<div class="panel-heading">Slide #4 Text</div>
						<div class="panel-body">
							<form class="form-horizontal" action="slide.php" method="post">
								<div class="form-group">
									<label class="control-label col-xs-2" style="align:left;">Title:</label>
									<div class="col-xs-10">
										<?php echo '<input class="form-control" type="text" name="title" value="' . $slide["title"] .' ">'?>
									</div>
								</div>
								<div class="col-xs-12">
									<div class="form-group">
										<label>Body:</label>
										<?php echo '<textarea name="body" rows="3" style="resize:none;" class="form-control">' . $slide["body"] . '</textarea>' ?>
									</div>
								</div>
								<button class="btn btn-primary btn-block">Save</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<br><br>
			<div class="row">
				<div class="col-sm-4">
					<div class="btn-group" role="group">
						<button class="filter btn btn-dark active" role="group" data-filter="*">Show All</button>
						<?php
						if ($categories->num_rows > 0) {
							while($category = $categories->fetch_assoc()) {
								echo '<button class="filter btn btn-dark" role="group" data-filter=".' . strtolower($category["category"]) . '">' . ucfirst($category["category"]) . '</button>';
							}
						}
						?>
					</div>
				</div>
				<div class="col-sm-4 text-center">
					Gallery Preview
				</div>
			</div>
			<br>
			<div class="row">
				<div class="isotope">

					<?php
					if ($images->num_rows > 0) {
						while($image = $images->fetch_assoc()) {
							echo '<div class="col-lg-3 item ' . strtolower($image["category"]) . '">
									<a href="admin.php?id=' . $image["id"] . '">
										<img class="img-responsive" src="' . $image["source"] . '" alt="img">
									</a>
								</div>';
						}
					}
					?>

				</div>
			</div>
		</div>

		<div class="modal text-black fade" id="login">
			<div class="modal-dialog modal-sm">
    			<div class="modal-content">
    				<div class="modal-header">
        				<h4 class="modal-title">Login</h4>
    				</div>
    				<div class="modal-body clearfix">
						<div id="error" class="hide text-center" style="color:red;">
							*Incorrect username or password.
						</div>
						<br>
						<form id="loginForm" class="form-horizontal">
							<div class="form-group">
								<label class="col-xs-3 control-label">Username</label>
								<div class="col-xs-9">
									<input id="username" type="text" name="username" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-3">Password</label>
								<div class="col-xs-9">
									<input id="password" type="password" name="password" class="form-control">
								</div>
							</div>
							<button type="submit" class="col-xs-6 btn btn-primary" id="login">Login</button>
							<a href="#" id="cancel" class="btn btn-default col-xs-6">Cancel</a>
						</form>
    				</div>
    			</div>
			</div>
		</div>

		<script src="//code.jquery.com/jquery-2.1.4.min.js" charset="utf-8"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.1/isotope.pkgd.min.js"></script>
		<script src="js/login.js" charset="utf-8"></script>
		<script src="js/gallery.js" charset="utf-8"></script>
		<script>
			function updateFileInfo(e) {
				var t = e.value;
				var n = t.match(/([^\/\\]+)$/);
				var r;
				if (n == null) {
					r = "Select File";
				} else {
					r = n[1]
				}
				$('label[for^="' + e.id + '"]').text(r);
			}

			$("input.uploader").change(function() {
        		updateFileInfo(this);
    		});
		</script>
    </body>
</html>
