<?php
  session_start();
  if (!isset($_SESSION['userUid'])) {
    header("Location: ../login/index.php?result=perm");
  }
    ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/form.css">
    <meta charset="utf-8">
    <title>Logout - DPWT</title>
  </head>
  <body>
    <header>
      <div class="header">
        <a href="/" class="logo">D P W T</a>
        <div class="header-right">
          <nav>
            <?php if(isset($_SESSION['userUid'])) echo "<text>".$_SESSION['userUid']."</text>"?><a />
            <a href="/">Home</a>
            <a href="/console">Console</a>
          </nav>
        </div>
      </div>
    </header>
      <br><br>
      <center>
          Are you sure you want to log out?
            <br><br><br>
          <form action="../scripts/logout.script.php" method="get">
          <button type="submit" name="login-submit">Log Out</button>
        </form>
      </center>
    <?php 
      require "../../footer.php";
    ?>
 
    </body>
</html>
