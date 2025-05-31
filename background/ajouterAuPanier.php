<?php

session_start();


// If user is not logged in, redirect to login page
if (!isset($_SESSION['user'])) {
    header("Location:../View/login.php");
    exit();
}

$user = $_SESSION['user'];

if (isset($_POST['add_to_cart'])) {
    
    $id_repas = $_POST['id_repas'];
    $nom = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $photo_path = $_POST['image']; 
    $quantite = $_POST['quantite']; 



    
   
    if(isset($_SESSION['cart'][$id_repas])) {
       
        header("location:../View/pfe.php?warning=Ce produit s'existe déjà dans votre panier");
        exit;
    }
        else{

 $_SESSION['cart'][$id_repas] = array(
    'id_repas' => $id_repas,
    'nom' => $nom,
    'description' => $description,
    'price' => $price,
    'photo' => $photo_path,
    'quantite' => $quantite,
);


 }

   
}
header("Location:../View/index.php");
exit;
?>