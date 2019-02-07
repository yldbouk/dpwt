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
  <header>
    <div class="header">
      <a href="/" class="logo">D P W T</a>
      <div class="header-right">
        <nav>
          <?php if(isset($_SESSION['userUid'])) echo "<text>".$_SESSION['userUid']."</text>"?><a />
          <a href="/">Home</a>
          <?php if(isset($_SESSION['userUid'])) echo "<a href='/console'>Console</a>"?><a />
          <?php if (isset($_SESSION['userUid'])) echo '<a class="blacknav" href="/acc/logout">Logout</a>'; else echo '<a href="/acc/">Login</a>';?>
        </nav>
      </div>
    </div>
  </header> <br><br>
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