<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dinning</title>
    <link rel="stylesheet" href="./css/services.css" />
</head>

<body>
    <?php
    include "./header.php";
    include 'form.php';
    ?>

    <!-- Hero Section -->
    <section class="hero">
        <img src="./assets/dinning_bg.jpg" class="hero-image">
        <div class="hero-content">
            <h1>A Taste of Elegance</h1>
            <h4>Delight in gourmet flavors at DreamStay Hotels</h4>
        </div>
    </section>

    <!-- Event Gallery Section -->
    <section class="events">

        <div class="event-gallery">

            <div class="card1">
                <img src="./assets/casual-dinning.jpg" alt="Wedding Event">
                <div class="content">
                    <h3>Indoor Dining</h3>
                    <p>
                        Step into a world of elegance and flavor in our ambient indoor dining spaces.

                        dining hall features soft lighting, plush seating, and attentive service.

                    </p>

                    <div class="button-wrapper">
                        <button class="details-btn">
                            <i class="fas fa-calendar-check"></i><a href="./dinning_booking_form.php">Book The Dinning</a>
                        </button>
                    </div>
                </div>

            </div>

            <div class="card2">
                <div class="content">
                    <h3>Outdoor Dining</h3>
                    <p>
                        Enjoy al fresco dining surrounded by nature, under twinkling fairy lights
                        and starry skies. Whether it’s a breezy breakfast or a candlelight dinner,
                        our outdoor setup offers a peaceful retreat away from the city rush.
                    </p>
                    <div class="button-wrapper">
                        <button class="details-btn">
                            <i class="fas fa-calendar-check"></i><a href="./dinning_booking_form.php">Book The Dinning</a>
                        </button>
                    </div>
                </div>
                <img src="./assets/rooftop-dinning.jpg" alt="Birthday Event">

            </div>

            <div class="card3">
                <img src="./assets/buffet-style-dinning.jpg" alt="engagement Event">
                <div class="content">
                    <h3>Buffet Style Dining</h3>
                    <p>
                        Indulge in a grand buffet that brings together global cuisines under one roof.
                        Our buffet spreads include Indian, Continental, Asian, and live dessert counters.
                        Ideal for families, parties, and business groups.
                    </p>
                    <div class="button-wrapper">
                        <button class="details-btn">
                            <i class="fas fa-calendar-check"></i><a href="./dinning_booking_form.php">Book The Dinning</a>
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