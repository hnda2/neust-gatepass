<?php
	include 'includes/conn.php';
	
  if(isset($_GET['transaction'])){
    $q =base64_decode(urldecode($_GET['transaction']));
    $sql = "SELECT * FROM tbl_appointment WHERE APPOINTMENT_NUMBER = '$q'";
    $query = $conn->query($sql);
    if($query->num_rows > 0){
      $drow = $query->fetch_assoc();
      $PATIENT_ID    	    =$drow['PATIENT_ID'];
      $SERVICES     		  =$drow['SERVICES'];
      $DATETIME   			  =$drow['DATETIME'];
      $APP_STATUS    		  =$drow['APP_STATUS'];
      $DATE_ACTION    		=$drow['DATE_ACTION'];
      $APPOINTMENT_NUMBER =$drow['APPOINTMENT_NUMBER'];
      $TIMESLOT           =$drow['TIMESLOT'];
    }else{
      $PATIENT_ID    	    ="";
      $SERVICES     		  ="";
      $DATETIME   			  ="";
      $APP_STATUS    		  ="";
      $DATE_ACTION    		="";
      $APPOINTMENT_NUMBER ="";
      $TIMESLOT           ="";
    }
  }

	require_once('../tcpdf/tcpdf.php');  

  // Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {
  //Page header
  public function Header() {
      // get the current page break margin
      $bMargin = $this->getBreakMargin();
      // get current auto-page-break mode
      $auto_page_break = $this->AutoPageBreak;
      // disable auto-page-break
      $this->SetAutoPageBreak(false, 0);
      // set bacground image
      $img_file = K_PATH_IMAGES.'../images/clinic.png';
      $this->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
      // restore auto-page-break status
      $this->SetAutoPageBreak($auto_page_break, $bMargin);
      // set the starting point for the page content
      $this->setPageMark();
  }
  public function Footer() {
    // Position at 15 mm from bottom
    $this->SetY(-15);
    // Set font
    $this->SetFont('helvetica', 'I', 8);
    // Page number
    $this->Cell(0, 10, 'Generated on '.date('l F d, Y').' Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
}
}

    //$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetCreator(PDF_CREATOR);  
    $pdf->SetTitle('RECEIPT: '.$SERVICES.' - '.$PATIENT_ID);  
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $pdf->SetDefaultMonospacedFont('helvetica');  
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
    $pdf->setPrintHeader(FALSE);  
    $pdf->setPrintFooter(TRUE);  
    $pdf->SetAutoPageBreak(TRUE, 10);  
    $pdf->SetFont('helvetica', '', 11);  
    $pdf->AddPage(); 
    $img_file = K_PATH_IMAGES.'../images/clinic.png';
    //$pdf->Image($img_file, 0, 0, 210, 297, '', '', '', true, 300, '', false, false, 0);
    //$pdf->Image($img_file, 50, 140, 100, '', '', '', '', false, 50, '', false); orginal
    $pdf->Image($img_file, 50, 100, 100, '', '', '', '', false, 50, '', false);
    $contents = '';

	$sql = "SELECT * FROM tbl_patients WHERE ID ='$PATIENT_ID'";
	$query = $conn->query($sql);
	while($row = $query->fetch_assoc()){
		$contents .= '
    <table width="100%">
      <thead>
      <tr>
        <td align="left" width="20%">
        <img id="div" src="../images/logo.png" alt="" class="float-left" width="100">
        </td>
          <td align="center" width="60%">
          <span>Republic of the Philippines</span><br>
          <span>NUEVA ECIJA UNIVERSITY OF SCIENCE AND TECHNOLOGY</span><br>
          <span>MUNICIPAL GOVERNMENT OF TALAVERA</span>
		    <span>TALAVERA ACADEMIC EXTENSION CAMPUS</span>
          <br>
          <br>
          <br>
          <h3>ONLINE APPOINTMENT</h3>
          </td>
          <td align="right" width="20%">
          <img id="div" src="../images/logo.png" alt="" class="float-left" width="100">
          </td>
      </tr>
      </thead>
    </table>
    <br>
    <br>
    <br>
    <br>
      <table cellspacing="5" width="100%">
      <tbody>
        <tr>
          <td>Patient ID:</td>
          <td>'.$PATIENT_ID.'</td>
        </tr>
        <tr>
          <td>Name:</td>
          <td>'.$row['LNAME'].',  '.$row['FNAME'].' '.$row['MI'].'</td>
        </tr>
        <tr>
          <td>Appointment Type:</td>
          <td>'.$SERVICES.'</td>
        </tr>
        <tr>
          <td>Time Slot:</td>
          <td>'.$TIMESLOT.'</td>
        </tr>
        <tr>
          <td>Date of Appointment:</td>
          <td>'.date('l F d, Y',strtotime($DATETIME)).'</td>
        </tr>
      </tbody>
    </table>
    <br><br><br><br><br><br>
    <div align="center">
    <h1>APPOINTMENT RECEIPT</h1>
    <br><br><br><br><br>
    <h5>TRANSACTION NUMBER</h5>
    <h1>'.$APPOINTMENT_NUMBER.'</h1>
    </div>

		';
	}
    //$pdf->writeHTML($contents);  
    $pdf->writeHTML($contents, true, false, true, false, '');
    ob_end_clean();
    $pdf->Output('appointment_receipt.pdf', 'I');

?>
