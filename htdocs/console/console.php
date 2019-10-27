<?php
  session_start();
  $needsAcc=TRUE;
  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
  <link rel="stylesheet" href="../css/header.css">
  <meta charset="utf-8">
  <title>Printer Status - DPWT</title>
</head>

<body>
<?php
    $consoleActive = TRUE;
    require $_SERVER['DOCUMENT_ROOT']."/header.php";
  ?>
  <nav style="text-align:center;">
    <a href="requestprint/" style="color:inherit;text-decoration:none;"><b><i>&nbsp Make a Print &nbsp</i></b></a>
    <a href="viewJobs" style="color:inherit;text-decoration:none;"><b><i>&nbsp View Your Prints &nbsp</i></b></a>
    <?php if ($_SESSION['permsUsers'] == "admin" || $_SESSION['permsUsers'] == "developer") echo '<a href="admin/" style="color:inherit;text-decoration:none;"><b><i>&nbsp Admin Console &nbsp</i></b></a>';?>
    <?php if ($_SESSION['permsUsers'] == "developer") echo '<a href="dev/" style="color:inherit;text-decoration:none;"><b><i>&nbsp Developer Console &nbsp</i></b></a>';?>
  </nav>
  <br><br>
  <!-- SPLITTER -->
  insert printer status here with php include<br>
  printerstatus, beginning time, estimated time to finish, camera of possible
  https://secure.php.net/manual/en/function.shell-exec.php

  <?php 
      require "../footer.php";
    ?>

</body>

</html>