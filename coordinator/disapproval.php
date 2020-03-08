<div class="w3-container">
  <div class="w3-card-2">

    <?php

    include '../dbcon.php';    
    $concept = $_GET['concept'];

    $studentconcept = mysqli_query($dbcon, "SELECT * FROM proposalnote ") or die(mysqli_error());
    $concept_note=mysqli_fetch_array($studentconcept);
    $approval = $concept_note['approval'];

    if ($approval =="waiting")
    {
      $disapprovesql = mysqli_query($dbcon, "UPDATE proposalnote SET approval='disapproved' WHERE proposalid = '$concept'") or die(mysqli_error($dbcon));
      if($disapprovesql) { 
        echo "<script type='text/javascript'>alert('Proposal has been disapproved!');</script>";

      } else { 
        echo "Something went wrong the proposal was not disapproved";                  
      } 
      echo "<script>document.location='viewconcepts.php'</script>";
    }
    elseif ($approval =="approved")  
    { 
     exit();
   }
   elseif ($approval =="disapproved") 
   { 
    exit();
  }
  ?>
</div>
</div>
