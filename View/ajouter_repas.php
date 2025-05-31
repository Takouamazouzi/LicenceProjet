<?php
include '../background/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['ajouter'])) {
        $nom = $_POST['name'];
        $description = $_POST['description'];
        $prix = $_POST['price'];
        $quantite = $_POST['quantity'];
         $category = $_POST['category'];
        $disponibilite = 1;

        // Handle image upload
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $upload_dir = 'uploads/';
    
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            $image_name = basename($_FILES['image']['name']);
            $target_path = $upload_dir . time() . "_" . $image_name;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
                // Insert into database with image path
                $stmt = $conn->prepare("INSERT INTO repas (nom, description, prix, disponibilte, quantite, image , category) VALUES (?, ?, ?, ?, ?, ?,?)");
                $stmt->bind_param("ssdiiss", $nom, $description, $prix, $disponibilite, $quantite, $target_path,$category);

                if ($stmt->execute()) {
                    echo "Repas ajouté avec succès !";
                    header("Location:maj.php");
                    exit();
                } else {
                    echo "Erreur lors de l'ajout : " . $stmt->error;
                }

                $stmt->close();
            } else {
                echo "Échec du téléchargement de l'image.";
            }
        } else {
            echo "Image non valide.";
        }
    } else {
        echo "Formulaire non soumis correctement.";
    }
} else {
    echo "Méthode non autorisée.";
}

$conn->close();
?>
