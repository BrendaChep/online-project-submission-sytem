
<?php
  include '../dbcon.php';
  include '../session.php';
  $student = $_SESSION['id'];

?>

      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card-2 w3-white">
            <div class="w3-container w3-padding">
              <h3 class="w3-center">SUBMIT REPORT</h3>
            </div>
          </div>
        </div>
      </div>
      <br />
  
   <div class="w3-row-padding">
    <div class="w3-col m12">
      <div class="w3-card-2 w3-white">  
        <div class="w3-container w3-padding" id="reportsub"> 
          
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="" enctype="multipart/form-data">
              <br />
              <input type="file" name="report" class="w3-input" placeholder="Choose File" onchange="readURL(this)" required>
              <span id="reportname" class="w3-hide"></span>
              <br />

              


              
                      

              <br />
              <button type="" name="submit" onclick="" class="w3-padding w3-btn-block w3-blue">Submit Report</button>
            </form>
          </div>
        </div>
    </div>
  </div>

<?php
if (isset($_POST['submit'])) {

  //$report = $_POST['report'];
  $report_type = $_POST['report_type'];

//Fetch the project Id for insertion
  $groupsql = mysqli_query($dbcon, "SELECT regNo FROM student WHERE regNo = '$student'");
  $groupArray = mysqli_fetch_array($groupsql);
  $regNo = $groupArray['regNo'];

  $projectsql = mysqli_query($dbcon, "SELECT projectId FROM project WHERE regNo = '$regNo'"); 
  $projectArray = mysqli_fetch_array($projectsql);
  $projectId = $projectArray['projectId'];

  if ($report_type == "review") {
  	include '../functions/review-reports.php';

  	$sql = "UPDATE `progressreport` SET review = '$target_file' WHERE projectId = $projectId";
  	$insert = mysqli_query($dbcon, $sql);

  } 
  else 
  {
  	include '../functions/finalsub-reports.php';

  	if ($report_type == "week1-progress") {
  	 $sql = "UPDATE `progressreport` SET wk1_progress = '$target_file' WHERE projectId = '$projectId'";
  	} 
    if ($report_type == "week2-progress") {
       $sql = "UPDATE `progressreport` SET wk2_progress = '$target_file' WHERE projectId = '$projectId'";
    } 
    if ($report_type == "week3-progress") {
      $sql = "UPDATE `progressreport` SET wk3_progress = '$target_file' WHERE projectId = '$projectId'";
    } 
    if ($report_type == "week4-progress") {
      $sql = "UPDATE `progressreport` SET wk4_progress = '$target_file' WHERE projectId = '$projectId'";
    } 
    if ($report_type == "week5-progress") {
      $sql = "UPDATE `progressreport` SET wk5_progress = '$target_file' WHERE projectId = '$projectId'";
    } 
    if ($report_type == "week6-progress") {
      $sql = "UPDATE `progressreport` SET wk6_progress = '$target_file' WHERE projectId = '$projectId'";
    } 
    if ($report_type == "week7-progress") {
      $sql = "UPDATE `progressreport` SET wk7_progress = '$target_file' WHERE projectId = '$projectId'";
    } 
    if ($report_type == "week8-progress") {
      $sql = "UPDATE `progressreport` SET wk8_progress = '$target_file' WHERE projectId = '$projectId'";
    } 
    if ($report_type == "week9-progress") {
      $sql = "UPDATE `progressreport` SET wk9_progress = '$target_file' WHERE projectId = '$projectId'";
    } 
    if ($report_type == "week10-progress") {
      $sql = "UPDATE `progressreport` SET wk10_progress = '$target_file' WHERE projectId = '$projectId'";
    } 
  	if ($report_type == "final") {
      $sql = "UPDATE `progressreport` SET final = '$target_file' WHERE projectId = '$projectId'";
    } 

  	$insert = mysqli_query($dbcon, $sql) or die(mysqli_error($dbcon));
  	
  }
 
if (($insert = true) && ($uploadOk == 1)) { ?>
    <script>
    alert('Report Successfully Submitted.');
   window.location = 'draft2.php';
    </script>
  <?php 
  } else { var_dump($insert); var_dump($uploadOk); ?>
    
    <script>
    alert('Something went wrong your report was not submitted.');
  window.location = 'index.php';
    </script>    
  <?php
 
      }

    } //isset Submit

  ?>
<script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#reportname').attr('src', e.target.result);
                    $('#reportname').addClass("w3-show")
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>

