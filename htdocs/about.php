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
  <center><div style="width:92%;">
  <h1>About</h1><br>
<h2>What is DPWT?</h2><br>
The Dimenstional Printing Web Terminal (or DPWT for short) is a website that allows students to print what they want off of our 3D printers. 
<br><br>
<h2>How Does It Work?</h2><br>
DPWT works by allowing students to make requests to print what ever they want. In this case, let's use a cube. A student fills out the form and requests for the cube to be printed. An admin, like a teacher, will then review their request. They can either allow or deny it. If allowed, the cube will be printed. The teacher will then put it somewhere for the student to pick it up.
<br><br>
<h2>How Do I Make A Request?</h2><br>
First, you need an account. <a href="/acc/login">Sign in</a> or <a href="/acc/request">Request Access Here</a>. Next, select the printer you want to print on. Then, go to the "Request A Print" page. Fill out the form, then submit. Now, assuming that your print was accepted, wait for it to print. The website will then notify you when it is done. Just come to the place it tells you and pick it up.
<br><br>



  </div></center>
  <?php require "footer.php"; ?>
</body>
</html>
