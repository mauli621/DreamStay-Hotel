<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Events</title>
    <link rel="stylesheet" href="./css/services.css" />
</head>

<body>
    <?php
    include "./header.php";
    include 'form.php';
    ?>

    <!-- Hero Section -->
    <section class="hero">
        <img src="./assets/events_bg.jpg" class="hero-image">
        <div class="hero-content">
            <h1>Elegant. Memorable. Unforgettable.</h1>
            <h4>Celebrate your special moments with us at DreamStay Hotels</h4>
        </div>
    </section>

    <!-- Event Gallery Section -->
    <section class="events">
        <h2>Our Signature Events</h2>
        <div class="event-gallery">

            <div class="card1">
                <img src="./assets/marriage.jpg" alt="Wedding Event">
                <div class="content">
                    <h3>Royal Weddings</h3>
                    <p> Celebrate your dream wedding with regal charm, themed decor, and world-class hospitality.
                        Our grand halls and lawns are perfect for making your big day unforgettable.</p>

                    <div class="button-wrapper">
                        <button class="details-btn">
                            <i class="fas fa-calendar-check"></i><a href="./Event_Booking_form.php">Book The Event</a>
                        </button>
                    </div>
                </div>

            </div>

            <div class="card2">
                <div class="content">
                    <h3>Birthday Celebrations</h3>
                    <p> From kids' birthdays to milestone moments, we make it joyful with colorful themes,
                        custom cakes, fun entertainment, and dedicated party planners.
                    </p>
                    <div class="button-wrapper">
                        <button class="details-btn">
                            <i class="fas fa-calendar-check"></i><a href="./Event_Booking_form.php">Book The Event</a>
                        </button>
                    </div>
                </div>
                <img src="./assets/birthday.jpg" alt="Birthday Event">

            </div>

            <div class="card3">
                <img src="./assets/engagement.jpg" alt="engagement Event">
                <div class="content">
                    <h3>Elegant Engagements</h3>
                    <p>Mark the beginning of your journey with a romantic engagement ceremony.
                        We offer candlelight decor, couple seating, and curated menus to match your style.</p>
                    <div class="button-wrapper">
                        <button class="details-btn">
                            <i class="fas fa-calendar-check"></i><a href="./Event_Booking_form.php">Book The Event</a>
                        </button>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <?php
    include "./footer.php";
    ?>

</body>

</html>