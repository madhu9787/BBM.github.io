<?php
$fullName = $_POST['fullName'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$bloodType = $_POST['bloodType'];
$contactNumber = $_POST['contactNumber'];
$email = $_POST['email'];
$address = $_POST['address'];
$box = $_POST['box'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rform";
$conn = new mysqli('localhost','root','','rform');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$stmt = $conn->prepare("insert into receive (fullName, gender, dob, bloodType, contactNumber, email, address, box) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
if ($stmt === false) {
    die("Prepare failed: " . $conn->error);
}
$stmt->bind_param("ssssssss", $fullName, $gender, $dob, $bloodType, $contactNumber, $email, $address, $box);
if ($stmt->execute()) {
    echo "Registered successfully";
} else {
    echo "Error: " . $stmt->error;
}
$stmt->close();
$conn->close();
?>
