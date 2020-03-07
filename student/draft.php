  

<?php
     include '../dbcon.php';
      include '../session.php';
     include '../header.php';
    $result = mysqli_query($dbcon, "SELECT * FROM student") or die(mysql_error());
    //$user_row = mysqli_fetch_array($result);

    $grpsql = mysqli_query($dbcon, "SELECT * FROM project ") or die(mysqli_error());
    //;
 
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
                        <th>Time remaining </th>
                        <th>Status </th>
                        <th>Documents </th>
                       
                      </tr>
                    </thead>
                    <?php 

                    while ($group = mysqli_fetch_array($grpsql)) {
     
                    $regNo = $group['regNo'];
                 

                    $repsql = "SELECT * FROM progressreport WHERE projectId = (SELECT projectId FROM project WHERE regNo = '$rows['regNo']')";
                    $reportsql = mysqli_query($dbcon,$repsql) or die(mysqli_error($dbcon));

                    
                        while($report = mysqli_fetch_array($reportsql)) {
                        
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
                            
                            
                    ?>
                    <tr>
                      <td>Week 1 progress</td>
                      <td>
                        <?php 
                            if (!empty($report1file)) {
                            echo '<a  href="'.$wk1_progress.'"> View Report </a>';
                            } else {
                                echo 'No Submission' ;
                            }
                             ?>
                      </td>

                      <td>
                        <?php 
                            if (!empty($sem1_progress)) {
                            echo '<a  href="'.$sem1_progress.'"> View Report </a>';
                            } else {
                                echo 'No Submission' ;
                            }
                        ?>
                            
                      </td>
                      <td>
                        <?php
                         if (!empty($sem1_final)) {
                            echo '<a  href="'.$sem1_final.'"> View Report </a>';
                            } else {
                                echo 'No Submission' ;
                            }
                        ?>
                            
                      </td>
                      <td><?php 
                      if (!empty($sem2_progress)) {
                            echo '<a  href="'.$sem2_progress.'"> View Report </a>';
                            } else {
                                echo 'No Submission' ;
                            }
                            ?>
                        </td>
                      <td><?php if (!empty($sem2_final)) {
                            echo '<a  href="'.$sem2_final.'"> View Report </a>';
                            } else {
                                echo 'No Submission' ;
                            }
                   
                         ?>
                            
                         </td>
                    </tr>
                    <tr>
                      <td>Week 2 progress</td>
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
                            if (!empty($sem1_progress)) {
                            echo '<a  href="'.$sem1_progress.'"> View Report </a>';
                            } else {
                                echo 'No Submission' ;
                            }
                        ?>
                            
                      </td>
                      <td>
                        <?php
                         if (!empty($sem1_final)) {
                            echo '<a  href="'.$sem1_final.'"> View Report </a>';
                            } else {
                                echo 'No Submission' ;
                            }
                        ?>
                            
                      </td>
                      <td><?php 
                      if (!empty($sem2_progress)) {
                            echo '<a  href="'.$sem2_progress.'"> View Report </a>';
                            } else {
                                echo 'No Submission' ;
                            }
                            ?>
                        </td>
                      <td><?php if (!empty($sem2_final)) {
                            echo '<a  href="'.$sem2_final.'"> View Report </a>';
                            } else {
                                echo 'No Submission' ;
                            }
                        
                         ?>
                            
                         </td>
                    </tr>
                   
                      <td>Week 3 progress</td>
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
                            if (!empty($sem1_progress)) {
                            echo '<a  href="'.$sem1_progress.'"> View Report </a>';
                            } else {
                                echo 'No Submission' ;
                            }
                        ?>
                            
                      </td>
                      <td>
                        <?php
                         if (!empty($sem1_final)) {
                            echo '<a  href="'.$sem1_final.'"> View Report </a>';
                            } else {
                                echo 'No Submission' ;
                            }
                        ?>
                            
                      </td>
                      <td><?php 
                      if (!empty($sem2_progress)) {
                            echo '<a  href="'.$sem2_progress.'"> View Report </a>';
                            } else {
                                echo 'No Submission' ;
                            }
                            ?>
                        </td>
                      <td><?php if (!empty($sem2_final)) {
                            echo '<a  href="'.$sem2_final.'"> View Report </a>';
                            } else {
                                echo 'No Submission' ;
                            }
                      
                         ?>
                            
                         </td>
                    </tr>
                    <tr>
                      <td>Week 4 progress</td>
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
                            if (!empty($sem1_progress)) {
                            echo '<a  href="'.$sem1_progress.'"> View Report </a>';
                            } else {
                                echo 'No Submission' ;
                            }
                        ?>
                            
                      </td>
                      <td>
                        <?php
                         if (!empty($sem1_final)) {
                            echo '<a  href="'.$sem1_final.'"> View Report </a>';
                            } else {
                                echo 'No Submission' ;
                            }
                        ?>
                            
                      </td>
                      <td><?php 
                      if (!empty($sem2_progress)) {
                            echo '<a  href="'.$sem2_progress.'"> View Report </a>';
                            } else {
                                echo 'No Submission' ;
                            }
                            ?>
                        </td>
                      <td><?php if (!empty($sem2_final)) {
                            echo '<a  href="'.$sem2_final.'"> View Report </a>';
                            } else {
                                echo 'No Submission' ;
                            }
                      
                         ?>
                            
                         </td>
                    </tr>
                    <tr>
                      <td>Week 5 progress</td>
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
                            if (!empty($sem1_progress)) {
                            echo '<a  href="'.$sem1_progress.'"> View Report </a>';
                            } else {
                                echo 'No Submission' ;
                            }
                        ?>
                            
                      </td>
                      <td>
                        <?php
                         if (!empty($sem1_final)) {
                            echo '<a  href="'.$sem1_final.'"> View Report </a>';
                            } else {
                                echo 'No Submission' ;
                            }
                        ?>
                            
                      </td>
                      <td><?php 
                      if (!empty($sem2_progress)) {
                            echo '<a  href="'.$sem2_progress.'"> View Report </a>';
                            } else {
                                echo 'No Submission' ;
                            }
                            ?>
                        </td>
                      <td><?php if (!empty($sem2_final)) {
                            echo '<a  href="'.$sem2_final.'"> View Report </a>';
                            } else {
                                echo 'No Submission' ;
                            }
                       
                         ?>
                            
                         </td>
                    </tr>
                    
                      <td>Week 6 progress</td>
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
                            if (!empty($sem1_progress)) {
                            echo '<a  href="'.$sem1_progress.'"> View Report </a>';
                            } else {
                                echo 'No Submission' ;
                            }
                        ?>
                            
                      </td>
                      <td>
                        <?php
                         if (!empty($sem1_final)) {
                            echo '<a  href="'.$sem1_final.'"> View Report </a>';
                            } else {
                                echo 'No Submission' ;
                            }
                        ?>
                            
                      </td>
                      <td><?php 
                      if (!empty($sem2_progress)) {
                            echo '<a  href="'.$sem2_progress.'"> View Report </a>';
                            } else {
                                echo 'No Submission' ;
                            }
                            ?>
                        </td>
                      <td><?php if (!empty($sem2_final)) {
                            echo '<a  href="'.$sem2_final.'"> View Report </a>';
                            } else {
                                echo 'No Submission' ;
                            }
                       
                         ?>
                            
                         </td>
                    </tr>
                    <tr>
                      <td>Week 7 progress</td>
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
                            if (!empty($sem1_progress)) {
                            echo '<a  href="'.$sem1_progress.'"> View Report </a>';
                            } else {
                                echo 'No Submission' ;
                            }
                        ?>
                            
                      </td>
                      <td>
                        <?php
                         if (!empty($sem1_final)) {
                            echo '<a  href="'.$sem1_final.'"> View Report </a>';
                            } else {
                                echo 'No Submission' ;
                            }
                        ?>
                            
                      </td>
                      <td><?php 
                      if (!empty($sem2_progress)) {
                            echo '<a  href="'.$sem2_progress.'"> View Report </a>';
                            } else {
                                echo 'No Submission' ;
                            }
                            ?>
                        </td>
                      <td><?php if (!empty($sem2_final)) {
                            echo '<a  href="'.$sem2_final.'"> View Report </a>';
                            } else {
                                echo 'No Submission' ;
                            }
                      
                         ?>
                            
                         </td>
                    </tr>
                    <tr>
                      <td>Week 8 progress</td>
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
                            if (!empty($sem1_progress)) {
                            echo '<a  href="'.$sem1_progress.'"> View Report </a>';
                            } else {
                                echo 'No Submission' ;
                            }
                        ?>
                            
                      </td>
                      <td>
                        <?php
                         if (!empty($sem1_final)) {
                            echo '<a  href="'.$sem1_final.'"> View Report </a>';
                            } else {
                                echo 'No Submission' ;
                            }
                        ?>
                            
                      </td>
                      <td><?php 
                      if (!empty($sem2_progress)) {
                            echo '<a  href="'.$sem2_progress.'"> View Report </a>';
                            } else {
                                echo 'No Submission' ;
                            }
                            ?>
                        </td>
                      <td><?php if (!empty($sem2_final)) {
                            echo '<a  href="'.$sem2_final.'"> View Report </a>';
                            } else {
                                echo 'No Submission' ;
                            }
                       
                         ?>
                            
                         </td>
                    </tr>
                    <tr>
                      <td>Week 9 progress</td>
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
                            if (!empty($sem1_progress)) {
                            echo '<a  href="'.$sem1_progress.'"> View Report </a>';
                            } else {
                                echo 'No Submission' ;
                            }
                        ?>
                            
                      </td>
                      <td>
                        <?php
                         if (!empty($sem1_final)) {
                            echo '<a  href="'.$sem1_final.'"> View Report </a>';
                            } else {
                                echo 'No Submission' ;
                            }
                        ?>
                            
                      </td>
                      <td><?php 
                      if (!empty($sem2_progress)) {
                            echo '<a  href="'.$sem2_progress.'"> View Report </a>';
                            } else {
                                echo 'No Submission' ;
                            }
                            ?>
                        </td>
                      <td><?php if (!empty($sem2_final)) {
                            echo '<a  href="'.$sem2_final.'"> View Report </a>';
                            } else {
                                echo 'No Submission' ;
                            }
                        
                         ?>
                            
                         </td>
                    </tr>
                    <tr>
                      <td>Week 10 progress</td>
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
                            if (!empty($sem1_progress)) {
                            echo '<a  href="'.$sem1_progress.'"> View Report </a>';
                            } else {
                                echo 'No Submission' ;
                            }
                        ?>
                            
                      </td>
                      <td>
                        <?php
                         if (!empty($sem1_final)) {
                            echo '<a  href="'.$sem1_final.'"> View Report </a>';
                            } else {
                                echo 'No Submission' ;
                            }
                        ?>
                            
                      </td>
                      <td><?php 
                      if (!empty($sem2_progress)) {
                            echo '<a  href="'.$sem2_progress.'"> View Report </a>';
                            } else {
                                echo 'No Submission' ;
                            }
                            ?>
                        </td>
                      <td><?php if (!empty($sem2_final)) {
                            echo '<a  href="'.$sem2_final.'"> View Report </a>';
                            } else {
                                echo 'No Submission' ;
                            }
                        
                         ?>
                            
                         </td>
                    </tr>
                    <tr>
                      <td> Final submission</td>
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
                            if (!empty($sem1_progress)) {
                            echo '<a  href="'.$sem1_progress.'"> View Report </a>';
                            } else {
                                echo 'No Submission' ;
                            }
                        ?>
                            
                      </td>
                      <td>
                        <?php
                         if (!empty($sem1_final)) {
                            echo '<a  href="'.$sem1_final.'"> View Report </a>';
                            } else {
                                echo 'No Submission' ;
                            }
                        ?>
                            
                      </td>
                      <td><?php 
                      if (!empty($sem2_progress)) {
                            echo '<a  href="'.$sem2_progress.'"> View Report </a>';
                            } else {
                                echo 'No Submission' ;
                            }
                            ?>
                        </td>
                      <td><?php if (!empty($sem2_final)) {
                            echo '<a  href="'.$sem2_final.'"> View Report </a>';
                            } else {
                                echo 'No Submission' ;
                            }
                        }
                    }
                       
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

<b>
<!-- Footer -->
<?php
  include '../footer.php';
?>







      