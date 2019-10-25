<?php
  session_start();
  if (!isset($_SESSION['userUid'])) {
    header("Location: login");
  }
  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/form.css">
    <meta charset="utf-8">
    <title>Account - DPWT</title>
  </head>
  <body>
    <header>
      <div class="header">
        <a href="../../" class="logo">D P W T</a>
        <div class="header-right">
        <nav>
            <a href="../../">Home</a>
            <a class="blacknav" href="../acc/logout">Logout</a>
          </nav>
        </div>
      </div>
    </header> 
         <!-- SPLITTER -->
         <div style='text-align: center;'>
      <h1>Account</h1>
      <br>
      To change one of these, please contact an admin.
      <br>
          <b>Username</b><br>
          <input style ="text-align: center;" type="text" value="<?php echo $_SESSION['userUid']; ?>" readonly>
            <br>
          <b>Name</b><br>
          <input style ="text-align: center;" type="text" value="<?php echo $_SESSION['userName']; ?>" readonly>
            <br>
          <b>Email</b><br>
          <input style ="text-align: center;" type="text" value="<?php echo $_SESSION['userMail']; ?>" readonly>
            <br>
          <b>Password</b><br>
          <a href="changepwd">Change Password</a>
    <br>
 </div>
    <?php 
      require "../footer.php";
    ?>
  
  
  </body>
</html>

