<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
// setup variables
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

$updateQuery = "UPDATE images SET category='" . $_POST["category"] . "', description='" . $_POST["description"] . "' WHERE id='" . $_POST["id"] . "'";

if ($conn->query($updateQuery) === TRUE) {
    header('Location: admin.php');
} else {
    echo "ERROR";
}
?>
