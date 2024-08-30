<?php
    //Club members table
    require 'dbconn.php';

    $stmt = $dbh->prepare("SELECT * FROM users");
    $stmt->execute();
    $users = $stmt->fetchAll();

    echo '<h1>Club Members</h1>';

    echo '<table>';
    
    echo '<tr><th>First Name</th><th>Last Name</th><th>Motorcycle</th><th>Email</th><th>Country</th></tr>';
    foreach ($users as $user) {
        echo '<tr>';
        echo '<td>' . $user['firstname'] . '</td>';
        echo '<td>' . $user['lastname'] . '</td>';
        echo '<td>' . $user['bike'] . '</td>';
        echo '<td>' . $user['email'] . '</td>';
        echo '<td>' . $user['country'] . '</td>';
        echo '</tr>'; }

    echo '</table>';
?>