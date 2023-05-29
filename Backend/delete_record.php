<?php
$servername = "localhost";
$username = "root";
$password = "root";
$db_name = "CustomerDB";
$conn = new mysqli($servername, $username, $password, $db_name, 3306);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['table']) && isset($_POST['id'])) {
    $table = $_POST['table'];
    $id = $_POST['id'];

    $sql = "DELETE FROM $table WHERE ID = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>
