<?php
  session_start();
  $needsAcc=TRUE;
  $needsAdmin=TRUE;
  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/form.css">
    <meta charset="utf-8">
    <title>Admin Console - DPWT</title>
  </head>
  <body>
  <?php
    $adminActive = TRUE;
    require $_SERVER['DOCUMENT_ROOT']."/header.php";
  ?>
      <br><br> 
    
      <div style="text-align:center;font-size:25px;">
 <h1>DPWT Admin Console</h1>
<br><br>
<a href="manageUsers/" style="color:inherit;text-decoration:none;"><b><i>&nbsp User Management &nbsp</i></b></a><br><br>
<a href="/console/viewJobs/admin" style="color:inherit;text-decoration:none;"><b><i>&nbsp Job Management &nbsp</i></b></a><br><br>
<a href="/console/printerControl" style="color:inherit;text-decoration:none;"><b><i>&nbsp Printer Management &nbsp</i></b></a><br><br>
<a href="./guides.md.php" style="color:inherit;text-decoration:none;"><b><i>&nbsp DPWT Help &nbsp</i></b></a><br><br>
   </div>
    <?php require $_SERVER['DOCUMENT_ROOT']."/footer.php"; ?>
  </body>
</html>

