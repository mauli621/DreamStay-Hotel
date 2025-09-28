<?php
include "sidebar.php";
$conn = new mysqli("localhost", "root", "", "hotel");

// ============= ADD SERVICE =============
if (isset($_POST['submit'])) {
    $type = $_POST['type'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $rating = $_POST['rating'];
    $location = $_POST['location'];
    $price = $_POST['price'];
    $amenities = $_POST['amenities'];

    // Image Upload
    $target_dir = "uploads/";
    $image_name = time() . "_" . basename($_FILES["image"]["name"]);
    $target_file = $target_dir . $image_name;
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    // Save to DB
    $sql = "INSERT INTO services (type, title, description, rating, location, price, amenities, image) 
            VALUES ('$type', '$title', '$description', '$rating', '$location', '$price', '$amenities', '$image_name')";
    $conn->query($sql);

    echo "<script>alert('Service Added Successfully!'); window.location.href='add_service.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>DreamStay - Admin Panel</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/add_service.css">
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
            width: 120px;
            text-align: center;
        }

        .btn.update {
            background-color: green;
        }

        .btn.delete {
            background-color: #dc3545;
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
        <!-- ==================== Add Service Form ==================== -->
        <header>
            <h1>Add New Service</h1>
        </header>

        <form action="add_service.php" method="POST" enctype="multipart/form-data">
            <h2>Service Details</h2>

            <div class="form-row">
                <div class="form-group">
                    <label>Service Photo</label>
                    <input type="file" name="image" required>
                </div>

                <div class="form-group">
                    <label>Service Type</label>
                    <select name="type" required>
                        <option value="">Select Type</option>
                        <option value="meeting">Meeting</option>
                        <option value="dining">Dining</option>
                        <option value="event">Event</option>
                    </select>
                </div> 

                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" placeholder="e.g. Conference Hall" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Rating</label>
                    <select name="rating" required>
                        <option value="">Select Rating</option>
                        <option value="1">1 ★</option>
                        <option value="2">2 ★★</option>
                        <option value="3">3 ★★★</option>
                        <option value="4">4 ★★★★</option>
                        <option value="5">5 ★★★★★</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Location</label>
                    <input type="text" name="location" placeholder="e.g. Ground Floor">
                </div>

                <div class="form-group">
                    <label>Price (₹)</label>
                    <input type="number" name="price" placeholder="e.g. 2000">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Amenities</label>
                    <input type="text" name="amenities" placeholder="e.g. WiFi, Projector, AC">
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" rows="3" placeholder="Write service details..."></textarea>
                </div>
            </div>

            <button type="submit" name="submit"><i class="fa-solid fa-plus"></i> Add Service</button>
        </form>

        <!-- ==================== Services Table ==================== -->
        <header>
            <h1>Total Services</h1>
        </header>

        <section class="recent">
            <table>
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Type</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Rating</th>
                        <th>Location</th>
                        <th>Price</th>
                        <th>Amenities</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = $conn->query("SELECT * FROM services ORDER BY id DESC");
                    while ($row = $result->fetch_assoc()):
                    ?>
                        <tr>
                            <td><img src="uploads/<?php echo $row['image']; ?>" width="100" alt="Service Image"></td>
                            <td><?php echo htmlspecialchars($row['type']); ?></td>
                            <td><?php echo htmlspecialchars($row['title']); ?></td>
                            <td><?php echo htmlspecialchars($row['description']); ?></td>
                            <td><?php echo $row['rating']; ?> <?php echo str_repeat('★', $row['rating']); ?></td>
                            <td><?php echo htmlspecialchars($row['location']); ?></td>
                            <td>₹<?php echo $row['price']; ?></td>
                            <td><?php echo htmlspecialchars($row['amenities']); ?></td>
                            <td>
                                <a href="#" class="btn update" onclick='openUpdateModal(<?php echo json_encode($row); ?>)'>
                                    <i class="fa-solid fa-pen-to-square"></i> Update
                                </a>
                                <a href="./db/delete_service.php?id=<?php echo $row['id']; ?>" class="btn delete"
                                   onclick="return confirm('Delete this service?');">
                                    <i class="fa-solid fa-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </section>
    </div>

    <!-- ==================== Update Service Modal ==================== -->
    <div id="updateModal" class="modal" style="display:none;">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Update Service</h2>

            <form id="updateForm" action="./db/update_room.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="table" value="services">
                <input type="hidden" name="id" id="update_id">

                <div class="modal-form-row">
                    <div class="form-group">
                        <label>Service Type</label>
                        <select name="type" id="update_type" required>
                            <option value="meeting">Meeting</option>
                            <option value="dining">Dining</option>
                            <option value="event">Event</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" id="update_title" required>
                    </div>
                </div>

                <div class="modal-form-row">
                    <div class="form-group">
                        <label>Rating</label>
                        <select name="rating" id="update_rating" required>
                            <option value="1">1 ★</option>
                            <option value="2">2 ★★</option>
                            <option value="3">3 ★★★</option>
                            <option value="4">4 ★★★★</option>
                            <option value="5">5 ★★★★★</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Location</label>
                        <input type="text" name="location" id="update_location">
                    </div>
                </div>

                <div class="modal-form-row">
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" name="price" id="update_price">
                    </div>

                    <div class="form-group">
                        <label>Amenities</label>
                        <input type="text" name="amenities" id="update_amenities">
                    </div>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" id="update_description" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label>Change Photo (optional)</label>
                    <input type="file" name="image">
                </div>

                <button type="submit">Update Service</button>
            </form>
        </div>
    </div>

    <!-- ==================== Scripts ==================== -->
    <script>
        function openUpdateModal(service) {
            document.getElementById('update_id').value = service.id;
            document.getElementById('update_type').value = service.type;
            document.getElementById('update_title').value = service.title;
            document.getElementById('update_rating').value = service.rating;
            document.getElementById('update_location').value = service.location;
            document.getElementById('update_price').value = service.price;
            document.getElementById('update_amenities').value = service.amenities;
            document.getElementById('update_description').value = service.description;

            document.getElementById('updateModal').style.display = 'block';
            document.querySelector('.main-content').style.filter = 'blur(8px)';
        }

        function closeModal() {
            document.getElementById('updateModal').style.display = 'none';
            document.querySelector('.main-content').style.filter = 'none';
        }
    </script>
</body>

</html>
