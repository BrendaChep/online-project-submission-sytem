<?php 

include '../dbcon.php';

$role = $_SESSION['role'];

?>
<div class="w3-container w3-card-2 w3-dark-grey w3-margin w3-center">
	<h6>ANNOUNCEMENTS</h6>
</div>
<?php 

$sql = "SELECT * FROM announcement ORDER BY time DESC";

$result = mysqli_query($dbcon,$sql) or die(mysqli_error());;
// $row = mysqli_fetch_assoc($result);
// $x = 0;
#$num_rows = mysqli_num_rows($result);
while ($row = $result->fetch_assoc()) {
	# code...
       // echo $row['title'];


?>

<div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>

        <span class="w3-right w3-opacity"><?php echo "Posted at ".$row['time'] ;?></span>
        <h4><?php echo $row['title'];?></h4>
        <p><?php echo $row['description']; 
        ?></p>
        
 </div>
 <?php } ?>