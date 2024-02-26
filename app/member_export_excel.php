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
 
if(isset($_GET['export'])){
        
        $output = "";
         
        $output .= '
                    
                    <table class="table table-bordered table-striped" border="1">  
                    <tr>  
                          <th scope="col" style="background:#ccc;">ID</th>
                          <th scope="col" width="150" align="left" style="background:#ccc;">RFID</th>
                          <th scope="col" width="150" align="left" style="background:#ccc;">GETPASS NO</th>
                          <th scope="col" width="200" align="left" style="background:#ccc;">LAST NAME</th>
                          <th scope="col" width="200" align="left" style="background:#ccc;">FIRST NAME</th>
                          <th scope="col" width="50"  align="left" style="background:#ccc;">M.I</th>
                          <th scope="col" width="100"  align="left" style="background:#ccc;">GENDER</th>
                          <th scope="col" width="150" align="left" style="background:#ccc;">CIVIL_STATUS</th>
                          <th scope="col" width="150" align="left" style="background:#ccc;">CONTACT</th>
                          <th scope="col" width="150" align="left" style="background:#ccc;">DATE_OF_BIRTH</th>
                          <th scope="col" width="150" align="left" style="background:#ccc;">AGE</th>
                          <th scope="col" width="350" align="left" style="background:#ccc;">ADDRESS</th>
                          <th scope="col" width="200" align="left" style="background:#ccc;">DESIGNATION</th>
                          <th scope="col" width="150" align="left" style="background:#ccc;">LICENSE NO</th>
                          <th scope="col" width="200" align="left" style="background:#ccc;">DL CLASSIFICATION</th>
                          <th scope="col" width="150" align="left" style="background:#ccc;">DL CODE</th>
                          <th scope="col" width="150" align="left" style="background:#ccc;">VEHICLE PLATE NO</th>
                          <th scope="col" width="150" align="left" style="background:#ccc;">VEHICLE MODEL NO</th>
                          <th scope="col" width="150" align="left" style="background:#ccc;">VEHICLE MADE</th>
                          <th scope="col" width="150" align="left" style="background:#ccc;">VEHICLE CATEGORY</th>
                          <th scope="col" width="150" align="left" style="background:#ccc;">DATE CREATED</th>
                    </tr>
                    
                    ';
             
   $sql = "SELECT * FROM tbl_member ORDER BY LASTNAME ASC";
   $stmt = $con->prepare($sql);
   $stmt->execute();
   $data = $stmt->fetchAll(PDO::FETCH_ASSOC);   
        
foreach($data as $key=>$value){
 
    $output .= '<tr>  
                         <td align="left">'.($key+1).'</td>
                         <td align="left">'.$value['RFID'].'</td>    
                         <td align="left">'.$value['GETPASSNO'].'</td>    
                         <td align="left">'.$value['LASTNAME'].'</td> 
                         <td align="left">'.$value['FIRSTNAME'].'</td>  
                         <td align="left">'.$value['MI'].'</td>   
                         <td align="left">'.$value['GENDER'].'</td>
                         <td align="left">'.$value['CIVIL_STATUS'].'</td>  
                         <td align="left">'.$value['CONTACT'].'</td>  
                         <td align="left">'.$value['DATE_OF_BIRTH'].'</td>    
                         <td align="left">'.$value['AGE'].'</td>    
                         <td align="left">'.$value['ADDRESS'].'</td>    
                         <td align="left">'.$value['DESIGNATION'].'</td>    
                         <td align="left">'.$value['LICENSE_NO'].'</td>    
                         <td align="left">'.$value['DLCLASSIFICATION'].'</td>    
                         <td align="left">'.$value['DLCODE'].'</td>    
                         <td align="left">'.$value['VPLATE_NO'].'</td>    
                         <td align="left">'.$value['VMODEL_NO'].'</td>    
                         <td align="left">'.$value['VMADE'].'</td>    
                         <td align="left">'.$value['VCATEGORY'].'</td>    
                         <td align="left">'.$value['DATE_CREATED'].'</td>    
                    </tr>';  
        }
          
        $output .= '</table>';
        
        $filename = "table_data_export_".date('Y-m-d') . ".xls";         
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$filename\"");  
        echo $output;
      }   
?>