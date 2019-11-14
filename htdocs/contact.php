<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link rel="stylesheet" href="/css/header.css">
    <meta charset="utf-8">
    <title>Contact - DPWT</title>
</head>

<body>
<?php
    $homeActive = TRUE;
    require $_SERVER['DOCUMENT_ROOT']."/header.php";
  ?>
 <div style="text-align:center;">
<h1>Contact</h1><br><h3>Please use this form to contact us or send feedback.</h3>
      <br><br>
   <?php 
    if (isset($_GET['result'])) {
      if ($_GET['result'] == "success") {
       echo '<h4>Thank you! Your feedback has been submitted.</h4>';
      } elseif ($_GET['result'] == "sqlerror") {
        echo '<h4>An internal error has occured. Please try again later.</h4>';
      } else {
        echo '<h4>An unknown error occured. Please try again.</h4>';
      }
    }
   ?>
      <form action="./scripts/feedback.script.php" method="post">
        <div class="container">
          <label for="name"><b>Name</b></label><br>
          <input type="text" placeholder="Enter Name" <?php if(isset($_SESSION["userName"])) echo 'value="'.$_SESSION["userName"].'"' ?> name="name" required>
            <br><br><div style="display: inline-block; text-align: left;">
            <input type="radio" name="type" value="contact"> Contact<br>
            <input type="radio" name="type" value="issue"> Issue<br>
            <input type="radio" name="type" value="account"> Account Change<br>
            <input type="radio" name="type" value="suggestion"> Suggestion<br>
            <input type="radio" name="type" value="other" checked> Other
            </div><br><br>
          <label for="feedback"><b>Form:</b></label><br>
          <textarea cols="60" rows="5" placeholder="Type details in here." name="feedback" required></textarea>
               <br><input type="hidden" value="<?php if(isset($_SESSION['userUid'])) echo $_SESSION['userUid']; else echo 'none'; ?>"<br>
          <button type="submit" name="feedback-submit">Submit</button>
      </form>
    <br>


</div>

  <?php require "footer.php"; ?>
</body>
</html>
