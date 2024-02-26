
<?php
	include 'includes/conn.php';
  if(isset($_GET['q'])){
    $q =base64_decode(urldecode($_GET['q']));
    $sql = "SELECT * FROM tbl_member WHERE ID = '$q'";
    $query = $conn->query($sql);
    if($query->num_rows > 0){
        $row = $query->fetch_assoc();
        $RFID             =$row['RFID'];
        $FULLNAME		  =$row['LASTNAME'].' '.$row['FIRSTNAME'].' '.$row['MI'];
        $FIRSTNAME		  =$row['FIRSTNAME'];
        $LASTNAME		  =$row['LASTNAME'];
        //$MI				  =$row['MI'];
        $GENDER   			  =$row['GENDER'];
        $CIVIL_STATUS    	=$row['CIVIL_STATUS'];
        $CONTACT  			  =$row['CONTACT'];
        $DATE_OF_BIRTH    =$row['DATE_OF_BIRTH'];
        $AGE    			    =$row['AGE'];
        $ADDRESS    			=$row['ADDRESS'];
        $DESIGNATION   		=$row['DESIGNATION'];
        $LICENSE_NO       =$row['LICENSE_NO'];
        $DLCLASSIFICATION =$row['DLCLASSIFICATION'];
        $DLCODE	          =$row['DLCODE'];
        $VPLATE_NO        =$row['VPLATE_NO'];
        $VMODEL_NO        =$row['VMODEL_NO'];
        $VMADE            =$row['VMADE'];
        $VCATEGORY        =$row['VCATEGORY'];
        $ACC_STATUS       =$row['ACC_STATUS'];
        $ROLE             =$row['ROLE'];
        $PROFILE          =$row['PROFILE'];
        $DATE_CREATED     =$row['DATE_CREATED'];
        $GETPASSNO        =$row['GETPASSNO'];
        $img_base64_encoded =base64_encode($PROFILE);
        $img = base64_decode(preg_replace('#^data:image/[^;]+;base64,#', '', $img_base64_encoded));
        if($img==""){
            $defualt ='<img src="../images/profile.jpg">';
        }
      
      
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
      $img_file = K_PATH_IMAGES.'../images/logo.jpg';
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
    $pdf->SetTitle('RECEIPT: '.$LASTNAME.' - '.$FIRSTNAME);  
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
    
    $pdf->Image("@".$img, 160, 70, 35, 35);//$pdf->Image("@".$img, 68, 100, 46, 46);

    $contents = '
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
          <h3><span class="text-uppercase" style="font-size:20pt">GATEPASS RECEIPT</span></h3>
          </td>
          <td align="right" width="20%">
          <img id="div" src="../images/Talavera.png" alt="" class="float-left" width="100">
          </td>
      </tr>
      </thead>
    </table>
    
    <br>
    <br>
    <br>
    <br>
      <table cellspacing="5" width="100%" border="0">
        <tr style="">
          <th colspan="2">INFORMATION</th>
        </tr>
      <tbody>
        <tr>
          <td>NAME</td>
          <td>'.$FULLNAME.'</td>
        </tr>
        <tr>
          <td>GENDER</td>
          <td>'.$GENDER.'</td>
        </tr>
        <tr>
          <td>ADDRESS</td>
          <td>'.$ADDRESS.'</td>
        </tr>
        <tr>
          <td>LICENSE NO</td>
          <td>'.$LICENSE_NO.'</td>
        </tr>
        <tr>
          <td>CLASIFICATION</td>
          <td>'.$DLCLASSIFICATION.'</td>
        </tr>
        <tr>
          <td>DATE CREATED:</td>
          <td>'.date('l F d, Y',strtotime($DATE_CREATED)).'</td>
        </tr>
      </tbody>
    </table>
    <br><br><br><br><br><br>
    <div align="center">
    <h1>GATEPASS NUMBER</h1>
    <h1>'.$GETPASSNO.'</h1>
    </div>

<table> 
	<tr>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
	</tr>
	<tr>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
	</tr>
	<tr>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
	</tr>
	<tr>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
	</tr>
	<tr>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
	</tr>
	<tr>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
	</tr>
	<tr>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
	</tr>
	<tr>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
	</tr>
	<tr>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
	</tr>
	<tr>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
	</tr>
	<tr>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td align="center" width="100" style="border:1px solid #fff">
			<div class="text-uppercase" style="border-bottom:1px solid #000;width:100%;"></div>
		</td>
	</tr>
	<tr>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td align="center" width="100" style="border:1px solid #fff">Officer of the Day</td>
	</tr>
	
</table>
    ';
    //$pdf->writeHTML($contents);  
    $pdf->writeHTML($contents,true, false, true, false, '');
    ob_end_clean();
    $pdf->Output('_receipt.pdf', 'I');

?>
