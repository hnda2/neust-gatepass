<?php 
require_once("includes/session.php");
require_once "vendor/autoload.php";
if(!empty($_POST["RFID"])) {
	$RFID= $_POST["RFID"];
	$TIME =date('h:i A');	
		$sql = "SELECT * FROM tbl_member WHERE RFID='$RFID' AND ACC_STATUS=1";
		$query = $conn->query($sql);
		if($query->num_rows > 0){
			$row = $query->fetch_assoc();
			
			$RESTNAME = $row['LASTNAME'].',  '.$row['FIRSTNAME'].' '.$row['MI'];
			$PROFILE = $row['PROFILE'];
			$GENDER   			  =strtoupper($row['GENDER']);
			$CIVIL_STATUS		  =strtoupper($row['CIVIL_STATUS']);
			$CONTACT    		  =strtoupper($row['CONTACT']);
			$DATE_OF_BIRTH		=$row['DATE_OF_BIRTH'];
			$AGE				      =$row['AGE'];
			$ADDRESS  			  =$conn-> real_escape_string(strtoupper($row['ADDRESS']));
			$DESIGNATION    	=strtoupper($row['DESIGNATION']);
			$LICENSE_NO			  =strtoupper($row['LICENSE_NO']);
			$DLCLASSIFICATION	=strtoupper($row['DLCLASSIFICATION']);
			$DLCODE				    =strtoupper($row['DLCODE']);
			$VPLATE_NO			  =strtoupper($row['VPLATE_NO']);
			$VMODEL_NO			  =strtoupper($row['VMODEL_NO']);
			$VMADE				    =strtoupper($row['VMADE']);
			$VCATEGORY			  =strtoupper($row['VCATEGORY']);

			  if($PROFILE==""){
					$PROF='<img width="250" height="250" class="img-thumbnail img-fluid" src="../images/profile.jpg" alt="User profile picture">';
			   }else{
					$PROF='<img src="data:image/jpg;charset=utf8;base64,'.base64_encode($PROFILE).'" width="250" height="250" class="img-thumbnail img-fluid">';
			   }
				$serial=$RFID;
				$Bar = new Picqer\Barcode\BarcodeGeneratorHTML();
				$code = $Bar->getBarcode($serial, $Bar::TYPE_CODE_128);
				if(isset($code)){ $code;}
			
				$sql = "SELECT * FROM tbl_logged WHERE RFID='".$RFID."' AND LOGDATE='".date('Y-m-d')."' AND STATUS='IN'";
				$query = $conn->query($sql);
				if($query->num_rows > 0){
					$row = $query->fetch_assoc();
						$time3 = $row['LOGIN'];
						$time4 = $row['LOGOUT'];
						 $start_date = new DateTime($time3);
						$since_start = $start_date->diff(new DateTime($time4));
						//echo $since_start->days.' days total<br>';
						//echo $since_start->y.' years<br>';
						//echo $since_start->m.' months<br>';
						//echo $since_start->d.' days<br>';
						
						$DURATION= $since_start->h.':'.$since_start->i.':'.$since_start->s;
						//echo $since_start->h.' hours<br>';
						//echo $since_start->i.' minutes<br>';
						//echo $since_start->s.' seconds<br>';


						  // Check if the user has stayed logged in for at least 1 minute
						  $start_date = new DateTime($time3);
						  $time_difference = time() - $start_date->getTimestamp();
						  
					// Check if the duration is at least 1 minute before allowing time-out record
					if ($time_difference >= 60) {
						$sql="UPDATE tbl_logged SET LOGOUT='$TIME', DURATION='$DURATION', STATUS='OUT' WHERE RFID='".$RFID."' AND LOGDATE='".date('Y-m-d')."' AND STATUS='IN'";
		
						if ($conn->query($sql)) {
							$_SESSION['success'] = '
							<div id="alert" class="alert bg-teal">
							  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							  <h4><i class="icon fa fa-check"></i> GATEPASS EXIT RECORDED SUCCESSFULLY</h4>
							</div>
							<div class="list-group-item">
								<div class="row">
									<div class="col-auto">
										'.$PROF.'
										
									</div>
									<div class="col px-4">
										<div>
											<div class="float-right">DATE RECORDED: '.date('Y-m-d H:i:s').'</div>
											<h5>GATEPASS INFORMATION</h5>
											 <table class="table">
												<thead>
												</thead>
												<tbody>
												<tr>
													<th>NAME</th>
													<th>'.$RESTNAME.'</th>
												</tr>
												<tr>
													<td>ADDRESS</td>
													<td>'.$ADDRESS.'</td>
												</tr>
												<tr>
													<td>CONTACT</td>
													<td>'.$CONTACT.'</td>
												</tr>
												<tr>
													<td>CIVIL STATUS</td>
													<td>'.$CIVIL_STATUS.'</td>
												</tr>
												<tr>
													<td>DESIGNATION</td>
													<td>'.$DESIGNATION.'</td>
												</tr>
												</tbody>
											 </table>
										</div>
									</div>
								</div>
							</div>
						</div>';
						}
					}  else {
						// Set an error message if the duration is less than 1 minute
						$_SESSION['error'] = '
						<div id="alert" class="alert bg-warning">
						  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						  <h4><i class="icon fa fa-warning"></i> Minimum duration of 1 minute required before time-out record.</h4>
						</div>
						';
					}	
				}else{
					 // Check if the user has already recorded 10 entries today.
					$countSql = "SELECT COUNT(*) as entryCount FROM tbl_logged WHERE DATE(LOGDATE)=DATE(NOW()) AND STATUS = 'IN'";
					$result = $conn->query($countSql);
					$row = $result->fetch_assoc();

					if ($row['entryCount'] < 10) {
					$sql="INSERT INTO tbl_logged (RFID,LOGIN,LOGDATE,STATUS)VALUES('$RFID','$TIME','".date('Y-m-d')."','IN')";
					if($conn->query($sql)){
					$_SESSION['success'] ='
						<div id="alert" class="alert bg-teal">
						  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						  <h4><i class="icon fa fa-check"></i>GATEPASS ENTRY RECORDED SUCCESSFULLY </h4>
						</div>
							<div class="list-group">
							<div class="list-group-item">
								<div class="row">
									<div class="col px-4">
										<div>
											<div class="float-right">RFID NUMBER'.$code.'</div>
											<h5>LICENSE NO: '.$LICENSE_NO.'</h5>
											<p class="mb-0">CLASSIFICATION: '.$DLCLASSIFICATION.'</p>
										
										</div>
									</div>
								</div>
							</div>
							<div class="list-group-item">
								<div class="row">
									<div class="col-auto">
										'.$PROF.'
										
									</div>
									<div class="col px-4">
										<div>
											<div class="float-right">DATE RECORDED: '.date('Y-m-d H:i:s').'</div>
											<h5>GATEPASS INFORMATION</h5>
											 <table class="table">
												<thead>
												</thead>
												<tbody>
												<tr>
													<th>NAME</th>
													<th>'.$RESTNAME.'</th>
												</tr>
												<tr>
													<td>ADDRESS</td>
													<td>'.$ADDRESS.'</td>
												</tr>
												<tr>
													<td>CONTACT</td>
													<td>'.$CONTACT.'</td>
												</tr>
												<tr>
													<td>CIVIL STATUS</td>
													<td>'.$CIVIL_STATUS.'</td>
												</tr>
												<tr>
													<td>DESIGNATION</td>
													<td>'.$DESIGNATION.'</td>
												</tr>
												</tbody>
											 </table>
										</div>
									</div>
								</div>
							</div>
						</div>';
					
				}else{
					$_SESSION['error'] = $conn->error;
				}
			} else {
				// If the user has already recorded 10 entries, set an error message.
				$_SESSION['error'] = '
				<div id="alert" class="alert bg-maroon">
						  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						  <h4><i class="icon fa fa-warning"></i>Maximum limit of 10 entries reached for today.</h4>
						</div>
						';		
			}
			}
			
		}else{
			$_SESSION['error'] = '
				<div id="alert" class="alert bg-maroon">
				  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				  <h4><i class="icon fa fa-check"></i>GATEPASS NUMBER NOT FOUND IN DATABASE!</h4>
				</div>
			';
		}
}
header('location: scan_getpass.php?&code='.urlencode(base64_encode($code)));
?>
