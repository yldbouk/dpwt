<?php

if (isset($_POST['login-submit'])) {
	require "../../scripts/handledb.script.php";

	$username = $_POST['uname'];
	$password = $_POST['psw'];

	if (empty($username) || empty($password)) {
		kill("test1");
		header("Location: ../login?result=incomplete&user=".$username);
		exit();
	} else {
		$sql = "SELECT * FROM login_data WHERE uidUsers=?;";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			kill("test2");
			header("Location: ../login?result=sqlerror&user=".$username);
			exit();
		} else {
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if ($row = mysqli_fetch_assoc($result)) {
				if ($row["permsUsers"] == "deleted") {
					kill("test3");
					header("Location: ../login?result=accdel");
					exit();
				}
				$pwdCheck = password_verify($password, $row['pwdUsers']);
				if ($pwdCheck == false) {
					kill("test4");
					header("Location: ../login?result=pwdnogo");
					exit();
				}
				elseif($pwdCheck == true) {
					if ($row["permsUsers"] == "awaitingAction") {
						kill("test5");
						header("Location: ../login?result=awaitingAction");
					}
					elseif($row["permsUsers"] == "none") {
						kill("test6");
						header("Location: ../login?result=noperms");
					}
					elseif($row["permsUsers"] == "revoked") {
						kill("test7");
						header("Location: ../login?result=revoke");
					} else {
						session_start();
						$_SESSION['userid'] = $row["idUsers"];
						$_SESSION['userUid'] = $row["uidUsers"];
						$_SESSION['userName'] = $row["nameUsers"];;
						$_SESSION['permsUsers'] = $row["permsUsers"];
						$_SESSION['userMail'] = $row["emailUsers"];
						$_SESSION['lastUpdated'] = $row["lastUpdated"];
						if ($row["permsUsers"] == "newUser") {
							kill("test8");
							header("Location: ../newuser");
							exit();
						} else header("Location: ../../console");
					}
				} else {
					kill("test9");
					header("Location: ../login?result=pwdnogo");
					exit();
				}
			} else {
				kill("test1a");
				header("Location: ../login?result=usrname");
				exit();
			}
		}
	}

} else {
	kill("test1b");
	header("Location: ../login");
}