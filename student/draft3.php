
<?php
  include '../dbcon.php';
  include '../session.php';
  $regNo = $_SESSION['id'];

  
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/contact.js"></script>
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card-2 w3-white">
            <div class="w3-container w3-padding">
             Submission progress
            </div>
          </div>
        </div>
      </div>
      <br />
  
   <div class="w3-row-padding">
    <div class="w3-col m12">
      <div class="w3-card-2 w3-white">  
        <div class="w3-container w3-padding" id="reportsub"> 
          
           
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
          </div>
        </div>
    </div>
  </div>

 


<script>
  function submitForm(){
   $.ajax({
    type: "POST",
    url: "saveContact.php",
    cache:false,
    data: $('form#contactForm').serialize(),
    success: function(response){
      $("#contact").html(response)
      $("#contact-modal").modal('hide');
    },
    error: function(){
      alert("Error");
    }
  });
}
  
 function submitContactForm(){
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    var name = $('#inputName').val();
    var email = $('#inputEmail').val();
    var message = $('#inputMessage').val();
    if(name.trim() == '' ){
        alert('Please enter your name.');
        $('#inputName').focus();
        return false;
    }else if(email.trim() == '' ){
        alert('Please enter your email.');
        $('#inputEmail').focus();
        return false;
    }else if(email.trim() != '' && !reg.test(email)){
        alert('Please enter valid email.');
        $('#inputEmail').focus();
        return false;
    }else if(message.trim() == '' ){
        alert('Please enter your message.');
        $('#inputMessage').focus();
        return false;
    }else{
        $.ajax({
            type:'POST',
            url:'submit_form.php',
            data:'contactFrmSubmit=1&name='+name+'&email='+email+'&message='+message,
            beforeSend: function () {
                $('.submitBtn').attr("disabled","disabled");
                $('.modal-body').css('opacity', '.5');
            },
            success:function(msg){
                if(msg == 'ok'){
                    $('#inputName').val('');
                    $('#inputEmail').val('');
                    $('#inputMessage').val('');
                    $('.statusMsg').html('<span style="color:green;">Thanks for contacting us, we\'ll get back to you soon.</p>');
                }else{
                    $('.statusMsg').html('<span style="color:red;">Some problem occurred, please try again.</span>');
                }
                $('.submitBtn').removeAttr("disabled");
                $('.modal-body').css('opacity', '');
            }
        });
    }
}
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#reportname').attr('src', e.target.result);
                    $('#reportname').addClass("w3-show")
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
         function uploadReport() { 
           if (($insert = true) && ($uploadOk == 1)){
      console.log('Already submitted');
    }
    else{
  xhttp.open("POST", "submitreport.php", true);
    xhttp.send();
  }

  }
</script>

