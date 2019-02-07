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
    <header>
      <div class="header">
        <a href="../../" class="logo">D P W T</a>
        <div class="header-right">
        <nav>
            <?php echo "<text>".$_SESSION['userUid']."</text>"?><a />
            <a href="../../../">Home</a>
            <a class='active'>Console</a><a />
            <a class="blacknav" href="/acc/logout">Logout</a>
          </nav>
        </div>
      </div>
    </header>
      <br><br> 
    
      <div style="text-align:center;font-size:25px;">
 <h1>DPWT Admin Console</h1>
<br><br>
<a href="manageUsers/" style="color:inherit;text-decoration:none;"><b><i>&nbsp Manage DPWT Users &nbsp</i></b></a><br><br>
<a href="../viewJobs/admin" style="color:inherit;text-decoration:none;"><b><i>&nbsp Manage DPWT Prints &nbsp</i></b></a>
  
   
   </div>
    <?php require "../../footer.php"; ?>
  </body>
</html>

