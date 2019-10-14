<?php
  session_start();
  if (!isset($_SESSION['userUid'])) {
    header("Location: ../../../acc/login");
  }
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

