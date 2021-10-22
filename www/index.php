<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link rel="stylesheet" href="../../css/header.css">
    <meta charset="utf-8">
    <title>Home - DPWT</title>
  </head>
  <body>
  <?php
    $homeActive = TRUE;
    require $_SERVER['DOCUMENT_ROOT']."/header.php";
  ?>
     
    <?php 
      require $_SERVER['DOCUMENT_ROOT']."/footer.php";
    ?>
  
  
  </body>
</html>
