

<?php
	
	 include '../header.php';
	include '../dbcon.php';
	//;
     $regNo = $_SESSION['id'];
 
	?>


<!-- Page Container -->
<div class="w3-container " style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row-padding">
    <!-- Left Column -->
    <div class="w3-col m3 ">
     <?php
      include 'stu-nav.php';
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
					      <th>Progress Reports</th>
                        <th> Due date </th>
                        <th>Status </th>
                        <th>Time Remaining </th>
                        
                        <th>Upload documents</th>
                        <th>Download </th>
                        <th>Comments</th>
					   
					  </tr>
					</thead>
					<?php 

                                    $result = mysqli_query($dbcon,"SELECT * FROM student WHERE regNo='$regNo'") or die("Error: " . mysqli_error($dbcon));
                                    $st_info = mysqli_fetch_array($result);
                                    $counter = 0;
                                    $query = mysqli_query($dbcon,"SELECT * FROM progress ") or die("Error: " . mysqli_error($dbcon));
                                     $projectsql = mysqli_query($dbcon, "SELECT projectId FROM project WHERE regNo = '$regNo'"); 
                                     $projectArray = mysqli_fetch_array($projectsql);
                                        $projectId = $projectArray['projectId'];
                                    while ($rows = mysqli_fetch_array($query)) {
                                        $counter++;
                                        $sql_query = mysqli_query($dbcon,"SELECT documents FROM progress WHERE projectId = '$projectId' ") or die("Error: " . mysqli_error($dbcon));

                                        $sql_result = mysqli_fetch_array($sql_query);
                                    
					?>
					<tbody>
					<tr>
						
					  <td><?php echo $rows['progressreport'] ?></td>
                       <td><?php echo $rows['dueDate'] ?></td>

					 <td> <?php
                                                if ($sql_result > 0) {
                                                    echo "<p class='label label-success'> Submitted</p>";
                                                } else {
                                                    echo "<p class=\"label label-danger\">Not Submitted</p>";
                                                }

                                                ?>
                                            </td>
					  <td>
					  	<?php $rows['dueDate'];

                                                $date_expire = $rows['dueDate'];
                                                $date = new DateTime($date_expire);
                                                $now = new DateTime();
                                                if($now<$date){
                                                echo "<p class=\"bg-primary\">" . $date->diff($now)->format("%d days Left") . "</p>";
                                                }else{
                                                    echo "Project is overdue";
                                                }
                                                ?>
					  </td>
                       <td>

                                                <?php
                                                if($now<=$date){
                                                ?>
                                                <a href="submitreport2.php">
                                                    <button class="btn btn-sm btn-success">Submit</button>
                                                </a>
                                                <?php }else{?>
                                                    <a href="submit_claim.php">
                                                        <button class="btn btn-sm btn-danger disabled">Time Out </button>
                                                    </a>
                                                <?php }?>
                                            </td>
                                            
					  <td>
					  	 <a href="<?php echo $rows['documents'] ?>"><i
                                                            class="fa fa-link">Download Problem</i></a>
					  		
					  </td>
					  <td><i class="far fa-comment"></i>
                                            </td>

					 
						
                                        </tr>
                                    </tbody>
                                    <?php } ?>
					
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
 


