<?php
session_start();
$conn = new mysqli("localhost", "root", "", "hotel");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch event services dynamically
$events = $conn->query("SELECT id, title, price FROM services WHERE type='event'");

// Handle booking form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['event_id'])) {
    if (!isset($_SESSION['user_id'])) {
        echo "<script>alert('Please log in to book an event.'); window.location.href='index.php';</script>";
        exit;
    }

    $user_id       = $_SESSION['user_id'];
    $event_id      = intval($_POST['event_id']);
    $guest_name    = trim($_POST['guest_name']);
    $event_date    = $_POST['event_date'];
    $event_time    = $_POST['event_time'];
    $guests        = intval($_POST['guests']);
    $catering      = $_POST['catering'];
    $instructions  = trim($_POST['instructions']);

    // Fetch price from service
    $price = 0;
    $stmt = $conn->prepare("SELECT price FROM services WHERE id=? AND type='event'");
    $stmt->bind_param("i", $event_id);
    $stmt->execute();
    $stmt->bind_result($price);
    if (!$stmt->fetch()) {
        echo "<script>alert('Invalid event selected.'); window.history.back();</script>";
        exit;
    }
    $stmt->close();

    $total_amount = $price;

    $stmt = $conn->prepare("INSERT INTO event_bookings 
        (user_id, event_id, guest_name, event_date, event_time, number_of_guests, catering_option, instructions, total_amount, status) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 'Pending Payment')");
    $stmt->bind_param("iisssissd", $user_id, $event_id, $guest_name, $event_date, $event_time, $guests, $catering, $instructions, $total_amount);

    if ($stmt->execute()) {
        $event_booking_id = $stmt->insert_id;
        echo "<script>alert('Event booking successful! Redirecting to payment...'); 
              window.location.href='payment.php?event_booking_id={$event_booking_id}&type=event';</script>";
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DreamStay - Rest Relax Repeat</title>
    <link rel="icon" type="image/gif" href="./assets/logo.jpg">
    <link rel="stylesheet" href="./css/event.css" />
    <link rel="stylesheet" href="./css/service_booking.css" />
</head>

<body>
    <?php include "./header.php"; ?>

    <!-- Hero Section -->
    <section class="hero">
        <img src="./assets/events_bg.jpg" class="hero-image">
        <div class="hero-content">
            <h1>A Royalty of DreamStay</h1>
            <h4>Delight in gourmet flavors at DreamStay Hotels</h4>
        </div>
    </section>

    <!-- Events List -->
    <section class="events">
        <h2>Our Events Options</h2>
        <div class="event-gallery">
            <?php
            $result = $conn->query("SELECT * FROM services WHERE type='event'");
            while ($row = $result->fetch_assoc()) { ?>
                <div class="card1">
                    <img src="./uploads/<?= $row['image']; ?>" alt="service-img">
                    <div class="content">
                        <h3><?= $row['title']; ?></h3>
                        <p><?= $row['description']; ?></p>
                        <h4>Rating : ⭐ <?= $row['rating']; ?></h4>
                        <h4>Location : <?= $row['location']; ?></h4>
                        <h4>Price : ₹<?= $row['price']; ?></h4>
                        <div class="button-wrapper">
                            <button class="details-btn" onclick="openModal()">Book Now</button>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>

    <!-- Event Booking Modal -->
    <div id="eventModal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal()">&times;</span>
            <div class="heading">
                <p>Book The Event</p>
            </div>
            <div class="c-wrap">
                <div class="wrapper">
                    <form method="post" action="">
                        <div class="input-field">
                            <input type="text" name="guest_name" placeholder="Guest Name" required>
                        </div>
                        <div class="input-field">
                            <select name="event_id" required>
                                <option value="">Select Event</option>
                                <?php
                                $events->data_seek(0);
                                while ($event = $events->fetch_assoc()) { ?>
                                    <option value="<?= $event['id']; ?>">
                                        <?= htmlspecialchars($event['title']); ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="date">
                            <div class="input-field">
                                <input type="date" name="event_date" id="arrival_date" required>
                            </div>
                            <div class="input-field">
                                <input type="time" name="event_time" required>
                            </div>
                        </div>
                        <div class="input-field">
                            <input type="number" name="guests" placeholder="Number Of Guests" required>
                        </div>
                        <div class="input-field">
                            <select name="catering" required>
                                <option value="">Catering Options</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <textarea name="instructions" placeholder="Special Instructions" rows="6"></textarea>
                        <button class="details-btn" onclick="openModal(<?= $row['id']; ?>)">Book Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Popup Script -->
    <script>
        function openModal() {
            document.getElementById("eventModal").style.display = "block";
            document.body.style.overflow = "hidden";
        }

        function closeModal() {
            document.getElementById("eventModal").style.display = "none";
            document.body.style.overflow = "auto";
        }
        window.onclick = function(event) {
            const modal = document.getElementById("eventModal");
            if (event.target === modal) closeModal();
        };
    </script>
    <script>
        // Get today's date in YYYY-MM-DD format
        const today = new Date().toISOString().split("T")[0];

        const arrivalInput = document.getElementById("arrival_date");

        // Set minimum date for arrival as today
        arrivalInput.min = today;

        // Extra check on form submit
        document.getElementById("bookingForm").addEventListener("submit", function(e) {
            const arrival = new Date(arrivalInput.value);

            if (arrival < new Date(today)) {
                e.preventDefault();
                alert("Arrival date cannot be before today.");
            }
        });
    </script>

    <?php include "./footer.php"; ?>
</body>

</html>