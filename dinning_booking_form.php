<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/rooom_booking_form.css">
    <title>Dinning Booking</title>
</head>

<body>
    <?php
    include 'header.php';
    ?>
    <?php include "./form.php"; ?>

    <!-- dinning Booking -->
    <div class="heading">
        <p>Dinning Booking</p>
    </div>
    <div class="c-wrap">
        <div class="wrapper">
            <form>
                <div class="input-field">
                    <input type="text" name="text" placeholder="Guest Name" required>
                </div>
                <div class="date">
                    <div class="input-field">
                        <input type="date" name="Date" placeholder="Date" required>
                    </div>
                    <div class="input-field">
                        <input type="time" name="Time" placeholder="Time" required>
                    </div>
                </div>
                <div class="input-field">
                    <input type="number" name="no. of guests" placeholder="Number Of Guests" required>
                </div>
                <div class="input-field">
                    <select id="room_type" name="room_type" required>
                        <option value="single">Dinning Area</option>
                        <hr />
                        <option value="double">Indoor</option>
                        <option value="suite">OutDoor</option>
                    </select>
                </div>


                <textarea placeholder="Special Instruction" rows="6" required></textarea>
                <button type="submit" class="primary-btn">Book the Dinning</button>

            </form>
        </div>
    </div>
    </div>
    <?php
    include 'footer.php';
    ?>
</body>

</html>