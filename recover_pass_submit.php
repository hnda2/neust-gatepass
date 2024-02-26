<?php
	include 'conn.php';

	if(isset($_POST['btnrecover'])){
		$userid = $_POST['id'];
		$newpassword = $_POST['NEWPASSWORD'];
		
		$sql = "UPDATE tbl_member SET PASSWORD = '$newpassword' WHERE ID = '$userid'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Password successfully changed!';
			header('location:success.php');
		}
		else{
			$_SESSION['error'] = $conn->error;
			header('location:recover-password.php');
		}

	}
	else{
		$_SESSION['error'] = 'error!';
		header('location:recover-password.php');
	}
?>