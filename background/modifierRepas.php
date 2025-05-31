<?php
include 'db_connect.php';

if (!isset($_POST['id'])) {
    echo "ID manquant.";
    exit;
}

$id = intval($_POST['id']);
$result = $conn->query("SELECT * FROM repas WHERE id_repas = $id");

if ($result->num_rows !== 1) {
    echo "Repas non trouvé.";
    exit;
}

$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Modifier le repas</title>
  <style>
    body { font-family: Arial; padding: 30px; background-color: #f5f5f5; }
    .form-container { background: #fff; padding: 25px; max-width: 500px; margin: auto; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.2); }
    label { display: block; margin-top: 15px; font-weight: bold; }
    input, textarea { width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; }
    button { margin-top: 20px; width: 100%; background-color: #2980b9; color: white; border: none; padding: 12px; font-size: 16px; border-radius: 5px; cursor: pointer; }
    button:hover { background-color: #1c6690; }
  </style>
</head>
<body>

  <div class="form-container">
    <h2>Modifier le repas</h2>
    <form action="updateRepas.php" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?= $row['id_repas'] ?>">

      <label>Nom :</label>
      <input type="text" name="name" value="<?= htmlspecialchars($row['nom']) ?>" required>

      <label>Description :</label>
      <textarea name="description" rows="4" required><?= htmlspecialchars($row['description']) ?></textarea>

      <label>Prix (DA) :</label>
      <input type="number" name="price" step="0.01" value="<?= $row['prix'] ?>" required>

      <label>Quantité :</label>
      <input type="number" name="quantity" value="<?= $row['quantite'] ?>" required>

       <select name="category" required>
        
      <label>Catégories :</label>
        <option value="">-- Choisissez une catégorie --</option>
        <option value="Sucré">Sucré</option>
        <option value="Pasta">Pasta</option>
        <option value="Grille">Grille</option>
        <option value="Boisson">Boisson</option>
         <option value="Pizza">Pizza</option>
      </select>

      <label>Image (laisser vide pour ne pas changer) :</label>
      <input type="file" name="image" accept="image/*">

      <button type="submit">Mettre à jour</button>
    </form>
  </div>

</body>
</html>
