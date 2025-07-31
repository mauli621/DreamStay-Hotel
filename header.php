<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DreamStay - Rest Relax Repeat</title>
    <link rel="icon" type="image/gif" href="./assets/logo.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="./css/header.css" />
</head>

<body>
    <header>
        <div class="header-container">
            <div class="brand">
                <img src="./assets/logo.jpg" alt="">
            </div>
            <div class="heading">
                <h1>DreamStay</h1>
                <h3>Rest Relax Repeat</h3>
            </div>

            <nav class="navbar">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="rooms.php">Our Rooms</a></li>
                    <!-- <li><a href="#">Services<sup>NEW</sup></a></li> -->
                    <li class="dropdown">
                        <a href="#" id="servicesDropdownBtn">Services<sup>NEW</sup></a>
                        <div class="dropdown-content" id="servicesDropdownContent">
                            <a href="./dinning.php">Dining</a>
                            <a href="./event.php">Events</a>
                            <a href="./meeting.php">Meetings</a>
                        </div>
                    </li>
                    <li><a href="contact_us.php">Contact Us</a></li>
                </ul>
            </nav>

            <div class="search">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Search Rooms">
            </div>

            <div class="btn">
                <button id="loginBtn">Login</button>
                <button><a href="./user_bookings.php">Booking</a></button>
            </div>
        </div>
    </header>

    </form>
    <script src="./javascript/script.js"></script>
</body>

</html>