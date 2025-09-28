<?php
session_start();
$conn = new mysqli("localhost", "root", "", "hotel");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$user_id = $_SESSION['user_id'];

/* FETCH USER DETAILS */
$sql = "SELECT firstname, lastname, email, mobile_number FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

/* -------------------------------
   FETCH BOOKINGS
--------------------------------*/

// ROOM BOOKINGS
$room_bookings = [];
$room_sql = "SELECT id, room_type AS service, arrival_date AS start_date, departure_date AS end_date, number_of_guests, status, total_amount, created_at 
             FROM room_bookings WHERE user_id = ?";
$stmt = $conn->prepare($room_sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$res = $stmt->get_result();
while ($row = $res->fetch_assoc()) {
    $row['booking_type'] = 'Room';
    $room_bookings[] = $row;
}

// OTHER SERVICES (Dining, Event, Meeting)
$service_bookings = [];

// Dining
$dining_sql = "SELECT id, CONCAT('Dining (', dinning_area, ')') AS service, dining_date AS start_date, dining_time AS end_date, number_of_guests, status, total_amount, created_at 
               FROM dining_bookings WHERE user_id = ?";
$stmt = $conn->prepare($dining_sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$res = $stmt->get_result();
while ($row = $res->fetch_assoc()) {
    $row['booking_type'] = 'Dining';
    $service_bookings[] = $row;
}

// Event
$event_sql = "SELECT id, 'Event Hall' AS service, event_date AS start_date, event_time AS end_date, number_of_guests, status, total_amount, created_at 
              FROM event_bookings WHERE user_id = ?";
$stmt = $conn->prepare($event_sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$res = $stmt->get_result();
while ($row = $res->fetch_assoc()) {
    $row['booking_type'] = 'Event';
    $service_bookings[] = $row;
}

// Meeting
$meeting_sql = "SELECT id, company_name AS service, meeting_date AS start_date, meeting_time AS end_date, number_of_attendees AS number_of_guests, status, total_amount, created_at 
                FROM meeting_bookings WHERE user_id = ?";
$stmt = $conn->prepare($meeting_sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$res = $stmt->get_result();
while ($row = $res->fetch_assoc()) {
    $row['booking_type'] = 'Meeting';
    $service_bookings[] = $row;
}

/* SORT BOTH ARRAYS BY CREATED DATE */
usort($room_bookings, fn($a, $b) => strtotime($b['created_at']) - strtotime($a['created_at']));
usort($service_bookings, fn($a, $b) => strtotime($b['created_at']) - strtotime($a['created_at']));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DreamStay - Rest Relax Repeat</title>
    <link rel="icon" type="image/gif" href="./assets/logo.jpg">
    <link rel="stylesheet" href="./css/user_booking.css">
</head>

<body>
    <?php include "./header.php"; ?>

    <div class="main-content">
        <!-- USER PROFILE -->
        <div class="profile-header">
            <div class="user-info">
                <h1><?= htmlspecialchars($user['firstname'] . " " . $user['lastname']) ?></h1>
                <p>Email: <?= htmlspecialchars($user['email']) ?></p>
                <p>Mobile: <?= htmlspecialchars($user['mobile_number']) ?></p>
            </div>
        </div>

        <!-- ROOM BOOKINGS TABLE -->
        <div class="booking-history">
            <h3>My Room Bookings</h3>
            <table>
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Start</th>
                        <th>End</th>
                        <th>Guests</th>
                        <th>Status</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($room_bookings) > 0): ?>
                        <?php foreach ($room_bookings as $b): ?>
                            <tr>
                                <td><?= htmlspecialchars($b['booking_type']) ?></td>
                                <td><?= htmlspecialchars($b['start_date']) ?></td>
                                <td><?= htmlspecialchars($b['end_date']) ?></td>
                                <td><?= htmlspecialchars($b['number_of_guests']) ?></td>
                                <td><?= htmlspecialchars($b['status']) ?></td>
                                <td>₹<?= htmlspecialchars($b['total_amount']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6">No room bookings found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- OTHER SERVICES TABLE -->
        <div class="booking-history">
            <h3>My Service Bookings (Dining, Event, Meeting)</h3>
            <table>
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Service</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Guests</th>
                        <th>Status</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($service_bookings) > 0): ?>
                        <?php foreach ($service_bookings as $b): ?>
                            <tr>
                                <td><?= htmlspecialchars($b['booking_type']) ?></td>
                                <td><?= htmlspecialchars($b['service']) ?></td>
                                <td><?= htmlspecialchars($b['start_date']) ?></td>
                                <td><?= htmlspecialchars($b['end_date']) ?></td>
                                <td><?= htmlspecialchars($b['number_of_guests']) ?></td>
                                <td><?= htmlspecialchars($b['status']) ?></td>
                                <td>₹<?= htmlspecialchars($b['total_amount']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7">No service bookings found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php include "./footer.php"; ?>
</body>

</html>