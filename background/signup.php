<?php
include "db_connect.php";
// Get data from form
if(isset($_POST['sinscrire'])){
$name = $_POST['nom'];
$email = $_POST['email'];
$adresse = $_POST['adresse'];
$telephone_number = $_POST['telephone'];

$plainPassword = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

if($plainPassword!=$confirm_password){
    echo "password repited incorrect";
    exit;
}
// Hash the password
$hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);

// Insert into database
$sql = "INSERT INTO client (adresse,telephone,password,nom,email) VALUES ('$adresse','$telephone_number','$hashedPassword','$name','$email')";
if ($conn->query($sql) === TRUE) {
    header("Location: ../View/pfe.php");
} else {
    echo "Error: " . $conn->error;
}

}
$conn->close();

?>
