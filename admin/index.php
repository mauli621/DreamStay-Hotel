<?php
session_start();

// DB connection
$conn = new mysqli("localhost", "root", "", "hotel");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$error = "";

// ============= Handle Login =============
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM admins WHERE username=? AND password=?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // If match found
    if ($result->num_rows === 1) {
        $admin = $result->fetch_assoc();

        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['admin_name'] = $admin['username'];

        header("Location: admin.php");
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DreamStay - Admin Login</title>

    <!-- Favicon -->
    <link rel="icon" type="image/gif" href="./logo.jpg" />

    <!-- Boxicons CDN -->
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="./css/index.css" />
</head>

<body>
    <div class="wrapper">
        <form action="index.php" method="post">
            <h1>Login</h1>

            <!-- Display error message -->
            <?php if (!empty($error)): ?>
                <p style="color: red;"><?= htmlspecialchars($error) ?></p>
            <?php endif; ?>

            <div class="input-box">
                <input type="text" name="username" placeholder="Username" required />
                <i class='bx bx-user'></i>
            </div>

            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required />
                <i class='bx bx-lock'></i>
            </div>

            <button type="submit" class="btn">Login</button>
        </form>
    </div>
</body>

</html>
