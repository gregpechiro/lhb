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

$slideQuery = "SELECT * FROM slide WHERE id=1";
$slideResult = $conn->query($slideQuery);
$slide = $slideResult->fetch_assoc();

if ($slide == null) {
    $sql = $conn->prepare("INSERT INTO slide (id, title, body) VALUES (?, ?, ?)");
    $sql->bind_param("sss", $id, $title, $body);
    $id = 1;
    $title = $_POST["title"];
    $body = $_POST["body"];
    if ($sql->execute() === TRUE) {
        echo "New record inserted: " . $conn->insert_id;
        header('Location: admin.php');
    } else {
        echo "error adding to database";
    }
} else {
    $updateQuery = "UPDATE slide SET title='" . $_POST["title"] . "', body='" . $_POST["body"] . "' WHERE id=1";

    if ($conn->query($updateQuery) === TRUE) {
        header('Location: admin.php');
    } else {
        echo "ERROR";
    }
}
?>
