<?php
	include 'includes/session.php';

    if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}
	else{
		$return = 'member.php';
	}

	if(isset($_POST['submit_password'])){
		$ID 				= $_POST['ID'];
		$EMAIL    			=$_POST['EMAIL'];
		$PASSWORD     		=$_POST['PASSWORD'];

		$sql="UPDATE tbl_member 
		SET EMAIL='$EMAIL',
		PASSWORD='$PASSWORD'
		WHERE ID = '$ID'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Password successfully updated';

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