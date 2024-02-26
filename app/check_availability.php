<?php 
require_once("includes/session.php");
if(!empty($_POST["email"])) {
	$email= $_POST["email"];
	$result =mysqli_query($conn,"SELECT EMAIL FROM tbl_users WHERE EMAIL='$email'");
	$count=mysqli_num_rows($result);
if($count>0)
{
echo "<label class='text-red'> Email already exists .</label>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<label class='text-green'> Email available for Registration .</label>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
?>
