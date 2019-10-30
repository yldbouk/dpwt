<?php
if(isset($_SESSION['userUid'])) {

  if(isset($_GET['edit'])) {
    require $_SERVER['DOCUMENT_ROOT']."/scripts/handledb.script.php";
    $id = $_GET['edit'];
    $sql = "SELECT * FROM job_data WHERE id=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../../error.php/?e=internal");
      exit();
    } else {
      mysqli_stmt_bind_param($stmt, "s", $id);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if ($row = mysqli_fetch_assoc($result)) { 
  
        $name0 = $row['jobName'];
        $reason0 = $row['reason'];
        $date0 = $row['date'];
        $status0 = $row['jobStatus'];
        $requestor0 = $row['createdBy'];
        $location0 = $row["location"];
        $reviewedBy0 = $row['reviewedBy'];
        $printer0 = $row["whatPrinter"];
       
      } else {
        header("Location: ../../error.php/?e=internal");
      }
    }
  }

if($access == "true") {
require "../../../scripts/handledb.script.php";
    $sql = "SELECT * FROM `job_data` WHERE `jobStatus` != 'purge' AND `jobStatus` != 'complete' AND `jobStatus` != 'denied' AND `jobName` NOT LIKE 'T.DONOTMODIFY'";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../../error.php/?e=internal");
      exit();
    } else {
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if (!$row = mysqli_fetch_assoc($result)) { 
       header("Location: ../../error.php/?e=.internal");
  }
  if(!isset($row["reviewedBy"])){ $reviewedBy = "<i>None</i>";}
  if(!isset($row["location"])){ $location = "<i>None</i>";}
}}

if($access == "true-personal") {
  require "../../scripts/handledb.script.php";
      $sql = "SELECT * FROM job_data WHERE createdBy=? AND `jobName` NOT LIKE 'T.DONOTMODIFY'";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../../error.php/?e=internal");
        exit();
      } else {
        mysqli_stmt_bind_param($stmt, "s", $_SESSION['userName']);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (!$row = mysqli_fetch_assoc($result)) { 
          header("Location: /console/error.php/?e=internal");
          exit();
    }
   if(!isset($row["reviewedBy"])){ $reviewedBy = "<i>None</i>";}
   if(!isset($row["location"])){ $location = "<i>None</i>";}
  }}
 
  if($access == "true-showall") {
    require "../../../scripts/handledb.script.php";
        $sql = "SELECT * FROM job_data WHERE `jobName` NOT LIKE 'T.DONOTMODIFY'";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          header("Location: ../../../error.php/?e=internal");
          exit();
        } else {
          mysqli_stmt_execute($stmt);
          $result = mysqli_stmt_get_result($stmt);
          if (!$row = mysqli_fetch_assoc($result)) { 
            header("Location: ../../error.php/?e=internal");
      }
      if(!isset($row["reviewedBy"])){ $reviewedby = "<i>None</i>";}
      if(!isset($row["location"])){ $location = "<i>None</i>";}
    }}

mysqli_stmt_close($stmt);
  mysqli_close($conn);
} else {
  header("Location: ../../index.php/");
}
