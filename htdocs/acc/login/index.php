<?php
  session_start();
  if (isset($_SESSION['userUid'])) {
    header("Location: ../../console");
  }
  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/form.css">
    <meta charset="utf-8">
    <script src="https://apis.google.com/js/platform.js" async defer></script><meta name="google-signin-client_id" content="944575927528-hs8dm7ogbn804qksdffdq3dk9uletued.apps.googleusercontent.com">
    
    <title>Login - DPWT</title>
  </head>
  <body>
  <?php
    $loginActive = TRUE;
    require $_SERVER['DOCUMENT_ROOT']."/header.php";
  ?>
       <center>
         <!-- SPLITTER -->
      <h1>Log In</h1><br><h3>Welcome Back, you can log in here.</h3>
   <?php 
    if (isset($_GET['result'])) {
      if ($_GET['result'] == "incomplete") {
       echo '<h4>Please Fill out all Fields.</h4>';
      } elseif ($_GET['result'] == "sqlerror") {
        echo '<h4>An internal error has occured. Please try again later.</h4>';
      } elseif ($_GET['result'] == "usrname") {
        echo '<h4>There is no account with that username. Please try again.</h4>';
      } elseif ($_GET['result'] == "pwdnogo") {
        echo '<h4>That password did not match our records. Please try again.</h4>';
      } elseif ($_GET['result'] == "signup") {
        echo '<h4>You have successfully signed up! Please wait for your permissions to be aquired.</h4>';
      } elseif ($_GET['result'] == "logout") {
        echo '<h4>You have successfully logged out!</h4>';
      } elseif ($_GET['result'] == "perm") {
        echo '<h4>You need to log in to view this page!</h4>';
      } elseif ($_GET['result'] == "awaitingAction") {
        echo '<h4>Your request is still being reviewed. Please try again later.</h4>';
      } elseif ($_GET['result'] == "changedpwd") {
        echo '<h4>You have successfully changed your password! Please login again.</h4>';
      } elseif ($_GET['result'] == "noperms") {
        echo '<h4>Your request for access has been reviewed and denied. If you believe this is a mistake, please try to contact us.</h4>';
      } elseif ($_GET['result'] == "revoke") {
        echo '<h4>Your access has been revoked. If you believe this is a mistake, please try to contact us.</h4>';
      } elseif ($_GET['result'] == "change") {
        echo '<h4>Sorry, but your account has been changed. Please sign in again.</h4>';
      } elseif ($_GET['result'] == "accdel") {
        echo '<h4>Your account has been permanently deleted. Please create a new account.</h4>';
      } else {
        echo '<h4>An unknown error occured. Please try again.</h4>';
      }
    }
   ?>
         <br>
         <div class="g-signin2" data-onsuccess="onSignIn"></div>
         <br>
      <form action="../scripts/login.php" method="post">
        <div class="container">
          <label for="user"><b>Username</b></label><br>
          <input type="text" placeholder="Enter Username" name="uname" required>
            <br>
          <label for="psw"><b>Password</b></label><br>
          <input type="password" placeholder="Enter Password" name="psw" required>
               
          <button type="submit" name="login-submit">Login</button>
      </form>
    <br>
    No Account? Request Access <a href="../request">Here</a>
    </center>
    <script>
      function onSignIn(googleUser) {
        var profile = googleUser.getBasicProfile();
        console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
        console.log('Name: ' + profile.getName());
        console.log('Image URL: ' + profile.getImageUrl());
        console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
      }
    </script>
    <?php 
      require "../../footer.php";
    ?>
  </body>
</html>

