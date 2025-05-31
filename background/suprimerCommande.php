<?php
include 'db_connect.php';

// Check if the 'id' is set in the URL
if (!isset($_POST['id_commande'])) {
    echo "ID manquant.";
    exit;
}

$id = intval($_POST['id_commande']);

// Prepare the SQL query to delete the record
$stmt = $conn->prepare("DELETE FROM commandes WHERE id_commande = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    // Redirect to the dashboard after successful deletion
    header("Location:../View/commandes.php");
    exit();
} else {
    echo "Erreur lors de la suppression : " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
