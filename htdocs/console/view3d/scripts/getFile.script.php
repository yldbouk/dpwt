<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
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
        $_SESSION['view3d_jobOwner'] = $row['createdBy'];
        $jobStatus = $row['jobStatus'];
        if ($jobStatus == "purge") die("The job with id ".$id." is purged. (".$jobStatus.")");
        else {

          if ($row["createdBy"] == $_SESSION['userUid'] || $_SESSION["permsUsers"] == "admin" || $_SESSION["permsUsers"] == "developer") {

            if (file_exists("../uploads/".$id."/".$id.".stl")) {
              $extension = "STL";
            }
            elseif(file_exists("../uploads/".$id."/".$id.".obj")) {
              $extension = "OBJ";

            } else die("Job has no viewable files.");

          } else die("Job Creator does not match current user or does not have sufficient permissions to view jobs.");
        }
      }
    }
  } else die("No job id given.");
 
  
} else header("Location: /acc/login");