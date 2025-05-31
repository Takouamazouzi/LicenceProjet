<?php

session_start(); // Start the session
include "db_connect.php";

// Get form data
if(isset($_POST['loginAdmin'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
}
 if (empty($username)) {
    header("Location: ../background/adminlogin.php?error=Entrez votre nom d'utilisateur !");
    exit();
} else if (empty($password)) {
    header("Location: ../background/adminlogin.php?error=Entrez votre mot de passe !&username=$username");
    exit();
}else{
// Prepare query to fetch the user by email
$sql = "SELECT * FROM admin WHERE user_name='$username' ";
$result = $conn->query($sql);

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    $stored_password=$user['password'];

    // Verify the hashed password
    if ($password=== $stored_password) {
        
        // Redirect to profile page
       $_SESSION['admin'] = [
            'id' => $user['id'],
            
        ];
    
        header(header:"location:../View/adminpage.php");
     
 

        exit();
    } else {
        echo "password incorect ";
    }
} else {
    echo "there is no account with this user name.";
}
}



$conn->close();

session_start();
session_unset();
session_destroy();
header("Location: ../View/index.php");
exit();