<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $address = $_POST["address"];

    $sql = "INSERT INTO students (name, email, gender, address) VALUES ('$name', '$email', '$gender', '$address')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Student</title>
</head>
<body>
    <h2>Create Student</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Name: <input type="text" name="name" required><br><br>
        Email: <input type="email" name="email" required><br><br>
        Gender:
        <input type="radio" name="gender" value="Male" required> Male
        <input type="radio" name="gender" value="Female" required> Female
        <input type="radio" name="gender" value="Other" required> Other<br><br>
        Address: <textarea name="address" required></textarea><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
