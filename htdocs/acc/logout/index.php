<?php
  session_start();
  $needsAcc=TRUE;
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
<?php
    require $_SERVER['DOCUMENT_ROOT']."/header.php";
  ?>
  <br><br>
  <center>
    Are you sure you want to log out?
    <br><br><br>
    <form action="../scripts/logout.script.php" method="get">
      <button type="submit" name="login-submit">Log Out</button>
    </form><br><br>
    <button class="red" onclick="history.go(-1)">Go Back</button>
  </center>
  <?php 
      require "../../footer.php";
    ?>

</body>

</html>