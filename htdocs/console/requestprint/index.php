<?php
session_start();
$needsAcc=TRUE;
$needsPrinter=TRUE;
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/form.css">
    <meta charset="utf-8">
    <title>Request a Print - DPWT</title>
  </head>
  <body>
<?php
    $consoleActive = TRUE;
    require $_SERVER['DOCUMENT_ROOT']."/header.php";
  ?>
    <center>
         <!-- SPLITTER -->
		<h1>Request to Print a Model</h1><br><h3>Please fill out the form. Once submitted, your request will be reviewed, then put on queue.</h3>
      <br>
      <?php 
    if (isset($_GET['result'])) {
      if ($_GET['result'] == "incomplete") {
       echo '<h4>Please Fill out all Fields.</h4>';
      } elseif ($_GET['result'] == "sqlerror") {
        echo '<h4>An internal error has occured. Please try again later.</h4>';
      } elseif ($_GET['result'] == "servername") {
        echo '<h4>The text either in your name or reason is blacklisted. Please replace it and try again.</h4>';
      } elseif ($_GET['result'] == "filetype") {		       
        echo '<h4>Sorry, we only accept STL and OBJ files.</h4>';
      } elseif ($_GET['result'] == "existingjob") {		
        echo "<h4>You've already made a job with that name! Try a different name.</h4>";		
      } elseif ($_GET['result'] == "filesize") {
        echo '<h4>Your file is too large. Please contact us for a special request.</h4>';
      } else {
        echo '<h4>An unknown error occured. Please try again.</h4>';
      }
    }
   ?>
      <form action="scripts/createRequest.script.php" method="post" enctype="multipart/form-data">
        <div class="container">
          <label for="name"><b>Print Name</b></label><br>
          <input type="text" placeholder="Anything that identifies your print will work." name="name" required>
            <br>
          <label for="reason"><b>Reason</b></label><br>
          <input type="text" placeholder="Why should we allow you to print this?" name="reason" required>
            <br>
          <label for="color"><b>Color</b></label><br>
          <select name="color" required>
            <option value="Red">Red</option>
            <option value="Blue">Blue</option>
            <option value="Purple">Purple</option>
          </select>
            <br><br>
          <?php 
            if ($_SESSION['permsUsers'] == "developer" || $_SESSION['permsUsers'] == "admin") {
            echo '
            <label for="autoaccept"><b>Place in Queue</b></label><br>
            <input type="checkbox" name="autoaccept" id="autoaccept" value="1"/><br><br>
            '; //no matter what, it sets as on
            }
          ?>
          <label for="3d"><b>File to Print</b></label><br>
    Currently, the only accepted file type is STL.<br>
 
    <button type="button" id="u" onclick="document.getElementById('upload').style.display='block'" style="width:auto;"><svg style="width:24px;height:24px" viewBox="0 0 24 24">
    <path fill="#000000" d="M17,22V20H20V17H22V20.5C22,20.89 21.84,21.24 21.54,21.54C21.24,21.84 20.89,22 20.5,22H17M7,22H3.5C3.11,22 2.76,21.84 2.46,21.54C2.16,21.24 2,20.89 2,20.5V17H4V20H7V22M17,2H20.5C20.89,2 21.24,2.16 21.54,2.46C21.84,2.76 22,3.11 22,3.5V7H20V4H17V2M7,2V4H4V7H2V3.5C2,3.11 2.16,2.76 2.46,2.46C2.76,2.16 3.11,2 3.5,2H7M13,17.25L17,14.95V10.36L13,12.66V17.25M12,10.92L16,8.63L12,6.28L8,8.63L12,10.92M7,14.95L11,17.25V12.66L7,10.36V14.95M18.23,7.59C18.73,7.91 19,8.34 19,8.91V15.23C19,15.8 18.73,16.23 18.23,16.55L12.75,19.73C12.25,20.05 11.75,20.05 11.25,19.73L5.77,16.55C5.27,16.23 5,15.8 5,15.23V8.91C5,8.34 5.27,7.91 5.77,7.59L11.25,4.41C11.5,4.28 11.75,4.22 12,4.22C12.25,4.22 12.5,4.28 12.75,4.41L18.23,7.59Z" />
</svg></button>
    
    <div id="upload" class="upload">
    <div class="uploadc">
    <div class="container">
      <label for="3d"><b>3D File: </b></label><br><br>
        <input type="file" id="stlobj" name="stlobj" accept=".stl" required>

    </div>

    <div class="container" style="padding: 16px; text-align: center; background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('upload').style.display='none'" class="cancelbtn">OK</button>
      
    </div>
      </div>
        </div>
    
      <br>
      <button type="submit" name="request-submit">Submit Request</button>
	</div>
    </form>
    </center>  
   <br> <br>  
<?php require "../../footer.php"; ?>

</body>
</html>
