<?php 
require_once("includes/conn.php");
if(!empty($_POST["email"])) {
	$email= $_POST["email"];
	$result =mysqli_query($conn,"SELECT * FROM tbl_admin WHERE EMAIL='$email'");
	$count=mysqli_num_rows($result);
	if($count>0)
	{
		echo "<span class='text-red'> Email already exists .</span>";
	    echo "<script>$('#submit').prop('disabled',true);</script>";
	} else{
		echo "<span class='text-green'> Email available for Registration .</span>";
	    echo "<script>$('#submit').prop('disabled',false);</script>";
	}
}
?>
