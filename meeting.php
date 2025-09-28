<?php
session_start();
$conn = new mysqli("localhost", "root", "", "hotel");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$meetings = $conn->query("SELECT id, title, price FROM services WHERE type='meeting'");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['service_id'])) {
    if (!isset($_SESSION['user_id'])) {
        echo "<script>alert('Please log in to book an event.'); window.location.href='index.php';</script>";
        exit;
    }

    $user_id       = $_SESSION['user_id'];
    $service_id      = intval($_POST['service_id']);
    $company_name    = trim($_POST['company_name']);
    $meeting_date    = $_POST['m_date'];
    $meeting_time    = $_POST['m_time'];
    $number_of_attendees = intval($_POST['number_of_attendees']);
    $av_equipment     = $_POST['av_equipment'];
    $instructions  = trim($_POST['instructions']);

    // Fetch price from service
    $price = 0;
    $stmt = $conn->prepare("SELECT price FROM services WHERE id=? AND type='meeting'");
    $stmt->bind_param("i", $service_id);
    $stmt->execute();
    $stmt->bind_result($price);
    if (!$stmt->fetch()) {
        echo "<script>alert('Invalid meeting selected.'); window.history.back();</script>";
        exit;
    }
    $stmt->close();

    $total_amount = $price;

    $stmt = $conn->prepare("INSERT INTO meeting_bookings 
    (user_id, service_id, company_name, meeting_date, meeting_time, number_of_attendees, av_equipment, special_instruction, total_amount, status) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 'Pending Payment')");

    $stmt->bind_param(
        "iisssissd",
        $user_id,
        $service_id,
        $company_name,
        $meeting_date,
        $meeting_time,
        $number_of_attendees,
        $av_equipment,
        $instructions,
        $total_amount
    );

    if ($stmt->execute()) {
        $meeting_booking_id = $stmt->insert_id;
        echo "<script>alert('Meeting booking successful! Redirecting to payment...'); 
      window.location.href='payment.php?meeting_booking_id={$meeting_booking_id}&type=meeting';</script>";
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
    <link rel="stylesheet" href="./css/meeting.css" />
    <link rel="stylesheet" href="./css/service_booking.css" />

</head>

<body>
    <?php
    include "./header.php";
    ?>

    <!-- Hero Section -->
    <section class="hero">
        <img src="./assets/meeting_bg.png" class="hero-image">
        <div class="hero-content">
        </div>
    </section>

    <!-- Meeting Gallery Section -->
    <section class="events">
        <h2>Our Meeting Options</h2>
        <div class="event-gallery">

            <?php

            $result = mysqli_query($conn, "SELECT * FROM services WHERE type='meeting'");
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <div class="card1">
                    <img src="./uploads/<?php echo $row['image']; ?>" alt="service-img">
                    <div class="content">
                        <h3><?php echo $row['title']; ?></h3>
                        <p><?php echo $row['description']; ?></p>
                        <h4>Rating : ⭐ <?php echo $row['rating']; ?></h4>
                        <h4>Location : <?php echo $row['location']; ?></h4>
                        <h4>Price : <?php echo $row['price']; ?></h4>

                        <!-- Amenities -->
                        <div class="amenities">
                            <?php
                            $amenities = explode(",", $row['amenities']);
                            foreach ($amenities as $amenity) {
                                echo "<span class='amenity'>$amenity</span>";
                            }
                            ?>
                        </div>
                        <div class="button-wrapper">
                            <button class="details-btn" onclick="openModal()">Book Now</button>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </section>

    <!-- Meeting Booking Modal Form -->
    <div id="eventModal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal()">&times;</span>
            <div class="heading">
                <p>Book The Meeting</p>
            </div>
            <div class="c-wrap">
                <div class="wrapper">
                    <form method="post" action="">
                        <input type="hidden" name="booking_type" value="<?= $type ?>">

                        <div class="input-field">
                            <input type="text" name="company_name" placeholder="Company Name" required>
                        </div>
                        <div class="input-field">
                            <select name="service_id" required>
                                <option value="">Select Meeting</option>
                                <?php
                                $meetings->data_seek(0);
                                while ($meeting = $meetings->fetch_assoc()) { ?>
                                    <option value="<?= $meeting['id']; ?>">
                                        <?= htmlspecialchars($meeting['title']); ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="date">
                            <div class="input-field">
                                <input type="date" name="m_date" placeholder="Date" id="arrival_date" required>
                            </div>
                            <div class="input-field">
                                <input type="time" name="m_time" placeholder="Time" required>
                            </div>
                        </div>
                        <div class="input-field">
                            <input type="number" name="number_of_attendees" placeholder="Number Of Attendees" required>
                        </div>
                        <div class="input-field">
                            <select id="room_type" name="av_equipment" required>
                                <option value="">AV Equipment Needed ?</option>
                                <hr />
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>


                        <textarea placeholder="Special Instruction" rows="6" name="instructions" required></textarea>
                        <button type="submit" class="primary-btn">Book the Meeting</button>

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
            if (event.target === modal) {
                closeModal();
            }
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