<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../View/adminLogin.html");
    exit;
}

include '../background/db_connect.php';

// Step 1: Check if ID was sent
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_commande'])) {
    $id_commande = intval($_POST['id_commande']);

    // Step 2: Update status if form was submitted with a new status
    if (isset($_POST['new_status'])) {
        $new_status = $_POST['new_status'];

        // Optional: validate status against allowed values
        $allowed_statuses = ['En attente', 'Validée', 'Refusée'];
        if (in_array($new_status, $allowed_statuses)) {
            $stmt = $conn->prepare("UPDATE commandes SET statut = ? WHERE id_commande = ?");
            $stmt->bind_param("si", $new_status, $id_commande);
            if ($stmt->execute()) {
                echo "<p style='color:green;'>Statut mis à jour avec succès.</p>";
            } else {
                echo "<p style='color:red;'>Erreur lors de la mise à jour.</p>";
            }
            $stmt->close();
        } else {
            echo "<p style='color:red;'>Statut invalide sélectionné.</p>";
        }
    }

    // Step 3: Display form
    ?>
    
        <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mettre à jour le statut</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff; /* fond blanc */
            color: #ff6600; /* texte orange */
            margin: 0;
            padding: 40px;
        }

        h2 {
            color: #ff6600;
        }

        form {
            background-color: #fff;
            border: 2px solid #ff6600;
            border-radius: 10px;
            padding: 20px;
            max-width: 400px;
            box-shadow: 0 0 10px rgba(255, 102, 0, 0.2);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ff6600;
            border-radius: 5px;
            background-color: #fff;
            color: #333;
            margin-bottom: 15px;
        }

        button {
            background-color: #ff6600;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover {
            background-color: #e65c00;
        }
    </style>
</head>
<body>

    <h2>Mettre à jour le statut de la commande #<?= htmlspecialchars($id_commande) ?></h2>
    <form method="POST">
        <input type="hidden" name="id_commande" value="<?= htmlspecialchars($id_commande) ?>">
        <label for="new_status">Nouveau statut :</label>
        <select name="new_status" id="new_status" required>
            <option value="">--Choisir--</option>
            <option value="En attente">En attente</option>
            <option value="Validée">Validée</option>
            <option value="Refusée">Refusée</option>
        </select>
        <button type="submit">Mettre à jour</button>
    </form>

</body>
</html>

        <a href="../View/commandes.php">Retour</a>
        
    <?php
} else {
    echo "<p style='color:red;'>Aucune commande sélectionnée.</p>";
}
?>
