<?php
session_start();
session_unset();
session_destroy();
if($_GET["e"] == "change") header("Location: /acc/login/index.php?result=change"); else header("Location: /acc/login/index.php?result=logout");