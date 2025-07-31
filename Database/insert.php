<?php
$conn = new mysqli("localhost", "root", "", "hotel");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = $_POST['firstname'] ?? '';
    $lastname = $_POST['lastname'] ?? '';
    $email = $_POST['email'] ?? '';
    $mobile_number = $_POST['mobno'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    if ($password !== $confirm_password) {
        echo "Passwords do not match.";
        exit();
    }

    // Simple insert query
    $sql = "INSERT INTO users (firstname, lastname, email, mobile_number, password) 
            VALUES ('$firstname', '$lastname', '$email', '$mobile_number', '$password')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?signup=success");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
