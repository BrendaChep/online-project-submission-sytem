<?php
include '../header.php';
?>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <?php
      include 'coord-nav.php';
      ?>
      <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m9">

      <div id="main">
        <div class="w3-row-padding"> 
          <div class="w3-card-2 "> 
            <div class="w3-container w3-padding">
              <div class="w3-col m12">
                <h3 class="w3-center">APPROVE STUDENTS</h3>

              </div>
            </div>
          </div>
            <!-- <div class="w3-col m12">
              <h3 class="w3-center">APPROVE STUDENTS</h3>
            </div> -->

            <div class=" "> 
             <div class="w3-container w3-padding">
               <p class="w3-small w3-right-align">Note : approved students will have to be assigned supervisors under the <button  class="w3-btn w3-blue w3-left-align"><i class="fa fa-users fa-fw "></i> Assign Supervisors</button> button</p>    
               <div class="w3-center">
                 <?php 
                 $sqlgrp = mysqli_query($dbcon, "SELECT * FROM `approvedmembers` WHERE approval='waiting'") or die(mysqli_error($dbcon));
            //$group_row = mysqli_fetch_array($sqlgrp);
                 $num_row = mysqli_num_rows($sqlgrp);

                 if ($num_row < 0) { 
                  echo "There are student suggestions";

                }
                else { ?>
                 <table class="w3-table-all">
                  <thead>
                    <tr class="w3-light-grey">
                      <th>Student</th>

                      <th>Proposed Title</th>
                      <th>Approve</th>
                    </tr>
                  </thead>
                  <?php 
                  while($group_row = mysqli_fetch_array($sqlgrp)) {
                    $sugId = $group_row['sugId'];
                    ?>
                    <tr>
                      <td>
                        <?php 
                        $member1 = $group_row['regNo'];
                        $result1 = mysqli_query($dbcon, "SELECT * FROM student WHERE regNo = '$member1'") or die(mysqli_error());
                        $member_row1 = mysqli_fetch_array($result1);
                        echo $member1."<br> ";
                        echo $member_row1['lName'].", ".$member_row1['fName']." ".$member_row1['mName'];

                        ?>

                      </td>
                      <td> <?php 
                      $sqlgrps = mysqli_query($dbcon, "SELECT * FROM `proposalnote` WHERE approval='waiting'") or die(mysqli_error($dbcon));
                      $group_row = mysqli_fetch_array($sqlgrps);
                      $sug = $group_row['proposedtitle'];
                      echo $sug;?>
                    </td>
                    <td> 
                      <form action=""   method="POST" >
                        <button class="w3-padding w3-btn w3-green w3-left-align" type="submit" name="approve" onclick="approveGroup()"><i class="fa fa-check fa-fw"></i></button>
                        <button class="w3-padding w3-btn w3-red w3-left-align" name="disapprove" onclick="disapproveGroup()"><i class="fa fa-remove fa-fw"></i></button>
                      </form>
                    </td>
                  </tr>
                <?php } //End While ?>
              </table>
             <?php } //End Else
             ?>
           </div>      
         </div>
       </div>
     </div>
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
<script type="text/javascript">

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("main").innerHTML = this.responseText;
   }
 };
 function approveGroup()  {
  xhttp.open("GET", "approvegroup.php?groupsug=<?php echo $sugId; ?>", true);
  xhttp.send();
}
function disapproveGroup()  {
  xhttp.open("GET", " disapprovegroup.php?groupsug='<?php echo $sugId; ?>'" , true);
  xhttp.send();
}

</script>
</body>
</html> 





