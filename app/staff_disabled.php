<?php
	
	include 'includes/session.php';

	if(isset($_GET['confpending'])){
		$sql = "UPDATE tbl_account SET ACC_STATUS='0' WHERE ID='".$_GET['confpending']."'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Successfully Updated!';
			
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