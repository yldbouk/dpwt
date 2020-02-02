<?php session_start(); $needsAcc=TRUE;?>
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
  <?php
    $accActive = TRUE;
    require $_SERVER['DOCUMENT_ROOT']."/header.php";
  ?>
      <br><br>
       <center>
         <!-- SPLITTER -->
      <h1>Change Password</h1><h3>You can change your password below.</h3>
      <br>
      <?php 
    if (isset($_GET['result'])) {
      if ($_GET['result'] == "incomplete") {
       echo '<h4>Please fill out all fields.</h4>';
      } elseif ($_GET['result'] == "pwd") {
        echo '<h4>Your passwords did not match. Please ty again.</h4>';
      } elseif ($_GET['result'] == "pwdnogo") {
        echo '<h4>Your old password did not match our records. Please try again.</h4>';
      } else {
        echo '<h4>An unknown error occured. Please try again.</h4>';
      }
    }
   ?>
   
      <form action="scripts/changepwd" method="post">
        <div class="container">
          <label for="oldpsw"><b>Old Password</b></label><br> 
          <input type="password" placeholder="Old Password" name="oldpsw" required>
            <br>
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
