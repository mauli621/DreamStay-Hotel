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
        <div class="rooms-img">
            <img src="./assets/rooms_bg.jpg" class="rooms">
        </div>
        <div class="inner-text">
            <h1 class="tagline">Rest , Relax , Repeat</h1>
            <h1 class="tagline">Our Rooms that Redefine Comfort</h1>
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
            <div class="price-tag">Rs. 1,600<span class="text-sm"> / night</span></div>

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
                    <p class="desc"> Features two single beds, perfect for friends or colleagues sharing a room.</p>
                    <p class="bed-type"><Strong>Bed-Type : </Strong>2 single Beds</p>
                    <p class="max-occupancy"><Strong>Max-Occupancy : </Strong>2 adults</p>
                </div>

                <div class="amenities">

                    <P class="amenities Title"><strong>Amenities : </strong>

                    <div class="item"><i class="fas fa-wifi"></i><span>Free WiFi</span></div>
                    <div class="item"><i class="fas fa-coffee"></i><span>Breakfast included</span></div>

                    <div class="item"><i class="fas fa-laptop"></i><span>Work Desk</span></div>
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
            <div class="price-tag">Rs. 1,700<span class="text-sm"> / night</span></div>

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
                    <p class="desc"> A cozy room with double bed and modern interior for a pleasant stay.</p>
                    <p class="bed-type"><Strong>Bed-Type : </Strong>Double Bed</p>
                    <p class="max-occupancy"><Strong>Max-Occupancy : </Strong>2 adults</p>
                </div>

                <div class="amenities">
                    <P class="amenities Title"><strong>Amenities : </strong>
                    <div class="item"><i class="fas fa-wifi"></i><span>Free WiFi</span></div>
                    <div class="item"><i class="fas fa-coffee"></i><span>Breakfast included</span></div>
                    <div class="item"><i class="fas fa-tv"></i><span>TV</span></div>

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
            <div class="price-tag">Rs. 2,200<span class="text-sm"> / night</span></div>

            <div class="content">
                <div class="header">
                    <h2 class="title">Delux Double Room</h2>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>

                        <span style="color:#6b7280; margin-left: 4px;">4</span>
                    </div>
                    <p class="desc"> Spacious room with upgraded features for extra comfort and relaxation.</p>
                    <p class="bed-type"><Strong>Bed-Type : </Strong>Queen Bed</p>
                    <p class="max-occupancy"><Strong>Max-Occupancy : </Strong>2 adults</p>
                </div>

                <div class="amenities">
                    <P class="amenities Title"><strong>Amenities : </strong>
                    <div class="item"><i class="fas fa-wifi"></i><span>Free WiFi</span></div>
                    <div class="item"><i class="fas fa-coffee"></i><span>Breakfast included</span></div>
                    <div class="item"><i class="fas fa-tv"></i><span>TV</span></div>

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
            <div class="price-tag">Rs. 2,500<span class="text-sm"> / night</span></div>

            <div class="content">
                <div class="header">
                    <h2 class="title">Tripple Room</h2>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>

                        <i class="fas fa-star-half-alt"></i>
                        <span style="color:#6b7280; margin-left: 4px;">3</span>
                    </div>
                    <p class="desc">A spacious room with one double and one single bed, ideal for three guests.</p>
                    <p class="bed-type"><Strong>Bed-Type : </Strong>3 Single Beds</p>
                    <p class="max-occupancy"><Strong>Max-Occupancy : </Strong>3 adults</p>
                </div>

                <div class="amenities">
                    <P class="amenities Title"><strong>Amenities : </strong>
                    <div class="item"><i class="fas fa-wifi"></i><span>Free WiFi</span></div>
                    <div class="item"><i class="fas fa-coffee"></i><span>Breakfast included</span></div>
                    <div class="item"><i class="fas fa-tv"></i>TV</div>
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
            <div class="price-tag">Rs. 1,200<span class="text-sm"> / night</span></div>

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
                    <p class="desc">Budget-friendly compact room with essential amenities for a short stay.</p>
                    <p class="bed-type"><Strong>Bed-Type : </Strong>Double Bed</p>
                    <p class="max-occupancy"><Strong>Max-Occupancy : </Strong>2 adults</p>
                </div>

                <div class="amenities">
                    <P class="amenities Title"><strong>Amenities : </strong>
                    <div class="item"><i class="fas fa-wifi"></i><span>Free WiFi</span></div>
                    <div class="item"><i class="fas fa-fan"></i><span>Fan</span></div>
                    <div class="item"><i class="fas fa-tv"></i><span>TV</span></div>
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
            <div class="price-tag">Rs. 2,000<span class="text-sm"> /night </span></div>

            <div class="content">
                <div class="header">
                    <h2 class="title">Studio Room</h2>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <span style="color:#6b7280; margin-left: 4px;">4</span>
                    </div>

                    <p class="desc">A comfortable room with a small kitchen area, perfect for extended stays.</p>
                    <p class="bed-type"><Strong>Bed-Type : </Strong>Double Bed</p>
                    <p class="max-occupancy"><Strong>Max-Occupancy : </Strong>2 adults</p>
                </div>

                <div class="amenities">
                    <P class="amenities Title"><strong>Amenities : </strong>
                    <div class="item"><i class="fa-solid fa-kitchen-set"></i><span>Kitchenette</span></div>
                    <div class="item"><i class="fas fa-wifi"></i><span>Free WiFi</span></div>
                    <div class="item"><i class="fas fa-laptop"></i><span>Work Desk</span></div>
                    <div class="item"><i class="fas fa-tv"></i><span>TV</span></div>
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
            <div class="price-tag">Rs. 2,400<span class="text-sm"> / night</span></div>

            <div class="content">
                <div class="header">
                    <h2 class="title">Superior Room</h2>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>

                        <span style="color:#6b7280; margin-left: 4px;">4</span>
                    </div>
                    <p class="desc">A larger room with added comfort and a cozy seating area.</p>
                    <p class="bed-type"><Strong>Bed-Type : </Strong>Queen Bed</p>
                    <p class="max-occupancy"><Strong>Max-Occupancy : </Strong>2 adults</p>
                </div>

                <div class="amenities">
                    <P class="amenities Title"><strong>Amenities : </strong>
                    <div class="item"><i class="fas fa-wifi"></i><span>Free WiFi</span></div>
                    <div class="item"><i class="fas fa-coffee"></i><span>Breakfast included</span></div>
                    <div class="item"><i class="fas fa-tv"></i><span>TV</span></div>
                    <div class="item"><i class="fas fa-fan"></i><span>Air Conditioning</span></div>
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
            <div class="price-tag">Rs. 2,700<span class="text-sm"> / night</span></div>

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
                    <p class="desc">Designed for families, this room has ample space and comfort for up to 4 people.</p>
                    <p class="bed-type"><Strong>Bed-Type : </Strong>2 Double + 3 single Beds</p>
                    <p class="max-occupancy"><Strong>Max-Occupancy : </Strong>5 Guests</p>
                </div>

                <div class="amenities">
                    <P class="amenities Title"><strong>Amenities : </strong>
                    <div class="item"><i class="fas fa-wifi"></i><span>Free WiFi</span></div>
                    <div class="item"><i class="fas fa-coffee"></i><span>Breakfast included</span></div>
                    <div class="item"><i class="fas fa-tv"></i><span>TV</span></div>
                    <div class="item"><i class="fas fa-fan"></i><span>Air Conditioning</span></div>
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