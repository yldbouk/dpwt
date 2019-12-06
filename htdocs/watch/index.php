<?php 
if(isset($_GET['v'])){
echo '<form id="form" method="get" action="/extras/media/lib/ytdl/getvideo.php"><input name="videoid" style="visibility:hidden;" value="'.$_GET['v'].'"><input style="visibility:hidden;" name="format" value="ipad"></form><script>document.getElementById("form").submit();</script>';
} else echo '<script>history.go(-1)</script>';
