<?php
	include 'includes/session.php';

    if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}
	else{
		$return = 'member.php?'.urlencode(base64_encode($code));
	}

	if(isset($_POST['submit'])){
		$ID    			    =$_POST['ID'];
		$RFID    			=strtoupper($_POST['RFID']);
		$FIRSTNAME    		=strtoupper($_POST['FIRSTNAME']);
		$MI     			=strtoupper($_POST['MI']);
		$LASTNAME     		=strtoupper($_POST['LASTNAME']);
		$GENDER   			=strtoupper($_POST['GENDER']);
		$CIVIL_STATUS		=strtoupper($_POST['CIVIL_STATUS']);
		$CONTACT    		=strtoupper($_POST['CONTACT']);
		$DATE_OF_BIRTH		=$_POST['DATE_OF_BIRTH'];
		$AGE				=$_POST['AGE'];
        $ADDRESS  			=$conn-> real_escape_string(strtoupper($_POST['ADDRESS']));
        $DESIGNATION    	=strtoupper($_POST['DESIGNATION']);
		$LICENSE_NO			=strtoupper($_POST['LICENSE_NO']);
		$DLCLASSIFICATION	=strtoupper($_POST['DLCLASSIFICATION']);
		$DLCODE				=strtoupper($_POST['DLCODE']);
		$VPLATE_NO			=strtoupper($_POST['VPLATE_NO']);
		$VMODEL_NO			=strtoupper($_POST['VMODEL_NO']);
		$VMADE				=strtoupper($_POST['VMADE']);
		$VCATEGORY			=strtoupper($_POST['VCATEGORY']);
      
		$sql="UPDATE tbl_member 
		SET RFID='$RFID',
		FIRSTNAME='$FIRSTNAME',
		MI='$MI',
		LASTNAME='$LASTNAME',
		GENDER='$GENDER',
		CIVIL_STATUS='$CIVIL_STATUS',
		CONTACT='$CONTACT',
		DATE_OF_BIRTH	='$DATE_OF_BIRTH',
		AGE	='$AGE',
		ADDRESS	='$ADDRESS',
		DESIGNATION	='$DESIGNATION',
		LICENSE_NO	='$LICENSE_NO',
		DLCLASSIFICATION	='$DLCLASSIFICATION',
		DLCODE	='$DLCODE',
		VPLATE_NO	='$VPLATE_NO',
		VMODEL_NO	='$VMODEL_NO',
		VMADE	='$VMADE',
		VCATEGORY	='$VCATEGORY'
		WHERE ID = '$ID'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Record updated successfully';

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