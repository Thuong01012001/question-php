<?php
// Database connection
$conn = new mysqli("localhost", "username", "password", "myDatabase");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];

    $conn->query("INSERT INTO tblPerson (Name, Gender, DateOfBirth) VALUES ('$name', $gender, '$dob')");
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Person</title>
</head>
<body>
    <h1>Create Person</h1>
    <form method="post">
        <label>Name:</label><br>
        <input type="text" name="name"><br>
        <label>Gender:</label><br>
        <input type="radio" name="gender" value="1"> Male
        <input type="radio" name="gender" value="0"> Female<br>
        <label>Date of Birth:</label><br>
        <input type="date" name="dob"><br><br>
        <input type="submit" value="Submit">
    </form>
    <a href="index.php">Back to List</a>
</body>
</html>
