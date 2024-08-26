<?php
session_start();
print_r($_POST);
echo "<br>";
print_r($_FILES['pdtimg']);

$source = $_FILES['pdtimg']['tmp_name'];
$filename = $_FILES['pdtimg']['name'];
$dest = "../shared/images/" . $filename;

echo "<br>";
echo $dest;

if (move_uploaded_file($source, $dest)) {
    echo "File uploaded successfully.";
} else {
    echo "Failed to upload file.";
}

// Establish database connection
//$conn = new mysqli("localhost", "root", "", "acme436_dec", 3306);
include "../shared/connection.php";
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare data for insertion, use prepared statement to prevent SQL injection
$name = $conn->real_escape_string($_POST['name']);
$price = $conn->real_escape_string($_POST['price']);
$detail = $conn->real_escape_string($_POST['detail']);
$impath = $conn->real_escape_string($dest);
$owner = $conn->real_escape_string($_SESSION['userid']);

// Insert data into the database
$sql = "INSERT INTO product (name, price, detail, impath, owner) VALUES ('$name', '$price', '$detail', '$impath', '$owner')";

if ($conn->query($sql) === TRUE) {
    echo "Product updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close database connection
$conn->close();
?>