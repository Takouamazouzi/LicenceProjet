<?php
session_start();

// If user is not logged in, redirect to login page
if (!isset($_SESSION['user'])) {
    header("Location: login.html");
    exit();
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: beige;
        padding: 50px;
        margin: 0;
    }

    .container {
        background-color: #ffffff;
        padding: 30px;
        border-radius: 15px;
        width: 100%;
        max-width: 420px;
        margin: auto;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .container:hover {
        transform: translateY(-5px);
    }

    h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #333;
        font-size: 26px;
        border-bottom: 2px solid orange;
        padding-bottom: 10px;
    }

    label {
        display: block;
        margin-top: 15px;
        font-weight: 600;
        color: #444;
        font-size: 14px;
    }

    input[type="text"],
    input[type="email"],
    input[type="number"] {
        width: 100%;
        padding: 10px 12px;
        margin-top: 6px;
        border-radius: 8px;
        border: 1px solid #ccc;
        font-size: 14px;
        box-sizing: border-box;
        transition: border-color 0.3s;
    }

    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="number"]:focus {
        border-color: #00aaff;
        outline: none;
        box-shadow: 0 0 0 2px rgba(orange);
    }

    .logout-btn {
        margin-top: 25px;
        width: 100%;
        background-color: #ff4d4f;
        color: white;
        border: none;
        padding: 12px;
        font-size: 16px;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .logout-btn:hover {
        background-color: #e04344;
    }
    
</style>

</head>
<body>

<div class="container">
    <h2>Votre Profile</h2>
    <a href="pfe.php">Retour</a>
    <br>
    <a href="commandspclient.php"> Mes commandes</a>
    <form>
        <label>Name:</label>
        <input type="text" value="<?php echo htmlspecialchars($user['name']); ?>" readonly>

        <label>Adresse:</label>
        <input type="text" value="<?php echo htmlspecialchars($user['adresse']); ?>" readonly>

        <label>Email:</label>
        <input type="email" value="<?php echo htmlspecialchars($user['email']); ?>" readonly>
        <label>Phone:</label>
        <input type="text" value="<?php echo htmlspecialchars($user['telephone_number']); ?>" readonly>

    </form>
  

    




    <form action="../background/logout.php" method="post">
        <button type="submit" class="logout-btn">🔓Déconnecter</button>
    </form>
</div>

</body>
</html>
