<?php
if (session_status() == PHP_SESSION_NONE) session_start();
if (isset($_SESSION["userUid"])) {
  if (isset($_GET['id'])) {
    
    require $_SERVER['DOCUMENT_ROOT']."/scripts/handledb.script.php";
    $id = $_GET['id'];

    $sql = "SELECT * FROM job_data WHERE id=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../../error.php/?e=internal");
      exit();
    } else {
      mysqli_stmt_bind_param($stmt, "s", $id);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if (!$row = mysqli_fetch_assoc($result)) {
        die("There was an error. The most likely possibility is that the job doesn't exist.");
      } else {
        $owner = $row['createdBy'];
        $jobStatus = $row['jobStatus'];
        if ($jobStatus == "purge") die("The job with id ".$id." is purged. (".$jobStatus.")");
        else {
          if ($row["createdBy"] == $_SESSION['userName'] || $_SESSION["permsUsers"] == "admin" || $_SESSION["permsUsers"] == "developer") {
            if (file_exists($_SERVER['DOCUMENT_ROOT']."/console/uploads/".$id."/".$id.".stl")) {
              $extension = ".stl";
            }
            elseif(file_exists($_SERVER['DOCUMENT_ROOT']."/console/uploads/".$id."/".$id.".obj")) {
              $extension = ".obj";

            } else die("Job has no viewable files.");
            $ok = 0;
    $file = $_SERVER['DOCUMENT_ROOT']."/console/uploads/".$id."/".$id.$extension;
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

    $quoted = sprintf('"%s"', addcslashes(basename($file), '"\\'));
    $size   = filesize($file);

    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . $quoted); 
    header('Content-Transfer-Encoding: binary');
    header('Connection: Keep-Alive');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . $size);


    readfile($file);
  } else die("An authorization error has occured. You do not have permission.");


          } else die("Job Creator does not match current user or does not have sufficient permissions to view jobs.");
        }
      }
    }
  } else die("No job id given.");
 
  
} else header("Location: /acc/login");
