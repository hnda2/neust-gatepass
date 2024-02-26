<?php @include "includes/header.php";
if(isset($_GET['q'])){
  $q =base64_decode(urldecode($_GET['q']));
  $sql = "SELECT * FROM tbl_member tr WHERE tr.ID= '$q'";
	$query = $conn->query($sql);
	if($query->num_rows > 0){
	$row = $query->fetch_assoc();
    $ID               =$row['ID'];
	  $MNAME         		=$row['LASTNAME'].', '.$row['FIRSTNAME'].' '.$row['MI'];
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
    
	}else{
	  header("location:member.php");
	}

}


?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- .navbar -->
  <?php @include "includes/navbar.php";?>
  <!-- /.navbar -->
  <?php @include "includes/sidebar.php";?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Records Information</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Information</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

     <!-- Main content -->
	 <section class="content">
      <div class="container-fluid">
      <?php
				if(isset($_SESSION['error'])){
				  echo "
					<div id='alert' class='alert alert-danger' id='alert'>
					  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					  <h4><i class='icon fa fa-warning'></i> ERROR!</h4>
					  ".$_SESSION['error']."
					</div>
				  ";
				  unset($_SESSION['error']);
				}
				if(isset($_SESSION['success'])){
				  echo "
					<div id='alert' class='alert alert-success' id='alert'>
					  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					  <h4><i class='icon fa fa-check'></i> SUCCESS!</h4>
					  ".$_SESSION['success']."
					</div>
				  ";
				  unset($_SESSION['success']);
				}
			  ?>
        <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-teal card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                 <?php 
                  if($PROFILE==""){
                  ?>
                    <img width="150" height="150" class="img-circle" src="../images/profile.jpg" alt="User profile picture">
                  <?php }else{ ?>
                    <img src="data:image/jpg;charset=utf8;base64,<?=base64_encode($PROFILE); ?>" width="150" height="150" class="img-circle">
                  <?php }?>
                  
                </div>
                <p class="text-muted text-center"><a href="#baptised" data-toggle="modal" class="editphoto" data-id="<?=$ID;?>"><span class="fa fa-camera"></span></a></p>
                <h3 class="profile-username text-center"><?=$MNAME;?></h3>
                
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b><i class="fa fa-sharp fa-solid fa-hashtag mr-1"></i>NO.</b> <a class="float-right"><?=$GETPASSNO;?></a>
                  </li>
                  <li class="list-group-item">
                    <b><i class="fa fa-brands fa-creative-commons-by mr-1"></i>STATUS </b> <a class="float-right">
                    <?php 
                  if ($ACC_STATUS==0){
                    echo '
                    <i class="fas fa-solid fa-circle text-danger"></i> DEACTIVE
                    ';
                  }elseif($ACC_STATUS==1){
                    echo '<i class="fas fa-solid fa-circle text-success"></i> ACTIVE';
                  }
                  ?>
                    </a>
                  </li>
  
                </ul>
  
              </div>
              <!-- /.card-body -->
            </div>
        </div>

          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header">
              <h3 class="card-title"><i class="fa fa-info-circle"></i></h3>
              <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
             
              <table class="table table-bordered text-nowrap text-uppercase">
                 
                    <th colspan="4">PERSONAL INFORMATION</th>
                    
                  
                  <tr>
                    <td width="">NAME</td>
                    <td width=""><?=$MNAME;?></td>

                  </tr>
                  <tr>
                    <td>GENDER</td>
                    <td><?=$GENDER;?></td>
                  </tr>       
                  <tr>
                    <td>CONTACT</td>
                    <td><?=$CONTACT;?></td>
                  </tr>
				          <tr>
                    <td>CIVIL STATUS</td>
                    <td><?=$CIVIL_STATUS;?></td>
                  </tr>
				          <tr>
                    <td> USER TYPE</td>
                    <td><?=$ROLE;?></td>
                  </tr>
                  <tr>
                    <td> CONTACT</td>
                    <td><?=$CONTACT;?></td>
                  </tr>
                  <tr>
                    <td>DATE OF BIRTH</td>
                    <td><?=$DATE_OF_BIRTH;?></td>
                  </tr>
                  <tr>
                    <td>AGE</td>
                    <td><?=$AGE;?></td>
                  </tr>
                  <tr>
                    <td>DESIGNATION</td>
                    <td colspan="3"><?=$DESIGNATION;?></td>
                  </tr>
                  <tr>
                    <td> DATE ADDED</td>
                    <td colspan="3"><?=$DATE_CREATED;?></td>
                  </tr>
				  

          <th colspan="4"> LICENSE information</th>
                    
                  
                  <tr>
                    <td width="">LICENSE NO</td>
                    <td width=""><?=$LICENSE_NO;?></td>
                  </tr>
                  <tr>
                    <td width="">DL CLASSIFICATION</td>
                    <td width=""><?=$DLCLASSIFICATION;?></td>
                  </tr>       
                  <tr>
                    <td width="">DL CODE</td>
                    <td width=""><?=$DLCODE;?></td>
                  </tr>

          <th colspan="4"> vehicle information</th>
                    <tr>
                      <td width="">PLATE NO</td>
                      <td width=""><?=$VPLATE_NO;?></td>
                    </tr>
                    <tr>
                      <td> MODEL NO</td>
                      <td><?=$VMODEL_NO;?></td>
                    </tr>
                    <tr>
                      <td> MADE</td>
                      <td><?=$VMADE;?></td>
                    </tr>
                    <tr>
                      <td>CATEGORY</td>
                      <td><?=$VCATEGORY;?></td>
                    </tr>
                       
				  <tr>
				  <th colspan="4">ADDRESS</th>
				  </tr>
				  <tr>
					<td colspan="4">
					<div class="embed-responsive embed-responsive-16by9">
					  <iframe class="embed-responsive-item" src="https://maps.google.com/maps?q=<?=$ADDRESS;?>
					&t=&z=13&ie=UTF8&iwloc=&output=embed" allowfullscreen></iframe>
					</div>
					</td>
					
				  </tr>
                </table>
              </div><!-- /.card-body -->
              <div class="card-footer text-muted">
              <div class="float-right">
				   <a href="member.php?&code=<?=urlencode(base64_encode($code));?>" class="btn bg-olive btn-sm"><i class="fa-solid fa fa-arrow-left"></i> BACK</a>
          </div>
          	</div>
            </div>
            <!-- /.card -->
            
          </div>
		  
		  
		  
		  
		  
		  
		  
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
	
  </div>
  <!-- /.content-wrapper -->
  <div class="modal fade" id="baptised">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
			<h4 class="modal-title"> <span class="fa-solid fa fa-user"></span> Change Photo</h4>
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="member_profile_update.php" enctype="multipart/form-data">
				    <div class="row">
				    <div class="col-md-12">
                <div class="form-group">
                <input type="hidden" class="form-control" value="<?=$ID;?>" name="ID">
                    <label for="photo" class="control-label">Photo:</label>
                    <input class="form-control" name="image" type="file" id="formFileBaptised" onchange="previeww()"><br>
                   <img id="frameBaptised" src="" class="img-fluid " style="border-radius:10px">
                </div>
                </div>
               
               </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-close"></i> CLOSE</button>
            	<button type="submit" class="btn bg-primary btn-sm" name="upload"><i class="fa fa-check-square-o"></i> SUBMIT</button>
            	</form>
          	</div>
        </div>
    </div>
</div>
 <?php @include "includes/footer.php";?>
<script>
      function previeww() {
        frameBaptised.src = URL.createObjectURL(event.target.files[0]);
      }
      function clearImagee() {
          document.getElementById('formFileBaptised').value = null;
          frameBaptised.src = "";
      }
  </script>

</body>
</html>

