<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body>

    <?php include "./sidebar.php" ?>

    <div class="main-content">
        <header>
            <h1>Welcome, Admin</h1>
        </header>

        <div class="cards">
            <div class="card">
                <i class="fas fa-hotel"></i>
                <h3>Total Rooms</h3>
                <p>50</p>
            </div>
            <div class="card">
                <i class="fas fa-bed"></i>
                <h3>Room Bookings</h3>
                <p>34</p>
            </div>
            <div class="card">
                <i class="fas fa-birthday-cake"></i>
                <h3>Event Bookings</h3>
                <p>12</p>
            </div>
            <div class="card">
                <i class="fas fa-utensils"></i>
                <h3>Dining Bookings</h3>
                <p>20</p>
            </div>
        </div>
        <section class="recent">
            <h2>Recent Bookings</h2>
            <table>
                <thead>
                    <tr>
                        <th>Booking ID</th>
                        <th>Name</th>
                        <th>Service</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Khushali Tank</td>
                        <td>Room</td>
                        <td>Confirmed</td>
                        <td>2025-07-10</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Mauli bhanderi</td>
                        <td>Event</td>
                        <td>Pending</td>
                        <td>2025-07-11</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </div>
</body>

</html>