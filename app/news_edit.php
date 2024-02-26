<?php
	include 'includes/session.php';
    if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}
	else{
		$return = 'news.php?'.urlencode(base64_encode($code));
	}

	if(isset($_POST['form-edit-news'])){
		$ID 				=$_POST['id'];
		$POST_TITLE			=$_POST['title'];
		$POST_SLUG 			=$_POST['title'];
		$POST_TITLE_SLUG 	=strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $POST_SLUG)));
		$POST_DETAILS		=$conn->real_escape_string($_POST['details']);
		$IS_ACTIVE =$_POST['active'];

		$sql="UPDATE tbl_news
		SET POST_TITLE='$POST_TITLE', POST_TITLE_SLUG='$POST_TITLE_SLUG', POST_DETAILS='$POST_DETAILS', IS_ACTIVE='$IS_ACTIVE' WHERE ID = '$ID'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Updated successfully';
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