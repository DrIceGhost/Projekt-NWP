<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST["firstname"];
    $lastname  = $_POST["lastname"];
    $email     = $_POST["email"];
    $country   = $_POST["country"];
    $subject   = $_POST["subject"];

    // Displayed message
    echo "Thanks for reaching out!";

    // Send mail
    $admin_email = "akosutic5@gmail.com";
    $message     = "You have a new contact form submission from $firstname $lastname ($email) from $country. They wrote:\n\n$subject";
    mail($admin_email, "New Contact Form Submission", $message);

    header("refresh:2;url=index.php");
}
?>
