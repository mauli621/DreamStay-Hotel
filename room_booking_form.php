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
    <?php
    include 'header.php';
    ?>
    <?php include "./form.php"; ?>

    <!--contact form-->
    <div class="heading">
        <p>Book The Room</p>
    </div>
    <div class="c-wrap">
        <div class="wrapper">
            <form>
                <div class="input-field">
                    <input type="text" name="text" placeholder="Guest Name" required>
                </div>
                <div class="input-field">
                    <select id="room_type" name="room_type" required>
                        <option value="single">Room Type</option>
                        <hr />
                        <option value="double">Double</option>
                        <option value="suite">Suite</option>
                        <option value="deluxe">Deluxe</option>
                    </select>
                </div>
                <div class="date">
                    <div class="input-field">
                        <input type="date" name="arrival_date" placeholder="arrival_date" required>
                    </div>
                    <div class="input-field">
                        <input type="date" name="departure_date" placeholder="departure_date" required>
                    </div>
                </div>
                <div class="count">
                    <div class="input-field">
                        <input type="number" name="no. of rooms" placeholder="Number of Rooms" required>
                    </div>
                    <div class="input-field">
                        <input type="number" name="no. of guests" placeholder="Number Of Guests" required>
                    </div>
                </div>
                <div class="input-field">
                    <input type="text" name="contact no" placeholder="Contact No." required>
                </div>
                <div class="input-field">
                    <input type="email" name="email" placeholder="Email" required>
                </div>

                <textarea placeholder="Do you have additional comments" rows="6" required></textarea>
                <button type="submit" class="primary-btn">Regester</button>

            </form>
        </div>
    </div>


    </div>

    <?php
    include 'footer.php';
    ?>
</body>

</html>