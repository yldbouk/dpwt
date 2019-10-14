<?php
session_start();
if (isset($_SESSION['userUid'])) {
  if ($_SESSION['permsUsers'] == "developer" || $_SESSION['permsUsers'] == "admin") {
    include "../../scripts/handledb.script.php";
    
    if (isset($_POST['lock-orion']) && !$_POST['lock-orion'] == "") {
      $password = $_POST['lock-orion'];
      $username = $_SESSION['userUid'];
      $sql = "SELECT * FROM login_data WHERE uidUsers=?;";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../error.php?result=internal");
        exit();
      } else {
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($result)) {
          if ($row["permsUsers"] == "deleted") {
            header("Location: ".$_SERVER["DOCUMENT_ROOT"]."/acc/login/index.php?result=accdel");
            exit();
          }
          $pwdCheck = password_verify($password, $row['pwdUsers']);
          if ($pwdCheck == false) {
            die("Lock Printer 'SeeMeCNC Orion Delta' Aborted: Invalid Password");
          }
          elseif($pwdCheck == true) {
          
            $sql = "UPDATE `printer_data` SET `locked` = 1 WHERE `printer_data`.`id` = 2";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              header("Location: ../error.php?result=internal");
              exit();
            } else {
              mysqli_stmt_execute($stmt);
              echo "<script>history.go(-1)</script>";
            }



          }
        }
      }
    } else if (isset($_POST['unlock-orion']) && !$_POST['unlock-orion'] == "") {
      $password = $_POST['unlock-orion'];
      $username = $_SESSION['userUid'];
      $sql = "SELECT * FROM login_data WHERE uidUsers=?;";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../error.php?result=internal");
        exit();
      } else {
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($result)) {
          if ($row["permsUsers"] == "deleted") {
            header("Location: ".$_SERVER["DOCUMENT_ROOT"]."/acc/login/index.php?result=accdel");
            exit();
          }
          $pwdCheck = password_verify($password, $row['pwdUsers']);
          if ($pwdCheck == false) {
            die("Unlock Printer 'SeeMeCNC Orion Delta' Aborted: Invalid Password");
          }
          elseif($pwdCheck == true) {
          
            $sql = "UPDATE `printer_data` SET `locked` = 0 WHERE `printer_data`.`id` = 2";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              header("Location: ../error.php?result=internal");
              exit();
            } else {
              mysqli_stmt_execute($stmt);
              echo "<script>history.go(-1)</script>";
            }



          }
        }
      }
    }


  } else {
    header("Location: ../");
  }
} else {
  header("Location: /acc/login");
}