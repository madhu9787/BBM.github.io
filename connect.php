<?php

$fullName = $_POST['fullName'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$bloodType = $_POST['bloodType'];
$contactNumber = $_POST['contactNumber'];
$email = $_POST['email'];
$address = $_POST['address'];
$ques = $_POST['ques'];
$donat = isset($_POST['donat']) ? $_POST['donat'] : NULL;
$conn = new mysqli('localhost', 'root', '', 'donorform');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$stmt = $conn->prepare("insert into registration (fullName, gender, dob, bloodType, contactNumber, email, address, ques, donat) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
if ($stmt === false) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("sssssssss", $fullName, $gender, $dob, $bloodType, $contactNumber, $email, $address, $ques, $donat);
if ($stmt->execute()) {
    echo "Registered successfully";
} else {
    echo "Error: " . $stmt->error;
}
$stmt->close();
$conn->close();
?>
