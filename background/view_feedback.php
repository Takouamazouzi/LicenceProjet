<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include '../background/db_connect.php';

if (!isset($_GET['repas_id'])) {
    die("ID du repas non fourni.");
}

$id_repas = intval($_GET['repas_id']);

// Préparation de la requête
$stmt = $conn->prepare("SELECT nom_client, commentaire, date_creation FROM avis WHERE id_repas = ?");
if (!$stmt) {
    die("Erreur de préparation : " . $conn->error);
}

$stmt->bind_param("i", $id_repas);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Feedbacks</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }
        .feedback {
            margin-bottom: 20px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
        }
        .nom-client {
            font-weight: bold;
        }
        .date {
            color: gray;
            font-size: 12px;
        }
        .retour {
            margin-top: 20px;
            display: inline-block;
            text-decoration: none;
            color: blue;
        }
    </style>
</head>
<body>

<h2>Feedbacks du repas</h2>

<?php if ($result->num_rows > 0): ?>
    <?php while ($row = $result->fetch_assoc()): ?>
        <div class="feedback">
            <div class="nom-client"><?= htmlspecialchars($row['nom_client']) ?></div>
            <div class="date"><?= htmlspecialchars($row['date_creation']) ?></div>
            <p><?= nl2br(htmlspecialchars($row['commentaire'])) ?></p>
        </div>
    <?php endwhile; ?>
<?php else: ?>
    <p style="text-align: center; font-style: italic; color: #888;">Aucun feedback pour ce repas.</p>
<?php endif; ?>

<!-- Lien de retour stylisé -->
<div style="text-align: center; margin-top: 30px;">
    <a class="retour" href="../View/pfe.php" style="
        text-decoration: none;
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: bold;
        transition: background-color 0.3s ease;
    " onmouseover="this.style.backgroundColor='#45a049'" onmouseout="this.style.backgroundColor='#4CAF50'">← Retour</a>
</div>

</body>
</html>
