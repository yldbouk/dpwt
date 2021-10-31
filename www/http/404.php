<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link rel="stylesheet" href="/css/header.css">
    <meta charset="utf-8">
    <title>404 Not Found - DPWT</title>
</head>

<body>
<?php
    require $_SERVER['DOCUMENT_ROOT']."/header.php";
  ?> <br><br>
  <div style="text-align:center;">
<b style="font-size:200px;">404</b>
<br><br><br><br>
<b style="font-size:45px;">We can't find what you're looking for. <br><br>Did we make a mistake? Let us know.</b>

  </div>
  <?php require $_SERVER['DOCUMENT_ROOT']."/footer.php"; ?>
</body>
</html>