<?php
$conn = new mysqli("localhost", "root", "", "hotel");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $table = isset($_POST['table']) ? $_POST['table'] : 'rooms';

    if ($table === 'rooms') {
        $name = $_POST['name'];
        $bedType = $_POST['bedType'];
        $price = $_POST['price'];
        $rating = $_POST['rating'];
        $amenities = $_POST['amenities'];
        $members = $_POST['members'];
        $description = $_POST['description'];

        if (isset($_FILES['photo']) && $_FILES['photo']['error'] === 0) {
            $photo = time() . "_" . $_FILES['photo']['name'];
            $target = "../uploads/" . basename($photo);
            move_uploaded_file($_FILES['photo']['tmp_name'], $target);

            $sql = "UPDATE rooms SET 
                        name='$name', 
                        bed_type='$bedType', 
                        price='$price', 
                        rating='$rating', 
                        amenities='$amenities', 
                        members='$members', 
                        description='$description',
                        photo='$photo'
                    WHERE id=$id";
        } else {
            $sql = "UPDATE rooms SET 
                        name='$name', 
                        bed_type='$bedType', 
                        price='$price', 
                        rating='$rating', 
                        amenities='$amenities', 
                        members='$members', 
                        description='$description'
                    WHERE id=$id";
        }

        if ($conn->query($sql) === TRUE) {
            header("Location: ../add_room.php");
            exit();
        } else {
            echo "Error updating room: " . $conn->error;
        }

    } elseif ($table === 'services') {
        $type = $_POST['type'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $rating = $_POST['rating'];
        $location = $_POST['location'];
        $price = $_POST['price'];
        $amenities = $_POST['amenities'];

        if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
            $image = time() . "_" . $_FILES['image']['name'];
            $target = "../uploads/" . basename($image);
            move_uploaded_file($_FILES['image']['tmp_name'], $target);

            $sql = "UPDATE services SET 
                        type='$type', 
                        title='$title', 
                        description='$description',
                        rating='$rating',
                        location='$location',
                        price='$price',
                        amenities='$amenities',
                        image='$image'
                    WHERE id=$id";
        } else {
            $sql = "UPDATE services SET 
                        type='$type', 
                        title='$title', 
                        description='$description',
                        rating='$rating',
                        location='$location',
                        price='$price',
                        amenities='$amenities'
                    WHERE id=$id";
        }

        if ($conn->query($sql) === TRUE) {
            header("Location: ../add_service.php");
            exit();
        } else {
            echo "Error updating service: " . $conn->error;
        }
    }
}
?>
