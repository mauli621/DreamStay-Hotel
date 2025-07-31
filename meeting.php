<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Meeting</title>
    <link rel="stylesheet" href="./css/services.css" />
</head>

<body>
    <?php
    include "./header.php";
    include 'form.php';
    ?>

    <!-- Hero Section -->
    <section class="hero">
        <img src="./assets/meeting_bg.jpg" class="hero-image">
        <div class="hero-content">
            <h1>Professional Meeting Solutions</h1>
            <h4>Choose from flexible layouts that suit your event needs</h4>
        </div>
    </section>

    <!-- Event Gallery Section -->
    <section class="events">

        <div class="event-gallery">

            <div class="card1">
                <img src="./assets/board-room-style-meeting.jpg" alt="Wedding Event">
                <div class="content">
                    <h3>Boardroom Style Meeting</h3>
                    <p>
                        Ideal for executive meetings and formal discussions. Our boardroom setup provides a professional environment for focused conversations and decision-making.

                    </p>

                    <div class="button-wrapper">
                        <button class="details-btn">
                            <i class="fas fa-calendar-check"></i><a href="./Meeting_booking_form.php">Book The Meeting</a>
                        </button>
                    </div>
                </div>

            </div>

            <div class="card2">
                <div class="content">
                    <h3>Theater Style Meeting</h3>
                    <p>Designed for presentations, seminars, and lectures. Our theater-style arrangement maximizes seating while maintaining clear visibility of the speaker or screen.
                    </p>

                    <div class="button-wrapper">
                        <button class="details-btn">
                            <i class="fas fa-calendar-check"></i><a href="./Meeting_booking_form.php">Book The Meeting</a>
                        </button>
                    </div>
                </div>
                <img src="./assets/theater-style-meeting.jpg" alt="Birthday Event">

            </div>

            <div class="card3">
                <img src="./assets/banquet-style-meeting.jpg" alt="engagement Event">
                <div class="content">
                    <h3>Banquet Style Meeting</h3>
                    <p>
                        Perfect for group discussions and dining events. Our banquet-style setup offers round-table arrangements, ideal for collaborative and social meetings.
                    </p>

                    <div class="button-wrapper">
                        <button class="details-btn">
                            <i class="fas fa-calendar-check"></i><a href="./Meeting_booking_form.php">Book The Meeting</a>
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