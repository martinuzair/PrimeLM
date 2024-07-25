<?php 

require_once 'includes/config_session.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="externalLogin.css">
</head>
<body>
<center>
  <div class="login-container">
    <h2>Login</h2>
    <img class="login-logo" src="images.png/TransPrimeLMDark.png" alt="">
    <!-- Display error message if exists -->
    <?php if(isset($_SESSION['login_error'])): ?>
      <p class="error-message">
        <?php echo $_SESSION['login_error']; ?>
      </p>

      <!-- Unset the error message after displaying it -->
      <?php unset($_SESSION['login_error']); ?> 
    <?php endif; ?>

    <form action="includes/login.php" method="post">
      <label class="email-text" for="email">Email:</label>
      <input type="email" id="email" name="email">

      <label for="password">Password:</label>
      <input type="password" id="password" name="password">

      <input type="submit" value="Login">
    </form>
  </div>
</center>


<!--Background-->

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gradient background</title>
    <style>
        body{
            background: linear-gradient(45deg, #ffffff, #00ffff, #00ff00);
            background-size: 400% 400%;
            animation: gradientAnimation 10s ease infinite;
        }

        @keyframes gradientAnimation{
            0% { background-position: 0% 50%;}
            50% { background-position: 100% 50%;}
            100% { background-position: 0% 50%;}
        }


<!--Tillhere-->


