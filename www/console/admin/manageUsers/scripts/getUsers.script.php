<?php
if (isset($_SESSION['userUid'])) {
  if ($access == "true") {
    require $_SERVER['DOCUMENT_ROOT']."/scripts/handledb.script.php";
    $sql = "SELECT * FROM login_data WHERE `permsUsers` NOT LIKE 'deleted';";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: /console/error.php/?e=internal");
      exit();
    } else {
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
//      if (!$row = mysqli_fetch_assoc($result)) {
//        header("Location: /console/error.php/?e=internal");
//      }
//  This is causing the first SQL result to not being displayed.
    }
  
    if (isset($id)) {
      require $_SERVER['DOCUMENT_ROOT']."/scripts/handledb.script.php";
      $sql = "SELECT * FROM login_data WHERE idUsers=?;";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: /console/error.php/?e=internal"); //error here
        exit();
      } else {
        mysqli_stmt_bind_param($stmt, "s", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (!$row = mysqli_fetch_assoc($result)) {
          header("Location: /console/error.php/?e=internal");
        } else {
          $name = $row['nameUsers'];
          $username = $row['uidUsers'];
          $email = $row['emailUsers'];
          $perms = $row['permsUsers'];
          $type = $row['typeUsers'];
        }
      }}
  
  
  
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
} else {
  header("Location: /console/index.php/");
}
