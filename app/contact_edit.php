<?php
	include 'includes/session.php';
	if(isset($_POST['submit'])){
		$ID 				= $_POST['id'];
		$PHONE_NETWORK     	=strtoupper($_POST['PHONE_NETWORK']);
		$PHONE_NUMBER     	=$_POST['PHONE_NUMBER'];
		$sql="UPDATE tbl_contact
		SET PHONE_NETWORK='$PHONE_NETWORK', PHONE_NUMBER='$PHONE_NUMBER' WHERE CID = '$ID'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Contact updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Select recird to edit first';
	}

	header('location:contact.php?'.urlencode(base64_encode($code)));
?>