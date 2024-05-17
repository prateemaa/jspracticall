<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<?php
include 'db.php';

$id = $_GET['id'];
$sql = "DELETE FROM students WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();

header("Location: read.php");
exit();
?>
