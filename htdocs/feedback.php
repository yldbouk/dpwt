<?php
  session_start();
  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/form.css">
    <meta charset="utf-8">
    <title>Feedback - DPWT</title>
  </head>
  <body>
  <?php
    $homeActive = TRUE;
    require $_SERVER['DOCUMENT_ROOT']."/header.php";
  ?>
      <br><br>
       <center>
         <!-- SPLITTER -->
      <h1>Submit Feedback</h1><br><h3>Please submit issues, suggestions, or other feedback here.</h3>
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
            <br><br>
            <input type="radio" id="fbtype" name="type" value="issue" checked> Issue<br>
            <input type="radio" id="fbtype" name="type" value="suggestion"> Suggestion<br>
            <input type="radio" id="fbtype" name="type" value="other"> Other
            <br><br>
          <label for="feedback"><b>Feedback:</b></label><br>
          <textarea cols="60" rows="5" placeholder="Type your feedback in here." name="feedback" required></textarea>
          <?php if(isset($_SESSION["userName"])) echo `<input type="text" style="visibility=hidden;" placeholder="Enter Name" value="`.$_SESSION["userUid"].`"name="name">` ?>
               <br><br>
          <button type="submit" name="feedback-submit">Submit</button>
      </form>
    <br>
    </center>
    <script>
  
    $(document).ready(function(){
     $('input[type=radio]').click(function(){
        if (this.id == "fbtype")
          alert(this.value);
      });
    });

    </script>
    <?php
      require $_SERVER['DOCUMENT_ROOT']."/footer.php";
    ?>


  </body>
</html>
