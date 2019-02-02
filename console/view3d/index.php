<?php 
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  if (!isset($_SESSION['userUid'])) {
    header("Location: ../acc/login/index.php?result=perm");
  }
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
  
  <script src="/scripts/Three.js"></script>
  <script src="/scripts/plane.js"></script>
  <script src="/scripts/thingiview.js"></script>
  <script>
    window.onload = function() {
      // You may want to place these lines inside an onload handler
     

      thingiurlbase = "/scripts/";
      thingiview = new Thingiview("viewer");
      thingiview.setObjectColor('#C0D8F0');
      thingiview.initScene();
      // thingiview.setShowPlane(true);
      thingiview.loadSTLString(document.getElementById('stlstring').value);
    }
  </script>
</head>
<body>
<div id="sidebar" style="float:right;width:40%">
<form>
<textarea id="stlstring" style="visibility:hidden">
solid OpenSCAD_Model
  facet normal -1.000000 -0.000000 -0.000000
    outer loop
      vertex -5.000000 -5.000000 0.000000
      vertex -5.000000 -5.000000 10.000000
      vertex -5.000000 5.000000 0.000000
    endloop
  endfacet
  facet normal -1.000000 0.000000 0.000000
    outer loop
      vertex -5.000000 5.000000 0.000000
      vertex -5.000000 -5.000000 10.000000
      vertex -5.000000 5.000000 10.000000
    endloop
  endfacet
  facet normal 0.000000 -1.000000 0.000000
    outer loop
      vertex -5.000000 -5.000000 10.000000
      vertex -5.000000 -5.000000 0.000000
      vertex 5.000000 -5.000000 0.000000
    endloop
  endfacet
  facet normal 0.000000 -1.000000 0.000000
    outer loop
      vertex 5.000000 -5.000000 10.000000
      vertex -5.000000 -5.000000 10.000000
      vertex 5.000000 -5.000000 0.000000
    endloop
  endfacet
  facet normal 0.000000 -0.000000 -1.000000
    outer loop
      vertex 1.246980 1.563663 0.000000
      vertex -5.000000 5.000000 0.000000
      vertex 5.000000 5.000000 0.000000
    endloop
  endfacet
  facet normal 0.000000 -0.000000 -1.000000
    outer loop
      vertex -5.000000 -5.000000 0.000000
      vertex -5.000000 5.000000 0.000000
      vertex -1.801938 0.867767 0.000000
    endloop
  endfacet
  facet normal 0.000000 0.000000 -1.000000
    outer loop
      vertex -5.000000 -5.000000 0.000000
      vertex -1.801938 0.867767 0.000000
      vertex -1.801938 -0.867767 0.000000
    endloop
  endfacet
  facet normal 0.000000 0.000000 -1.000000
    outer loop
      vertex -5.000000 -5.000000 0.000000
      vertex -1.801938 -0.867767 0.000000
      vertex -0.445042 -1.949856 0.000000
    endloop
  endfacet
  facet normal -0.000000 0.000000 -1.000000
    outer loop
      vertex -5.000000 -5.000000 0.000000
      vertex -0.445042 -1.949856 0.000000
      vertex 5.000000 -5.000000 0.000000
    endloop
  endfacet
  facet normal 0.000000 0.000000 -1.000000
    outer loop
      vertex 1.246980 -1.563663 0.000000
      vertex 5.000000 -5.000000 0.000000
      vertex -0.445042 -1.949856 0.000000
    endloop
  endfacet
  facet normal 0.000000 0.000000 -1.000000
    outer loop
      vertex 2.000000 0.000000 0.000000
      vertex 5.000000 -5.000000 0.000000
      vertex 1.246980 -1.563663 0.000000
    endloop
  endfacet
  facet normal 0.000000 0.000000 -1.000000
    outer loop
      vertex 5.000000 -5.000000 0.000000
      vertex 2.000000 0.000000 0.000000
      vertex 5.000000 5.000000 0.000000
    endloop
  endfacet
  facet normal -0.000000 -0.000000 -1.000000
    outer loop
      vertex -0.445042 1.949856 0.000000
      vertex -5.000000 5.000000 0.000000
      vertex 1.246980 1.563663 0.000000
    endloop
  endfacet
  facet normal 0.000000 -0.000000 -1.000000
    outer loop
      vertex 2.000000 0.000000 0.000000
      vertex 1.246980 1.563663 0.000000
      vertex 5.000000 5.000000 0.000000
    endloop
  endfacet
  facet normal 0.000000 -0.000000 -1.000000
    outer loop
      vertex -1.801938 0.867767 0.000000
      vertex -5.000000 5.000000 0.000000
      vertex -0.445042 1.949856 0.000000
    endloop
  endfacet
  facet normal 0.000000 1.000000 0.000000
    outer loop
      vertex -5.000000 5.000000 0.000000
      vertex -5.000000 5.000000 10.000000
      vertex 5.000000 5.000000 0.000000
    endloop
  endfacet
  facet normal 0.000000 1.000000 0.000000
    outer loop
      vertex 5.000000 5.000000 0.000000
      vertex -5.000000 5.000000 10.000000
      vertex 5.000000 5.000000 10.000000
    endloop
  endfacet
  facet normal 0.000000 -0.000000 1.000000
    outer loop
      vertex -0.445042 -1.949856 10.000000
      vertex -5.000000 -5.000000 10.000000
      vertex 5.000000 -5.000000 10.000000
    endloop
  endfacet
  facet normal 0.000000 -0.000000 1.000000
    outer loop
      vertex -5.000000 5.000000 10.000000
      vertex -5.000000 -5.000000 10.000000
      vertex -1.801938 -0.867767 10.000000
    endloop
  endfacet
  facet normal 0.000000 0.000000 1.000000
    outer loop
      vertex -5.000000 5.000000 10.000000
      vertex -1.801938 -0.867767 10.000000
      vertex -1.801938 0.867767 10.000000
    endloop
  endfacet
  facet normal 0.000000 0.000000 1.000000
    outer loop
      vertex 5.000000 5.000000 10.000000
      vertex -5.000000 5.000000 10.000000
      vertex -0.445042 1.949856 10.000000
    endloop
  endfacet
  facet normal 0.000000 0.000000 1.000000
    outer loop
      vertex 5.000000 5.000000 10.000000
      vertex 1.246980 1.563663 10.000000
      vertex 5.000000 -5.000000 10.000000
    endloop
  endfacet
  facet normal 0.000000 0.000000 1.000000
    outer loop
      vertex 5.000000 5.000000 10.000000
      vertex -0.445042 1.949856 10.000000
      vertex 1.246980 1.563663 10.000000
    endloop
  endfacet
  facet normal 0.000000 0.000000 1.000000
    outer loop
      vertex 1.246980 1.563663 10.000000
      vertex 2.000000 0.000000 10.000000
      vertex 5.000000 -5.000000 10.000000
    endloop
  endfacet
  facet normal 0.000000 -0.000000 1.000000
    outer loop
      vertex 2.000000 0.000000 10.000000
      vertex 1.246980 -1.563663 10.000000
      vertex 5.000000 -5.000000 10.000000
    endloop
  endfacet
  facet normal 0.000000 -0.000000 1.000000
    outer loop
      vertex 1.246980 -1.563663 10.000000
      vertex -0.445042 -1.949856 10.000000
      vertex 5.000000 -5.000000 10.000000
    endloop
  endfacet
  facet normal 0.000000 -0.000000 1.000000
    outer loop
      vertex -1.801938 -0.867767 10.000000
      vertex -5.000000 -5.000000 10.000000
      vertex -0.445042 -1.949856 10.000000
    endloop
  endfacet
  facet normal 0.000000 0.000000 1.000000
    outer loop
      vertex -1.801938 0.867767 10.000000
      vertex -0.445042 1.949856 10.000000
      vertex -5.000000 5.000000 10.000000
    endloop
  endfacet
  facet normal 1.000000 0.000000 -0.000000
    outer loop
      vertex 5.000000 -5.000000 10.000000
      vertex 5.000000 -5.000000 0.000000
      vertex 5.000000 5.000000 0.000000
    endloop
  endfacet
  facet normal 1.000000 0.000000 0.000000
    outer loop
      vertex 5.000000 5.000000 10.000000
      vertex 5.000000 -5.000000 10.000000
      vertex 5.000000 5.000000 0.000000
    endloop
  endfacet
  facet normal 1.000000 0.000000 0.000000
    outer loop
      vertex -1.801938 0.867767 0.000000
      vertex -1.801938 0.867767 10.000000
      vertex -1.801938 -0.867767 10.000000
    endloop
  endfacet
  facet normal 1.000000 0.000000 0.000000
    outer loop
      vertex -1.801938 -0.867767 0.000000
      vertex -1.801938 0.867767 0.000000
      vertex -1.801938 -0.867767 10.000000
    endloop
  endfacet
  facet normal 0.623490 -0.781831 0.000000
    outer loop
      vertex -0.445042 1.949856 0.000000
      vertex -0.445042 1.949856 10.000000
      vertex -1.801938 0.867767 10.000000
    endloop
  endfacet
  facet normal 0.623490 -0.781831 0.000000
    outer loop
      vertex -1.801938 0.867767 0.000000
      vertex -0.445042 1.949856 0.000000
      vertex -1.801938 0.867767 10.000000
    endloop
  endfacet
  facet normal -0.222521 -0.974928 -0.000000
    outer loop
      vertex 1.246980 1.563663 0.000000
      vertex 1.246980 1.563663 10.000000
      vertex -0.445042 1.949856 10.000000
    endloop
  endfacet
  facet normal -0.222521 -0.974928 -0.000000
    outer loop
      vertex -0.445042 1.949856 0.000000
      vertex 1.246980 1.563663 0.000000
      vertex -0.445042 1.949856 10.000000
    endloop
  endfacet
  facet normal -0.900969 -0.433884 0.000000
    outer loop
      vertex 2.000000 0.000000 10.000000
      vertex 1.246980 1.563663 10.000000
      vertex 2.000000 0.000000 0.000000
    endloop
  endfacet
  facet normal -0.900969 -0.433884 0.000000
    outer loop
      vertex 2.000000 0.000000 0.000000
      vertex 1.246980 1.563663 10.000000
      vertex 1.246980 1.563663 0.000000
    endloop
  endfacet
  facet normal -0.900969 0.433884 0.000000
    outer loop
      vertex 2.000000 0.000000 10.000000
      vertex 2.000000 0.000000 0.000000
      vertex 1.246980 -1.563663 10.000000
    endloop
  endfacet
  facet normal -0.900969 0.433884 0.000000
    outer loop
      vertex 1.246980 -1.563663 10.000000
      vertex 2.000000 0.000000 0.000000
      vertex 1.246980 -1.563663 0.000000
    endloop
  endfacet
  facet normal -0.222521 0.974928 0.000000
    outer loop
      vertex 1.246980 -1.563663 10.000000
      vertex 1.246980 -1.563663 0.000000
      vertex -0.445042 -1.949856 10.000000
    endloop
  endfacet
  facet normal -0.222521 0.974928 0.000000
    outer loop
      vertex -0.445042 -1.949856 10.000000
      vertex 1.246980 -1.563663 0.000000
      vertex -0.445042 -1.949856 0.000000
    endloop
  endfacet
  facet normal 0.623490 0.781831 -0.000000
    outer loop
      vertex -0.445042 -1.949856 10.000000
      vertex -0.445042 -1.949856 0.000000
      vertex -1.801938 -0.867767 10.000000
    endloop
  endfacet
  facet normal 0.623490 0.781831 -0.000000
    outer loop
      vertex -1.801938 -0.867767 10.000000
      vertex -0.445042 -1.949856 0.000000
      vertex -1.801938 -0.867767 0.000000
    endloop
  endfacet
