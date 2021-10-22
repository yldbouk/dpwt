<?php
session_start();
$needsAcc=TRUE;
if (isset($_GET['edit'])) {
  $id = $_GET['edit'];
}
$access = "true-personal";
require "scripts/getJobs.script.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/form.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta charset="utf-8">
    <title>View Your Print Requests - DPWT</title>
  </head>

  <body style="padding-bottom:3in;">
  <?php
    $consoleActive = TRUE;
    require $_SERVER['DOCUMENT_ROOT']."/header.php";
  ?>
      <!-- SPLITTER -->
    <center>
      <?php if ($_SESSION['permsUsers'] == "admin" || $_SESSION['permsUsers'] == "developer") {
          echo '<h3><a id="i" href="admin/" style="width:auto;"><b>Admin Job Management</b></a></h3>';
        } ?>
      <input type="text" id="search" placeholder="Search">
      <table id="jobs">
        <thead>
          <tr>
            <th>ID</th>
            <th>Job Name</th>
            <th>Reason For Print</th>
            <th>Date Requested</th>
            <th>Requested Color</th>
            <th>Current Status</th>
            <th>Requestor</th>
            <th>Reviewed By</th>
            <th>Finished Print Location</th>
            <th>Printer</th>
            <th>View File</th>
          </tr>
        </thead>
        <tbody>
          <?php
            if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {
                if(!isset($row["reviewedBy"])){ $row["reviewedBy"] = "<i>None</i>";}
                if(!isset($row["location"])){ $row["location"] = "<i>None</i>";}
                if ($row['jobStatus'] == 'review') {
                  $jobStatus = "<b>Needs Review</b>";
                } elseif ($row['jobStatus'] == 'queue') {
                  $jobStatus = "On Queue";
                } elseif ($row['jobStatus'] == 'complete_waiting') {
                  $jobStatus = "<b>Waiting for Processing</b>";
                } elseif ($row['jobStatus'] == 'printing') {
                  $jobStatus = "<b>Printing</b>";
                } elseif ($row['jobStatus'] == 'purge') {
                  $jobStatus = "Purged";
                } elseif ($row['jobStatus'] == 'pause') {
                  $jobStatus = "Paused";
                } elseif ($row['jobStatus'] == 'denied') {
                  $jobStatus = "Denied";
                } else {
                  $jobStatus = $row['jobStatus'];
                }
                echo "
                  <tr>
                    <td>".$row["id"]."</td>
                    <td>".$row["jobName"]."</td>
                    <td><i><a onclick='alert(`".$row["reason"]."`)'>View</a></i></td>
                    <td><i><a onclick='alert(`".$row["date"]."`)'>View</a></i></td>
                    <td>".$row["color"]."</td>
                    <td>".$jobStatus."</td>
                    <td>".$row["createdBy"]."</td>
                    <td>".$row["reviewedBy"]."</td>
                    <td>".$row["location"]."</td>
                    <td>".$row["whatPrinter"]."</td>
                    <td><i><a onclick='document.location=`/console/view3d/?id=".$row['id']."`'>View</a></i></td>
                  </tr>
                ";
              }  
            } else {
              echo "
                <tr>
                  <td>No Results. Make a Print!</td>
                </tr>
              ";
            } ?>
        </tbody>
      </table>
    </center>
    <!-- SPLITTER -->
    <?php function showViewer() {require "../../view3d/index.php";} ?>
    <script>
      var $rows = $('#jobs tr');
      $('#search').keyup(function() {
        var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
        $rows.show().filter(function() {
          var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
          return !~text.indexOf(val);
        }).hide();
      });
      function editActions(id) {
        document.location = "./?edit="+id;
      }
    </script>

<div id="editActions" class="upload">
      <div class="uploadc">
        <div class="container">
          <label><b>View Job: </b></label><br><br>
          <center>
            <table>
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Job Name</th>
                  <th>Reason For Print</th>
                  <th>Date Requested</th>
                  <th>Requested Color</th>
                  <th>Current Status</th>
                  <th>Requestor</th>
                  <th>Reviewed By</th>
                  <th>Finished Print Location</th>
                  <th>Printer</th>
                </tr>
              </thead>
              <?php 
                if ($requestor0 == $_SESSION['userName']) {
                  echo "
                    <tr>
                      <td>".$id."</td>
                      <td>".$name0."</td>
                      <td><i><a onclick='alert(`".$reason0."`)'>View</a></i></td>
                      <td><i><a onclick='alert(`".$date0."`)'>View</a></i></td>
                      <td>".$color0."</td>
                      <td>".$status0."</td>
                      <td>".$requestor0."</td>
                      <td>".$reviewedBy0."</td>
                      <td>".$location0."</td>
                      <td>".$printer0."</td>

                    </tr>
                  ";
                }
              ?>
            </table>
          </center>
        </div>
        <div class="container" style="padding: 16px; text-align: center; background-color:#f1f1f1">
          <button type="button" onclick="document.location='./'" class="cancelbtn">OK</button>
        </div>
      </div>
    </div>
    <?php if (isset($_GET['edit'])) echo "<script>document.getElementById('editActions').style.display='block'</script>";    
          require "../../footer.php"; ?>
  </body>
</html>
