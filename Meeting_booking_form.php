<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/rooom_booking_form.css">
    <title>Meeting Booking</title>
</head>

<body>
    <?php
    include 'header.php';
    ?>
    <?php include "./form.php"; ?>

    <div class="heading">
        <p>Book The Meeting</p>
    </div>
    <div class="c-wrap">
        <div class="wrapper">
            <form>
                <div class="input-field">
                    <input type="text" name="text" placeholder="Company name" required>
                </div>

                <div class="date">
                    <div class="input-field">
                        <input type="date" name="arrival_date" placeholder="Date" required>
                    </div>
                    <div class="input-field">
                        <input type="time" name="departure_date" placeholder="Time" required>
                    </div>
                </div>


                <div class="input-field">
                    <input type="number" name="no. of attendees" placeholder="Number Of Attendees" required>
                </div>

                <div class="input-field">
                    <select id="equipment" name="equipment" required>
                        <option value="single">Equipment Needed ? </option>
                        <hr />
                        <option value="double">Yes</option>
                        <option value="suite">No</option>

                    </select>
                </div>


                <textarea placeholder="Do you have additional comments" rows="6" required></textarea>
                <button type="submit" class="primary-btn">Book the meeting</button>

            </form>
        </div>
    </div>

    <?php
    include 'footer.php';
    ?>
</body>

</html>