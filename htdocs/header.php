<div class="fill">
<?php
# ^ fill up page so footer is always on bottom

#if not defined, define.
if(!isset($homeActive)) $homeActive = FALSE;
if(!isset($consoleActive)) $consoleActive = FALSE;
if(!isset($accActive)) $accActive = FALSE;
if(!isset($loginActive)) $loginActive = FALSE;
if(!isset($adminActive)) $adminActive = FALSE;
if(!isset($devActive)) $devActive = FALSE;
if(!isset($needsAcc)) $needsAcc = FALSE;
if(!isset($needsAdmin)) $needsAdmin = FALSE;
if(!isset($needsDev)) $needsDev = FALSE;
if(!isset($needsPrinter)) $needsPrinter = FALSE;
if(!isset($forcePwdReset)) $forcePwdReset = TRUE;


# check for user changed
require $_SERVER['DOCUMENT_ROOT']."/scripts/handledb.script.php";
$sql2 = "SELECT * FROM login_data WHERE uidUsers=?;";
		$stmt2 = mysqli_stmt_init($conn);
		if (mysqli_stmt_prepare($stmt2, $sql2)) {
			mysqli_stmt_bind_param($stmt2, "s", $_SESSION['userUid']);
			mysqli_stmt_execute($stmt2);
			$result2 = mysqli_stmt_get_result($stmt2);
			if ($row2 = mysqli_fetch_assoc($result2)) {
        if ($row2["lastUpdated"] !== $_SESSION['lastUpdated']) {
          echo '<script>window.location.href=window.location.origin + "/acc/scripts/logout?e=change";</script>';
        }
      }
    }
# check for printer changed
if (isset($_SESSION['printid'])) {
  $sql3 = "SELECT * FROM printer_data WHERE id=?;";
	$stmt3 = mysqli_stmt_init($conn);
	if (mysqli_stmt_prepare($stmt3, $sql3)) {
    mysqli_stmt_bind_param($stmt3, "s", $_SESSION['printid']);
		mysqli_stmt_execute($stmt3);
		$result3 = mysqli_stmt_get_result($stmt3);
    if ($row3 = mysqli_fetch_assoc($result3)) {
       if ($row3["locked"] == 1) {
        unset($_SESSION['printid']);
        unset($_SESSION['friendlyname']);
        unset($_SESSION['grade']);
        unset($_SESSION['filamentColor']);
        unset($_SESSION['locked']);
        echo '<script>window.location.href=window.location.origin + "/console/selectprinter.php?e=change";</script>';
      }
    } 
  }
}

#Use this part to check for page prerequisites.
if($needsAcc){if(!isset($_SESSION['userUid'])){echo '<script>window.location.href=window.location.origin + "/acc/login?result=perm";</script>';}}
if($needsPrinter){if(!isset($_SESSION['printid'])){echo '<script>window.location.href=window.location.origin + "/console/selectprinter.php";</script>';}}
if($needsAdmin){if(!$_SESSION['permsUsers'] == "admin" || !$_SESSION['permsUsers'] == "developer"){echo '<script>history.go(-1);</script>';}}
if($needsDev){if(!$_SESSION['permsUsers'] == "developer"){echo '<script>history.go(-1);</script>';}}
if(isset($_SESSION['permsUsers'])){if($_SESSION['permsUsers'] == "newUser"){if($forcePwdReset){echo '<script>window.location.href=window.location.origin + "/acc/newuser";</script>';}}}
?>

<header>
      <div class="header">
        <?php if($devActive) echo '<a onclick="document.location.href=window.location.origin;" class="logo">{ D P W T }</a>'; else echo '<a onclick="document.location.href=window.location.origin;" class="logo">D P W T</a>'; ?>
        <div class="header-right">
        <nav> 
           <?php if(isset($_SESSION['userid'])) echo "<text>".$_SESSION['userUid']."</text>"?>
            <a />
           <a onclick="document.location.href=window.location.origin;" <?php if($homeActive) echo "class='active'";?>>Home</a>
            <a />
            <?php if(isset($_SESSION['userid'])){if($_SESSION['permsUsers'] == "developer") {echo "<a onclick='window.location.href=window.location.origin+`/console/dev`;'"; if($devActive) echo "class='active'"; echo ">Developer</a><a />";}}
           
           if(isset($_SESSION['userid'])){if($_SESSION['permsUsers'] == "admin" || $_SESSION['permsUsers'] == "developer") {echo "<a onclick='window.location.href=window.location.origin+`/console/admin`;'"; if($adminActive) echo "class='active'"; echo ">Admin</a><a />";}}
            
           if(isset($_SESSION['userid'])){ echo "<a onclick='window.location.href=window.location.origin+`/console`;'"; if($consoleActive) echo "class='active'"; echo ">Console</a><a />";}

             if(isset($_SESSION['userid'])) {echo "<a onclick='window.location.href=window.location.origin+`/acc`;'"; if($accActive) echo "class='active'"; echo ">Account</a><a />";}
            
             if(isset($_SESSION['userid'])){echo '<a class="blacknav" onclick="document.location.href=window.location.origin+`/acc/logout`;">Logout</a>';} else {echo '<a '; if($loginActive) echo "class='active'"; echo ' onclick="document.location.href=window.location.origin+`/acc/login`;">Login</a>';} ?>
          </nav>
        </div>
      </div>
    </header> 
<?php 


# Use this part as a section for banner or popup code.

?>
