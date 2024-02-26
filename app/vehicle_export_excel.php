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
                          <th scope="col" width="150" align="left" style="background:#ccc;">PLATE NO</th>
                          <th scope="col" width="150" align="left" style="background:#ccc;">MODEL NO</th>
                          <th scope="col" width="150" align="left" style="background:#ccc;">MADE</th>
                          <th scope="col" width="150" align="left" style="background:#ccc;">CATEGORY</th>
                          <th scope="col" width="150" align="left" style="background:#ccc;">OWNER</th>
                    </tr>
                    
                    ';
             
   $sql = "SELECT * FROM tbl_member ORDER BY LASTNAME ASC";
   $stmt = $con->prepare($sql);
   $stmt->execute();
   $data = $stmt->fetchAll(PDO::FETCH_ASSOC);   
        
foreach($data as $key=>$value){
 
    $output .= '<tr>  
                         <td align="left">'.($key+1).'</td>
                         <td align="left">'.$value['VPLATE_NO'].'</td>    
                         <td align="left">'.$value['VMODEL_NO'].'</td>    
                         <td align="left">'.$value['VMADE'].'</td>    
                         <td align="left">'.$value['VCATEGORY'].'</td>    
                         <td align="left">'.$value['LASTNAME'].', '.$value['FIRSTNAME'].' '.$value['MI'].'</td> 
                    </tr>';  
        }
          
        $output .= '</table>';
        
        $filename = "table_data_export_".date('Y-m-d') . ".xls";         
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$filename\"");  
        echo $output;
      }   
?>