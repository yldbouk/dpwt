<?php

if (isset($_POST['signup-submit'])) {
  require '../../scripts/handledb.script.php';

  $username = $_POST['uname'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['psw'];
  $confirmPassword = $_POST['psw2'];
  $permissions = "awaitingAction";

  if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
    header("Location: ../request/index.php?result=incomplete");
    exit();
  }
  elseif(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    header("Location: ../request/index.php?result=emailandusr");
    exit();
  }
  elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../request/index.php?result=email");
    exit();
  }
  elseif(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    header("Location: ../request/index.php?result=username");
    exit();
  }
  elseif(!$password == $confirmPassword) {
    header("Location: ../request/index.php?result=pwd");
    exit();

  } else {
    $sql = "SELECT uidUsers FROM login_data WHERE uidUsers=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../request/index.php?result=sqlerror&user=".$username.
        "&email=".$email);
      exit();
    } else {
      mysqli_stmt_bind_param($stmt, "s", $username);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultcheck = mysqli_stmt_num_rows($stmt);
      if ($resultcheck > 0) {
        header("Location: ../request/index.php?result=usertaken&email=".$email);
        exit();
      } else {
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