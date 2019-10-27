<?php
  session_start();
  if (!isset($_SESSION['userUid'])) {
    header("Location: /acc/login");
  } elseif (!$_SESSION['permsUsers'] == "admin" || !$_SESSION['permsUsers'] == "developer"){
    echo '<script>history.go(-1);</script>';
  }
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
<a href="../viewJobs/admin" style="color:inherit;text-decoration:none;"><b><i>&nbsp Job Management &nbsp</i></b></a><br><br>
<a href="../printerControl" style="color:inherit;text-decoration:none;"><b><i>&nbsp Printer Management &nbsp</i></b></a>
  
   
   </div>
    <?php require "../../footer.php"; ?>
  </body>
</html>

