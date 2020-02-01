<?php
if (isset($_SESSION['userUid'])) {
  if ($access == "true") {
    require "../../../scripts/handledb.script.php";
    $sql = "SELECT * FROM login_data;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../../error.php/?e=internal");
      exit();
    } else {
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if (!$row = mysqli_fetch_assoc($result)) {
        header("Location: ../../error.php/?e=internal");
      }
    }
  
    if (isset($id)) {
      require "../../../scripts/handledb.script.php";
      $sql = "SELECT * FROM login_data WHERE idUsers=?;";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../../error.php/?e=internal"); //error here
        exit();
      } else {
        mysqli_stmt_bind_param($stmt, "s", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (!$row = mysqli_fetch_assoc($result)) {
          header("Location: ../../error.php/?e=internal");
        } else {
          $name = $row['nameUsers'];
          $username = $row['uidUsers'];
          $email = $row['emailUsers'];
          $perms = $row['permsUsers'];
        }
      }}
  
  
  
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
} else {
  header("Location: ../index.php/");
}