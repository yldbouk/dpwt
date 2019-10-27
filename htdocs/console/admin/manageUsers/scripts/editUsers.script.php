<?php
session_start();
function emptyDir($dir){if(is_dir($dir)){$scn=scandir($dir);foreach($scn as $files){if($files !== '.'){if($files !== '..'){if(!is_dir($dir.'/'.$files)){unlink($dir.'/'.$files);}else{emptyDir($dir.'/'.$files);rmdir($dir .'/'.$files);}}}}}}
if (isset($_SESSION['userUid'])) {
  require "../../../../scripts/handledb.script.php";
  $id = $_POST['id'];
  if (isset($_POST['user'])) $user = $_POST['user'];
  $stmt = mysqli_stmt_init($conn);

  if (isset($_POST['delete']) && !$_POST['delete'] == "") {
    $do = "deleted";
    $empty = NULL;
    $sql = "SELECT * FROM login_data WHERE idUsers=?;";
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../../error.php/?e=internal");
      exit();
    } else {
      mysqli_stmt_bind_param($stmt, "s", $id);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if ($row = mysqli_fetch_assoc($result)) {
        $username = $row['uidUsers'];
        $sql = "SELECT * FROM job_data WHERE createdBy=?";
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          header("Location: ../../error.php/?e=internal");
          exit();
        } else {
          mysqli_stmt_bind_param($stmt, "s", $username);
          mysqli_stmt_execute($stmt);
          $result = mysqli_stmt_get_result($stmt);
          $jobExist = 0;
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              if ($row['jobStatus'] == "queue" || $row['jobStatus'] == "printing" || $row['jobStatus'] == "complete_waiting") {
                $jobExist = $jobExist + 1;
              }
            }
          }
          if ($jobExist == 0) {
            $do2 = "purge";
            echo 'Please Wait...
            This may take a long time.
            ';
            $sql = "UPDATE `job_data` SET `jobStatus`= ? WHERE `job_data`.`createdBy`= ?";
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              die("");
              exit();
            } else {
              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  $id1 = $row['id'];
                  $dir = '../../../uploads/'.$id1;
                  emptyDir($dir);
                  if (rmdir('../../../uploads/'.$id1)) {
                  } else {
                    die("Could Not Successfully Purge Job. Reload the page and confirm resubmission to try again.");
                  }
                }
              }
              mysqli_stmt_bind_param($stmt, "ss", $do2, $username);
              mysqli_stmt_execute($stmt);
              $sql = "UPDATE `login_data` SET `nameUsers`=?,`emailUsers`=?,`pwdUsers`=?,`permsUsers`=? WHERE `idUsers`=?";
              if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../../error.php/?e=internal");
                exit();
              } else {
                mysqli_stmt_bind_param($stmt, "sssss", $empty, $empty, $empty, $do, $id);
                mysqli_stmt_execute($stmt);
                echo "<script>history.go(-1);</script>";
              }
            }
          } else {
            die("ACCOUNT DELETION ABORTED: USER HAS ".$jobExist." JOBS THAT NEED ACTION. PLEASE PURGE THEM, THEN RETRY. USE THE GO BACK BUTTON TO THE LEFT OF THE RELOAD BUTTON.");
          }
        }
      }
    }
  } else if (isset($_POST['edit-perms'])) {
    $do = $_POST['perms'];
    $sql = "SELECT * FROM login_data WHERE idUsers=?;";
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../../error.php/?e=internal");
      exit();
    } else {
      mysqli_stmt_bind_param($stmt, "s", $id);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if ($row = mysqli_fetch_assoc($result)) { 
        $sql = "UPDATE `login_data` SET `permsUsers`= ? WHERE `login_data`.`idUsers`= ?";
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          header("Location: ../../error.php/?e=internal");
          exit();
        } else {
          mysqli_stmt_bind_param($stmt, "ss", $do, $id);
          mysqli_stmt_execute($stmt);
          echo "<script>history.go(-1);</script>";
        }
      }}
  
  
      } else if (isset($_POST['edit-deny'])) {
        $do = "none";
        $sql = "SELECT * FROM login_data WHERE idUsers=?;";
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          header("Location: ../../error.php/?e=internal");
          exit();
        } else {
          mysqli_stmt_bind_param($stmt, "s", $id);
          mysqli_stmt_execute($stmt);
          $result = mysqli_stmt_get_result($stmt);
          if ($row = mysqli_fetch_assoc($result)) { 
            $sql = "UPDATE `login_data` SET `permsUsers`= ? WHERE `login_data`.`idUsers`= ?";
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              header("Location: ../../error.php/?e=internal");
              exit();
            } else {
              mysqli_stmt_bind_param($stmt, "ss", $do, $id);
              mysqli_stmt_execute($stmt);
              echo "<script>history.go(-1);</script>";
            }
          }}
      
      
        } else if (isset($_POST['reset-pwd'])) {
          $sql = "SELECT * FROM login_data WHERE idUsers=?;";
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../../error.php/?e=internal");
            exit();
          } else {
            mysqli_stmt_bind_param($stmt, "s", $id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) { 
              $sql = "UPDATE `login_data` SET `pwdUsers`= ? WHERE `login_data`.`idUsers`= ?";
              if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../../error.php/?e=internal");
                exit();
              } else {
                $password = "lmps3D";
                $hashpwd = password_hash($password, PASSWORD_DEFAULT);
                mysqli_stmt_bind_param($stmt, "ss", $hashpwd, $id);
                mysqli_stmt_execute($stmt);
                $sql = "UPDATE `login_data` SET `permsUsers`= ? WHERE `login_data`.`idUsers`= ?";
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                  header("Location: ../../error.php/?e=internal");
                  exit();
             } else { 
                  $newUser = "newUser";
                  mysqli_stmt_bind_param($stmt, "ss", $newUser, $id);
                  mysqli_stmt_execute($stmt);
                  echo "<script>history.go(-1);</script>";
              }
              }
            }}
        
        
            } else {
    die("No Action to Take.");
  }
} else {
  header("Location: ../index.php/");
}