<?php

if (isset($_POST['pwd-submit'])) {
  session_start();
  require '../../scripts/handledb.script.php';

  $password = $_POST['psw'];
  $confirmPassword = $_POST['psw2'];
  $userID = $_SESSION['userUid']

  if (empty($password) || empty($confirmPassword)) {
    header("Location: ../login/changepwd/index.php?result=incomplete");
    exit();
  }
  elseif(!$password == $confirmPassword) {
    header("Location: ../login/changepwd/index.php?result=pwd");
    exit();

  } else {
    $sql = "SELECT idUsers FROM login_data WHERE idUsers=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../login/changepwd/index.php?result=sqlerror");
      exit();
    } else {
      mysqli_stmt_bind_param($stmt, "s", $userID);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $sql = "INSERT INTO login_data (uidUsers, nameUsers, emailUsers, pwdUsers, permsUsers) VALUES (?, ?, ?, ?, ?)";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../request/index.php?result=sqlerror");
        exit();
        } else {
          $hashpwd = password_hash($password, PASSWORD_DEFAULT);
          mysqli_stmt_bind_param($stmt, "sssss", $username, $name, $email, $hashpwd, $permissions);
          mysqli_stmt_execute($stmt);

          $sql = "INSERT INTO job_data (jobName, reason, jobStatus, createdBy, whatPrinter) VALUES (?, ?, ?, ?, ?)";
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../requestprint/index.php?result=sqlerror");
            exit();
          } else {
            $tmp0="T.DONOTMODIFY";$tmp1="T.DONOTMODIFY";$tmp2="T.DONOTMODIFY";$tmp3="T.DONOTMODIFY";
            mysqli_stmt_bind_param($stmt, "sssss", $tmp0, $tmp1, $tmp2, $username, $tmp3);
            unset($tmp0);unset($tmp1);unset($tmp2);unset($tmp3);
            mysqli_stmt_execute($stmt);
          }
          header("Location: ../login/index.php?result=signup");
          exit();
        }
      }
    }
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
} else {
  header("Location: ../request/index.php");
}