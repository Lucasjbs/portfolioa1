<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "admin";
$database = "portifolioa1";
$port = 3306;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // Create a connection to the MySQL database
    $conn = new mysqli($servername, $username, $password, $database, $port);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Delete the record from the database based on the ID
    try {
        $conn->query("DELETE FROM userdata WHERE id = $id");
        echo "Name deleted successfully";
    } catch (Exception $e) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

header("Location: index.php");
exit();
