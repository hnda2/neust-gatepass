<?php
	
	include 'includes/session.php';

	if(isset($_GET['resetpass'])){

        $letters = '012345678911223344556677889900';
        $numbers = '!@#$%*&abcdefghijklmnpqrstuwxyzABCDEFGHJKLMNPQRSTUWXYZ23456789';
        foreach (range('A', 'Z') as $char) {
            $letters .= $char;
        }
        for($i = 0; $i < 10; $i++){
            $numbers .= $i;
        }
        $randomPass= substr(str_shuffle($letters), 0, 5).substr(str_shuffle($numbers), 0, 5);

		$sql = "UPDATE tbl_account SET PASSWORD='$randomPass' WHERE ID='".$_GET['resetpass']."'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Successfully reset!';
			
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

