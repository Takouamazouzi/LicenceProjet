<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $nom = $_POST['name'];
    $description = $_POST['description'];
    $prix = $_POST['price'];
    $quantite = $_POST['quantity'];
    $category = $_POST['category'];

    $disponibilite = ($quantite > 0) ? 1 : 0;

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = '../View/uploads/';


        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        $image_name = basename($_FILES['image']['name']);
        $target_path = $upload_dir . time() . "_" . $image_name;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
            $stmt = $conn->prepare("UPDATE repas SET nom=?, description=?, prix=?, disponibilte=?, quantite=?, image=?, category=? WHERE id_repas=?");
            $stmt->bind_param("ssdiissi", $nom, $description, $prix, $disponibilite, $quantite, $target_path, $category, $id);
        } else {
            echo "Image upload failed.";
            exit();
        }
        
    } else {
        // Image not changed
      $stmt = $conn->prepare("UPDATE repas SET nom=?, description=?, prix=?, disponibilte=?, quantite=?, category=? WHERE id_repas=?");
    $stmt->bind_param("ssdiisi", $nom, $description, $prix, $disponibilite, $quantite,$category, $id);
    }

    if ($stmt->execute()) {
        header("Location:../View/maj.php");
        exit();
    } else {
        echo "Erreur : " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
