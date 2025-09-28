<?php
$conn = new mysqli("localhost", "root", "", "hotel");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $bedType = $_POST['bedType'];
    $price = $_POST['price'];
    $rating = $_POST['rating'];
    $amenities = $_POST['amenities'];
    $members = $_POST['members'];
    $description = $_POST['description'];

    $photo_name = $_FILES['photo']['name'];
    $photo_tmp = $_FILES['photo']['tmp_name'];
    $upload_path = "uploads/" . basename($photo_name);

    move_uploaded_file($photo_tmp, $upload_path);

    $query = "INSERT INTO rooms (photo, name, bed_type, price, rating, amenities, members, description)
              VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssissis", $photo_name, $name, $bedType, $price, $rating, $amenities, $members, $description);

    if ($stmt->execute()) {
        header("Location: add_room.php?success=1");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
