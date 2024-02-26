<?php
$servername='localhost';
$username="root";
$password="";
try
{
    $con=new PDO("mysql:host=$servername;dbname=vgms_db",$username,$password);
    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //echo 'connected';
}
catch(PDOException $e)
{
    echo '<br>'.$e->getMessage();
}
//if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['eventid']) && !empty($_GET['eventid'])){
    ////do whatever here
    //}
 
if(isset($_GET['FROM']) && ($_GET['TO'])){
        
        $output = "";
         
        $output .= '
                    
        <table class="table table-bordered table-striped" border="1">  

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
                    
                    ';
             
                    $sql = "SELECT * FROM tbl_logged ta INNER JOIN tbl_member ts ON ta.RFID=ts.RFID WHERE LOGDATE BETWEEN '".$_GET['FROM']."' AND '".$_GET['TO']."' ORDER BY LOGDATE DESC";
   $stmt = $con->prepare($sql);
   $stmt->execute();
   $data = $stmt->fetchAll(PDO::FETCH_ASSOC);   
        
foreach($data as $key=>$value){
 
    $output .= '    <tr>  
                    <td align="left">'.($key+1).'</td>
					<td align="left">'.$value['RFID'].'</td> 
                    <td align="left">'.$value['LASTNAME'].', '.$value['FIRSTNAME'].' '.$value['MI'].'</td>    
                    <td align="left">'.$value['GENDER'].'</td> 
                    <td align="left">'.$value['LOGIN'].'</td>  
                    <td align="left">'.$value['LOGOUT'].'</td>   
                    <td align="left">'.$value['DURATION'].'</td>
                    <td align="left">'.$value['LOGDATE'].'</td>  
                    </tr>';  
        }
          
        $output .= '</table>';
        
        $filename = "Date_Range_".$_GET['FROM']." to ".$_GET['TO'].".xls";         
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$filename\"");  
        echo $output;
      }   
?>