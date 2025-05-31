<?php
session_start(); // Start the session
include "db_connect.php";

// Get form data
if(isset($_POST['SeConnecter'])){
    $email = $_POST['email'];
$password = $_POST['motDePasse'];


    if(empty($email)){
        header(header:"location:../View/login.php?error=Entrer votre Email!");
        exit();
    }
        
    else if(empty($password)){
        header("Location: ../View/login.php?error=Entrer votre mot de passe!&email=$email");
        exit();
    }
    else{
// Prepare query to fetch the user by email
$sql = "SELECT * FROM client WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    // Verify the hashed password
    if (password_verify($password, $user['password'])) {
        // Store user info in session (except password)
        $_SESSION['user'] = [
            'id' => $user['id_client'],
            'name' => $user['nom'],
            'adresse' => $user['adresse'],
            'email' => $user['email'],
            'telephone_number' => $user['telephone'],
  
        ];

        // Redirect to profile page
        header("Location: ../View/pfe.php");
        exit();
    } else {
        echo "password incorect ";
    }
} else {
    echo "there is no account with this email.";
}
}
}
$conn->close();
?>
