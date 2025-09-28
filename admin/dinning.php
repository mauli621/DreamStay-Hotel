<?php
session_start();
$conn = new mysqli("localhost", "root", "", "hotel");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT db.*, s.title AS dining_title 
        FROM dining_bookings db
        JOIN services s ON db.service_id = s.id
        ORDER BY db.created_at ASC";
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
            <h1>Dining Bookings</h1>
        </header>

        <section class="recent">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Dining Option</th>
                        <th>Guest Name</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>No. of Guests</th>
                        <th>Dining Area</th>
                        <th>Requests</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result && $result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= htmlspecialchars($row['dining_title']) ?></td>
                                <td><?= htmlspecialchars($row['guest_name']) ?></td>
                                <td><?= htmlspecialchars($row['dining_date']) ?></td>
                                <td><?= htmlspecialchars($row['dining_time']) ?></td>
                                <td><?= $row['number_of_guests'] ?></td>
                                <td><?= $row['dinning_area'] ?></td>
                                <td><?= htmlspecialchars($row['special_instruction']) ?></td>
                                <td>₹<?= number_format($row['total_amount'], 2) ?></td>
                                <td><?= $row['status'] ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="10">No dining bookings found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </section>
    </div>
</body>
</html>
