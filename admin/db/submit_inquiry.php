<?php
session_start();
$conn = new mysqli("localhost", "root", "", "hotel");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['user_id'])) {
    echo "<script>
        alert('Please log in to submit an inquiry.');
        window.location.href = '../../index.php';
    </script>";
    exit();
}

$name    = $_POST['text'];
$email   = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

if (empty($name) || empty($email) || empty($subject) || empty($message)) {
    echo "<script>
        alert('All fields are required.');
        window.location.href = '../../contact_us.php';
    </script>";
    exit();
}

$stmt = $conn->prepare("INSERT INTO inquiries (user_id, name, email, subject, message) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("issss", $_SESSION['user_id'], $name, $email, $subject, $message);

if ($stmt->execute()) {
    echo "<script>
        alert('Inquiry Submitted Successfully');
        window.location.href = '../../contact_us.php';
    </script>";
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
