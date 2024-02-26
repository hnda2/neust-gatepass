<?php
	include 'includes/session.php';

	if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}
	else{
		$return = 'home.php?'.urlencode(base64_encode($code));
	}

	if(isset($_POST['save'])){
		$curr_password = $_POST['curr_password'];
		$username = $_POST['USERNAME'];
		$password = $_POST['PASSWORD'];
		$firstname = $_POST['FIRSTNAME'];
		$mi = $_POST['MI'];
		$lastname = $_POST['LASTNAME'];

		if($curr_password== $user['PASSWORD']){
			if($password == $user['PASSWORD']){
				$password = $user['PASSWORD'];
			}
			else{
				$password = $password;
			}

			$sql = "UPDATE tbl_admin SET EMAIL = '$username', PASSWORD = '$password', FIRSTNAME = '$firstname', LASTNAME = '$lastname', MI = '$mi' WHERE ID = '".$user['ID']."'";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Admin profile updated successfully';
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
			
		}
		else{
			$_SESSION['error'] = 'Incorrect password';
		}
	}
	else{
		$_SESSION['error'] = 'Fill up required details first';
	}

	header('location:'.$return);

?>