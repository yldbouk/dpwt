<?php
session_start();
if (!isset($_SESSION['name'])) {
    require '../../../scripts/handledb.script.php';

        $sql = "SELECT * FROM `printer_data` WHERE `printer_data`.`id` = 2";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../error.php?e=sql");
            exit();
        } else {

            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                if ($row["locked"] == 1) {
                    header("Location: ../../error.php?e=printerlocked");
                    exit();
                } else {
                $_SESSION['printid'] = $row["id"];
                $_SESSION['name'] = $row["name"];
                $_SESSION['friendlyname'] = $row["friendlyname"];
                $_SESSION['grade'] = $row["grade"];
                $_SESSION['filamentColor'] = $row["filamentColor"];
                $_SESSION['locked'] = $row["locked"];
                header("Location: /console");
                }
                } else {
                    header("Location: ../error.php");
                    exit();
                }
            }
    

} else {
    header("Location: /acc/login/index.php?result=perms");
}