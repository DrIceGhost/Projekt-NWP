<?php
  
  include("dbconn.php");
  $stmt = $dbh->query("SELECT country_code, country_name FROM countries");

  print '<div class="register-container">
      <h1>New rider? Enlist here</h1>
      <form action="process_register.php" method="post">
          <input type="text" name="firstname" placeholder="First Name" required>
          <input type="text" name="lastname" placeholder="Last Name" required>
          <input type="text" name="bike" placeholder="What kind of motorcycle do you ride?">
          <input type="email" name="email" placeholder="Email" required>
          <input type="password" name="password" placeholder="Password" required>
          <select name="country" required>'
          ;
          
  while ($row = $stmt->fetch()) {
      $selected = $row['country_code'] === 'HR' ? 'selected' : '';
      echo "<option value=\"" . htmlspecialchars($row['country_code']) . "\" $selected>" . htmlspecialchars($row['country_name']) . "</option>"; }

  print '</select>
          <button type="submit">Register</button>
      </form>
  </div>';
?>

