<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location:../View/login.php");
    exit();
}

$user = $_SESSION['user'];

include '../background/db_connect.php';
  
if ($_SERVER['REQUEST_METHOD'] === 'POST'&&isset($_POST['submit'])) {
    // Handle feedback submission
    $repas_id = intval($_POST['id_repas']);
    $feedback = trim($_POST['feedback']);
    $nom_client=$_POST['nom_client'];

    if (!empty($feedback)) {
        $stmt = $conn->prepare("INSERT INTO avis (id_repas,nom_client,commentaire) VALUES (?,?,?)");
        $stmt->bind_param("iss", $repas_id,$nom_client,$feedback);

        if ($stmt->execute()) {
            echo "<p style='color: green;'>Feedback ajouté avec succès.</p>";
        } else {
            echo "<p style='color: red;'>Erreur : " . $stmt->error . "</p>";
        }

        $stmt->close();
    } else {
        echo "<p style='color: red;'>Le champ de feedback est vide.</p>";
    }
}

// Get repas_id for the form
$repas_id = isset($_GET['repas_id']) ? intval($_GET['repas_id']) : 0;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Feedback</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #fff8f0; /* blanc cassé très clair */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background: white;
            padding: 35px 45px;
            border-radius: 15px;
            box-shadow: 0 8px 24px rgba(255, 140, 0, 0.3); /* ombre orange douce */
            width: 100%;
            max-width: 480px;
            transition: transform 0.3s ease;
        }
        form:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(255, 140, 0, 0.5);
        }

        h2 {
            text-align: center;
            color: #ff6600; /* orange vif */
            margin-bottom: 28px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            font-size: 1.9rem;
        }

        textarea {
            width: 100%;
            resize: vertical;
            border: 2px solid #ff9933; /* orange clair */
            border-radius: 12px;
            padding: 14px 18px;
            font-size: 1.1rem;
            font-family: inherit;
            color: #333;
            transition: border-color 0.4s ease, box-shadow 0.4s ease;
            box-shadow: inset 0 0 5px rgba(255, 153, 51, 0.1);
        }

        textarea:focus {
            border-color: #ff6600;
            box-shadow: 0 0 12px 2px rgba(255, 102, 0, 0.6);
            outline: none;
            animation: pulseOrange 1.2s ease infinite alternate;
        }

        @keyframes pulseOrange {
            0% {
                box-shadow: 0 0 8px 2px rgba(255, 102, 0, 0.4);
            }
            100% {
                box-shadow: 0 0 14px 4px rgba(255, 102, 0, 0.9);
            }
        }

        button {
            display: block;
            width: 100%;
            background-color: #ff6600;
            color: white;
            font-weight: 700;
            font-size: 1.2rem;
            border: none;
            padding: 16px 0;
            border-radius: 14px;
            cursor: pointer;
            margin-top: 20px;
            transition: background-color 0.3s ease, transform 0.3s ease;
            box-shadow: 0 5px 15px rgba(255, 102, 0, 0.4);
        }

        button:hover {
            background-color: #e65500;
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 8px 25px rgba(230, 85, 0, 0.6);
        }

        p {
            text-align: center;
            margin-top: 24px;
            font-size: 1rem;
        }

        a {
            text-decoration: none;
            color: #ff6600;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #e65500;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <form method="POST" action="add_feedback.php">
        <h2>Ajouter un Feedback</h2>

    <input type="hidden" name="id_repas" value="<?php echo  $_GET['id_repas'];?>">

        <input type="hidden" name="nom_client" value="<?php echo $_SESSION['user']['name'] ?>" >

        <textarea name="feedback" rows="4" cols="50" placeholder="Écrivez votre feedback ici..." required></textarea>
        <br><br>
        <button name="submit" type="submit">Envoyer</button>

        <p><a href="../View/index.php">← Retour</a></p>
    </form>
</body>
</html>