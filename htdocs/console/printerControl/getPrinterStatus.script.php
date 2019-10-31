<?php
if(isset($_SESSION['userUid'])) {
  if($access == "true") {
    require $_SERVER["DOCUMENT_ROOT"]."/scripts/handledb.script.php";
    $sql = "SELECT * FROM `printer_data` WHERE `friendlyname` = 'CeeMeCNC Orion Delta'";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../../error.php/?e=internal");
      exit();
    } else {
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if (!$row = mysqli_fetch_assoc($result)) { 
        header("Location: ../../error.php/?e=internal");
      } else {
        if ($row['locked'] == "1") $deltaLocked = true; else $deltaLocked = false;
        $row['']
      }
  
    }
  } else header("Location: ../console.php");
} else {
  header("Location: ../../index.php");
}
