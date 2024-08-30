<?php
include("dbconn.php");

    if (isset($_GET['id'])) {
        try {
            $stmt = $dbh->prepare("SELECT * FROM news WHERE id = :id");
            $stmt->execute([':id' => $_GET['id']]);
            $row = $stmt->fetch();

            if ($row) {
                
                // View news details
                echo '<h1>' . $row['title'] . '</h1>';
                echo '<p><time datetime="' . $row['date'] . '">' . date('d F Y', strtotime($row['date'])) . '</time></p>';
                echo '<img src="news/' . $row['picture'] . '" alt="' . $row['title'] . '" title="' . htmlspecialchars($row['title']) . '">';
                echo '<p>' . $row['description'] . '</p>';
                echo '<a href="index.php?menu=news">Back to news</a>'; } 
                
            else {
                echo '<p>News not found</p>'; }
            } catch (Exception $e) {
            
                echo '<p>Error: ' . $e->getMessage() . '</p>'; }
    } 
    else {
        echo '<p>Invalid request</p>'; }
?>


