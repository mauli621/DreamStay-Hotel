<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: index.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "hotel");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$adminName = $_SESSION['admin_name'];
?>
<link rel="stylesheet" href="./css/style.css" />

<div class="admin-header">
            <div class="brand">
                <img src="./logo1.jpg" alt="">
            </div>
            <div class="header-right">
                <p>Welcome, <?= htmlspecialchars($adminName); ?></p>
                <a href="logout.php" class="logout-btn">Logout</a>
            </div>
        </div>