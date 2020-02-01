<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link rel="stylesheet" href="/css/header.css">
    <meta charset="utf-8">
    <title>403 Access Denied - DPWT</title>
</head>

<body>
<?php
    require $_SERVER['DOCUMENT_ROOT']."/header.php";
  ?> <br><br>
  <div style="text-align:center;">
<b style="font-size:200px;">403</b>
<br><br><br><br>
<b style="font-size:45px;">Looks like you're trying to access a restricted page.
<br>
<?php if (isset($_SESSION['userUid'])) echo "It's probably restricted to admins."; else echo 'Try <a href="/acc/login">Logging In</a>.';?>
</b>

  </div>
  <?php require "../footer.php"; ?>
</body>
</html>