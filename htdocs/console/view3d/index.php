<?php 
  session_start();
  if (!isset($_SESSION['userUid'])) {
    header("Location: /acc/login/index.php?result=perm");
  }
  include_once("header.php");
  require "scripts/getFile.script.php"
?>

<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/chrome-frame/1/CFInstall.min.js"></script>

  <script src="scripts/Three.js"></script>
  <script src="scripts/plane.js"></script>
  <script src="scripts/thingiview.js"></script>
  <script>
    window.onload = function() {
      thingiurlbase = "scripts";
      thingiview = new Thingiview("viewer");
      <?php
      //add more colors in the future
      if ($_SESSION["filamentColor"] == "purple") {
        $color = "800080";
      }
      ?>
      thingiview.setObjectColor('#<?php echo $color;?>');
      thingiview.initScene();
      thingiview.load<?php echo $extension; ?>("openFile.script.php?fileID=<?php echo $id; ?>&extension=<?php echo $extension; ?>");

  
    }
  </script>
</head>

<body>
<input onclick="history.go(-1)" type="button" value="<< Back" />
  <center>
    <p> View:
      <input onclick="thingiview.setCameraView('top');" type="button" value="Top" />
      <input onclick="thingiview.setCameraView('side');" type="button" value="Side" />
      <input onclick="thingiview.setCameraView('bottom');" type="button" value="Bottom" />
      <input onclick="thingiview.setCameraView('diagonal');" type="button" value="Diagonal" />

      &nbsp Rotation: <input id="rotate-off" onclick="rotateOff()" type="button" value="Off" /><input id="rotate-on"
        onclick="rotateOn()" type="button" value="On" style="visibility:hidden;" />
      <script>
        function rotateOn() {
      thingiview.setRotation(true);
      document.getElementById("rotate-on").style="visibility:hidden";
      document.getElementById("rotate-off").style="visibility:visible";
    }
    function rotateOff() {
      thingiview.setRotation(false);
      document.getElementById("rotate-off").style="visibility:hidden";
      document.getElementById("rotate-on").style="visibility:visible";
    }
 
 </script>
    </p>

    <div id="viewer" style="width:90%;min-height: 600px;"></div>

    <p>
      <input onclick="thingiview.setObjectMaterial('wireframe');" type="button" value="Wireframe" />
      <input onclick="thingiview.setObjectMaterial('solid');" type="button" value="Solid" />
    </p>

    <p>
      Background Color: <a href="#" onclick="thingiview.setBackgroundColor('#606060')">Gray</a> | <a href="#" onclick="thingiview.setBackgroundColor('#ffffff')">White</a>
      | <a href="#" onclick="thingiview.setBackgroundColor('#000000')">Black</a><br />
      Object Color: <a href="#" onclick="thingiview.setObjectColor('#ffffff')">White</a> | <a href="#" onclick="thingiview.setObjectColor('#aa0000')">Red</a>
      | <a href="#" onclick="thingiview.setObjectColor('#CDFECD')">Green</a> | <a href="#" onclick="thingiview.setObjectColor('#C0D8F0')">Blue</a><br />
    </p>

    
  </center>
</body>

</html>
<?php
include_once("header.php");
?>