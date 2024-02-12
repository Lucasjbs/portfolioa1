<?php
require 'autoload.php';

use Portifolio\Interaction\Action\Entrypoint;

$test = new Entrypoint;

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "admin";
$database = "portifolioa1";
$port = 3306;

// Create a connection to the MySQL database
$conn = new mysqli($servername, $username, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Handle various actions based on the AJAX request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['action'] === 'store') {
        // Store the name in the database
        $name = $_POST['name'];
        $name = htmlspecialchars(trim($name));
        echo "Success";

        try {
            $sql = "INSERT INTO userdata (name) VALUES ('$name')";
            $conn->query($sql);
            echo "Success";
        } catch (Exception $e) {
            echo "Hello";
        }
    } elseif ($_POST['action'] === 'edit') {
    } elseif ($_POST['action'] === 'delete') {
        $id = $_POST['id'];

        try {
            $conn->query("DELETE FROM userdata WHERE id = $id");
            echo "Name deleted successfully";
        } catch (Exception $e) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if ($_GET['action'] === 'fetch') {
        // Fetch names from the database
        $result = $conn->query('SELECT * FROM userdata');
        $names = '<ul>';
        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $name = htmlspecialchars($row['name']);

            $names .= '<li>' . $name . '
                <span class="edit-delete-buttons">
                    <button onclick="editName(' . $id . ', \'' . $name . '\')">Edit</button>
                    <button onclick="deleteName(' . $id . ')">Delete</button>
                </span>
            </li>';
        }
        $names .= '</ul>';
        echo $names;
    }
}

$conn->close();
