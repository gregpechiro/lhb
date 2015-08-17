<?php

    ini_set('display_errors',1);
    error_reporting(E_ALL);
    // setup variables
    $server = "localhost";
    $user = "root";
    $pass = "root";
    $db_name = "lhb_db";

    // connect to server
    $conn = new mysqli($server, $user, $pass, $db_name);

    // check connection
    if ($conn->connect_error) {
        echo "Error connecting to the Database";
        die("connection failed: " . $conn->connect_error);
    }

    $target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES["picture"]["name"]);
    $uploaded = 1;
    $fileType = pathinfo($target_file, PATHINFO_EXTENSION);

    // check if file is image
    if (isset($_POST["submit"])) {
        $checkImg = getimagesize($_FILES["picture"]["tmp_name"]);
        if ($checkImg !== false) {
            echo "File is a " . $checkImg["mime"];
            $uploaded = 1;
        } else {
            echo "File is not an image";
            $uploaded = 0;
        }
    }

    // check if file already exists
    if (file_exists($target_file)) {
        echo "<br>Sorry file already exists";
        $uploaded = 0;
    }

    // check file size
    if ($_FILES["picture"]["size"] > (2048 * 1024)) {
        echo "<br>Sorry file is too large. Max file size is 2 MB";
        $uploaded = 0;
    }

    // check file format
    if ($fileType != "png" && $fileType != "jpg") {
        echo "<br>Sorry only PNGs and JPGs are allowed";
        $uploaded = 0;
    }

    // handle errors
    if ($uploaded == 0) {
        echo "<br>Sorry file could not be uploaded";
    } else {
        if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
            $sql = $conn->prepare("INSERT INTO images (category, source, description) VALUES (?, ?, ?)");
            $sql->bind_param("sss", $cat, $src, $desc);
            $cat = $_POST["category"];
            $src = $target_file;
            $desc = $_POST["description"];
            if ($sql->execute() === TRUE) {
                echo "New record inserted: " . $conn->insert_id;
                header('Location: webmaster.php');
            } else {
                echo "error adding to database";
            }
        } else {
            echo "<br>Sorry error uploading file to " . $target_file;
        }
    }
    $conn->close();
 ?>
