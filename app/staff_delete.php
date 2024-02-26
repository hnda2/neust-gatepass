<?php
   include 'includes/session.php';
    if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}
	else{
		$return = 'staff.php?'.urlencode(base64_encode($code));
	}

    if(isset($_POST['form-delete-user'])){
        $ID=$_POST['id'];
        $sql="DELETE FROM tbl_admin WHERE ID='$ID'";
        if($conn ->query($sql)){
            $_SESSION['success'] ="Users Record has been successfully deleted";
        }else{
            $_SESSION['error'] ="No record deleted!";
        }

    }else{
        $_SESSION['error'] ="Please select first the record to delete";
    }
    header('location:'.$return);
?>