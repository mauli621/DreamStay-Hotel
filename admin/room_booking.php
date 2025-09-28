<?php
session_start();
$conn = new mysqli("localhost", "root", "", "hotel");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT rb.*, CONCAT(u.firstname, ' ', u.lastname) AS username, r.name AS room_name 
        FROM room_bookings rb
        JOIN users u ON rb.user_id = u.id
        JOIN rooms r ON rb.room_id = r.id
        ORDER BY rb.created_at DESC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>DreamStay - Admin Panel</title>
    <link rel="icon" type="image/gif" href="./logo.jpg">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <?php include 'sidebar.php'; ?>

    <div class="main-content">
        <header>
            <h1>All Room Bookings</h1>
        </header>

        <section class="recent">
            <h2>Recent Bookings</h2>

            <?php if ($result && $result->num_rows > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Room</th>
                            <th>Guest Name</th>
                            <th>Arrival</th>
                            <th>Departure</th>
                            <th>No. of Rooms</th>
                            <th>No. of Guests</th>
                            <th>Contact</th>
                            <th>Comments</th>
                            <th>Booking Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?= htmlspecialchars($row['id']); ?></td>
                                <td><?= htmlspecialchars($row['username']); ?></td>
                                <td><?= htmlspecialchars($row['room_name']); ?></td>
                                <td><?= htmlspecialchars($row['guest_name']); ?></td>
                                <td><?= htmlspecialchars($row['arrival_date']); ?></td>
                                <td><?= htmlspecialchars($row['departure_date']); ?></td>
                                <td><?= htmlspecialchars($row['number_of_rooms']); ?></td>
                                <td><?= htmlspecialchars($row['number_of_guests']); ?></td>
                                <td><?= htmlspecialchars($row['contact_no']); ?></td>
                                <td><?= htmlspecialchars($row['comments']); ?></td>
                                <td><?= htmlspecialchars($row['created_at']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No bookings found.</p>
            <?php endif; ?>
        </section>
    </div>
</body>

</html>