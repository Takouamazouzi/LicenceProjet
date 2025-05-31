<?php
session_start();
if(!isset($_SESSION['admin'])){
  header(header: "Location:../View/adminLogin.html");
  exit();
}
include "../background/db_connect.php";

// Fetch repas data
$sql = "SELECT * FROM repas";
$result = $conn->query($sql);
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Page manager de stock</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f4f4;
      padding: 30px;
    }

    h1 {
      text-align: center;
      color: #2c3e50;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 30px;
      background-color: white;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    th, td {
      padding: 12px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color:orange;
      color: white;
    }

    tr:hover {
      background-color: #f1f1f1;
    }

    .action-btn {
      padding: 6px 12px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      margin-right: 5px;
    }

    .edit-btn {
      background-color: #f0ad4e;
      color: white;
    }

    .delete-btn {
      background-color: #d9534f;
      color: white;
    }

    .add-btn {
      margin-top: 20px;
      padding: 10px 20px;
      background-color: #27ae60;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      display: block;
      margin-left: auto;
      text-decoration: none;
      text-align: center;
    }

    .add-btn:hover {
      background-color: #1e8449;
    }

    img {
      width: 80px;
      height: 60px;
      object-fit: cover;
      border-radius: 4px;
    }
  </style>
</head>
<body>

  <h1>Page mise à jour</h1>

  <table>
    <tr>
      <th>Nom</th>
      <th>Description</th>
      <th>Prix (DA)</th>
      <th>Disponibilité</th>
      <th>Quantité</th>
      <th>Catégorie</th>
      <th>Image</th>
      <th>Actions</th>
    </tr>
    <?php while($row = $result->fetch_assoc()) : ?>
      <tr>
        <td><?= htmlspecialchars($row['nom']) ?></td>
        <td><?= htmlspecialchars($row['description']) ?></td>
        <td><?= number_format($row['prix'], 2) ?> DA</td>
        <td><?= htmlspecialchars($row['disponibilte']) ?></td>
        <td><?= htmlspecialchars($row['quantite']) ?></td>
        <td><?= htmlspecialchars($row['category']) ?></td>
        <td>
          <?php if ($row['image']) : ?>
            <img src="<?= htmlspecialchars($row['image']) ?>" alt="Repas Image">
          <?php else : ?>
            No image
          <?php endif; ?>
        </td>
        <td>
          <form action="../background/modifierRepas.php" method="post" style="display:inline;">
            <input type="hidden" name="id" value="<?=  $row['id_repas'] ?>">
            <button class="action-btn edit-btn" type="submit">Modifier</button>
          </form>
          <form action="../background/supprimerRepas.php" method="post" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce repas ?');">
            <input type="hidden" name="id" value="<?= $row['id_repas'] ?>">
            <button class="action-btn delete-btn" type="submit">Supprimer</button>
          </form>
        </td>
      </tr>
    <?php endwhile; ?>
  </table>
 
  <a class="add-btn" href="ajouter_repas.html">Ajouter</a>
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





</body>
</html>
