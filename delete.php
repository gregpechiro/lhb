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
    die("connection failed: " . $conn->connect_error);
}


$updateQuery = "DELETE FROM images WHERE id='" . $_POST["id"] . "'";

if (unlink($_POST["source"])) {
    if ($conn->query($updateQuery) === TRUE) {
        $conn->close();
        header('Location: admin.php');
    } else {
        echo "ERROR";
    }
}
$conn->close();
?>
