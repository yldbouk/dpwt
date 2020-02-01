<?php

if (isset($_POST['printerselect-submit'])) {

    $printer = $_POST['printer'];

    if ($printer == "orion") {
        header("Location: getprinterdata/orion.php");
        exit();
    } else {
        header("Location: ../error.php?error=printerselect");
        exit();
    }

} else {
    header("Location: ../selectprinter.php");
}