<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DreamStay - Rest Relax Repeat</title>
    <link rel="stylesheet" href="./css/rooms.css" />
    <style>
        .our-rooms {
            font-size: 40px;
            width: 350px;
            padding: 10px;
            margin: 50px auto;
            color: #003580;
            text-align: center;
            transition: all 0.3s ease;
        }

        .our-rooms:hover {
            cursor: pointer;
            border-bottom: 3px solid #003580;
            transform: scale(1.05);
        }

        .roomcards {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 70px;
            padding: 20px;
            background-color: #f8f9fa;
        }


        .explore-button {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 30px;
        }

        .explore-button button {
            color: white;
            font-weight: 500;
            padding: 12px 40px;
            border-radius: 9999px;
            border: none;
            cursor: pointer;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background: linear-gradient(135deg, #003580, #0057b7);
        }

        .explore-button button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 87, 183, 0.4);
        }

        .explore-button button a {
            color: white;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <h1 class="our-rooms">Our Rooms</h1>
    <div class="roomcards">
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
    </div>
    <div class="explore-button">
        <button type="submit"><a href="rooms.php">Explore Now </a></button>
    </div>
</body>

</html>