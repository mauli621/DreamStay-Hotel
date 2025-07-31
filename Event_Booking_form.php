<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/rooom_booking_form.css">
    <title>Event Booking</title>
</head>

<body>
    <?php
    include 'header.php';
    ?>
    <?php include "./form.php"; ?>

    <div class="heading">
        <p>Book The Event</p>
    </div>
    <div class="c-wrap">
        <div class="wrapper">
            <form>
                <div class="input-field">
                    <input type="text" name="text" placeholder="Guest Name" required>
                </div>
                <div class="input-field">
                    <select id="room_type" name="room_type" required>
                        <option value="single">Event Type</option>
                        <hr />
                        <option value="double">Wedding</option>
                        <option value="suite">Birthday</option>
                        <option value="deluxe">Engagement</option>
                    </select>
                </div>
                <div class="date">
                    <div class="input-field">
                        <input type="date" name="arrival_date" placeholder="Date" required>
                    </div>
                    <div class="input-field">
                        <input type="Time" name="departure_date" placeholder="Time" required>
                    </div>
                </div>


                <div class="input-field">
                    <input type="number" name="Expected guests" placeholder="Expected Guests" required>
                </div>

                <div class="input-field">
                    <select id="catering_options" name="catering_options" required>
                        <option value="single">Catering Option</option>
                        <hr />
                        <option value="double">Yes</option>
                        <option value="suite">No</option>

                    </select>
                </div>

                <textarea placeholder="Do you have additional comments" rows="6" required></textarea>
                <button type="submit" class="primary-btn">Book the Event</button>

            </form>
        </div>
    </div>

    <?php
    include 'footer.php';
    ?>
</body>

</html>