<?php
// Include database setup
include 'database_setup.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $dept_id = $_POST['department'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert employee
    $sql = "INSERT INTO employee (id, name, age, sex, dept_id) VALUES ('$id', '$name', '$age', '$sex', '$dept_id')";

    if ($conn->query($sql) === TRUE) {
        echo "New employee added successfully<br>";
        echo "<a href='employee_list.php'>Back to Employee List</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