endsolid OpenSCAD_Model
</textarea>
</form>
</div>
<p>
  <input onclick="thingiview.setCameraView('top');" type="button" value="Top" /> 
  <input onclick="thingiview.setCameraView('side');" type="button" value="Side" /> 
  <input onclick="thingiview.setCameraView('bottom');" type="button" value="Bottom" /> 
  <input onclick="thingiview.setCameraView('diagonal');" type="button" value="Diagonal" /> 
 
  <input onclick="thingiview.setCameraZoom(5);" type="button" value="Zoom +" /> 
  <input onclick="thingiview.setCameraZoom(-5);" type="button" value="Zoom -" /> 
 
  Rotation: <input onclick="thingiview.setRotation(true);" type="button" value="on" /> | <input onclick="thingiview.setRotation(false);" type="button" value="off" />
</p>

<div id="viewer" style="width:50%;height:400px"></div>

<p>
  <input onclick="thingiview.setObjectMaterial('wireframe');" type="button" value="Wireframe" /> 
  <input onclick="thingiview.setObjectMaterial('solid');" type="button" value="Solid" />
</p>

<p>
  Plane: <a href="#" onclick="thingiview.setShowPlane(false)">Hide</a> | <a href="#" onclick="thingiview.setShowPlane(true)">Show</a><br/>
  Background Color: <a href="#" onclick="thingiview.setBackgroundColor('#606060')">Gray</a> | <a href="#" onclick="thingiview.setBackgroundColor('#ffffff')">White</a> | <a href="#" onclick="thingiview.setBackgroundColor('#000000')">Black</a><br/>
  Object Color: <a href="#" onclick="thingiview.setObjectColor('#ffffff')">White</a> | <a href="#" onclick="thingiview.setObjectColor('#aa0000')">Red</a> | <a href="#" onclick="thingiview.setObjectColor('#CDFECD')">Green</a> | <a href="#" onclick="thingiview.setObjectColor('#C0D8F0')">Blue</a><br/>
</p>

</body>
</html>
