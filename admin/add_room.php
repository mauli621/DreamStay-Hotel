<?php
include 'sidebar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Room - Admin</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
        <?php
         include 'sidebar.php'
         ?>
    <div class="main-content">
        <header>
            <h1>Add New Room</h1>
        </header>

        <form action="save_room.php" method="POST" enctype="multipart/form-data">
            <h2>Room Details</h2>

            <div class="form-group">
                <label for="photo">Room Photo</label>
                <input type="file" name="photo" id="photo" required>
            </div>

            <div class="form-group">
                <label for="name">Room Name</label>
                <input type="text" name="name" id="name" placeholder="e.g. Deluxe Suite" required>
            </div>

            <div class="form-group">
                <label for="price">Price (₹)</label>
                <input type="number" name="price" id="price" placeholder="e.g. 5000" required>
            </div>

            <div class="form-group">
                <label for="rating">Rating (1 to 5)</label>
                <select name="rating" id="rating" required>
                    <option value="">Select Rating</option>
                    <option value="1">1 ★</option>
                    <option value="2">2 ★★</option>
                    <option value="3">3 ★★★</option>
                    <option value="4">4 ★★★★</option>
                    <option value="5">5 ★★★★★</option>
                </select>
            </div>

            <div class="form-group">
                <label for="amenities">Amenities</label>
                <input type="text" name="amenities" id="amenities" placeholder="e.g. AC, WiFi, TV, Mini Fridge" required>
            </div>

            <div class="form-group">
                <label for="members">Number of Members</label>
                <input type="number" name="members" id="members" placeholder="e.g. 4" required>
            </div>

            <div class="form-group">
                <label for="description">Room Description</label>
                <textarea name="description" id="description" rows="4" placeholder="Write room details..." required></textarea>
            </div>

            <button type="submit">Add Room</button>
        </form>
    </div>
</body>

</html>
