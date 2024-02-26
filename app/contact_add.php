<?php
	include 'includes/session.php';

	if(isset($_POST['submit'])){			
		$PHONE_NETWORK=strtoupper($_POST['PHONE_NETWORK']);
		$PHONE_NUMBER=$_POST['PHONE_NUMBER'];
		$sql= "INSERT INTO tbl_contact(PHONE_NETWORK,PHONE_NUMBER)VALUES('$PHONE_NETWORK','$PHONE_NUMBER')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'New contact have been created.';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	

	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
		
	}
	//header('location: clientAccount.php?q='.$_POST['id']);
	header('location:contact.php?'.urlencode(base64_encode($code)));
?>