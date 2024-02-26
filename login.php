<?php
	///session_start();
	include 'conn.php';

	if(isset($_POST['login'])){
		$EMAIL = $_POST['EMAIL'];
		$PASSWORD = $_POST['PASSWORD'];
		 //$sql="SELECT * FROM (SELECT te.ID AS UID, te.EMAIL, te.PASSWORD, te.ACC_STATUS, te.ROLE FROM tbl_member te 
		 //UNION SELECT tu.ID AS UID, tu.EMAIL, tu.PASSWORD, tu.ACC_STATUS, tu.ROLE FROM tbl_admin tu) t WHERE EMAIL = '$EMAIL' AND ACC_STATUS=1";
		 function generateRandomNumber($length = 50) {
			$number = '1234567890';
			$numberLength = strlen($number);
			$randomNumber = '';
			for ($i = 0; $i < $length; $i++) {
				$randomNumber .= $number[rand(0, $numberLength - 1)];
			}
			return $randomNumber;
		}
		$code= date('Ymd').generateRandomNumber();
		
		
		 $sql ="SELECT tu.ID AS UID, tu.EMAIL, tu.PASSWORD, tu.ACC_STATUS, tu.ROLE FROM tbl_account tu WHERE EMAIL = '$EMAIL' AND ACC_STATUS=1";
		 $query = $conn->query($sql);
	
		if($query->num_rows > 0){
			$user = $query->fetch_assoc();
			if($PASSWORD==$user['PASSWORD']){
				$_SESSION['admin'] = $user['UID'];	

				// Record login time and date
				date_default_timezone_set('Asia/Manila');
                $loginTime = date( 'Y-m-d h:i:s A', time () );
                
                // Save login information to tbl_userlog
                $insertLogSql = "INSERT INTO tbl_userlog (LOGTIME, STATUS, UID, USERIP, USERNAME) VALUES ('$loginTime', 'LOGIN', '" . $user['UID'] . "', '$userIP', '" . $user['EMAIL'] . "')";	
                $conn->query($insertLogSql);
			
				if($user['ROLE']=="ADMIN"){
					header('location:app/home.php?'.urlencode(base64_encode($code)));
				}elseif($user['ROLE']=="STAFF"){
					header('location:app/scan_getpass.php	?'.urlencode(base64_encode($code)));
				}elseif($user['ROLE']=="MEMBER"){
					header('location:member/home.php?'.urlencode(base64_encode($code)));
				}else{
					$_SESSION['error'] = 'Incorrect username or password';
					header('location: signin.php?'.urlencode(base64_encode($code)));
				}
			}else{
				$_SESSION['error'] = 'Incorrect username or password';
				header('location: signin.php?'.urlencode(base64_encode($code)));
			}
		}else{
			$_SESSION['error'] = 'Your Account is currently in INACTIVE Mode!. Please contact the Administrator.';
				header('location: signin.php?'.urlencode(base64_encode($code)));
		}
		
	}
	else{
		$_SESSION['error'] = 'Input admin credentials first';
		header('location: signin.php?'.urlencode(base64_encode($code)));
	}
?>