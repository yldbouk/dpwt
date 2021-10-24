<?php
  session_start();
  //Check for OAuth Account
require $_SERVER['DOCUMENT_ROOT']."/scripts/handledb.script.php";
$sql = "SELECT * FROM login_data WHERE uidUsers=?;";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: /acc/login/index.php?result=sqlerror");
			exit();
		} else {
			mysqli_stmt_bind_param($stmt, "s", $_SESSION["userUid"]);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if ($row = mysqli_fetch_assoc($result)) {
				if ($row['typeUsers'] == "password") {
					$passwordAccount = TRUE;
				} else $passwordAccount = FALSE;
      }
    }



  //use special $needsacc to not redirect to a perms error
if(!isset($_SESSION['userUid'])){echo '<script>window.location.href=window.location.origin + "/acc/login";</script>';}
  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/form.css">
    <meta charset="utf-8">
    <title>Account - DPWT</title>
  </head>
  <body>
  <?php
    $accActive = TRUE;
    require $_SERVER['DOCUMENT_ROOT']."/header.php";
  ?>
         <!-- SPLITTER -->
         <div style='text-align: center;'>
      <h1>Account</h1>
      <br>
      To change one of these, please contact an admin.
      <br>
          <b>Username</b><br>
          <input style ="text-align: center;" type="text" value="<?php echo $_SESSION['userUid']; ?>" readonly>
            <br>
          <b>Name</b><br>
          <input style ="text-align: center;" type="text" value="<?php echo $_SESSION['userName']; ?>" readonly>
            <br>
          <b>Email</b><br>
          <input style ="text-align: center;" type="text" value="<?php echo $_SESSION['userMail']; ?>" readonly>
            <br>
         
         <?php if($passwordAccount) echo '<b>Password</b><br><a href="changepwd">Change Password</a>'; ?>
    <br>
 </div>
    <?php 
      require $_SERVER['DOCUMENT_ROOT']."/footer.php";
    ?>
  
  
  </body>
</html>
