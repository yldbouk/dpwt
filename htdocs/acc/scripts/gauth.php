<?php 
if (isset($_POST['login-submit'])) {
  require "../../scripts/handledb.script.php";
  require_once './google-api-php-client/vendor/autoload.php';

  $username = $_POST['uname'];

} else header("Location: ../login/index.php");