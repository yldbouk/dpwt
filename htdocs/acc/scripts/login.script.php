<?php

if (isset($_POST['login-submit'])) {
	require "../../scripts/handledb.script.php";

	$username = $_POST['uname'];
	$password = $_POST['psw'];

	if (empty($username) || empty($password)) {
		header("Location: ../login/index.php?result=incomplete&user=".$username);
		exit();
	} else {
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
					header("Location: ../login/index.php?result=accdel");
					exit();
				}
				$pwdCheck = password_verify($password, $row['pwdUsers']);
				if ($pwdCheck == false) {
					header("Location: ../login/index.php?result=pwdnogo");
					exit();
				}
				elseif($pwdCheck == true) {
					if ($row["permsUsers"] == "awaitingAction") {
						header("Location: ../login/index.php?result=awaitingAction");
					}
					elseif($row["permsUsers"] == "none") {
						header("Location: ../login/index.php?result=noperms");
					}
					elseif($row["permsUsers"] == "revoked") {
						header("Location: ../login/index.php?result=revoke");
					} else {
						session_start();
						$_SESSION['userid'] = $row["idUsers"];
						$_SESSION['userUid'] = $row["uidUsers"];
						$_SESSION['userName'] = $row["nameUsers"];;
						$_SESSION['permsUsers'] = $row["permsUsers"];
						$_SESSION['userMail'] = $row["emailUsers"];
						if ($row["permsUsers"] == "deleted") {
							header("Location: ../newuser");
							exit();
						} else header("Location: ../../console");
					}
				} else {
					header("Location: ../login/index.php?result=pwdnogo");
					exit();
				}
			} else {
				header("Location: ../login/index.php?result=usrname");
				exit();
			}
		}
	}

} else {
	header("Location: ../login/index.php");
}