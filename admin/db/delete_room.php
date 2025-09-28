<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $conn = new mysqli("localhost", "root", "", "hotel");
    
    $photoQuery = $conn->query("SELECT photo FROM rooms WHERE id = $id");
    if ($photoQuery && $photoRow = $photoQuery->fetch_assoc()) {
        $photoPath = "../uploads/" . $photoRow['photo'];
        if (file_exists($photoPath)) {
            unlink($photoPath);
        }
    }

    $sql = "DELETE FROM rooms WHERE id = $id";
    if ($conn->query($sql)) {
        header("Location: ../add_room.php?msg=Room+Deleted");
        exit;
    } else {
        echo "Error deleting room: " . $conn->error;
    }

    $conn->close();
}
?>
