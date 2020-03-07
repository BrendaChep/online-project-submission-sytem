<?php
	include '../dbcon.php';

	$grpsql = mysqli_query($dbcon, "SELECT * FROM grp ") or die(mysqli_error());
    //$group = mysqli_fetch_array($grpsql);

    
	
?>
<table class="w3-table w3-hoverable w3-responsive w3-bordered">
	<thead>
	  <tr class="w3-light-grey">
	    <th>Group No.</th>
	    <th>Review Report </th>
	    <th>Week 1 Progress</th>
	    <th>Week 2 progress</th>
	    <th>Week 3 Progress</th>
	    <th>Week 4 Progress</th>
	    <th>Week 5 Progress</th>
	    <th>Week 6 Progress</th>
	    <th>Final Report</th>
	   
	  </tr>
	</thead>
	<?php 
		while($group = mysqli_fetch_array($grpsql)) {
    $regNo = $group['regNo'];

	$repsql = "SELECT * FROM progressreport WHERE projectId = (SELECT projectId FROM project WHERE regNo = '$regNo')";
	$reportsql = mysqli_query($dbcon,$repsql) or die(mysqli_error($dbcon));

	$report = mysqli_fetch_array($reportsql);

	$reviewfile = $report['review'];
	
	# $sem1_progress = $report['sem1_progress'];
	// $sem1_final = $report['sem1_final'];
	// $sem2_progress = $report['sem2_progress'];
	// $sem2_final = $report['sem2_final'];
	 
	$wk1_progress = $report['wk1_progress'];
	$wk2_progress = $report['wk2_progress'];
	$wk3_progress = $report['wk3_progress'];
	$wk4_progress = $report['wk4_progress'];
	$wk5_progress = $report['wk5_progress'];
	$wk6_progress = $report['wk6_progress'];
	$final = $report['final'];
	
	?>
	<tr>
	  <td><?php echo $groupNo ?></td>
	  <td><a <?php echo 'href="'.$reviewfile.'"'; ?>> View Report </a></td>
	  <td><a <?php echo 'href="'.$wk1_progress.'"'; ?>> View Report </a></td>
	  <td><a <?php echo 'href="'.$wk2_progress.'"'; ?>> View Report </a></td>
	  <td><a <?php echo 'href="'.$wk3_progress.'"'; ?>> View Report </a></td>
	  <td><a <?php echo 'href="'.$wk4_progress.'"'; ?>> View Report </a></td>
	  <td><a <?php echo 'href="'.$wk5_progress.'"'; ?>> View Report </a></td>
	  <td><a <?php echo 'href="'.$wk6_progress.'"'; ?>> View Report </a></td>
	  <td><a <?php echo 'href="'.$final.'"'; ?>> View Report </a></td>
	<?php } //} ?>
</table>   