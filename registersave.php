<?php
	include 'conn.php';
	if(isset($_POST['register'])){			
		$FIRSTNAME    		=strtoupper($_POST['FIRSTNAME']);
		$MI     			=strtoupper($_POST['MI']);
		$LASTNAME     		=strtoupper($_POST['LASTNAME']);
		$GENDER   			=strtoupper($_POST['GENDER']);
		$CONTACT    		=$_POST['CONTACT'];
		$EMAIL    			=$_POST['EMAIL'];
        $ADDRESS  			=$conn-> real_escape_string(strtoupper($_POST['ADDRESS']));
        $PASSWORD    		=$_POST['PASSWORD'];
        $ROLE    			="MEMBER";
		$BARANGAY 			=$_POST['BARANGAY'];
		$DATE_OF_BIRTH		=$_POST['DATE_OF_BIRTH'];
		$AGE				=$_POST['AGE'];
		
		
		$sql = "SELECT * FROM tbl_member WHERE EMAIL = '$EMAIL' OR PASSWORD = '$PASSWORD'";
		$query = $conn->query($sql);
		if($query->num_rows > 0){
			$_SESSION['error'] = 'Email Address or Email already taken.';
		}else{
			$sql= "INSERT INTO tbl_member(FIRSTNAME,MI,LASTNAME, GENDER,CONTACT, EMAIL, ADDRESS, PASSWORD, ROLE,BARANGAY,DATE_OF_BIRTH,AGE,DATE_CREATED)
            VALUES ('$FIRSTNAME','$MI','$LASTNAME','$GENDER','$CONTACT','$EMAIL','$ADDRESS','$PASSWORD','$ROLE','$BARANGAY','$DATE_OF_BIRTH','$AGE',NOW())";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Your account is waiting for oure administrator approval. Please check back later.';
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
		}

	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
		
	}
	header('location:register.php');
?>