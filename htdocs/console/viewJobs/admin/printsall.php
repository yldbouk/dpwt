<?php
session_start();
if (isset($_GET['edit'])) {
  $id = $_GET['edit'];
}
$access = "true-showall";
require "../scripts/getJobs.script.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/form.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta charset="utf-8">
    <title>View All Print Requests - DPWT</title>
  </head>

  <body style="padding-bottom:3in;">
    <header>
      <div class="header">
        <a href="/" class="logo">D P W T</a>
        <div class="header-right">
          <nav>
            <?php echo "<text>".$_SESSION['userUid']."</text>"; ?><a />
            <a href="/">Home</a>
            <a class="active" href='/console'>Console</a> <a />
            <a class="blacknav" href="/acc/logout">Logout</a>
          </nav>
        </div>
      </div>
    </header>
      <!-- SPLITTER -->
    <center>
      <input type="text" id="search" placeholder="Search">
      <table id="jobs">
        <thead>
          <tr>
            <th>ID</th>
            <th>Job Name</th>
            <th>Reason For Print</th>
            <th>Date Requested</th>
            <th>Current Status</th>
            <th>Requestor</th>
            <th>Reviewed By</th>
            <th>Finished Print Location</th>
            <th>Printer</th>
            <th>Actions</th>
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
                    <td>".$jobStatus."</td>
                    <td>".$row["createdBy"]."</td>
                    <td>".$row["reviewedBy"]."</td>
                    <td>".$row["location"]."</td>
                    <td>".$row["whatPrinter"]."</td>
                    <td><i><a onclick='editActions(".$row["id"].")'>View</a></i></td>
                  </tr>
                ";
              }  
            } else {
              echo "
                <tr>
                  <td>No Results. This is most likely an error.</td>
                </tr>
              ";
            } ?>
        </tbody>
      </table>
    </center>
    <!-- SPLITTER -->
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
          <label><b>Edit Job: </b></label><br><br>
          <center>
            <table>
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Job Name</th>
                  <th>Reason For Print</th>
                  <th>Date Requested</th>
                  <th>Current Status</th>
                  <th>Requestor</th>
                  <th>Reviewed By</th>
                  <th>Finished Print Location</th>
                  <th>Printer</th>
                </tr>
              </thead>
              <?php 
                echo "
                  <tr>
                    <td>".$id."</td>
                    <td>".$name0."</td>
                    <td><i><a onclick='alert(`".$reason0."`)'>View</a></i></td>
                    <td><i><a onclick='alert(`".$date0."`)'>View</a></i></td>
                    <td>".$status0."</td>
                    <td>".$requestor0."</td>
                    <td>".$reviewedBy0."</td>
                    <td>".$location0."</td>
                    <td>".$printer0."</td>
                  </tr>
                "; 
              ?>
            </table>

            <br><br>&nbsp
            <form method='post' id="editform" action='../scripts/editJobs.script.php'>
           <input id="location" type="text" name="location" style="visibility:hidden;">
           <input id="purge" type="text" name="purge" style="visibility:hidden;">
              <?php  
                echo '<input type="text" name="id" style="visibility:hidden;" value="'.$id.'"><br>';
                if ($status0 == "queue") echo '|<button style="background:none!important;color:inherit;border:none;padding:0!important;font:inherit;border-bottom:1pxsolid#444;cursor:pointer;"type="submit"name="edit-pause"><b><i>Pause Job</i></b></button>|';
                if ($status0 == "review") {echo '|<button style="background:none!important;color:inherit;border:none;padding:0!important;font:inherit;border-bottom:1pxsolid#444;cursor:pointer;"type="submit"name="edit-accept"><b><i>Accept Job</i></b></button>|';
                echo '|<button style="background:none!important;color:inherit;border:none;padding:0!important;font:inherit;border-bottom:1pxsolid#444;cursor:pointer;"type="submit"name="edit-deny"><b><i>Deny Job</i></b></button>|';}
                if ($status0 == "complete_waiting") echo '|<button style="background:none!important;color:inherit;border:none;padding:0!important;font:inherit;border-bottom:1pxsolid#444;cursor:pointer;"type="button"onclick="editcomplete();"><b><i>Finish Completion Process</i></b></button>|';
                if ($status0 == "purge" || $status0 == "printing" || $status0 == "complete_waiting") {} else echo '|<button style="background:none!important;color:inherit;border:none;padding:0!important;font:inherit;border-bottom:1pxsolid#444;cursor:pointer;"type="button"onclick="editpurge();"><b><i>Purge</i></b></button>|';
              ?>
           </form>
          </center>
        </div>
        <div class="container" style="padding: 16px; text-align: center; background-color:#f1f1f1">
          <button type="button" onclick="document.location='./'" class="cancelbtn">OK</button>
        </div>
      </div>
    </div>
    <script>
      function editcomplete() {
        var location = prompt("Breifly explain where the finished product is located:");
        document.getElementById("location").value=location;
        document.getElementById("editform").submit();
      }
      function editpurge() {
        if(confirm('WARNING: YOU ARE ABOUT TO PURGE THIS JOB. THIS WILL DELETE ALL FILES RELATED TO THIS JOB. DO YOU WANT TO CONTINUE?')) {
          document.getElementById("purge").value="true";
          document.getElementById("editform").submit();
        } 
      }
    </script>
    <?php if (isset($_GET['edit'])) echo "<script>document.getElementById('editActions').style.display='block'</script>";    
          require "../../../footer.php"; ?>
  </body>
</html>
