<?php
    include 'includes/session.php';
    if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}
	else{
		$return = 'news_comments_pending.php?'.urlencode(base64_encode($code));
	}

    if(isset($_POST['form-approved-comments'])){
        $ID=$_POST['id'];
        $sql="UPDATE tbl_comments SET STATUS=1 WHERE ID='$ID'";
        if($conn ->query($sql)){
            $_SESSION['success'] ="Successfully Approved";
        }else{
            $_SESSION['error'] ="No record approved!";
        }
    }else{
        $_SESSION['error'] ="Please select first the record to delete";
    }
    header('location:'.$return);
?>