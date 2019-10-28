<?php
session_start();
if (isset($_SESSION['userUid'])) {
  if ($_SESSION['permsUsers'] == "developer") {
    include "../../scripts/handledb.script.php";
    if(isset($_POST['payload']) || isset($_POST['pull'])){
      shell_exec('cd C:\xampp && git reset --hard HEAD && git pull');
      header( "refresh:10; url=../ " );
   } else if (isset($_POST['stop-apache']) && !$_POST['stop-apache'] == "") {
      $password = $_POST['stop-apache'];
      $username = $_SESSION['userUid'];
      $sql = "SELECT * FROM login_data WHERE uidUsers=?;";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../login/index.php?result=sqlerror&user=".$username);
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
            die("Stop Apache Aborted: Invalid Password");
            exit();
          }
          elseif($pwdCheck == true) {
          
            echo "Stopping Apache2.4 Service...";
            exec('NET STOP Apache2.4 2>&1', $output);
            print_r($output);  
            die("done.");
          }
        }
      }
    }
  } else {
    header("Location: ../../");
  }
} else {
  header("Location: ./acc/login");
}
