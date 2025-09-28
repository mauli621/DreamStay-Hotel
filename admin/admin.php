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

$totalRooms      = $conn->query("SELECT COUNT(*) AS total FROM rooms")->fetch_assoc()['total'];
$roomBookings    = $conn->query("SELECT COUNT(*) AS total FROM room_bookings")->fetch_assoc()['total'];
$eventBookings   = $conn->query("SELECT COUNT(*) AS total FROM event_bookings")->fetch_assoc()['total'];
$diningBookings  = $conn->query("SELECT COUNT(*) AS total FROM dining_bookings")->fetch_assoc()['total'];
$meetingBookings = $conn->query("SELECT COUNT(*) AS total FROM meeting_bookings")->fetch_assoc()['total'];

$recent = $conn->query("SELECT * FROM payments ORDER BY created_at DESC LIMIT 5");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>DreamStay - Admin Panel</title>
    <link rel="icon" type="image/gif" href="./logo.jpg">
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <?php include "./sidebar.php" ?>

    <div class="main-content">
        <?php include "./header.php" ?>
        <div class="cards">
            <div class="card">
                <i class="fas fa-hotel"></i>
                <h3>Total Rooms</h3>
                <p><?= $totalRooms ?></p>
            </div>
            <div class="card">
                <i class="fas fa-bed"></i>
                <h3>Room Bookings</h3>
                <p><?= $roomBookings ?></p>
            </div>
            <div class="card">
                <i class="fas fa-birthday-cake"></i>
                <h3>Event Bookings</h3>
                <p><?= $eventBookings ?></p>
            </div>
            <div class="card">
                <i class="fas fa-utensils"></i>
                <h3>Dining Bookings</h3>
                <p><?= $diningBookings ?></p>
            </div>
            <div class="card">
                <i class="fas fa-handshake"></i>
                <h3>Meeting Bookings</h3>
                <p><?= $meetingBookings ?></p>
            </div>
        </div>

        <div class="main-content">
            <header>
                <h1 class="change">Welcome, <?= htmlspecialchars($adminName); ?></h1>
            </header>

            <section class="recent">
                <h2 class="change">Recent Bookings</h2>
                <table class="change">
                    <thead>
                        <tr>
                            <th>Booking ID</th>
                            <th>User ID</th>
                            <th>Service</th>
                            <th>Status</th>
                            <th>Amount</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($recent->num_rows > 0): ?>
                            <?php while ($row = $recent->fetch_assoc()): ?>
                                <tr>
                                    <td><?= $row['booking_id'] ?></td>
                                    <td><?= $row['user_id'] ?></td>
                                    <td><?= ucfirst($row['booking_type']) ?></td>
                                    <td><?= ucfirst($row['status']) ?></td>
                                    <td>₹<?= number_format($row['amount'], 2) ?></td>
                                    <td><?= $row['created_at'] ?></td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6">No recent bookings found</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </section>
        </div>
        <div class="third-div">
            <section class="recent">
                <h2 class="change new">Recent Bookings Bar Chart</h2>
                <canvas id="recentBookingsChart" width="600" height="300"></canvas>
            </section>
        </div>
    </div>
    
    <?php
$recent->data_seek(0);
$labels = [];
$amounts = [];

while ($row = $recent->fetch_assoc()) {
    $labels[] = ucfirst($row['booking_type']) . ' (' . $row['booking_id'] . ')';
    $amounts[] = $row['amount'];
}
?>

</body>
<script>
    const ctx = document.getElementById('recentBookingsChart').getContext('2d');
    const gradient = ctx.createLinearGradient(0, 0, 0, 400);
    gradient.addColorStop(0, "#09C6F9"); 
    gradient.addColorStop(1, "#045DE9"); 

    const recentBookingsChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?= json_encode($labels) ?>,
            datasets: [{
                label: 'Amount (₹)',
                data: <?= json_encode($amounts) ?>,
                backgroundColor: gradient,
                borderColor: '#045DE9',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    labels: {
                        font: {
                            size: 14
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 20
                    },
                    title: {
                        display: true,
                        text: 'Amount (₹)'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Booking Type (Booking ID)'
                    }
                }
            }
        }
    });
</script>

</html>