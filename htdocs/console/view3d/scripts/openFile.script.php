<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
$ok = 0;
if ($_GET['fileID']) {
  if (isset($_GET['extension'])) {
    $id = $_GET['fileID'];
    $extension = $_GET['extension'];
    $file = "../../uploads/".$id."/".$id.".".$extension;
    if (isset($_SESSION['view3d_jobOwner'])) {
      $owner = $_SESSION['view3d_jobOwner'];
    } else die("Please do not manually navigate to this page.");
  if (!file_exists($file)) {
    $ok = 0;
    die("The file you are trying to access doesn't exist. Check the file format in your URL.");
  } 
     
  if ($_SESSION['permsUsers'] == "admin" || $_SESSION['permsUsers'] == "developer") {
      $ok = 1;
   } elseif ($_SESSION['userUid'] == $owner) {
      $ok = 1;
   } else $ok = 0;
   
   if ($ok == 1){
     unset($_SESSION['view3d_jobOwner']);
    readfile($file);
  } else die("Please do not manually navigate to this page.");
  } else die("Please do not manually navigate to this page.");
} else die("Please do not manually navigate to this page.");