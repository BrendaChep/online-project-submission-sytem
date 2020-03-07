

<?php
	
	 include '../header.php';
	$result = mysqli_query($dbcon, "SELECT * FROM student") or die(mysql_error());
	//$user_row = mysqli_fetch_array($result);

	$grpsql = mysqli_query($dbcon, "SELECT * FROM grp ") or die(mysqli_error());
	//;
 
	?>


<!-- Page Container -->
<div class="w3-container " style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row-padding">
    <!-- Left Column -->
    <div class="w3-col m3 ">
    <?php
      include 'coord-nav.php';
    ?>
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m9">
      
      <div id="main">


      <div class="w3-row-padding w3-container">
       
			<div class="w3-card-2"> 
				<table class="w3-table  w3-hoverable" border="1">
					<thead>
					  <tr class="w3-dark-grey">
					    <th>Group No.</th>
					    <th>Report review </th>
					     
					    <th>Week 1 progress</th>
					    <th>Week 2 progress </th>
					     <th>Week 3 progress </th>
					     <th>Week 4 progress </th>
					     <th>Week 5 progress </th>
					     <th>Week 6 progress </th>

					     
					    
					   
					  </tr>
					</thead>
					<?php 

					while ($group = mysqli_fetch_array($grpsql)) {
	 
				 	$groupNo = $group['grpNo'];
				 

					$repsql = "SELECT * FROM progressreport WHERE projectId = (SELECT projectId FROM project WHERE grpNo = '$groupNo')";
					$reportsql = mysqli_query($dbcon,$repsql) or die(mysqli_error($dbcon));

					
						while($report = mysqli_fetch_array($reportsql)) {
						
							$report1file = $report['review'];
							$wk1_progress = $report['wk1_progress'];
							$wk2_progress = $report['wk2_progress'];
							$wk3_progress = $report['wk3_progress'];
							$wk4_progress = $report['wk4_progress'];
							$wk5_progress = $report['wk5_progress'];
							$wk6_progress = $report['wk6_progress'];
							
					?>
					<tr>
					  <td><?php echo $groupNo; ?></td>
					  <td>
					  	<?php 
					  		if (!empty($report1file)) {
							echo '<a  href="'.$report1file.'"> View Report </a>';
							} else {
								echo 'No Submission' ;
							}
							 ?>
					  </td>

					  <td>
					  	<?php 
					  		if (!empty($wk1_progress)) {
							echo '<a  href="'.$wk1_progress.'"> View Report </a>';
							} else {
								echo 'No Submission' ;
							}
					  	?>
					  		
					  </td>
					  <td>
					  	<?php 
					  		if (!empty($wk2_progress)) {
							echo '<a  href="'.$wk2_progress.'"> View Report </a>';
							} else {
								echo 'No Submission' ;
							}
					  	?>
					  		
					  </td>
					  <td>
					  		<?php 
					  		if (!empty($wk3_progress)) {
							echo '<a  href="'.$wk3_progress.'"> View Report </a>';
							} else {
								echo 'No Submission' ;
							}
					  	?>
						</td>
					  <td>
					  		<?php 
					  		if (!empty($wk4_progress)) {
							echo '<a  href="'.$wk4_progress.'"> View Report </a>';
							} else {
								echo 'No Submission' ;
							}
					  	
						//End while for grpous
						 ?>
						 	
						 </td>
						 <td>
						 		<?php 
					  		if (!empty($wk5_progress)) {
							echo '<a  href="'.$wk5_progress.'"> View Report </a>';
							} else {
								echo 'No Submission' ;
							}
					  	?>

						 </td>
						 <td>
						 		<?php 
					  		if (!empty($wk6_progress)) {
							echo '<a  href="'.$wk6_progress.'"> View Report </a>';
							} else {
								echo 'No Submission' ;
							}
							 } //End while for Reports
						} //End while for grpous
					  	?>
						 </td>
					</tr>
				</table>
	      
	   		</div>   
			 
	      <br />
	   	</div>

      </div> <!-- End Middle Main -->
    <!-- End Middle Column -->
    </div>
    
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>

<!-- Footer -->
<?php
  include '../footer.php';
?>




