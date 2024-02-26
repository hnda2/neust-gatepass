<?php
	date_default_timezone_set('Asia/Manila');
	session_start();
	include 'conn.php';
	function generateRandomNumber($length = 50) {
		$number = '1234567890SourceCodePhAndresJario';
		$numberLength = strlen($number);
		$randomNumber = '';
		for ($i = 0; $i < $length; $i++) {
			$randomNumber .= $number[rand(0, $numberLength - 1)];
		}
		return $randomNumber;
	  }
	  $code= date('Ymd').generateRandomNumber();

	if(!isset($_SESSION['admin']) || trim($_SESSION['admin']) == ''){
		header('location: ../index.php');
	}
	$sql = "SELECT * FROM tbl_account WHERE ID = '".$_SESSION['admin']."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();
?>