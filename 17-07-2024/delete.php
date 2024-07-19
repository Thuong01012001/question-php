<?php
// Database connection
$conn = new mysqli("localhost", "username", "password", "myDatabase");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("DELETE FROM tblPerson WHERE ID = $id");
    header("Location: index.php");
    exit();
}
?>
