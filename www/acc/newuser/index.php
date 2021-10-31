<?php session_start(); 

//check if user is a gauth account. If so, do not allow access to page.
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
				if ($row['typeUsers'] != "password") {
					die("A user authenticated with Google can not change their password.");
				}
      }
    }

$needsAcc=TRUE; $forcePwdReset=FALSE;?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/form.css">
    <meta charset="utf-8">
    <title>Change Password - DPWT</title>
  </head>
  <body>
    <header>
      <div class="header">
        <a class="logo">D P W T</a>
        <div class="header-right">
      <a class="blacknav" style="color: white;" href="/acc/scripts/logout.php">Log Out</a>
        </div>
      </div>
    </header>
      <br><br>
       <center>
         <!-- SPLITTER -->
      <h1>Change Password</h1><h3>Hello, <?php echo $_SESSION['userUid'] ?>! You seem to be a new user. For security reasons, please change your password.</h3>
      <br>
      <?php 
    if (isset($_GET['result'])) {
      if ($_GET['result'] == "incomplete") {
       echo '<h4>Please fill out all fields.</h4>';
      } elseif ($_GET['result'] == "pwd") {
        echo '<h4>Your passwords did not match. Please ty again.</h4>';
      } else {
        echo '<h4>An unknown error occured. Please try again.</h4>';
      }
    }
   ?>
   
      <form action="/acc/scripts/changepwd.php" method="post">
        <div class="container">
          <label for="psw"><b>Password</b></label><br> 
          <input type="password" placeholder="Password" name="psw" required>
            <br>
          <label for="psw2"><b>Repeat Password</b></label><br> 
          <input type="password" placeholder="Repeat Password" name="psw2" required>
          <button type="submit" name="replacepwd-submit">Change</button>
      </form>
    </center>
  
  
  
  </body>
</html>

