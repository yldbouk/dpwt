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
    <title>Select a Printer - DPWT</title>
  </head>
  <body>
  <?php
    $consoleActive = TRUE;
    require $_SERVER['DOCUMENT_ROOT']."/header.php";
  ?>
      <br><br> 
      <div style="text-align:center;">
         <!-- SPLITTER -->
      <h1>Select Printer</h1><br><h3>
      <?php
      if (isset($_SESSION['friendlyname'])) {
        echo 'You have selected '.$_SESSION['friendlyname'];
      } else {
        echo 'Please select the printer you want to use.';
      }
      ?>
        
      </h3>
      <br>
      <br>
      <form action="scripts/printerselect.script.php" method="post"> 
        <div class="container">
          <label for="user"><b>Select a Printer:</b></label><br>
          <select name="printer">
            <option value="orion">SeeMeCNC Orion Delta</option>
            <option disabled value="minimaker">da Vinci miniMaker</option>
            <option disabled value="flashforge">FlashForge Finder</option>
            <option disabled value="minimaker2">da Vinci miniMaker2</option>
          </select>
        </div>
        <button type="submit" name="printerselect-submit">Select This Printer</button>
      </form>
    </div>
  
    <?php 
      require "../footer.php";
    ?>
  
  
  </body>
</html>

