<?php
	
	include 'includes/session.php';

	if(isset($_GET['confirmed'])){
		$sql = "UPDATE tbl_account SET ACC_STATUS='1' WHERE ID='".$_GET['confirmed']."'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Successfully Confirmed!';
			
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Opps!! somthing went wrong!!';
	}
header('location: staff.php?'.urlencode(base64_encode($code)));
?>