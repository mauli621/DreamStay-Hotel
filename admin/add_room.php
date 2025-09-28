<?php include 'sidebar.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>DreamStay - Admin Panel</title>
    <link rel="icon" type="image/gif" href="./assets/logo.jpg">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/add_room.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            color: white;
            margin: 5px;
            transition: background 0.3s ease;
            text-decoration: none;
            background-color: gray;
            width: 120px;
        }

        .btn.delete {
            background-color: #dc3545;
        }

        .btn.update {
            background-color: green;
        }

        .modal {
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: #fff;
            margin: 5% auto;
            padding: 20px;
            border-radius: 10px;
            width: 80%;
            max-width: 600px;
            position: relative;
        }

        .close {
            position: absolute;
            right: 20px;
            top: 10px;
            font-size: 30px;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="main-content">
        <!-- ==================== Add Room Form ==================== -->
        <header>
            <h1>Add New Room</h1>
        </header>

        <form action="./db/save_room.php" method="POST" enctype="multipart/form-data">
            <h2>Room Details</h2>

            <div class="form-row">
                <div class="form-group">
                    <label for="photo">Room Photo</label>
                    <input type="file" name="photo" id="photo" required>
                </div>

                <div class="form-group">
                    <label for="name">Room Name</label>
                    <input type="text" name="name" id="name" placeholder="e.g. Deluxe Suite" required>
                </div>

                <div class="form-group">
                    <label for="bedType">Bed Type</label>
                    <input type="text" name="bedType" id="bedType" placeholder="e.g. double bed" required>
                </div>
            </div>

            <div class="form-row">
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
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="members">Max Occupancy</label>
                    <input type="number" name="members" id="members" placeholder="e.g. 4" required>
                </div>

                <div class="form-group">
                    <label for="description">Room Description</label>
                    <textarea name="description" id="description" rows="4" placeholder="Write room details..." required></textarea>
                </div>
            </div>

            <button type="submit"><i class="fa-solid fa-plus"></i> Add Room</button>
        </form>

        <!-- ==================== Room List Table ==================== -->
        <header>
            <h1>Total Rooms</h1>
        </header>

        <section class="recent">
            <table>
                <thead>
                    <tr>
                        <th>Room Name</th>
                        <th>Bed Type</th>
                        <th>Price (₹)</th>
                        <th>Rating</th>
                        <th>Amenities</th>
                        <th>Max Occupancy</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $conn = new mysqli("localhost", "root", "", "hotel");
                    $result = $conn->query("SELECT * FROM rooms ORDER BY id DESC");

                    while ($row = $result->fetch_assoc()):
                    ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['name']); ?></td>
                            <td><?php echo htmlspecialchars($row['bed_type']); ?></td>
                            <td>₹<?php echo $row['price']; ?></td>
                            <td><?php echo $row['rating']; ?> <?php echo str_repeat('★', $row['rating']); ?></td>
                            <td><?php echo htmlspecialchars($row['amenities']); ?></td>
                            <td><?php echo $row['members']; ?></td>
                            <td><?php echo htmlspecialchars($row['description']); ?></td>
                            <td>
                                <a href="#" class="btn update" onclick='openUpdateModal(<?php echo json_encode($row); ?>)'>
                                    <i class="fa-solid fa-pen-to-square"></i> Update
                                </a>
                                <a href="./db/delete_room.php?id=<?php echo $row['id']; ?>" class="btn delete" onclick="return confirm('Are you sure you want to delete this room?');">
                                    <i class="fa-solid fa-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </section>
    </div>

    <!-- ==================== Update Room Modal ==================== -->
    <div id="updateModal" class="modal" style="display:none;">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Update Room</h2>
            <form id="updateForm" action="./db/update_room.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" id="update_id">

                <div class="modal-form-row">
                    <div class="form-group">
                        <label>Room Name:</label>
                        <input type="text" name="name" id="update_name" required>
                    </div>
                    <div class="form-group">
                        <label>Bed Type:</label>
                        <input type="text" name="bedType" id="update_bedType" required>
                    </div>
                </div>

                <div class="modal-form-row">
                    <div class="form-group">
                        <label>Price:</label>
                        <input type="number" name="price" id="update_price" required>
                    </div>
                    <div class="form-group">
                        <label>Rating:</label>
                        <select name="rating" id="update_rating" required>
                            <option value="1">1 ★</option>
                            <option value="2">2 ★★</option>
                            <option value="3">3 ★★★</option>
                            <option value="4">4 ★★★★</option>
                            <option value="5">5 ★★★★★</option>
                        </select>
                    </div>
                </div>

                <div class="modal-form-row">
                    <div class="form-group">
                        <label>Amenities:</label>
                        <input type="text" name="amenities" id="update_amenities" required>
                    </div>
                    <div class="form-group">
                        <label>Max Occupancy:</label>
                        <input type="number" name="members" id="update_members" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>Description:</label>
                    <textarea name="description" id="update_description" rows="3" required></textarea>
                </div>

                <div class="form-group">
                    <label>Change Photo (optional):</label>
                    <input type="file" name="photo">
                </div>

                <button type="submit">Update Room</button>
            </form>
        </div>
    </div>

    <!-- ==================== JavaScript ==================== -->
    <script>
        function openUpdateModal(room) {
            document.getElementById('update_id').value = room.id;
            document.getElementById('update_name').value = room.name;
            document.getElementById('update_bedType').value = room.bed_type;
            document.getElementById('update_price').value = room.price;
            document.getElementById('update_rating').value = room.rating;
            document.getElementById('update_amenities').value = room.amenities;
            document.getElementById('update_members').value = room.members;
            document.getElementById('update_description').value = room.description;

            document.getElementById('updateModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('updateModal').style.display = 'none';
        }

        window.onclick = function (event) {
            if (event.target == document.getElementById('updateModal')) {
                closeModal();
            }
        }
    </script>
</body>

</html>
