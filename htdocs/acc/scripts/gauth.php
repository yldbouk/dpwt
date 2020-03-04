<?php 
if (isset($_POST['auth_token'])) {
  require "../../scripts/handledb.script.php";

  
  $GAuthResponse = file_get_contents("https://oauth2.googleapis.com/tokeninfo?id_token=".$_POST['auth_token']);

  $parts = explode("\r\n\r\n", $GAuthResponse);
  $headers = array_shift($parts);
  $body = implode("\r\n\r\n", $parts);

  echo($headers);
  echo("\n\n\n\n\n\n\n\n\n\n");
  echo($GAuthResponse);
  echo("\n\n\n\n\n\n\n\n\n\n");
  echo($body);

} else header("Location: ../login/index.php");