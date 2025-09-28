<?php
session_start();
$conn = new mysqli("localhost", "root", "", "hotel");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DreamStay - Rest Relax Repeat</title>
    <link rel="icon" type="image/gif" href="./assets/logo.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="./css/rooms.css">
</head>

<body>
    <?php
    include 'header.php';
    include 'form.php';
    ?>

    <section>
        <div class="rooms-img">
            <img src="./assets/6-economy_double_room.jpg" class="rooms">
        </div>
        <div class="inner-text">
            <h1 class="tagline">Rest , Relax , Repeat</h1>
            <h1 class="tagline">Our Rooms that Redefine Comfort</h1>
        </div>
    </section>
    <h1 class="room-heading">Our Rooms</h1>
    <div class="rooms-list">
        <?php
        $conn = new mysqli("localhost", "root", "", "hotel");
        $result = $conn->query("SELECT * FROM rooms ORDER BY id ASC");

        while ($row = $result->fetch_assoc()):
        ?>
            <div class="hotel-card">
                <input type="hidden" name="room_id" id="roomId">
                <h3 id="roomTitle"></h3>

                <img src="assets/<?php echo $row['photo']; ?>" alt="<?php echo htmlspecialchars($row['name']); ?>" class="room-image" />
                <div class="price-tag">₹<?php echo $row['price']; ?><span class="text-sm"> / Night</span></div>

                <div class="content">
                    <div class="header">
                        <h2 class="title"><?php echo htmlspecialchars($row['name']); ?></h2>

                        <div class="rating">
                            <?php
                            for ($i = 0; $i < floor($row['rating']); $i++) {
                                echo '<i class="fas fa-star"></i>';
                            }
                            if ($row['rating'] - floor($row['rating']) >= 0.5) {
                                echo '<i class="fas fa-star-half-alt"></i>';
                            }
                            ?>
                            <span style="color:#6b7280; margin-left: 4px;"><?php echo $row['rating']; ?></span>
                        </div>

                        <p class="desc"><?php echo htmlspecialchars($row['description']); ?></p>
                        <p class="bed-type"><strong>Bed-Type : </strong><?php echo htmlspecialchars($row['bed_type']); ?></p>
                        <p class="max-occupancy"><strong>Max-Occupancy : </strong><?php echo $row['members']; ?> adults</p>
                    </div>

                    <div class="amenities">
                        <p class="amenities Title"><strong>Amenities : </strong></p>
                        <?php
                        $amenities = explode(',', $row['amenities']);
                        foreach ($amenities as $amenity):
                            $amenity = trim(strtolower($amenity));
                            echo '<div class="item"><i class="fas fa-check-circle"></i><span> ' . ucfirst($amenity) . '</span></div>';
                        endforeach;
                        ?>
                    </div>
                    <button class="details-btn open-popup"
                        data-room-id="<?php echo $row['id']; ?>"
                        data-room-name="<?php echo htmlspecialchars($row['name']); ?>">
                        <i class="fas fa-calendar-check"></i>Book Now
                    </button>

                </div>
            </div>
        <?php endwhile; ?>
    </div>
    <div class="popup-overlay" id="popupOverlay">
        <div class="popup-form">
            <?php include './room_booking_for.php'; ?>
            <button class="close-popup"><i class="fas fa-times"></i></button>
        </div>
    </div>


    <?php
    include 'footer.php';
    ?>
    <script>
        const openBtns = document.querySelectorAll('.open-popup');
        const popup = document.getElementById('popupOverlay');
        const closeBtn = document.querySelector('.close-popup');

        const roomIdField = document.getElementById('roomId');
        const roomTitle = document.getElementById('roomTitle');

        openBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const roomId = btn.getAttribute('data-room-id');
                const roomName = btn.getAttribute('data-room-name');

                roomIdField.value = roomId;
                roomTitle.innerText = roomName;

                popup.style.display = 'flex';
            });
        });

        if (closeBtn) {
            closeBtn.addEventListener('click', () => {
                popup.style.display = 'none';
            });
        }

        window.addEventListener('click', (e) => {
            if (e.target === popup) {
                popup.style.display = 'none';
            }
        });
    </script>



</body>

</html>