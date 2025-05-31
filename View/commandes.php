<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location:../View/adminLogin.html");
    exit;
}
include '../background/db_connect.php';

$sql = "SELECT 
          c.id_commande,
          cl.id_client AS id_client,
          cl.nom AS nom_client,
          r.nom AS repas_commandes,
          c.Qauntite,
          c.prix,
          c.statut,
          c.date_commande
        FROM commandes c
        INNER JOIN client cl ON c.id_client = cl.id_client
        INNER JOIN repas r ON c.id_repas = r.id_repas
        ORDER BY cl.nom ASC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Commandes par client</title>
    <style>
        body { font-family: Arial; padding: 20px; background: #f4f4f4; }
        h1 { color: #e67e22; text-align: center; }
        table { width: 100%; border-collapse: collapse; background: white; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: center; }
        th { background-color: #e67e22; color: white; }
        tr:hover { background-color: #fce5d0; }
        form { display: inline; }
        button { background-color: #3498db; color: white; border: none; padding: 5px 10px; cursor: pointer; border-radius: 5px; }
        button.delete { background-color: #e74c3c; }
    </style>
</head>
<body>
    <h1>Commandes par client</h1>
    <table>
        <thead>
            <tr>
                <th>Nom du client</th>
                <th>Repas commandés</th>
                <th>Quantité</th>
                <th>Prix</th>
                <th>Statut</th>
                <th>Date de commande</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['nom_client']) ?></td>
                        <td><?= htmlspecialchars($row['repas_commandes']) ?></td>
                        <td><?= htmlspecialchars($row['Qauntite']) ?></td>
                        <td><?= htmlspecialchars($row['prix']) ?> DA</td>
                        <td><?= htmlspecialchars($row['statut']) ?></td>
                        <td><?= htmlspecialchars($row['date_commande']) ?></td>
                        <td>
                            <form action="../background/updateCommandStatus.php" method="POST">
                                <input type="hidden" name="id_commande" value="<?= $row['id_commande'] ?>">
                                <button type="submit">Update Statut</button>
                            </form>
                            <form action="../background/suprimerCommande.php" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette commande ?');">
                                <input type="hidden" name="id_commande" value="<?= $row['id_commande'] ?>">
                                <button type="submit" class="delete">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="7">Aucune commande trouvée.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>

  <a href="adminpage.php" class="btn-retour">
    🔙 Retour
</a>

<style>
.btn-retour {
    display: inline-block;
    padding: 15px 25px;
    background: linear-gradient(to right, #6a11cb, #2575fc); /* dégradé violet/bleu */
    color: white;
    text-decoration: none;
    border-radius: 50px;
    font-weight: bold;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s;
}

.btn-retour:hover {
    transform: scale(1.05);
}
</style>