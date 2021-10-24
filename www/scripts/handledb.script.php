 <?php

 $servername = "mariadb";
 $dbusr = "root";
 $dbpwd = "";
 $dbname = "dpwt";

 $conn = mysqli_connect($servername, $dbusr, $dbpwd, $dbname);

 if (!$conn) {
     die("Connection Unsuccessful: ".mysqli_connect_error());
 }