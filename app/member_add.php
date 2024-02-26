<?php
	include 'includes/session.php';
    if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}
	else{
		$return = 'member.php?'.urlencode(base64_encode($code));
	}
	function generateRandomNumberr($length = 10) {
		$number = '1234567890';
		$numberLength = strlen($number);
		$randomNumberr = '';
		for ($i = 0; $i < $length; $i++) {
			$randomNumberr .= $number[rand(0, $numberLength - 1)];
		}
		return $randomNumberr;
	}
	
	if(isset($_POST['submit'])){			
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
		$ROLE    			="MEMBER";
		$GETPASSNO= date('Y-m-d').generateRandomNumberr();
		$ACC_STATUS=1;
		$sql = "SELECT * FROM tbl_member WHERE RFID = '$RFID'";
		$query = $conn->query($sql);
		if($query->num_rows > 0){
			$_SESSION['error'] = 'RFID number already taken.';
		}else{
			$sql= "INSERT INTO tbl_member(RFID,FIRSTNAME,MI,LASTNAME, GENDER,CIVIL_STATUS,CONTACT,DATE_OF_BIRTH,AGE,ADDRESS,DESIGNATION,LICENSE_NO,DLCLASSIFICATION,DLCODE,VPLATE_NO,VMODEL_NO,VMADE,VCATEGORY,ROLE,GETPASSNO,ACC_STATUS)
            VALUES ('$RFID','$FIRSTNAME','$MI','$LASTNAME','$GENDER','$CIVIL_STATUS','$CONTACT','$DATE_OF_BIRTH','$AGE','$ADDRESS','$DESIGNATION','$LICENSE_NO','$DLCLASSIFICATION','$DLCODE','$VPLATE_NO','$VMODEL_NO','$VMADE','$VCATEGORY','$ROLE','$GETPASSNO','$ACC_STATUS')";
			if($conn->query($sql)){
				$_SESSION['success'] = 'New record has been added successfully!';
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
		}
	

	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
		
	}
	header('location:'.$return);
?>