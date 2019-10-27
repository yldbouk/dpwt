<?php session_start(); $needsAcc=TRUE; $forcePwdReset=TRUE;?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/form.css">
    <meta charset="utf-8">
    <title>Change Password - DPWT</title>
  </head>
  <body>
    <header>
      <div class="header">
        <a class="logo">D P W T</a>
        <div class="header-right">
        </div>
      </div>
    </header>
      <br><br>
       <center>
         <!-- SPLITTER -->
      <h1>Change Password</h1><h3>Hello, <?php echo $_SESSION['userUid'] ?>! You seem to be a new user. For security reasons, please change your password.</h3>
      <br>
      <?php 
    if (isset($_GET['result'])) {
      if ($_GET['result'] == "incomplete") {
       echo '<h4>Please fill out all fields.</h4>';
      } elseif ($_GET['result'] == "pwd") {
        echo '<h4>Your passwords did not match. Please ty again.</h4>';
      } else {
        echo '<h4>An unknown error occured. Please try again.</h4>';
      }
    }
   ?>
   
      <form action="../scripts/changepwd.script.php" method="post">
        <div class="container">
          <label for="psw"><b>Password</b></label><br> 
          <input type="password" placeholder="Password" name="psw" required>
            <br>
          <label for="psw2"><b>Repeat Password</b></label><br> 
          <input type="password" placeholder="Repeat Password" name="psw2" required>
          <button type="submit" name="replacepwd-submit">Change</button>
      </form>
    </center>
  
  
  
  </body>
</html>

