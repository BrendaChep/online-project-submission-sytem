<?php
  include '../header.php';
    if (!($_SESSION['id']) ){
    header('location:../index.php');
    exit();

    }

?>
<!-- Page Container -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">

    <!-- Left Column -->
    <div class="w3-col m3">
      <?php include 'stu-nav.php';     ?>
      <br />
    </div>    
    <!-- End Left Column -->
    
    
    <!-- Middle Column -->
    <div class="w3-col m9">
      <div id="main">
              
          <div class="w3-row-padding">
            <div class="w3-col m12">
              <div class="w3-card-2 w3-white">
                <div class="w3-container w3-padding">
                 Submission percentage
                </div>
              </div>
            </div>
          </div>
        <br />
      
       <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card-2 w3-white">  
            <div class="w3-container w3-padding"> 

            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data" >
              <br />

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
                                        $sql_query = mysqli_query($dbcon,"SELECT * FROM progressreport WHERE projectId = '$projectId' ") or die("Error: " . mysqli_error($dbcon));

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
                                                if($now<=$date){
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
                                                
                                                   <a href = "submitreport3.php">
                                                   <button type="button" class="w3-btn-block w3-grey w3-center-align" data-toggle="modal" data-target="#contact-modal">
                                                                                                      
                                                      <i class="fa fa-upload fa-fw w3-margin-right">Submit</i></button>
                                                    <!-- Button to trigger modal -->
                                                        
                                                </a>
                                                <?php }else{?>
                                                    <a href="submit_claim.php">
                                                        <button class="btn btn-sm btn-danger disabled">Time Out </button>
                                                    </a>
                                                <?php }?>
                                            </td>
                                            
            <td>
               <a href="<?php echo $rows['documents'] ?>"><i class="fa fa-download" aria-hidden="true">View</i></a>
                
            </td>
            <td><a><i class="fa fa-comments">Comments</i></a>
                                            </td>

           
            
                                        </tr>
                                    </tbody>
                                    <?php } ?>
          
        </table>
            </form>

            
            
            </div>
          </div>
        </div>
      </div>

      </div>
    </div>
    <!-- End Middle Column -->
  </div> 
  <!-- End Grid -->
</div>  
  
<!-- End Page Container -->


<br>

<!-- Footer -->


<?php include '..\footer.php'; ?>


