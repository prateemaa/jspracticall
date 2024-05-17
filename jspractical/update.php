<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db.php';

// Check if the id parameter is set and not empty
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID is required");
}

$id = intval($_GET['id']); // Ensure the ID is an integer to prevent SQL injection

// Fetch the existing student record
$sql = "SELECT * FROM students WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows != 1) {
    die("Record not found");
}

$row = $result->fetch_assoc();

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $address = $_POST["address"];

    $sql = "UPDATE students SET name='$name', email='$email', gender='$gender', address='$address' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully. <a href='read.php'>View Students</a>";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Student</title>
</head>
<body>
    <h2>Update Student</h2>
    <form method="post" action="">
        Name: <input type="text" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required><br><br>
        Email: <input type="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required><br><br>
        Gender:
        <input type="radio" name="gender" value="Male" <?php echo ($row['gender'] == 'Male') ? 'checked' : ''; ?> required> Male
        <input type="radio" name="gender" value="Female" <?php echo ($row['gender'] == 'Female') ? 'checked' : ''; ?> required> Female
        <input type="radio" name="gender" value="Other" <?php echo ($row['gender'] == 'Other') ? 'checked' : ''; ?> required> Other<br><br>
        Address: <textarea name="address" required><?php echo htmlspecialchars($row['address']); ?></textarea><br><br>
        <input type="submit" value="Update">
    </form>
    <br>
    <a href="read.php">Back to Students List</a>
</body>
</html>
