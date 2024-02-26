<?php
	include 'includes/session.php';
    if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}
	else{
		$return = 'news.php?'.urlencode(base64_encode($code));
	}

	if(isset($_POST['submit'])){			
		$POST_TITLE			=$_POST['POST_TITLE'];
		$POST_SLUG 			=$_POST['POST_TITLE'];
		$POST_TITLE_SLUG 	=strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $POST_SLUG)));
		$POST_DETAILS		=$conn->real_escape_string($_POST['POST_DETAILS']);
		$IS_ACTIVE =1;

		if(!empty($_FILES["NEWS_IMAGE"]["name"])) { 
			// Get file info 
			$fileName = basename($_FILES["NEWS_IMAGE"]["name"]); 
			$fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
			 
			// Allow certain file formats 
			$allowTypes = array('jpg','png','jpeg','gif'); 
			if(in_array($fileType, $allowTypes)){ 
				$image = $_FILES['NEWS_IMAGE']['tmp_name']; 
				$POST_IMAGE = addslashes(file_get_contents($image)); 
			 
				$insert = $conn->query("INSERT INTO tbl_news(POST_BY_ID,POST_TITLE,POST_TITLE_SLUG,POST_DETAILS,POST_IMAGE,POSTED_BY,IS_ACTIVE)
				VALUES('".$user['ID']."','$POST_TITLE','$POST_TITLE_SLUG','$POST_DETAILS','$POST_IMAGE','".$user['LASTNAME'].', '.$user['FIRSTNAME']."','$IS_ACTIVE')");
				if($insert){ 
					$_SESSION['success'] = "File uploaded successfully."; 
				}else{ 
					$_SESSION['error'] = "File upload failed, please try again."; 
				}  
			}else{ 
				$_SESSION['error'] = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
			} 
		}else{ 
			$_SESSION['error'] = 'Please select an image file to upload.'; 
		} 
	

	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
		
	}
	//header('location: clientAccount.php?q='.$_POST['id']);
	header('location:'.$return);
?>