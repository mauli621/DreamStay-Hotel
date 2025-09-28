<?php
session_start();
$conn = new mysqli("localhost", "root", "", "hotel");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//=====      Sign Up       ==========//
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $mobile_number = $_POST['mobno'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match.');</script>";
        exit;
    }

    $checkEmail = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $checkEmail->bind_param("s", $email);
    $checkEmail->execute();
    $checkEmail->store_result();

    if ($checkEmail->num_rows > 0) {
        echo "<script>alert('Email already exists. Please login.'); window.history.back();</script>";
        exit;
    }
    $checkEmail->close();

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $insert = $conn->prepare("INSERT INTO users (firstname, lastname, email, mobile_number, password) VALUES (?, ?, ?, ?, ?)");
    $insert->bind_param("sssss", $firstname, $lastname, $email, $mobile_number, $hashedPassword);

    if ($insert->execute()) {
        echo "<script>alert('Signup successful! Please login.'); window.location.href='index.php';</script>";
        exit;
    } else {
        echo "<script>alert('Error while signing up.'); window.history.back();</script>";
        exit;
    }
    $insert->close();
}

//=====      login       ==========//
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $email = $_POST['Email'];
    $password = $_POST['password'];

    $query = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $query->bind_param("s", $email);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['firstname'] . ' ' . $user['lastname']; // full name
        $_SESSION['user_email'] = $user['email'];

        echo "<script>alert('Login successful!'); window.location.href='index.php';</script>";
        exit;
    } else {
        echo "<script>alert('Invalid password.'); window.history.back();</script>";
        exit;
    }
    } else {
        echo "<script>alert('User not found. Please sign up first.'); window.history.back();</script>";
        exit;
    }
    $query->close();
}



$conn->close();
