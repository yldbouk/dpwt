<?php
  session_start();
  if (!isset($_SESSION['userUid'])) {
    header("Location: /acc/login");
  } elseif (!$_SESSION['permsUsers'] == "developer"){
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
    <title>Developer Console - DPWT</title>
  </head>
  <body>
    <header>
      <div class="header">
        <a href="../../" class="logo">{ D P W T }</a>
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
 <h1>DPWT Developer Console</h1>
<br><br>
<a href="../admin" style="color:inherit;text-decoration:none;"><b><i>&nbsp Admin Console &nbsp</i></b></a><br><br>
<a onclick="STOPaPACHE()" style="color:red;text-decoration:none;"><b><i>&nbsp STOP WEBSITE &nbsp</i></b></a><br><br>
<a onclick="alert('not linked')" style="color:red;text-decoration:none;"><b><i>&nbsp STOP OCTOPRINT &nbsp</i></b></a><br><br>
<a onclick="alert('not linked')" style="color:red;text-decoration:none;"><b><i>&nbsp RESTART OCTOPRINT &nbsp</i></b></a><br><br>
 
   
   </div>
   <form id="action"method="post"action="./doDevActions.script.php"style="visibility:hidden;"></form>
  <script>
  
  function STOPaPACHE() {
    document.getElementById("action").innerHTML='<label for="stop-apache"><b>Password:</b></label><br><input type="password"id="stopapache"name="stop-apache" required>';
    document.getElementById("action").style="visibility:visible;text-align:center;"
  }
  </script>
    <?php require "../../footer.php"; ?>
  </body>
</html>

