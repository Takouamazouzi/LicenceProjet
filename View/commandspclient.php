<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit();
}

include '../background/db_connect.php';

$id_client = $_SESSION['user']['id'];

$sql = "SELECT 
       
          r.nom AS repas_commandes,
          c.Qauntite,
          c.prix,
          c.statut,
          c.date_commande
        FROM commandes c
        INNER JOIN client cl ON c.id_client = cl.id_client
        INNER JOIN repas r ON c.id_repas = r.id_repas
        WHERE c.id_client ='$id_client'
        ORDER BY c.date_commande DESC";


$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Mes Commandes</title>
    <style>
        body { font-family: Arial; padding: 20px; background: #f4f4f4; }
        h1 { color: #e67e22; text-align: center; }
        table { width: 100%; border-collapse: collapse; background: white; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: center; }
        th { background-color: #e67e22; color: white; }
        tr:hover { background-color: #fce5d0; }
    </style>
</head>
<body>
    <h1>Mes Commandes</h1>
    <table>
        <thead>
            <tr>
               
                <th>Repas commandés</th>
                <th>Quantité</th>
                <th>Prix</th>
                <th>Statut</th>
                <th>Date de commande</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                    
                        <td><?= htmlspecialchars($row['repas_commandes']) ?></td>
                        <td><?= htmlspecialchars($row['Qauntite']) ?></td>
                        <td><?= htmlspecialchars($row['prix']) ?> Da</td>
                        <td><?= htmlspecialchars($row['statut']) ?></td>
                        <td><?= htmlspecialchars($row['date_commande']) ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="4">Aucune commande trouvée.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>