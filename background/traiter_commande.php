<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['user'])) {
    header('Location: ../login.php');
    exit;
}

$user = $_SESSION['user'];
$id_client = $user['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $date_commande = $_POST['date_commande'] ?? null;
    $type_paiement = $_POST['paiement'] ?? null;
    $products = $_POST['products'] ?? [];

    if (!$date_commande || !$type_paiement || empty($products)) {
        echo "<h2>Erreur : champs manquants.</h2>";
        echo "<a href='../view/panier.php'>Retour au panier</a>";
        exit;
    }

    // Préparer la requête d'insertion
    $stmt = $conn->prepare("INSERT INTO commandes (date_commande, paiement, id_client, id_repas, prix, Qauntite) VALUES (?, ?, ?, ?, ?, ?)");

    if (!$stmt) {
        die("Erreur de préparation : " . $conn->error);
    }

    foreach ($products as $product) {
        $id_repas = (int) $product['id_repas'];
        $quantity = (int) $product['quantity'];
        $price_unit = (float) $product['price'];
        $line_total = $quantity * $price_unit;

        // Lier les paramètres et exécuter
        $stmt->bind_param("ssiiii", $date_commande, $type_paiement, $id_client, $id_repas, $line_total, $quantity);
        $stmt->execute();
    }

    $stmt->close();

    // Vider le panier après la commande
    unset($_SESSION['cart']);

    // Redirection après succès
    header('Location: ../view/pfe.php');
    exit;
}

header('Location: ../view/panier.php');
exit;
