<?php 
  session_start();
  $needsAcc=TRUE;
  $needsAdmin=TRUE;
  $access="true";
  require 'getPrinterStatus.script.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
  <link rel="stylesheet" href="/css/header.css">
  <link rel="stylesheet" href="/css/form.css">
  <meta charset="utf-8">
  <title>Printer Control - DPWT</title>
  <style>
* {
  box-sizing: border-box;
}

/* Create three equal columns that floats next to each other */
.column {
  float: left;
  width: 33.33%;
  padding: 10px;
}

.row {
  text-align: center;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>

</head>

<body>
<?php
    $adminActive = TRUE;
    require $_SERVER['DOCUMENT_ROOT']."/header.php";
  ?>
  <br>



  <div class="row">
  <div class="column">
    <h2>No Other Printers Configured</h2>
    <p>Set them up, then head on here for control.</p>
  </div>
  
  
  <div class="column" style="background-color:#bbb;">
    <h2>SeeMeCNC Orion Delta</h2>
    <p>
    <br><br>
    <?php if($deltaLocked == false) {
      echo '
        <i>Publicly Available</i>
        <br><br>
       <a style="cursor:pointer" onclick="lockOrion()"><img src="data:image/png;base64,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" alt="Lock Button"></img>
        <br>
        Lock Printer</a>
        ';
    } elseif($deltaLocked == true) {
      echo '
        <i>Locked From Public</i>
        <br><br>
        <a style="cursor:pointer" onclick="unlockOrion()"><img src="data:image/png;base64,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" alt="Unlock Button"></img>
        <br>
        Unlock Printer</a>
        ';
    }
    ?>
    
    </p>
  </div>
  
  
  <div class="column" >
  <h2>No Other Printers Configured</h2>
    <p>Set them up, then head on here for control.</p>
  </div>
</div><br><br>


<form id="action" method="post" action="./changePrinterStatus.script.php" style="visibility:hidden;"></form>

<script>

function lockOrion() {
    document.getElementById("action").innerHTML='<label for="lock-orion"><b>Password:</b></label><br><input type="password" name="lock-orion" required>';
    document.getElementById("action").style="visibility:visible;text-align:center;"
  }
function unlockOrion() {
    document.getElementById("action").innerHTML='<label for="unlock-orion"><b>Password:</b></label><br><input type="password" name="unlock-orion" required>';
    document.getElementById("action").style="visibility:visible;text-align:center;"
  }

</script>

  <?php require "../../footer.php";?>
</body>

</html>