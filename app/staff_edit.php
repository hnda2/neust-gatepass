<?php
	include 'includes/session.php';
    if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}
	else{
		$return = 'staff.php?'.urlencode(base64_encode($code));
	}

	if(isset($_POST['form_edit_staff'])){
		$ID 		= $_POST['id'];
		$FIRSTNAME	=strtoupper($_POST['FIRSTNAME']);
		$MI			=strtoupper($_POST['MI']);
		$LASTNAME	=strtoupper($_POST['LASTNAME']);
		$EMAIL		=$_POST['EMAIL'];
		$PASSWORD	=$_POST['PASSWORD'];

		$sql="UPDATE tbl_account
		SET FIRSTNAME='$FIRSTNAME', MI='$MI', LASTNAME='$LASTNAME', EMAIL='$EMAIL', PASSWORD='$PASSWORD' WHERE ID = '$ID'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'User updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Select recird to edit first';
	}

	header('location:'.$return);
?>