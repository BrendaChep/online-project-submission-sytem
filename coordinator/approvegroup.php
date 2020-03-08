 

<div class="w3-container">
  <div class="w3-card-2">

    <?php

    include '../dbcon.php';    
    // $sql = mysqli_query($dbcon, "SELECT * FROM `student` ") or die(mysqli_error($dbcon));
    // $group_rows = mysqli_fetch_array($sql); 
     // $groupsugId = $group_rows['regNo'];

    $groupsugId = $_GET['groupsug'];

    $sqlgrp = mysqli_query($dbcon, "SELECT * FROM `approvedmembers` WHERE sugId='$groupsugId'") or die(mysqli_error($dbcon));
    $group_row = mysqli_fetch_array($sqlgrp);      
    $approval = $group_row['approval'];

    if ($approval =="waiting")
    {
      $approvesql = mysqli_query($dbcon, "UPDATE 'approvedmembers' SET approval='approved' WHERE sugId = '$groupsugId'") or die(mysqli_error($dbcon));
      if($approvesql) { 
	            //echo "Group approved";
       echo "<script type=\"text/javascript\">	alert(\"Student has been approved\"); </script>";
     } else { 
	              //echo "Something went wrong the group was not approved";  
       echo "<script type=\"text/javascript\">	alert(\"Something went wrong the student has  not been approved\"); </script>";                
     }       

   }		
   ?>
 </div>
</div>

<?php

?>

