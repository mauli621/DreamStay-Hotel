<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Rooms</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="./css/rooms.css">
</head>

<body>
    <?php
    include 'header.php';
    ?>

    <section>
        <img src="./assets/rooms_bg.jpg" alt="Rooms Hero Image" class="img">
        <div class="inner-text">
            <h1 class="tagline">Rest, Relax, Repeat</h1>
            <h1 class="tagline">Our Rooms That Redefine Comfort</h1> 
        <button class="hero-btn"><a href="rooms.php">Book Now</a></button>
        <button class="hero-btn"><a href="about.php">About us</a></button>
        </div>
    </section>

    <div class="rooms-list ">
        <!--room-1-->

        <div class="hotel-card">
            <img src="./assets/1-standard_queen_room.jpg" alt="Standard Queen Room" class="room-image" />
            <div class="price-tag">Rs. 1500<span class="text-sm"> / Night</span></div>

            <div class="content">
                <div class="header">
                    <h2 class="title">Standard Queen Room</h2>

                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <span style="color:#6b7280; margin-left: 4px;">4.7</span>
                    </div>
                    <p class="desc">A simple and clean room with a queen-size bed,ideal for solo travelers or couples.</p>
                    <p class="bed-type"><Strong>Bed-Type : </Strong>Queen Bed</p>
                    <p class="max-occupancy"><Strong>Max-Occupancy : </Strong>2 adults</p>
                </div>

                <div class="amenities">
                    <P class="amenities Title"><strong>Amenities : </strong>

                    <div class="item"><i class="fas fa-wifi"></i><span>Free WiFi</span></div>
                    <div class="item"><i class="fas fa-coffee"></i><span>Breakfast included</span></div>
                    <div class="item"><i class="fas fa-swimming-pool"></i><span>Pool access</span></div>

                    </P>

                </div>

                <div class="button-wrapper">
                    <button class="details-btn">
                        <i class="fas fa-calendar-check"></i>Book Now
                    </button>
                </div>
            </div>
        </div>

        <!--room-2-->

        <div class="hotel-card">
            <img src="./assets/2-standard_twin_room.jpg" alt="Standard Twin Room" class="room-image" />
            <div class="price-tag">$289<span class="text-sm">/night</span></div>

            <div class="content">
                <div class="header">
                    <h2 class="title">Standard Twin Room</h2>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <span style="color:#6b7280; margin-left: 4px;">4.7</span>
                    </div>
                </div>

                <div class="amenities">
                    <div class="item"><i class="fas fa-wifi"></i><span>Free WiFi</span></div>
                    <div class="item"><i class="fas fa-coffee"></i><span>Breakfast included</span></div>
                    <div class="item"><i class="fas fa-swimming-pool"></i><span>Pool access</span></div>
                </div>

                <div class="button-wrapper">
                    <button class="details-btn">
                        <i class="fas fa-calendar-check"></i>Book Now
                    </button>
                </div>
            </div>
        </div>

        <!--room-3-->

        <div class="hotel-card">
            <img src="./assets/3-comfort_double_room.jpg" alt="comfort double Room" class="room-image" />
            <div class="price-tag">$289<span class="text-sm">/night</span></div>

            <div class="content">
                <div class="header">
                    <h2 class="title">Comfort Double Room</h2>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <span style="color:#6b7280; margin-left: 4px;">4.7</span>
                    </div>
                </div>

                <div class="amenities">
                    <div class="item"><i class="fas fa-wifi"></i><span>Free WiFi</span></div>
                    <div class="item"><i class="fas fa-coffee"></i><span>Breakfast included</span></div>
                    <div class="item"><i class="fas fa-swimming-pool"></i><span>Pool access</span></div>
                </div>

                <div class="button-wrapper">
                    <button class="details-btn">
                        <i class="fas fa-calendar-check"></i>Book Now
                    </button>
                </div>
            </div>
        </div>

        <!--room-4-->

        <div class="hotel-card">
            <img src="./assets/4-delux_double_room.jpg" alt="Delux double Room" class="room-image" />
            <div class="price-tag">$289<span class="text-sm">/night</span></div>

            <div class="content">
                <div class="header">
                    <h2 class="title">Delux Double Room</h2>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <span style="color:#6b7280; margin-left: 4px;">4.7</span>
                    </div>
                </div>

                <div class="amenities">
                    <div class="item"><i class="fas fa-wifi"></i><span>Free WiFi</span></div>
                    <div class="item"><i class="fas fa-coffee"></i><span>Breakfast included</span></div>
                    <div class="item"><i class="fas fa-swimming-pool"></i><span>Pool access</span></div>
                </div>

                <div class="button-wrapper">
                    <button class="details-btn">
                        <i class="fas fa-calendar-check"></i>Book Now
                    </button>
                </div>
            </div>
        </div>

        <!--room-5-->

        <div class="hotel-card">
            <img src="./assets/5-tripple_room.jpg" alt="Tripple Room" class="room-image" />
            <div class="price-tag">$289<span class="text-sm">/night</span></div>

            <div class="content">
                <div class="header">
                    <h2 class="title">Tripple Room</h2>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <span style="color:#6b7280; margin-left: 4px;">4.7</span>
                    </div>
                </div>

                <div class="amenities">
                    <div class="item"><i class="fas fa-wifi"></i><span>Free WiFi</span></div>
                    <div class="item"><i class="fas fa-coffee"></i><span>Breakfast included</span></div>
                    <div class="item"><i class="fas fa-swimming-pool"></i><span>Pool access</span></div>
                </div>

                <div class="button-wrapper">
                    <button class="details-btn">
                        <i class="fas fa-calendar-check"></i>Book Now
                    </button>
                </div>
            </div>
        </div>

        <!--room-6-->

        <div class="hotel-card">
            <img src="./assets/6-economy_double_room.jpg" alt="Economy Double Room" class="room-image" />
            <div class="price-tag">$289<span class="text-sm">/night</span></div>

            <div class="content">
                <div class="header">
                    <h2 class="title">Economy Double Room</h2>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <span style="color:#6b7280; margin-left: 4px;">4.7</span>
                    </div>
                </div>

                <div class="amenities">
                    <div class="item"><i class="fas fa-wifi"></i><span>Free WiFi</span></div>
                    <div class="item"><i class="fas fa-coffee"></i><span>Breakfast included</span></div>
                    <div class="item"><i class="fas fa-swimming-pool"></i><span>Pool access</span></div>
                </div>

                <div class="button-wrapper">
                    <button class="details-btn">
                        <i class="fas fa-calendar-check"></i>Book Now
                    </button>
                </div>
            </div>
        </div>

        <!--room-7-->

        <div class="hotel-card">
            <img src="./assets/7-studio_room.jpeg" alt="Studio Room" class="room-image" />
            <div class="price-tag">$289<span class="text-sm">/night</span></div>

            <div class="content">
                <div class="header">
                    <h2 class="title">Studio Room</h2>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <span style="color:#6b7280; margin-left: 4px;">4.7</span>
                    </div>
                </div>

                <div class="amenities">
                    <div class="item"><i class="fas fa-wifi"></i><span>Free WiFi</span></div>
                    <div class="item"><i class="fas fa-coffee"></i><span>Breakfast included</span></div>
                    <div class="item"><i class="fas fa-swimming-pool"></i><span>Pool access</span></div>
                </div>

                <div class="button-wrapper">
                    <button class="details-btn">
                        <i class="fas fa-calendar-check"></i>Book Now
                    </button>
                </div>
            </div>
        </div>

        <!--room-8-->

        <div class="hotel-card">
            <img src="./assets/8-superior_room.jpg" alt="Superior Room" class="room-image" />
            <div class="price-tag">$289<span class="text-sm">/night</span></div>

            <div class="content">
                <div class="header">
                    <h2 class="title">Superior Room</h2>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <span style="color:#6b7280; margin-left: 4px;">4.7</span>
                    </div>
                </div>

                <div class="amenities">
                    <div class="item"><i class="fas fa-wifi"></i><span>Free WiFi</span></div>
                    <div class="item"><i class="fas fa-coffee"></i><span>Breakfast included</span></div>
                    <div class="item"><i class="fas fa-swimming-pool"></i><span>Pool access</span></div>
                </div>

                <div class="button-wrapper">
                    <button class="details-btn">
                        <i class="fas fa-calendar-check"></i>Book Now
                    </button>
                </div>
            </div>
        </div>

        <!--room-9-->

        <div class="hotel-card">
            <img src="./assets/10-family_room.jpg" alt="Family Room" class="room-image" />
            <div class="price-tag">$289<span class="text-sm">/night</span></div>

            <div class="content">
                <div class="header">
                    <h2 class="title">Family Room</h2>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <span style="color:#6b7280; margin-left: 4px;">4.7</span>
                    </div>
                </div>

                <div class="amenities">
                    <div class="item"><i class="fas fa-wifi"></i><span>Free WiFi</span></div>
                    <div class="item"><i class="fas fa-coffee"></i><span>Breakfast included</span></div>
                    <div class="item"><i class="fas fa-swimming-pool"></i><span>Pool access</span></div>
                </div>

                <div class="button-wrapper">
                    <button class="details-btn">
                        <i class="fas fa-calendar-check"></i>Book Now
                    </button>
                </div>
            </div>
        </div>


    </div>

    <?php
    include 'footer.php';
    ?>
</body>

</html>