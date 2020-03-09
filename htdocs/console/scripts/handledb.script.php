 <?php

 $servername = "localhost";
 $dbusr = "root";
 $dbpwd = "morefan";
 $dbname = "dpwt";

 $conn = mysqli_connect($servername, $dbusr, $dbpwd, $dbname);

 if (!$conn) {
     die("Connection Unsuccessful: ".mysqli_connect_error());
 }