<?php
  session_start();
  $needsAcc=TRUE;
  $needsDev=TRUE;
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
  <?php
    $devActive = TRUE;
    require $_SERVER['DOCUMENT_ROOT']."/header.php";
  ?>
      <br><br> 
      <div style="text-align:center;font-size:25px;">
 <h1>DPWT Developer Console</h1>
<br><br>
<a href="../admin" style="color:inherit;text-decoration:none;"><b><i>&nbsp Admin Console &nbsp</i></b></a><br><br>
<a onclick="STOPaPACHE()" style="color:red;text-decoration:none;"><b><i>&nbsp STOP WEBSITE &nbsp</i></b></a><br><br>
<a onclick="push()" style="color:red;text-decoration:none;"><b><i>&nbsp PUSH FROM GITHUB &nbsp</i></b></a><br><br>
<a onclick="alert('not linked')" style="color:red;text-decoration:none;"><b><i>&nbsp STOP OCTOPRINT &nbsp</i></b></a><br><br>
<a onclick="alert('not linked')" style="color:red;text-decoration:none;"><b><i>&nbsp RESTART OCTOPRINT &nbsp</i></b></a><br><br>
 
   
   </div>
   <form id="action"method="post"action="./doDevActions.script.php"style="visibility:hidden;"></form>
  <script>
  
  function STOPaPACHE() {
    document.getElementById("action").innerHTML='<label for="stop-apache"><b>Password:</b></label><br><input type="password"id="stopapache"name="stop-apache" required>';
    document.getElementById("action").style="visibility:visible;text-align:center;"
  }
    
  function push() {
    document.getElementById("action").innerHTML='<button type="submit">Confirm</button>';
    document.getElementById("action").style="visibility:visible;text-align:center;"
  }
    
  </script>
    <?php require "../../footer.php"; ?>
  </body>
</html>

