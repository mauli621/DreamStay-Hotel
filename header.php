<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$conn = new mysqli("localhost", "root", "", "hotel");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $email = trim($_POST['Email']);
    $password = trim($_POST['password']);

    $query = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $query->bind_param("s", $email);
    $query->execute();
    $result = $query->get_result();

    if ($result && $result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['firstname'] . ' ' . $user['lastname'];
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
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DreamStay - Rest Relax Repeat</title>
    <link rel="icon" type="image/gif" href="./assets/logo.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
  #loginPopup {
    display: none; /* default hidden */
  }
  #loginPopup.show {
    display: block !important; /* force show */
  }
  .navbar ul li a.active {
    color: #003580; /* Example highlight color */
    font-weight: bold;
    border-bottom: 2px solid #003580;
}

  
</style>

    <link rel="stylesheet" href="./css/header.css" />
</head>

<?php
include 'form.php';
?>

<body>
    <header>
        <div class="header-container">
            <div class="brand">
                <a href="index.php">
                    <img src="./assets/logo1.jpg" alt="DreamStay Logo">
                </a>
            </div>

            <nav class="navbar">
    <ul>
        <li><a href="index.php" class="<?= ($currentPage === 'index.php') ? 'active' : '' ?>">Home</a></li>
        <li><a href="about.php" class="<?= ($currentPage === 'about.php') ? 'active' : '' ?>">About Us</a></li>
        <li><a href="rooms.php" class="<?= ($currentPage === 'rooms.php') ? 'active' : '' ?>">Our Rooms</a></li>
        <li class="dropdown">
            <a href="#" id="servicesDropdownBtn" class="<?= in_array($currentPage, ['dinning.php', 'event.php', 'meeting.php']) ? 'active' : '' ?>">Services<sup>NEW</sup></a>
            <div class="dropdown-content" id="servicesDropdownContent">
                <a href="dinning.php" class="<?= ($currentPage === 'dinning.php') ? 'active' : '' ?>">Dining</a>
                <a href="event.php" class="<?= ($currentPage === 'event.php') ? 'active' : '' ?>">Events</a>
                <a href="meeting.php" class="<?= ($currentPage === 'meeting.php') ? 'active' : '' ?>">Meetings</a>
            </div>
        </li>
        <li><a href="contact_us.php" class="<?= ($currentPage === 'contact_us.php') ? 'active' : '' ?>">Contact Us</a></li>
    </ul>
</nav>


            <div class="btn">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <button id="profileBtn">
    <i class="fa-solid fa-user"></i> Profile
</button>


                    <!-- Profile Popup -->
                    <div id="profilePopup" class="profile-popup">
                        <div class="profile-popup-content">
                            <span class="close-btn" id="closeProfile">&times;</span>
                            <h2>My Profile</h2>
                            <form>
                                <label for="username">Name:</label>
                                <input type="text" id="username"
                                    value="<?php echo $_SESSION['user_name'] ?? 'Guest'; ?>" readonly>

                                <label for="password">Password:</label>
                                <input type="password" id="password" value="********" readonly>

                                <button type="button" onclick="window.location.href='logout.php'">Logout</button>
                            </form>
                        </div>
                    </div>

                    <button>
                        <a href="./user_bookings.php"><i class="fa-solid fa-calendar-check"></i> Booking</a>
                    </button>
                <?php else: ?>
                    <button id="loginBtn">
                        <i class="fa-solid fa-right-to-bracket"></i> Login
                    </button>
                    <button>
                        <a href="./user_bookings.php"><i class="fa-solid fa-calendar-check"></i> Booking</a>
                    </button>
                <?php endif; ?>
            </div>
        </div>
    </header>

    </form>

    <script src="./javascript/script.js"></script>

</body>

</html>