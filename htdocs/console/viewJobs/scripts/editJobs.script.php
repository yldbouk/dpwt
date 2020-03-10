<?php
session_start();
function emptyDir($dir){if(is_dir($dir)){$scn=scandir($dir);foreach($scn as $files){if($files !== '.'){if($files !== '..'){if(!is_dir($dir.'/'.$files)){unlink($dir.'/'.$files);}else{emptyDir($dir.'/'.$files);rmdir($dir .'/'.$files);}}}}}}
if(isset($_SESSION['userUid'])) {
  require "../../../scripts/handledb.script.php";
  $id = $_POST['id'];
  if(isset($_POST['user'])) $user = $_POST['user'];
  $stmt = mysqli_stmt_init($conn);
if(isset($_POST['edit-pause'])) {
  $do = "pause";
  $sql = "SELECT * FROM job_data WHERE id=?;";
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../../error.php/?e=internal");
    exit();
  } else {
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) { 
      if ($row == "printing") {
        die('Job can not be editied because it is printing.');
        } else {
      $sql = "UPDATE `job_data` SET `jobStatus`= ?, jobQueue = NULL WHERE `job_data`.`id`= ?";
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../../error.php/?e=internal");
        exit();
      } else {
        mysqli_stmt_bind_param($stmt, "ss", $do, $id);
        mysqli_stmt_execute($stmt);
        unlink('../../uploads/__queue/'.$id.".stl");
        usleep(250);
        echo "<script>history.go(-1);</script>";
      } 
     }
    }
  }  
} elseif(isset($_POST['edit-unpause'])) {
  $do = "queue";
  $sql = "SELECT * FROM job_data WHERE id=?;";
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../../error.php/?e=internal");
    exit();
  } else {
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) { 
      if ($row == "printing") {
        die('Job can not be editied because it is printing.');
        } else {
      $sql = "UPDATE `job_data` SET `jobStatus`= ?, jobQueue = (SELECT MAX(jobQueue) FROM job_data) + 1 WHERE `job_data`.`id`= ?";
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../../error.php/?e=internal");
        exit();
      } else {
        mysqli_stmt_bind_param($stmt, "ss", $do, $id);
        mysqli_stmt_execute($stmt);
        copy('../../uploads/'.$id."/".$id.".stl", '../../uploads/__queue/'.$id.".stl");
        usleep(250);
        echo "<script>history.go(-1);</script>";
      } 
     }
    }
  }  
} elseif(isset($_POST['edit-redo'])) {
  $do = "queue";
  $sql = "SELECT * FROM job_data WHERE id=?;";
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../../error.php/?e=internal");
    exit();
  } else {
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) {  
      $sql = "UPDATE `job_data` SET `jobStatus`= ?, jobQueue = (SELECT MAX(jobQueue) FROM job_data) + 1 WHERE `job_data`.`id`= ?";
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../../error.php/?e=internal");
        exit();
      } else {
        mysqli_stmt_bind_param($stmt, "ss", $do, $id);
        mysqli_stmt_execute($stmt);
        copy('../../uploads/'.$id."/".$id.".stl", '../../uploads/__queue/'.$id.".stl");
        usleep(250);
        echo "<script>history.go(-1);</script>";
      } 
     
    }
  }  
} elseif(isset($_POST['edit-overridePrinting'])) {
  $do = "printing";
  $sql = "SELECT * FROM job_data WHERE id=?;";
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../../error.php/?e=internal");
    exit();
  } else {
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) {  
      $sql = "UPDATE `job_data` SET `jobStatus`= ?, jobQueue = NULL WHERE id= ?;";
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../../error.php/?e=internal");
        exit();
      } else {
        mysqli_stmt_bind_param($stmt, "ss", $do, $id);
        mysqli_stmt_execute($stmt);
        echo "<script>history.go(-1);</script>";
      } 
     
    }
  }  
} elseif (isset($_POST['purge']) && !$_POST['purge'] == "") {
  $do = "purge";
  $sql = "SELECT * FROM job_data WHERE id=?;";
  
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../../error.php/?e=internal");
    exit();
  } else {
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) { 
      if ($row == "printing") {
        die('Job can not be edited because it is printing.');
        } else {
      $sql = "UPDATE `job_data` SET `jobStatus`= ?, jobQueue = NULL WHERE `job_data`.`id`= ?;";
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../../error.php/?e=internal");
        exit();
      } else {
        $dir = '../../uploads/'.$id;
        emptyDir($dir);
        if(rmdir('../../uploads/'.$id)) {
          usleep(250);
          echo "<script>history.go(-1);</script>";
        } else {
        die("Could Not Successfully Purge Job. Reload the page and confirm resubmission to try again.");
        }
        }  
        mysqli_stmt_bind_param($stmt, "ss", $do, $id);
        mysqli_stmt_execute($stmt);
      
        
      }
  }  
}
} elseif (isset($_POST['location']) && !$_POST['location'] == "") {
  $do = "complete";
  $location = $_POST['location'];
  $sql = "SELECT * FROM job_data WHERE id=?;";
  
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../../error.php/?e=internal");
    exit();
  } else {
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) { 
      if ($row == "printing") {
        die('Job can not be editied because it is printing.');
        } else {
      $sql = "UPDATE `job_data` SET `jobStatus`= ?, `location`=? WHERE `job_data`.`id`= ?";
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../../error.php/?e=internal");
        exit();
      } else {
        mysqli_stmt_bind_param($stmt, "sss", $do, $location, $id);
        mysqli_stmt_execute($stmt);
        usleep(250);
        echo "<script>history.go(-1);</script>";
        }
        }    
    }  
  } 
} else if (isset($_POST['edit-deny'])) {
  $do = "denied";
  $by = $_SESSION['userUid'];
  $sql = "SELECT * FROM job_data WHERE id=?;";
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../../error.php/?e=internal");
    exit();
  } else {
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) { 
      $sql = "UPDATE `job_data` SET `jobStatus`= ?, `reviewedBy`= ? WHERE `job_data`.`id`= ?";
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../../error.php/?e=internal");
        exit();
      } else {
        mysqli_stmt_bind_param($stmt, "sss", $do, $by, $id);
        mysqli_stmt_execute($stmt);
        usleep(250);
        echo "<script>history.go(-1);</script>";
      }
    }}


    } else if (isset($_POST['edit-accept'])) {
      $do = "queue";
      $by = $_SESSION['userUid'];
      $sql = "SELECT * FROM job_data WHERE id=?;";
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../../error.php/?e=internal");
        exit();
      } else {
        mysqli_stmt_bind_param($stmt, "s", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($result)) { 
          $sql = "UPDATE `job_data` SET `jobStatus`= ?, `reviewedBy`= ?, jobQueue = (SELECT MAX(jobQueue) FROM job_data) + 1 WHERE `job_data`.`id`= ?";
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../../error.php/?e=internal");
            exit();
          } else {
            mysqli_stmt_bind_param($stmt, "sss", $do, $by, $id);
            mysqli_stmt_execute($stmt);
            copy('../../uploads/'.$id."/".$id.".stl", '../../uploads/__queue/'.$id.".stl");
            usleep(250);
            echo "<script>history.go(-1);</script>";
          }
        } 
      } 
    } else if (isset($_POST['edit-queue'])) {
      $sql = "SELECT * FROM job_data WHERE id=?;";
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../../error.php/?e=internal");
        exit();
      } else {
        mysqli_stmt_bind_param($stmt, "s", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($result)) { 
          $on = $row['jobQueue'];
          $sql = "SELECT MAX(jobQueue) AS jobQueue FROM job_data WHERE jobQueue<?;";
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../../error.php/?e=internal");
            exit();
          } else {
            mysqli_stmt_bind_param($stmt, "s", $on);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($result))
         $before = $row['jobQueue'];
         //calculate mean
            $added = $on + $before;
            $mean = $added / 2;
            
            $sql = "UPDATE `job_data` SET jobQueue =? WHERE id=?;";
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              header("Location: ../../error.php/?e=internal");
              exit();
            } else {
              mysqli_stmt_bind_param($stmt, "ss", $mean, $id);
              mysqli_stmt_execute($stmt);
            
            usleep(250);
            echo "<script>history.go(-1);</script>";
          
            }
          } 
        }
      } 
    } else {
  die("No Action to Take.");
}
echo 'Please Wait...';
} else {
  header("Location: ../index.php/");
}
