<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link rel="stylesheet" href="/css/header.css">
    <meta charset="utf-8">
    <title>About - DPWT</title>
</head>

<body>
  <header>
    <div class="header">
      <a href="/" class="logo">D P W T</a>
      <div class="header-right">
        <nav>
          <?php if(isset($_SESSION['userUid'])) echo "<text>".$_SESSION['userUid']."</text>"?><a />
          <a href="/">Home</a>
          <?php if(isset($_SESSION['userUid'])) echo "<a href='../../console'>Console</a>"?><a />
          <?php if (isset($_SESSION['userUid'])) echo '<a class="blacknav" href="acc/logout">Logout</a>'; else echo '<a href="acc/">Login</a>';?>
        </nav>
      </div>
    </div>
  </header>
 <div style="text-align:center;">
<h1>Contact</h1><br>

      <br>
        Youssef Dbouk<br>
        Lead Designer
          <br><br>

        <br>
      Contribute To Be Here!

</div>

  <?php require "footer.php"; ?>
</body>
</html>