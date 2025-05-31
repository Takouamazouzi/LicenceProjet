<?php
session_start();
if(!isset($_SESSION['admin'])){
  header(header: "Location:../View/adminLogin.html");
exit;
}?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Espace Admin</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(to right, #fff8f0, #ffe5cc);
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    h1 {
      color: #d35400;
      margin-bottom: 40px;
    }

    .btn-container {
      display: flex;
      gap: 40px;
    }

    .admin-btn {
      padding: 20px 30px;
      font-size: 18px;
      font-weight: bold;
      color: white;
      background-color: #e67e22;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      text-decoration: none;
      transition: background-color 0.3s ease, transform 0.2s;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }

    .admin-btn:hover {
      background-color: #ca6f1e;
      transform: scale(1.05);
    }
    .logout-btn {
  padding: 20px 30px;
  font-size: 18px;
  font-weight: bold;
  color: white;
  background-color: #e67e22;
  border: none;
  border-radius: 10px;
  cursor: pointer;
  text-decoration: none;
  transition: background-color 0.3s ease, transform 0.2s;
  box-shadow: 0 4px 6px rgba(0,0,0,0.1);
  margin-top: 40px;
  display: inline-block;
}

.logout-btn:hover {
  background-color: #ca6f1e;
  transform: scale(1.05);
}

  </style>
</head>
<body>

  <h1>Bienvenue dans l'espace Admin</h1>

  <div class="btn-container">
    <a href="maj.php" class="admin-btn">Mise à jour du menu</a>
    <a href="../View/commandes.php" class="admin-btn">Gérer les commandes</a>
  </div>

</body>
</html>
<form action="../background/adminlogout.php" method="post">

        <button type="submit" class="logout-btn">🔓Déconnecter</button>
    </form>