<?php

if (isset($_POST['submitted'])) {
  session_start();
  require $_SERVER['DOCUMENT_ROOT'].'/scripts/handledb.script.php';

  $startRange = $_POST['rangeStart'];
  $endRange = $_POST['rangeEnd'];
  $permissions = $_SESSION['perms'];

    $sql = "SELECT * FROM login_data WHERE idUsers BETWEEN ? AND ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: /console/admin/manangeUsers/bulk.php?result=sqlerror");
      exit();
    } else {
      mysqli_stmt_bind_param($stmt, "ss", $startRange, $endRange);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
	    if (mysqli_num_rows($result) < 1) {
        header("Location: /console/admin/manageUsers/bulk.php?result=invalidRange");
          exit();
      } else {
        $row = mysqli_fetch_assoc($result);
        if($row['idUsers'] <4) { // First 3 users can not be changed.
          header("Location: /console/admin/manageUsers/bulk.php?result=unchangeable");
          exit();
        }
      }
      $sql = "UPDATE login_data SET permsUsers=? WHERE idUsers BETWEEN ? AND ?;";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: /console/admin/manageUsers/bulk.php?result=sqlerror");
        exit();
        } else {
          mysqli_stmt_bind_param($stmt, "sss", $permissions, $startRange, $endRange);
          mysqli_stmt_execute($stmt);
          header("Location: /console/admin/manageUsers/bulk.php?result=success");
          exit();
        }
      }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);

} else {
  header("Location: /console/admin/manageUsers/bulk.php");
}