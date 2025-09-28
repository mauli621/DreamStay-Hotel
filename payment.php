<?php
session_start();
$conn = new mysqli("localhost", "root", "", "hotel");

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Please log in first...'); window.location.href='index.php';</script>";
    exit;
}
// fallback if type not set explicitly
if (!isset($_GET['type'])) {
    if (isset($_GET['event_booking_id'])) {
        $type = 'event';
    } elseif (isset($_GET['meeting_booking_id'])) {
        $type = 'meeting';
    } elseif (isset($_GET['dining_booking_id'])) {
        $type = 'dining';
    } elseif (isset($_GET['booking_id'])) {
        $type = 'room';
    } else {
        $type = 'unknown';
    }
}

$user_id = $_SESSION['user_id'];
$type    = isset($_GET['type']) ? $_GET['type'] : 'room'; 
//$type = $_POST['booking_type'];  // instead of $_GET['type']

if ($type === "event") {
    $booking_id = isset($_GET['event_booking_id']) ? intval($_GET['event_booking_id']) : 0;

    $stmt = $conn->prepare("SELECT eb.*, s.title AS event_name 
                        FROM event_bookings eb
                        JOIN services s ON eb.event_id = s.id
                        WHERE eb.id = ? AND eb.user_id = ?");

    $stmt->bind_param("ii", $booking_id, $user_id);
} elseif ($type === "meeting") {
    $booking_id = isset($_GET['meeting_booking_id']) ? intval($_GET['meeting_booking_id']) : 0;

    $stmt = $conn->prepare("SELECT mb.*, s.title AS meeting_name 
                            FROM meeting_bookings mb
                            JOIN services s ON mb.service_id = s.id
                            WHERE mb.id = ? AND mb.user_id = ?");
    $stmt->bind_param("ii", $booking_id, $user_id);
} elseif ($type === "dining") {
    $booking_id = isset($_GET['dining_booking_id']) ? intval($_GET['dining_booking_id']) : 0;

    $stmt = $conn->prepare("SELECT db.*, s.title AS dining_name 
                            FROM dining_bookings db
                            JOIN services s ON db.service_id = s.id
                            WHERE db.id = ? AND db.user_id = ?");
    $stmt->bind_param("ii", $booking_id, $user_id);
} else {
    $booking_id = isset($_GET['booking_id']) ? intval($_GET['booking_id']) : 0;

    $stmt = $conn->prepare("SELECT rb.*, r.name AS room_name 
                            FROM room_bookings rb
                            JOIN rooms r ON rb.room_id = r.id
                            WHERE rb.id = ? AND rb.user_id = ?");
    $stmt->bind_param("ii", $booking_id, $user_id);
}

$stmt->execute();
$booking = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (!$booking) {
    echo "<script>alert('Invalid booking.'); window.location.href='index.php';</script>";
    exit;
}

// ✅ Handle payment form
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['payment_method'])) {
    $method = $_POST['payment_method'];
    $amount = floatval($_POST['amount']);
    $status = "Completed";

    $stmt = $conn->prepare("INSERT INTO payments (booking_id, booking_type, user_id, method, amount, status) 
                            VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isisss", $booking_id, $type, $user_id, $method, $amount, $status);

    if ($stmt->execute()) {
        $stmt->close();

        // ✅ Update booking status
        if ($type === "event") {
            $update = $conn->prepare("UPDATE event_bookings SET status=? WHERE id=?");
        } elseif ($type === "meeting") {
            $update = $conn->prepare("UPDATE meeting_bookings SET status=? WHERE id=?");
        } elseif ($type === "dining") {
            $update = $conn->prepare("UPDATE dining_bookings SET status=? WHERE id=?");
        } else {
            $update = $conn->prepare("UPDATE room_bookings SET status=? WHERE id=?");
        }

        $new_status = "Confirmed";
        $update->bind_param("si", $new_status, $booking_id);
        $update->execute();
        $update->close();

        echo "<script>alert('✅ Payment Successful! $type booking confirmed.'); window.location.href='index.php';</script>";
        exit;
    } else {
        echo "Payment Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Payment</title>
    <link rel="stylesheet" href="./css/payment.css">
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Payment for Booking <?= $booking_id ?></h2>

        <?php if ($type === "room"): ?>
            <p><strong>Room:</strong> <?= htmlspecialchars($booking['room_name']) ?></p>
            <p><strong>Check-in:</strong> <?= isset($booking['arrival_date']) ? htmlspecialchars($booking['arrival_date']) : 'N/A' ?></p>
            <p><strong>Check-out:</strong> <?= isset($booking['departure_date']) ? htmlspecialchars($booking['departure_date']) : 'N/A' ?></p>

            <p><strong>Total Amount:</strong> ₹<?= number_format($booking['total_amount'], 2) ?></p>

        <?php elseif ($type === "event"): ?>
            <p><strong>Event:</strong> <?= htmlspecialchars($booking['event_name']) ?></p>
            <p><strong>Date:</strong> <?= htmlspecialchars($booking['event_date']) ?></p>
            <p><strong>Time:</strong> <?= htmlspecialchars($booking['event_time']) ?></p>
            <p><strong>Total Amount:</strong> ₹<?= number_format($booking['total_amount'], 2) ?></p>

        <?php elseif ($type === "meeting"): ?>
            <p><strong>Meeting:</strong> <?= htmlspecialchars($booking['meeting_name']) ?></p>
            <p><strong>Company:</strong> <?= htmlspecialchars($booking['company_name']) ?></p>
            <p><strong>Date:</strong> <?= htmlspecialchars($booking['meeting_date']) ?></p>
            <p><strong>Time:</strong> <?= htmlspecialchars($booking['meeting_time']) ?></p>
            <p><strong>Attendees:</strong> <?= htmlspecialchars($booking['number_of_attendees']) ?></p>
            <p><strong>AV Equipment:</strong> <?= htmlspecialchars($booking['av_equipment']) ?></p>
            <p><strong>Total Amount:</strong> ₹<?= number_format($booking['total_amount'], 2) ?></p>

        <?php elseif ($type === "dining"): ?>
            <p><strong>Dining:</strong> <?= htmlspecialchars($booking['dining_name']) ?></p>
            <p><strong>Guest:</strong> <?= htmlspecialchars($booking['guest_name']) ?></p>
            <p><strong>Date:</strong> <?= htmlspecialchars($booking['dining_date']) ?></p>
            <p><strong>Time:</strong> <?= htmlspecialchars($booking['dining_time']) ?></p>
            <p><strong>No. of Guests:</strong> <?= htmlspecialchars($booking['number_of_guests']) ?></p>
            <p><strong>Dining Area:</strong> <?= htmlspecialchars($booking['dining_name']) ?></p>
            <p><strong>Total Amount:</strong> ₹<?= number_format($booking['total_amount'], 2) ?></p>
        <?php endif; ?>

        <form method="POST"
            action="payment.php?<?= ($type === 'event' ? "event_booking_id={$booking_id}&type=event" : ($type === 'meeting' ? "meeting_booking_id={$booking_id}&type=meeting" : ($type === 'dining' ? "dining_booking_id={$booking_id}&type=dining" :

                                            "booking_id={$booking_id}&type=room"))) ?>">

            <input type="hidden" name="booking_id" value="<?= $booking_id ?>">
            <input type="hidden" name="amount" value="<?= $booking['total_amount'] ?>">

            <label for="method">Select Payment Method:</label>
            <select id="method" name="payment_method" required>
                <option value="">-- Select --</option>
                <option value="bank">Bank Transfer</option>
                <option value="upi">UPI</option>
                <option value="card">Credit/Debit Card</option>
            </select>

            <!-- Bank Transfer -->
            <div id="bankDetails" class="hidden">
                <label>Select Your Bank:</label>
                <select name="bank_name">
                    <option>SBI</option>
                    <option>HDFC</option>
                    <option>ICICI</option>
                    <option>Axis Bank</option>
                    <option>PNB</option>
                </select>
                <label>Enter Account Number:</label>
                <input type="text" name="num_id" placeholder="Ex. 86970706969607">
                <label>Enter IFSC Code:</label>
                <input type="text" name="ifsc_id" placeholder="Ex. 5gty67fhr78u8hh">
            </div>

            <!-- UPI -->
            <div id="upiDetails" class="hidden">
                <label>Enter UPI ID:</label>
                <input type="text" name="upi_id" placeholder="example@upi">
                <label>Select Your Bank:</label>
                <select name="bank_nameUPI">
                    <option>SBI</option>
                    <option>HDFC</option>
                    <option>ICICI</option>
                    <option>Axis Bank</option>
                    <option>PNB</option>
                </select>
            </div>

            <!-- Card -->
            <div id="cardDetails" class="hidden">
                <label>Card Number:</label>
                <input type="text" name="card_number" placeholder="XXXX-XXXX-XXXX-XXXX">
                <label>Expiry Date:</label>
                <input type="month" name="card_expiry">
                <label>CVV:</label>
                <input type="password" name="card_cvv" maxlength="3" placeholder="XXX">
            </div>

            <button type="submit" class="btn">Proceed to Pay</button>
        </form>
    </div>

    <script>
        const method = document.getElementById("method");
        method.addEventListener("change", function() {
            document.getElementById("bankDetails").classList.add("hidden");
            document.getElementById("upiDetails").classList.add("hidden");
            document.getElementById("cardDetails").classList.add("hidden");

            if (this.value === "bank") {
                document.getElementById("bankDetails").classList.remove("hidden");
            } else if (this.value === "upi") {
                document.getElementById("upiDetails").classList.remove("hidden");
            } else if (this.value === "card") {
                document.getElementById("cardDetails").classList.remove("hidden");
            }
        });
    </script>
</body>

</html>