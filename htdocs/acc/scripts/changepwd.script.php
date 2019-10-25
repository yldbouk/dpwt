<?php

if (isset($_POST['pwd-submit'])) {
  session_start();
  require '../../scripts/handledb.script.php';

  $password = $_POST['psw'];
  $confirmPassword = $_POST['psw2'];
  $userID = $_SESSION['userid'];

  if (empty($password) || empty($confirmPassword)) {
    header("Location: ../login/changepwd/index.php?result=incomplete");
    exit();
  }
  elseif(!$password == $confirmPassword) {
    header("Location: ../changepwd/index.php?result=pwd");
    exit();

  } else {
    $sql = "SELECT idUsers FROM login_data WHERE idUsers=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../changepwd/index.php?result=sqlerror");
      exit();
    } else {
      mysqli_stmt_bind_param($stmt, "s", $userID);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $sql = "UPDATE login_data SET pwdUsers=? WHERE idUsers=?";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../changepwd/index.php?result=sqlerror");
        exit();
        } else {
          $hashpwd = password_hash($password, PASSWORD_DEFAULT);
          mysqli_stmt_bind_param($stmt, "ss", $hashpwd, $userID );
          mysqli_stmt_execute($stmt);

          header("Location: ../../console");
          exit();
        }
      }
     }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);

} else if (isset($_POST['replacepwd-submit'])) {
  session_start();
  require '../../scripts/handledb.script.php';

  $password = $_POST['psw'];
  $confirmPassword = $_POST['psw2'];
  $userID = $_SESSION['userid'];

  if (empty($password) || empty($confirmPassword)) {
    header("Location: ../login/changepwd/index.php?result=incomplete");
    exit();
  }
  elseif(!$password == $confirmPassword) {
    header("Location: ../changepwd/index.php?result=pwd");
    exit();

  } else {
    $sql = "SELECT idUsers FROM login_data WHERE idUsers=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../changepwd/index.php?result=sqlerror");
      exit();
    } else {
      mysqli_stmt_bind_param($stmt, "s", $userID);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $sql = "UPDATE login_data SET pwdUsers=? WHERE idUsers=?";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../changepwd/index.php?result=sqlerror");
        exit();
        } else {
          $hashpwd = password_hash($password, PASSWORD_DEFAULT);
          mysqli_stmt_bind_param($stmt, "ss", $hashpwd, $userID);
          mysqli_stmt_execute($stmt);

          $sql = "UPDATE login_data SET permsUsers=? WHERE idUsers=?";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../changepwd/index.php?result=sqlerror");
        exit();
        } else {
          $default = "default";
          mysqli_stmt_bind_param($stmt, "ss", $default, $userID);
          mysqli_stmt_execute($stmt);
          session_unset();
          session_destroy();
          header("Location: ../login/index.php?result=logout");
        }
        }
      }
     }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
} else {
  header("Location: ../");
}