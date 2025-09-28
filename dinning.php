<?php
session_start();
$conn = new mysqli("localhost", "root", "", "hotel");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$dinnings = $conn->query("SELECT id, title, price FROM services WHERE type='dining'");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['service_id'])) {
    if (!isset($_SESSION['user_id'])) {
        echo "<script>alert('Please log in to book an event.'); window.location.href='index.php';</script>";
        exit;
    }

    $user_id       = $_SESSION['user_id'];
    $service_id      = intval($_POST['service_id']);
    $guest_name    = trim($_POST['guest_name']);
    $dinning_date    = $_POST['d_Date'];
    $dinning_time    = $_POST['d_Time'];
    $no_of_guests       = intval($_POST['no_of_guests']);
    $instructions  = trim($_POST['instructions']);

    // Fetch price from service
    $price = 0;
    $stmt = $conn->prepare("SELECT price FROM services WHERE id=? AND type='dining'");
    $stmt->bind_param("i", $service_id);
    $stmt->execute();
    $stmt->bind_result($price);
    if (!$stmt->fetch()) {
        echo "<script>alert('Invalid dinning selected.'); window.history.back();</script>";
        exit;
    }
    $stmt->close();

    // Calculate total (example: price * number_of_guests)
    $total_amount = $price * $no_of_guests;

    // Insert booking
    $stmt = $conn->prepare("INSERT INTO dining_bookings 
(user_id, service_id, guest_name, dining_date, dining_time, number_of_guests, special_instruction, total_amount, status) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'Pending Payment')");
    $stmt->bind_param("iisssisd", $user_id, $service_id, $guest_name, $dinning_date, $dinning_time, $no_of_guests,  $instructions, $total_amount);


    if ($stmt->execute()) {
        $dinning_booking_id = $stmt->insert_id;
        echo "<script>alert('Dinning booking successful! Redirecting to payment...'); 
              window.location.href='payment.php?dining_booking_id={$dinning_booking_id}&type=dining';</script>";
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
    <link rel="stylesheet" href="./css/Dining.css" />
    <link rel="stylesheet" href="./css/service_booking.css" />

</head>

<body>
    <?php
    include "./header.php";

    ?>

    <!-- Hero Section -->
    <section class="hero">
        <img src="./assets/dinning_bg.jpg" class="hero-image">
        <div class="hero-content">
            <h1>A Taste of Elegance</h1>
            <h4>Delight in gourmet flavors at DreamStay Hotels</h4>
        </div>
    </section>

    <!-- Dining Gallery Section -->
    <section class="events">
        <h2>Our Dinning Options</h2>
        <?php

        $result = mysqli_query($conn, "SELECT * FROM services WHERE type='dining'");
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
                        <button class="details-btn" onclick="openModal(this)" data-service-id="<?= $row['id']; ?>">
                            Book The Dining
                        </button>

                    </div>
                </div>
            </div>
        <?php } ?>



        </div>
    </section>

    <!-- Dining Booking Modal Form -->
    <div id="eventModal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal()">&times;</span>
            <div class="heading">
                <p>Book The Dinning</p>
            </div>
            <div class="c-wrap">
                <div class="wrapper">
                    <form method="post" action="">
                        <div class="input-field">
                            <input type="text" name="guest_name" placeholder="Guest Name" required>
                        </div>

                        <div class="date">
                            <div class="input-field">
                                <input type="date" name="d_Date" placeholder="Date" id="arrival_date" required>
                            </div>
                            <div class="input-field">
                                <input type="time" name="d_Time" placeholder="Time" required>
                            </div>
                        </div>
                        <div class="input-field">
                            <input type="number" name="no_of_guests" placeholder="Number Of Guests" required>
                        </div>
                        <div class="input-field">
                            <select name="service_id" name="dinning_area" required>
                                <option value="">Select Dinning</option>
                                <?php
                                $dinnings->data_seek(0);
                                while ($dinning = $dinnings->fetch_assoc()) { ?>
                                    <option value="<?= $dinning['id']; ?>">
                                        <?= htmlspecialchars($dinning['title']); ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>


                        <textarea name="instructions" placeholder="Special Instruction" rows="6" required></textarea>
                        <button type="submit" class="primary-btn">Book the Dinning</button>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Popup Script -->
    <script>
        function openModal(button) {
            const serviceId = button.getAttribute('data-service-id');
            const select = document.querySelector('select[name="service_id"]');
            if (select && serviceId) {
                select.value = serviceId;
            }

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

    <?php include "./footer.php"; ?>
</body>
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

</html>