<?php
$conn = new mysqli("localhost", "root", "", "hotel");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// --- Handle form submission (Insert Booking) ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['room_id'])) {
    if (!isset($_SESSION['user_id'])) {
        echo "<script>alert('Please log in to book a room.'); window.location.href='index.php';</script>";
        exit;
    }

    $user_id          = $_SESSION['user_id'];
    $room_id          = intval($_POST['room_id']);
    $guest_name       = trim($_POST['guest_name']);
    $room_type      = trim($_POST['room_type']);
    $arrival_date     = $_POST['arrival_date'];
    $departure_date   = $_POST['departure_date'];
    $number_of_rooms  = intval($_POST['number_of_rooms']);
    $number_of_guests = intval($_POST['number_of_guests']);
    $contact_no       = trim($_POST['contact_no']);
    $comments         = trim($_POST['comments']);

    // --- Calculate nights ---
    $check_in_date  = new DateTime($arrival_date);
    $check_out_date = new DateTime($departure_date);
    $nights = $check_in_date->diff($check_out_date)->days;

    if ($nights <= 0) {
        echo "<script>alert('Departure date must be after arrival date.'); window.history.back();</script>";
        exit;
    }

    // --- Get room price and validate room ---
    $room_price = 0;
    $room_query = $conn->prepare("SELECT price FROM rooms WHERE id = ?");
    $room_query->bind_param("i", $room_id);
    $room_query->execute();
    $room_query->bind_result($room_price);
    if (!$room_query->fetch()) {
        echo "<script>alert('Invalid Room ID. Please select a valid room.'); window.history.back();</script>";
        $room_query->close();
        exit;
    }
    $room_query->close();

    // --- Calculate total ---
    $total_amount = $room_price * $number_of_rooms * $nights;

    // --- Insert booking ---
    $stmt = $conn->prepare("INSERT INTO room_bookings 
        (user_id, room_id, guest_name, room_type, arrival_date, departure_date, number_of_rooms, number_of_guests, contact_no, comments, total_amount, status) 
        VALUES (?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?, 'Pending Payment')");
    if ($stmt === false) {
        echo "Error preparing statement: " . $conn->error;
        exit;
    }
    $stmt->bind_param(
        "iissssiissd",
        $user_id,
        $room_id,
        $guest_name,
        $room_type,
        $arrival_date,
        $departure_date,
        $number_of_rooms,
        $number_of_guests,
        $contact_no,
        $comments,
        $total_amount
    );

    if ($stmt->execute()) {
        $booking_id = $stmt->insert_id;
        echo "<script>alert('Booking successful! Redirecting to payment...'); window.location.href='payment.php?booking_id={$booking_id}';</script>";
        exit;
    } else {
        echo "Error executing statement: " . $stmt->error;
    }

    $stmt->close();
}

// --- Fetch available rooms ---
$rooms = $conn->query("SELECT * FROM rooms");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DreamStay - Rest Relax Repeat</title>
    <link rel="stylesheet" href="./css/rooom_booking_form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <!--Room booking form-->
    <div class="heading">
        <p>Book The Room</p>
    </div>
    <div class="c-wrap">
        <div class="wrapper">
            <form method="POST" action="" class="room-form" id="bookingForm">

                <div class="input-field">
                    <input type="text" name="guest_name" placeholder="Guest Name" required>
                </div>
                <div class="input-field">
                    <select name="room_id" required>
                        <option value="" name="room_type">Select Room</option>
                        <?php while ($room = $rooms->fetch_assoc()) { ?>
                            <option value="<?= $room['id']; ?>">
                                <?= htmlspecialchars($room['name']); ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="date">
                    <div class="input-field">
                        <input type="date" name="arrival_date" id="arrival_date" required>
                    </div>
                    <div class="input-field">
                        <input type="date" name="departure_date" id="departure_date" required>
                    </div>
                </div>
                <div class="count">
                    <div class="input-field">
                        <input type="number" name="number_of_rooms" placeholder="Number of Rooms" required>
                    </div>
                    <div class="input-field">
                        <input type="number" name="number_of_guests" placeholder="Number Of Guests" required>
                    </div>
                </div>
                <div class="input-field">
                    <input type="text" name="contact_no" placeholder="Contact No." required>
                </div>

                <textarea placeholder="Do you have additional comments" rows="4" name="comments" required></textarea>
                <button type="submit" class="primary-btn"><i class="fas fa-check-circle"></i> Register</button>
            </form>
        </div>
    </div>
</body>
<script>
    // Get today's date in YYYY-MM-DD format
    const today = new Date().toISOString().split("T")[0];

    const arrivalInput = document.getElementById("arrival_date");
    const departureInput = document.getElementById("departure_date");

    // Set minimum date for arrival as today
    arrivalInput.min = today;

    // Update departure min date when arrival changes
    arrivalInput.addEventListener("change", function() {
        departureInput.min = this.value;
        if (departureInput.value && departureInput.value < this.value) {
            departureInput.value = this.value; // reset if invalid
        }
    });

    // Extra check on form submit
    document.getElementById("bookingForm").addEventListener("submit", function(e) {
        const arrival = new Date(arrivalInput.value);
        const departure = new Date(departureInput.value);

        if (departure <= arrival) {
            e.preventDefault();
            alert("Departure date must be after Arrival date.");
        }
    });
</script>

</html>