<?php
include 'db.php';

$sql = "SELECT id, name, email, gender, address FROM students";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Read Students</title>
</head>
<body>
    <h2>Students List</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['gender']}</td>
                        <td>{$row['address']}</td>
                        <td>
                            <a href='update.php?id={$row['id']}'>Edit</a>
                            <a href='delete.php?id={$row['id']}'>Delete</a>
                        </td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No records found</td></tr>";
        }
        ?>
    </table>
    <br>
    <a href="create.php">Create New Student</a>
</body>
</html>

<?php
$conn->close();
?>
