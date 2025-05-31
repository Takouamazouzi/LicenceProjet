<?php
// get_image.php
include 'db_connect.php';

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    $stmt = $conn->prepare("SELECT image FROM repas WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($imageData);
        $stmt->fetch();

        // Set the appropriate content type (adjust if not JPEG)
        header("Content-Type: image/jpeg");
        echo $imageData;
        exit;
    }
}

http_response_code(404);
echo "Image not found.";
