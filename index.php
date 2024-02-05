<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "admin";
$database = "portifolioa1";
$port = 3306;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];

    // Validate and sanitize the input
    $name = htmlspecialchars(trim($name));

    // Create a connection to the MySQL database
    $conn = new mysqli($servername, $username, $password, $database, $port);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO userdata (name) VALUES ('$name')";

    try {
        $conn->query($sql);
        echo "Name stored successfully";
    } catch (Exception $e) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store Name in MySQL</title>
</head>

<body>
    <h2>Enter Your Name</h2>

    <!-- Form to input the name -->
    <form method="post" action="index.php">
        <label for="nameInput">Name:</label>
        <input type="text" id="nameInput" name="name" required>
        <button type="submit">Store Name</button>
    </form>

    <?php
    // Display the names stored in the 'userdata' table
    $conn = new mysqli($servername, $username, $password, $database, $port);
    $result = $conn->query('SELECT * FROM userdata');

    echo '<h2>Names Stored in Database</h2>';
    echo '<ul>';
    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $name = htmlspecialchars($row['name']);

        echo '<li>' . $name . ' 
            <form style="display:inline-block; margin-left: 10px;" action="delete.php" method="post">
                <input type="hidden" name="id" value="' . $id . '">
                <button type="submit">Delete</button>
            </form>
            </li>';
    }
    echo '</ul>';
    $conn->close();
    ?>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>