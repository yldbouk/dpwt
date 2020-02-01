<?php
session_start();
session_unset();
session_destroy();
if($_GET["e"] == "change") header("Location: ../login?result=change"); else header("Location: ../login/index.php?result=logout");