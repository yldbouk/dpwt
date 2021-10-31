<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link rel="stylesheet" href="/css/header.css">
    <meta charset="utf-8">
    <title>Error - DPWT</title>
  </head>
  <body>
  <?php
    $consoleActive = TRUE;
    require $_SERVER['DOCUMENT_ROOT']."/header.php";
  ?>
    <br><h4>
	  <?php 
	  if($_GET["e"] == "perms") {

      echo  "We're sorry, but it seems that you do not have the valid permissions to view this page. Your current permission rank is:<br><br>";

     if ($_SESSION['permsUsers'] == "awaitingAction") {
        echo "Awaiting Action - You have recently requested access and are waiting for your request to be reviewed. Please try again later.";
      } elseif ($_SESSION['permsUsers'] == "none") {
        echo "Access Denied - Your request for access has been reviewed and denied. If you believe this is a mistake, please try to contact us.";
      } elseif ($_SESSION['permsUsers'] == "view") { 
        echo "View Only - your permissions only allow you to view the status of 3d printers. If you belive this is an error, please contact us.";
      } elseif ($_SESSION['permsUsers'] == "default") { 
        echo "Default Permissions - Your permissions only allow you to view the status of printers and request to print. If you believe this is an error, please contact us. ";
      } elseif ($_SESSION['permsUsers'] == "admin") { 
        echo "Admin - You are an administrator and can make 3d prints, view 3d print requests from students, and change printer settings. The page you are trying to view is most likely restricted to developers. If you believe this is an error, please contact us.";
      } elseif ($_SESSION['permsUsers'] == "developer") { 
        echo "Developer - It's a suprise to see you here, considering you have every permission. Let's not get too cocky.";
      } else {
        echo "An unknown error has occured and we could not check your permissions. Please notify us and try again.";
      }
    } elseif($_GET["e"] == "printerlocked") {
		  echo  "We're sorry, but it seems that the printer you chose is locked. This may be due to maintencence or errors. Please try again later.<br><br>";
	  } elseif($_GET["e"] == "internal") {
		  echo  "We're sorry, but it seems that we encountered an error. Please try again later.<br><br>";

	  }
     ?>
   </h4>
    <?php 
      require "../footer.php";
    ?>
  
  
  </body>
</html>
