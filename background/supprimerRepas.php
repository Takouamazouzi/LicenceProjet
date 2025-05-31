<?php
include 'db_connect.php';

// Check if the 'id' is set in the URL
if (!isset($_POST['id'])) {
    echo "ID manquant.";
    exit;
}

$id = intval($_POST['id']);

// Prepare the SQL query to delete the record
$stmt = $conn->prepare("DELETE FROM repas WHERE id_repas = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    // Redirect to the dashboard after successful deletion
    header("Location:../View/maj.php");
    exit();
} else {
    echo "Erreur lors de la suppression : " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
