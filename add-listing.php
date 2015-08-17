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

$sql = $conn->prepare("INSERT INTO listings (street, city, state, zip, mls, agent) VALUES (?, ?, ?, ?, ?, ?)");
$sql->bind_param("ssssss", $street, $city, $state, $zip, $mls, $agent);

$street = $_POST["street"];
$city = $_POST["city"];
$state = $_POST["state"];
$zip = $_POST["zip"];
$mls = $_POST["mls"];
$agent = $_POST["agent"];

if ($sql->execute() === TRUE) {
    $conn->close();
    header('Location: all-Listings.php');
} else {
    echo "ERROR";
}
$conn->close();
?>
