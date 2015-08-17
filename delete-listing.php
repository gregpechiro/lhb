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


$updateQuery = "DELETE FROM listings WHERE id='" . $_POST["id"] . "'";

if ($conn->query($updateQuery) === TRUE) {
    $conn->close();
    header('Location: all-Listings.php');
} else {
    echo "ERROR";
}
$conn->close();
?>
