

<?php

include '../header.php';
$result = mysqli_query($dbcon, "SELECT * FROM student") or die(mysql_error());
	//$user_row = mysqli_fetch_array($result);

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


				<div class="w3-row-padding">

					<div class="w3-center"> 
						<h3>VIEW STUDENT PROJECTS</h3>
					</div>
					<table class="w3-table w3-hoverable" border="0">
						<thead>
							<tr class="w3-dark-grey">

								<th>Members</th>
								<th>Title</th>
								<th>Supervisor</th>

							</tr>
						</thead>
						<tr>


							<?php 
							$grpsql = mysqli_query($dbcon, "SELECT * FROM stud ") or die(mysqli_error());

							while ($group = mysqli_fetch_array($grpsql)) {  	
								$groupNo = $group['appId'];
								?>

								<!-- <td> <?php #echo $groupNo; ?> </td> -->
								<td>
									<?php

									$membersql = mysqli_query($dbcon, "SELECT regNo, fName, mName, lName FROM student WHERE regNo IN (SELECT regNo FROM stud where appId = '$groupNo')") or die(mysqli_error()); 


			// $members = mysqli_fetch_assoc($membersql);
			// $memberNo = $members['regNo'];

			// $member = mysqli_query($dbcon, "SELECT * FROM student WHERE regNo = '$memberNo'") or die(mysqli_error());
									$member_row = mysqli_fetch_array($membersql);
									$memId= $member_row['regNo'];
									$memberName = $member_row['lName'].", ".$member_row['mName']." ".$member_row['fName'];
									echo $memberName. "<br />";






									$supId =  "SELECT * FROM `supervisor` WHERE empId = (SELECT empId FROM stud WHERE appId = '$groupNo')";
									$supIdsql = mysqli_query($dbcon,$supId) or die(mysqli_error());
									$sup_row = mysqli_fetch_array($supIdsql);

									$supervisor = $sup_row['fName']." ".$sup_row['lName'];

									$projectsql = mysqli_query($dbcon, "SELECT projectTitle FROM project ") or die(mysqli_error());
									$project_row = mysqli_fetch_array($projectsql);
									$title = $project_row['projectTitle'];

									?>
								</td>
								<td><?php echo $title ; ?></td>
								<td><?php echo $supervisor; ?></td>
							</tr>
							<?php 

						} 

						?>
					</table>

					<br />

				</div>

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




