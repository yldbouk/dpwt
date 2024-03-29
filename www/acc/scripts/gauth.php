<?php
if (isset($_POST['auth_token'])) {
  require $_SERVER['DOCUMENT_ROOT']."/scripts/handledb.script.php";
  $GAuthResponseJSON = file_get_contents("https://oauth2.googleapis.com/tokeninfo?id_token=".$_POST['auth_token']);
  $GAuthResponse = json_decode($GAuthResponseJSON, true);
  if($GAuthResponse['aud'] == "944575927528-hs8dm7ogbn804qksdffdq3dk9uletued.apps.googleusercontent.com"){
   
    $username = $GAuthResponse['sub'];
    $name = $GAuthResponse['name'];
    $email = $GAuthResponse['email'];

    if($GAuthResponse['hd'] != "lakelandk12.org")
      die('Account Domain does not match requirements. Make an account with a username and password instead.');

    $sql = "SELECT uidUsers FROM login_data WHERE uidUsers=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: /acc/login/index.php?result=sqlerror");
      exit();
    } else {
      mysqli_stmt_bind_param($stmt, "s", $username);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultcheck = mysqli_stmt_num_rows($stmt);
      if ($resultcheck > 0) {
        //account found
  		  $sql = "SELECT * FROM login_data WHERE uidUsers=?;";
    		$stmt = mysqli_stmt_init($conn);
    		if (!mysqli_stmt_prepare($stmt, $sql)) {
    			header("Location: /acc/login/index.php?result=sqlerror");
    			exit();
    		} else {
    			mysqli_stmt_bind_param($stmt, "s", $username);
    			mysqli_stmt_execute($stmt);
    			$result = mysqli_stmt_get_result($stmt);
    			if ($row = mysqli_fetch_assoc($result)) {
    				if ($row["permsUsers"] == "deleted") {
    					header("Location: /acc/login/index.php?result=accdel");
  	  				exit();
  	  			}
  		  			if ($row["permsUsers"] == "awaitingAction") {
  		  				header("Location: /acc/login/index.php?result=awaitingAction");
  		  			}
  		  			elseif($row["permsUsers"] == "none") {
  		  				header("Location: /acc/login/index.php?result=noperms");
  		  			}
  		  			elseif($row["permsUsers"] == "revoked") {
  		  				header("Location: /acc/login/index.php?result=revoke");
  		  			} else {
  		  				session_start();
  		  				$_SESSION['userid'] = $row["idUsers"];
  		  				$_SESSION['userUid'] = $row["uidUsers"];
  		  				$_SESSION['userName'] = $row["nameUsers"];;
  		  				$_SESSION['permsUsers'] = $row["permsUsers"];
  		  				$_SESSION['userMail'] = $row["emailUsers"];
  		  				$_SESSION['lastUpdated'] = $row["lastUpdated"];
  		  				if ($row["permsUsers"] == "newUser") {
  		  					header("Location: /acc/newuser");
  		  					exit();
  		  				} else header("Location: /console");
  		  			}
  		  		}
  		  	}

        exit();
      } else {
        //create new account
        $sql = "INSERT INTO login_data (uidUsers, nameUsers, emailUsers, pwdUsers, typeUsers, permsUsers) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          header("Location: /acc/request/index.php?result=sqlerror");
          exit();
        } else {
          $hashpwd = "Account is using OAuth. No Password is nessasary.";
          $type = "gauth";
          $permissions = "awaitingActions";
          mysqli_stmt_bind_param($stmt, "ssssss", $username, $name, $email, $hashpwd, $type, $permissions);
          mysqli_stmt_execute($stmt);
        }
        exit();
      }
    }
  } else header("Location: /acc/login/index.php?result=badauthtoken");
} else header("Location: /acc/login/index.php");
