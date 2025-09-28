<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DreamStay - Rest Relax Repeat</title>
    <link rel="stylesheet" href="./css/contact_us.css">
    <link rel="icon" type="image/gif" href="./assets/logo.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>


<body>
    <?php
    include 'header.php';
    ?>
    <?php include "form.php"; ?>


    <section>
        <div class="contact-img">
            <img src="./assets/7-studio_room.jpeg" class="contact" />
        </div>
        <div class="inner-text">
            <h1 class="heading">We're Here To Help !</h1>
            <h1 class="heading">Have questions? Reach out to us below.</h1>
        </div>
    </section>

    <div class="contact-para">
        <ul>
            <li class="para">

                <p class="c-tagline">We’re here to help you make your stay unforgettable.</p><br>
                <p class="c-para">Whether you have questions about room availability, event bookings, dining experiences, or any other services, our team is just a message away. Fill out the form below or reach out using the contact details provided — we’ll get back to you as soon as possible. Your comfort and satisfaction are our top priorities.</p><br>
                <p>Our team is just a message away. Fill out the form below or reach out using the <br>contact details provided — we’ll get back to you as soon as possible.</p>

            </li>
            <li class="contact-video">
                <img src="./assets/bg_image.jpg">
            </li>
        </ul>
    </div>


    <div class="contact-form">
        <!--map-->
        <div class="m-heading">
            <p>Where to Find Us</p>
        </div>

        <div class="map-container">

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3577.3875716321318!2d73.00649048037636!3d26.281532917799947!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39418d4c9edb86d3%3A0xc438c463967d4b82!2sHotel%20Dream%20Stay!5e0!3m2!1sen!2sin!4v1752295246203!5m2!1sen!2sin" width="800" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

            <div class="contact-info">
                <p class="heading1">Contact-info</p>
                <h3><i class="fas fa-phone"></i> Phone</h3>
                <p>+91 98765 43210</p>
                <h3><i class="fas fa-envelope"></i> Email</h3>
                <p>info@dreamstay.com</p>
                <h3><i class="fas fa-map-marker-alt"></i> Address</h3>
                <p>Jodhpur, Rajsthan</p>
            </div>
        </div>
        <!--contact form-->
        <div class="heading">
            <p>Let's connect</p>
        </div>
        <div class="c-wrap">
            <div class="wrapper">
                <form action="admin/db/submit_inquiry.php" method="POST">
                    <div class="input-field">
                        <input type="text" name="text" placeholder="Your Name" required>
                    </div>
                    <div class="input-field">
                        <input type="email" name="email" placeholder="Your Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                    </div>

                    <div class="input-field">
                        <input type="text" name="subject" placeholder="Subject" required>
                    </div>

                    <textarea placeholder="Your Message" rows="6" name="message" required></textarea>
                    <button type="submit" class="primary-btn">Send Message</button>

                </form>
            </div>
        </div>


    </div>

    <?php
    include 'footer.php';
    ?>
</body>

</html>