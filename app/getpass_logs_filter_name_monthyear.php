<?php
include 'includes/header.php';
	if(isset($_POST["STUDMONTHYEAR"])){  
	 $RFID = $_POST['RFID'];
	 $MONTH = $_POST['MONTH'];
	 $YEAR = $_POST['YEAR'];
	 
	 // DATE_FORMAT(registration_datetime,’%a, %Y %M %e %H:%i:%s’)
	$sql = "SELECT * FROM tbl_logged ta INNER JOIN tbl_member ts ON ta.RFID=ts.RFID WHERE DATE_FORMAT(ta.LOGDATE, '%m')='$MONTH' AND DATE_FORMAT(ta.LOGDATE,'%Y')='$YEAR' AND ta.RFID='$RFID' ORDER BY LOGDATE";
	$query = $conn->query($sql);
	$monthName = date("F", mktime(0, 0, 0, $MONTH, 10));
	$range= $monthName.' '.$YEAR;  
}
?>

<style>

table, td, th {
  border: 1px solid #000;
  font-size:10pt;
  /*text-align:right;*/
  font-family: Arial, Helvetica, sans-serif;
  padding:5px;
}
th{
	background:#ccc;
	color:#000;
	
}
table {
  width: 100%;
  border-collapse: collapse;
}

@media print {
  #printPageButton {
    display: none;
	
  }
}
/* @media print {
  table:nth-child(1) {
    display: block;
  }
} */
span, .text-uppercase{
	font-weight: normal;
	text-align:center;
}
#thead{
	margin: auto;
}
</style>


<body >
<div class="container">
	<table id="thead" style="border:none">
		<thead>
			<tr>
			<td style="border:none"> 
			<img src="../images/logo.png" alt="" class="float-left" width="100">
			<img src="../images/talavera.png" alt="" class="float-right" width="100">
			<center>
			<span>Republic of the Philippines</span><br>
          <span>NUEVA ECIJA UNIVERSITY OF SCIENCE AND TECHNOLOGY</span><br>
          <span>MUNICIPAL GOVERNMENT OF TALAVERA</span>
		  <span>TALAVERA ACADEMIC EXTENSION CAMPUS</span>
          <br>
          <h3><span class="text-uppercase" style="font-size:10pt;"><strong>GATEPASS LOGS REPORT</strong></span></h3>
			</center>
			
			</td>
			</tr>
		</thead>
	</table>
	<br>
	<table style="font-size:9pt;border:0">
			<?php
			$sqlss ="SELECT * FROM tbl_member WHERE RFID='".$RFID."'";
			$queryss =$conn->query($sqlss);
			if($queryss->num_rows>0){
					$s = $queryss->fetch_assoc();
					$ss =$s['LASTNAME'].',  '.$s['FIRSTNAME'].' '.$s['MI'];
			}else{
					$ss ="NAN";
			}
			?>
		 <tr>
			<td style="border:0;" width="70">NAME</td>
			<td style="border:0" colspan="" align="left"> <div style="border-bottom:1px solid #000;width:200px"><?=$ss;?></div></td>
			<td style="border:0" align="right" >GATEPASS NUMBER</td>
			<td style="border:0" colspan="" align="right" width="200"><div style="border-bottom:1px solid #000;"><?=$s['GETPASSNO'];?></div></td>
		 </tr>
	</table>
	
	<table class="table-hover">
		<tr>
		<th colspan="5" style="color:#000;background:#fff;border:1px solid #fff;border-bottom:1px solid #000;">
			<span class="text-uppercase">MONTH OF <?=$range;?></span>
		</th>
		<th colspan="4" style="background:#fff;border:1px solid #fff;border-bottom:1px solid #000;color:#000;text-align:right"> 
		<a href="report.php" class="btn btn-primary btn-sm" id="printPageButton"><span class="fas fa fa-home"></span> HOME</a> 
		<a href="#" id="printPageButton" class="btn btn-danger btn-sm" onclick="window.print();"><span class="fas fa fa-print"></span> PRINT</a> 
		</th>
	</tr>
	<tr> 
	<th style="background:#ccc;">#</th>
	<th style="background:#ccc;">RFID</th>
	<th style="background:#ccc;">NAME</th>
	<th style="background:#ccc;">GENDER</th>
	<th style="background:#ccc;">LOGIN</th>
	<th style="background:#ccc;">LOGOUT</th>
	<th style="background:#ccc;">DURATION</th>
	<th style="background:#ccc;">LOG DATE</th>
	</tr>
	<tbody>
	<?php
		$cnt=1;
		if($query->num_rows > 0){
		while($row = $query->fetch_assoc()){
		?>
		<tr>
		<td><?=$cnt; ?></td>
		<td><?=$row['RFID']; ?></td>
		<td><?=$row['LASTNAME'].',  '.$row['FIRSTNAME'].' '.$row['MI']; ?></td>
		<td><?=$row['GENDER']; ?></td>
		<td><?=$row['LOGIN'];?></td>
		<td><?=$row['LOGOUT'];?></td>
		<td><?=$row['DURATION'];?></td>
		<td><?=$row['LOGDATE'];?></td>
	</tr>
		<?php $cnt++;} }else { ?>
		
		</tbody>
		<tfoot>
			<tr>
				<td colspan="10" align="center" class="bg-danger"> NO RECORD FOUND</td>
			</tr>
		</tfoot>
		<?php } ?>
	
</table>

<br><br>
<table> 
	<tr>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td align="center" width="200" style="border:1px solid #fff">_____________________________</td>
	</tr>
	<tr>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td align="center" width="200" style="border:1px solid #fff"><strong> </strong></td>
	</tr>
	<tr>
	    <td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td style="border:1px solid #fff"></td>
		<td align="center" width="200" style="border:1px solid #fff">Records Officer</td>
	</tr>
	
</table>
</div>
<script>
        function printDiv() {
            var divContents = document.getElementById("GFG").innerHTML;
            var a = window.open('', '', 'height=1024, width=1024');
            a.document.write('<html>');
            a.document.write('<body >');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
    </script>
	</body>