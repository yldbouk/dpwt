<?php session_start(); ?>
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
        <a href="../../" class="logo">D P W T</a>
        <div class="header-right">
          <nav>
            <?php if(isset($_SESSION['userUid'])) echo "<text>".$_SESSION['userUid']."</text>"?><a />
            <a href="../../">Home</a>
            <?php if(isset($_SESSION['userUid'])) echo "<a href='../../console'>Console</a>"?><a />
            <a class="blacknav" href="../logout">Logout</a>
          </nav>
        </div>
      </div>
    </header>
      <br><br>
       <center>
         <!-- SPLITTER -->
      <h1>Change Password</h1><h6>You can change your password below.</h6>
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
          <button type="submit" name="pwd-submit">Change</button>
      </form>
    </center>
  
  
  
  </body>
</html>

