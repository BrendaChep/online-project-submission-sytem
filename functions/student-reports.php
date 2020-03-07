 <?php 
	include '../dbcon.php';
	session_start();
	$get_user = $_SESSION['id'];

    $grpsql = mysqli_query($dbcon, "SELECT * FROM student WHERE regNo='$get_user'") or die(mysqli_error());
    $group = mysqli_fetch_array($grpsql);

    $regNo = $group['regNo'];
  // if ($group != null) {
   	$repsql = "SELECT * FROM progressreport WHERE projectId = (SELECT projectId FROM project WHERE regNo = '$regNo')";
	$reportsql = mysqli_query($dbcon,$repsql) or die(mysqli_error($dbcon));

	$report = mysqli_fetch_array($reportsql);

	$reviewfile = $report['review'];
	$wk1_progress = $report['wk1_progress'];
	$wk2_progress = $report['wk2_progress'];
	$wk3_progress = $report['wk3_progress'];
	$wk4_progress = $report['wk4_progress'];
	$wk5_progress = $report['wk5_progress'];
	$wk6_progress = $report['wk6_progress'];
	$wk7_progress = $report['wk7_progress'];
	$wk8_progress = $report['wk8_progress'];
	$wk9_progress = $report['wk9_progress'];
	$wk10_progress = $report['wk10_progress'];
	$final = $report['final'];
	
?>

    <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card-2 w3-white">
            <div class="w3-container w3-padding">
              <h3 class="w3-center">VIEW THE REPORTS YOU HAVE SUBMITTED</h3>
            </div>
          </div>
        </div>
    </div>
    <br />

<!-- <div class="w3-row-padding w3-container"> -->
 <div class="w3-card-2">
	<table class="w3-table w3-hoverable w3-responsive w3-bordered">
		
		 
		    <tr>
		    <th>Review Report </th>
		    <td><a <?php echo 'href="'.$reviewfile.'"'; ?>> View Report </a></td>
		    </tr>
		    <tr>
		    <th>Week1 Progress</th>
		  <td><a <?php echo 'href="'.$wk1_progress.'"'; ?>> View Report </a></td>
		    </tr>
		     <tr>
		    <th>Week2 Progress</th>
		  <td><a <?php echo 'href="'.$wk2_progress.'"'; ?>> View Report </a></td>
		    </tr>
		     <tr>
		    <th>Week3 Progress</th>
		  <td><a <?php echo 'href="'.$wk3_progress.'"'; ?>> View Report </a></td>
		    </tr>
		     <tr>
		    <th>Week4 Progress</th>
		  <td><a <?php echo 'href="'.$wk4_progress.'"'; ?>> View Report </a></td>
		    </tr>
		     <tr>
		    <th>Week5 Progress</th>
		  <td><a <?php echo 'href="'.$wk5_progress.'"'; ?>> View Report </a></td>
		    </tr>
		     <tr>
		    <th>Week6 Progress</th>
		  <td><a <?php echo 'href="'.$wk6_progress.'"'; ?>> View Report </a></td>
		    </tr>
		    <tr>
		    <th>Week7 Progress</th>
		  <td><a <?php echo 'href="'.$wk7_progress.'"'; ?>> View Report </a></td>
		    </tr>
		    <tr>
		    <th>Week8 Progress</th>
		  <td><a <?php echo 'href="'.$wk8_progress.'"'; ?>> View Report </a></td>
		    </tr>
		    <tr>
		    <th>Week9 Progress</th>
		  <td><a <?php echo 'href="'.$wk9_progress.'"'; ?>> View Report </a></td>
		    </tr>
		    <tr>
		    <th>Week10 Progress</th>
		  <td><a <?php echo 'href="'.$wk10_progress.'"'; ?>> View Report </a></td>
		    </tr>
		    <tr>
		    <th> Final Report</th>
		  <td><a <?php echo 'href="'.$final.'"'; ?>> View Report </a></td>
		    </tr>
		    
		
		</table>    

	


	  