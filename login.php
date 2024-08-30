<div class="login-container">
  <h1>Sign In</h1>
  <div id="signin">

<?php
  include("dbconn.php");

  if (!isset($_POST['login'])) {
      echo '
        <form action="" method="post">
        <input type="hidden" name="login" value="true">
        <label for="email">Email:*</label>
        <input type="email" id="email" name="email" placeholder="Email" required>
        <label for="password">Password:*</label>
        <input type="password" id="password" name="password" placeholder="Password" required>
        <input type="submit" value="Submit">
        </form>'; } 

  else {
      $stmt = $dbh->prepare("SELECT * FROM users WHERE email = :email");
      $stmt->bindParam(':email', $_POST['email']);
      $stmt->execute();
      $user = $stmt->fetch();

    if ($user && password_verify($_POST['password'], $user['password'])) {
        $_SESSION['user']              = [];
        $_SESSION['user']['logged_in'] = true;
        $_SESSION['user']['email']     = $user['email'];
        $_SESSION['user']['firstname'] = $user['firstname'];
        $_SESSION['user']['lastname']  = $user['lastname'];
        $_SESSION['user']['is_admin']  = $user['is_admin'];
        $_SESSION['message']           = "Login successful";
        header("Location: index.php"); } 

    else {
          echo 'Login failed.'; }
        }
        
?>
  </div>
</div>