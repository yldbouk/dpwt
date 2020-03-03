<?php
  session_start();
  $needsAcc=TRUE;
    ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
  <link rel="stylesheet" href="/css/header.css">
  <link rel="stylesheet" href="/css/form.css">
  <meta charset="utf-8">
  <meta name="google-signin-client_id" content="944575927528-hs8dm7ogbn804qksdffdq3dk9uletued.apps.googleusercontent.com">
  <title>Logout - DPWT</title>
</head>
<body>
<?php
    require $_SERVER['DOCUMENT_ROOT']."/header.php";
  ?>
  <script>
    function onLoad() {
      gapi.load('auth2', function() {
        gapi.auth2.init();
      });
    }
  </script>
  <br><br>
  <center>
    Are you sure you want to log out?
    <br><br><br>
   
      <button onclick="var auth2 = gapi.auth2.getAuthInstance(); auth2.signOut().then(function({document.location = document.location.origin + '/acc/scripts/logout.php';});">Log Out</button>
  <br><br>
    <button class="red" onclick="history.go(-1)">Go Back</button>
  </center>
  <script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
  <?php 
      require "../../footer.php";
    ?>

</body>

</html>