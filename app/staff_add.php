<?php
	include 'includes/session.php';
    if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}
	else{
		$return = 'staff.php?'.urlencode(base64_encode($code));
	}

	if(isset($_POST['form_add_staff'])){			
		$FIRSTNAME=strtoupper($_POST['FIRSTNAME']);
		$MI=strtoupper($_POST['MI']);
		$LASTNAME=strtoupper($_POST['LASTNAME']);
		$EMAIL=$_POST['EMAIL'];
		$PASSWORD=$_POST['PASSWORD'];
		$sql= "INSERT INTO tbl_admin(FIRSTNAME, MI, LASTNAME, EMAIL, PASSWORD,ROLE)VALUES('$FIRSTNAME','$MI','$LASTNAME','$EMAIL','$PASSWORD','STAFF')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'New account have been created.';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	

	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
		
	}
	//header('location: clientAccount.php?q='.$_POST['id']);
	header('location:'.$return);
?>