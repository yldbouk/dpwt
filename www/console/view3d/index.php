<?php 
  session_start();
  $needsAcc=TRUE;
  $needsAdmin=TRUE;
  $consoleActive=TRUE;
  require "./getFile.script.php";
  require $_SERVER['DOCUMENT_ROOT']."/header.php"
?>

<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
  <link rel="stylesheet" href="/css/header.css">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/chrome-frame/1/CFInstall.min.js"></script>
  <script src="stl_viewer.min.js"></script>
  <script>
    window.onload = function() {
      <?php
      //add more colors in the future
      if ($_SESSION["filamentColor"] == "purple")
        $color = "800080";
      else if ($_SESSION["filamentColor"] == "red")
        $color = "ff0000";
      ?>
      var stl_viewer=new StlViewer(document.getElementById("stl_cont"), { models: [ {id:1, filename:"./openFile.script.php?fileID=<?php echo $id; ?>&extension=<?php echo $extension; ?>"} ] });
      stl_viewer.set_color(1, '<?php echo $color; ?>');
    }
  </script>
</head>

<body>
<input onclick="history.go(-1)" type="button" value="<< Back" />
  <center>
  <script>
      var stl_viewer=new StlViewer(document.getElementById("stl_cont"), { models: [ {id:1, filename:"./openFile.script.php?fileID=<?php echo $id; ?>&extension=<?php echo $extension; ?>"} ] });
      stl_viewer.set_color(1, '<?php echo $color; ?>');
  </script>
    <p> View:
    <select onchange="stl_viewer.set_orientation(this.value);">
      <option value="front">Front</option>
      <option value="right">Right</option>
      <option value="top">Top</option>
      <option value="back">Back</option>
      <option value="left">Left</option>
      <option value="bottom">Bottom</option>
    </select>

      &nbsp Rotation: <input id="rotate-off" onclick="rotateOff()" type="button" value="Off" /><input id="rotate-on"
        onclick="rotateOn()" type="button" value="On" style="visibility:hidden;" />
      <script>
        function rotateOn() {
          controls.autoRotate=true;fix_rotation=true;
      document.getElementById("rotate-on").style="visibility:hidden";
      document.getElementById("rotate-off").style="visibility:visible";
    }
    function rotateOff() {
      controls.autoRotate=false;fix_rotation=false;
      document.getElementById("rotate-off").style="visibility:hidden";
      document.getElementById("rotate-on").style="visibility:visible";
    }
 
 </script>
    </p>

    <div id="stl_cont" style="width:90%;min-height: 600px;"></div>

    <p>
      <input onclick="set_shading(2);" type="button" value="Wireframe" />
      <input onclick="set_shading(0);" type="button" value="Solid" />
    </p>

    <p>
      Object Color: <a href="#" onclick="set_color(this, '#ffffff')">White</a> | <a href="#" onclick="thingiview.setObjectColor('#aa0000')">Red</a>
      | <a href="#" onclick="thingiview.set_color(this, '#CDFECD')">Green</a> | <a href="#" onclick="thingiview.setObjectColor('#C0D8F0')">Blue</a><br />
    </p>

    
  </center>
</body>

</html>
<?php
require $_SERVER['DOCUMENT_ROOT']."/footer.php";
?>