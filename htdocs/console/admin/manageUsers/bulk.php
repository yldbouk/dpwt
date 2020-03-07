<?php
session_start();
$needsAcc=TRUE;
$needsAdmin=TRUE;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
  <link rel="stylesheet" href="/css/header.css">
  <link rel="stylesheet" href="/css/form.css">
  <meta charset="utf-8">
  <title>Bulk Change Permissions - DPWT</title>
</head>
<body>
  <?php
    $adminActive = TRUE;
    require $_SERVER['DOCUMENT_ROOT']."/header.php";
  ?>
  <center>
<br><h2>Bulk Change Permissions</h2>
<?php 
    if (isset($_GET['result'])) {
      if ($_GET['result'] == "success") 
       echo '<h4>Success!</h4>';
      elseif ($_GET['result'] == "sqlerror") 
        echo '<h4>An internal error has occured. Please try again later.</h4>';
      elseif ($_GET['result'] == "invalidRange") 
        echo '<h4>The database did not return any users with your supplied range. Please recheck them and try again.</h4>';
      elseif ($_GET['result'] == "unchangeable") 
        echo '<h4>Please note uses with ID 1-3 are not changeable for security purposes. Please adjust your ranges and try again.</h4>';
      else
        echo '<h4>An unknown error occured. Please try again.</h4>';
    }
   ?>
<br>
<br><br>
<form type="post" action="scripts/bulk.php">
Change the Permission of user IDs <input name="rangeStart" required type="number" /> through <input required name="rangeEnd" type="number" /> to <select name="perms" required><option disabled selected /><option value="default">Default Permissions</option><option value="none">No Permissions</option></select>
<br><br>
<button type="submit" name="submitted">Submit</button>
</form>


</center>
<?php require $_SERVER['DOCUMENT_ROOT']."/footer.php"; ?>
</body>
</html>