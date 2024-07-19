
<?php
// Database connection
$conn = new mysqli("localhost", "username", "password", "Person");

// Pagination logic
$limit = 10; // Number of entries per page
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Fetch data
$result = $conn->query("SELECT * FROM tblPerson LIMIT $limit OFFSET $offset");

// Count total records
$total_result = $conn->query("SELECT COUNT(*) FROM tblPerson");
$total_rows = $total_result->fetch_row()[0];
$total_pages = ceil($total_rows / $limit);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Person List</title>
</head>
<body>
    <h1>Person List</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Date of Birth</th>
            <th>Actions</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['ID']; ?></td>
                <td><?php echo $row['Name']; ?></td>
                <td><?php echo $row['Gender'] ? 'Male' : 'Female'; ?></td>
                <td><?php echo $row['DateOfBirth']; ?></td>
                <td>
                    <a href="update.php?id=<?php echo $row['ID']; ?>">Update</a> |
                    <a href="delete.php?id=<?php echo $row['ID']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
    <br>
    <a href="create.php">Create</a>
    <br><br>
    <?php for($i = 1; $i <= $total_pages; $i++): ?>
        <a href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
    <?php endfor; ?>
</body>
</html>

?>


