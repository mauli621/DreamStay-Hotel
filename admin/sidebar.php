<?php
  // Get the name of the current page
  $currentPage = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>DreamStay - Admin Panel</title>

  <!-- Favicon -->
  <link rel="icon" type="image/gif" href="./logo.jpg" />

  <!-- Custom CSS -->
  <link rel="stylesheet" href="./css/style.css" />

  <!-- Font Awesome (for icons) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
  <div class="sidebar">
    <h2>Hello Admin</h2>

    <ul>
      <li>
        <a href="./admin.php" class="<?= ($currentPage === 'admin.php') ? 'active' : '' ?>">
          <i class="fas fa-tachometer-alt"></i> Dashboard
        </a>
      </li>
      <li>
        <a href="./users.php" class="<?= ($currentPage === 'users.php') ? 'active' : '' ?>">
          <i class="fas fa-users"></i> Users
        </a>
      </li>
      <li>
        <a href="./add_room.php" class="<?= ($currentPage === 'add_room.php') ? 'active' : '' ?>">
          <i class="fas fa-bed"></i> Add Room
        </a>
      </li>
      <li>
        <a href="./add_service.php" class="<?= ($currentPage === 'add_service.php') ? 'active' : '' ?>">
          <i class="fa-solid fa-plus"></i> Add Services
        </a>
      </li>
      <li>
        <a href="./room_booking.php" class="<?= ($currentPage === 'room_booking.php') ? 'active' : '' ?>">
          <i class="fas fa-calendar-check"></i> Room Bookings
        </a>
      </li>
      <li>
        <a href="./event.php" class="<?= ($currentPage === 'event.php') ? 'active' : '' ?>">
          <i class="fas fa-calendar-day"></i> Event Bookings
        </a>
      </li>
      <li>
        <a href="./meeting.php" class="<?= ($currentPage === 'meeting.php') ? 'active' : '' ?>">
          <i class="fas fa-handshake"></i> Meeting Bookings
        </a>
      </li>
      <li>
        <a href="./dinning.php" class="<?= ($currentPage === 'dinning.php') ? 'active' : '' ?>">
          <i class="fas fa-utensils"></i> Dining Bookings
        </a>
      </li>
      <li>
        <a href="./payment.php" class="<?= ($currentPage === 'payment.php') ? 'active' : '' ?>">
          <i class="fas fa-money-bill-wave"></i> Payment
        </a>
      </li>
      <li>
        <a href="./inquiry.php" class="<?= ($currentPage === 'inquiry.php') ? 'active' : '' ?>">
          <i class="fas fa-question-circle"></i> Inquiry
        </a>
      </li>
    </ul>
  </div>
</body>

</html>
