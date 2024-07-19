<?php
// Database connection
$conn = new mysqli("localhost", "username", "password", "myDatabase");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM tblPerson WHERE ID = $id");
    $person = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];

    $conn->query("UPDATE tblPerson SET Name = '$name', Gender = $gender, DateOfBirth = '$dob' WHERE ID = $id");
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Person</title>
</head>
<body>
    <h1>Update Person</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $person['ID']; ?>">
        <label>Name:</label><br>
        <input type="text" name="name" value="<?php echo $person['Name']; ?>"><br>
        <label>Gender:</label><br>
        <input type="radio" name="gender" value="1" <?php echo $person['Gender'] ? 'checked' : ''; ?>> Male
        <input type="radio" name="gender" value="0" <?php echo !$person['Gender'] ? 'checked' : ''; ?>> Female<br>
        <label>Date of Birth:</label><br>
        <input type="date" name="dob" value="<?php echo $person['DateOfBirth']; ?>"><br><br>
        <input type="submit" value="Update">
    </form>
    <a href="index.php">Back to List</a>
</body>
</html>
