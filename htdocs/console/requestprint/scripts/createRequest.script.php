<?php
// !!!makee sure priinter is set
session_start();
if(isset($_POST["request-submit"])) {    
require "../../scripts/handledb.script.php";
 
  $name = $_POST['name'];
  $reason = $_POST['reason'];
  $createdBy = $_SESSION['userUid'];
      
  if (isset($_POST['autoaccept']) && $_POST['autoaccept'] == 1 ? 1 : 0) {
    $status = "queue";
  } else {
    $status = "review";
  }
  


  if (empty($name) || empty($reason) || empty($_FILES['stlobj'])){
    header("Location: ../index.php?result=incomplete");
    exit();
  }
  if ($name == "T.DONOTMODIFY" || $reason == "T.DONOTMODIFY"){
    header("Location: ../index.php?result=servername");
    exit();
  }
    $sql = "SELECT jobName FROM job_data WHERE jobName=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../index.php?result=sqlerror");
      exit();
    } else {
      mysqli_stmt_bind_param($stmt, "s", $name);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultcheck = mysqli_stmt_num_rows($stmt);
      if ($resultcheck > 0) {
        header("Location: ../index.php?result=existingjob");
        exit();
      } else {
            
        $sql = "INSERT INTO job_data (jobName, reason, jobStatus, createdBy, whatPrinter) VALUES (?, ?, ?, ?, ?)";
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          header("Location: ../requestprint/index.php?result=sqlerror");
          exit();
        } else {
            mysqli_stmt_bind_param($stmt, "sssss", $name, $reason, $status, $createdBy, $_SESSION['friendlyname']);
            mysqli_stmt_execute($stmt);
            $sql = "SELECT * FROM job_data WHERE jobName=?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              header("Location: ../index.php?result=sqlerror");
              exit();
            } else {
              mysqli_stmt_bind_param($stmt, "s", $name);
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);
              if ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $target_dir = "../../uploads/".$id."/";
                $target_file = $target_dir . basename($_FILES["stlobj"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                if (file_exists($target_file)) {
                  echo "Sorry, file already exists.";
                  $uploadOk = 0;
              }
                // Check file size
                if ($_FILES["stlobj"]["size"] > 5000000) {
                  header("Location: ../requestprint/index.php?result=filesize");
                  $uploadOk = 0;
                  exit();
              }
              // Allow certain file formats
              if($imageFileType != "stl" && $imageFileType != "obj" ) {
                header("Location: ../requestprint/index.php?result=filetype");
                  $uploadOk = 0;
                  exit();
              }
                $fileLocation = "../../uploads/".$id;
                mkdir($fileLocation, 0700);

                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["stlobj"]["tmp_name"], $target_file)) {
                      rename("../../uploads/".$id."/".$_FILES['stlobj']['name'], "../../uploads/".$id."/".$id.".".$imageFileType);
                      $sql = "UPDATE `job_data` SET `fileLocation`=? WHERE `job_data`.`id`=?";
                      if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../requestprint/index.php?result=sqlerror");
                        exit();
                      } else {
                        mysqli_stmt_bind_param($stmt, "ss", $fileLocation, $id);
                        mysqli_stmt_execute($stmt);


                        
                        header("Location: ../../viewJobs/index.php?edit=".$id);


                        
                      }
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                  }
                }
            }
          }
        }
      }
    }
  