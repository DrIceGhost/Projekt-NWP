<?php
session_start();

include("dbconn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname  = $_POST['lastname'];
    $bike =  $_POST['bike'];
    $email     = $_POST['email'];
    $country   = $_POST['country'];
    $password  = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql  = "INSERT INTO users (firstname, lastname, bike, email, password, country) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$firstname, $lastname, $bike, $email, $password, $country]);

    $_SESSION['message'] = "Weclome to open roads!";
    header("Location: ../NWP%20Projekt/index.php");
    
    exit; } 
else { echo "Invalid request"; }
?>