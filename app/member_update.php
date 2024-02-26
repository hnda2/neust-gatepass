<?php @include "includes/header.php";
if(isset($_GET['q'])){
  $q =base64_decode(urldecode($_GET['q']));
  $sql = "SELECT * FROM tbl_member tr WHERE tr.ID= '$q'";
	$query = $conn->query($sql);
	if($query->num_rows > 0){
	$row = $query->fetch_assoc();
		$ID               =$row['ID'];
		$RFID    			    =strtoupper($row['RFID']);
		$FIRSTNAME    		=strtoupper($row['FIRSTNAME']);
		$MI     			    =strtoupper($row['MI']);
		$LASTNAME     		=strtoupper($row['LASTNAME']);
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
            <h1>Edit Information</h1>
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
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
               <h3 class="card-title"> 
              <span class="fa fa-user"></span> Update information
              </h3>
			      	<div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form class="form-horizontal" method="POST" action="member_edit.php" enctype="multipart/form-data" autocomplete="off">
          		  <div class="row">
					<input type="hidden" class="form-control" value="<?=$ID;?>" name="ID" required>
					
					<div class="col-sm-2">
						<div class="form-group">
						<label for="firstname" class="control-label">RFID NUMBER</label>
							<input type="text" class="form-control text-uppercase" value="<?=$RFID;?>" name="RFID" placeholder="RFID" required>
						</div>
					</div>
					<div class="col-sm-4">
                	<div class="form-group">
                  	  <label for="address" class="control-label">LICENSE NO</label>
                      <input class="form-control text-uppercase" value="<?=$LICENSE_NO;?>" name="LICENSE_NO" placeholder="LICENSE NO" required>
                  	</div>
                </div>

				<div class="col-sm-4">
						<div class="form-group">
							<label for="address" class="control-label">DL CLASSIFICATION</label>
							<select class="form-control" name="DLCLASSIFICATION" required>
								<option value="<?=$DLCLASSIFICATION;?>" selected><?=$DLCLASSIFICATION;?></option>
								<option>NON-PROFESSIONAL</option>
								<option>PROFESSIONAL</option>
								<option>STUDENT LICENSE</option>
							</select>
							</div>
						</div>

				<div class="col-sm-2">
                	<div class="form-group">
                  	  <label for="address" class="control-label">DL CODE</label>
                      <input class="form-control text-uppercase" value="<?=$DLCODE;?>"name="DLCODE" placeholder="DL CODE" required>
                  	</div>
                </div>

					<div class="col-sm-5">
						<div class="form-group">
						<label for="firstname" class="control-label">FIRST NAME</label>
							<input type="text" class="form-control text-uppercase" value="<?=$FIRSTNAME;?>" name="FIRSTNAME" placeholder="FIRST NAME" required>
						</div>
					</div>
				
						<div class="col-sm-2">
						<div class="form-group">
						<label for="firstname" class="control-label">M.I</label>
							<input type="text" class="form-control text-uppercase" maxlength="1" value="<?=$MI;?>" name="MI" placeholder="M.I">
						</div>
					</div>
						<div class="col-sm-5">
						<div class="form-group">
						<label for="firstname" class="control-label">LAST NAME</label>
							<input type="text" class="form-control text-uppercase" value="<?=$LASTNAME;?>" name="LASTNAME" placeholder="LAST NAME" required>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
						<label for="firstname" class="control-label">GENDER </label>
							<select class="form-control" name="GENDER" required>
							<option value="<?=$GENDER;?>" selected><?=$GENDER;?></option>
							<option>MALE</option>
							<option>FEMALE</option>
							</select>
						</div>
					</div>

							
						<div class="col-sm-4">
						<div class="form-group">
							<label for="firstname" class="control-label">CIVIL STATUS </label>
							<select class="form-control" name="CIVIL_STATUS" required>
								<option value="<?=$CIVIL_STATUS;?>" selected><?=$CIVIL_STATUS;?></option>
								<option>SINGLE</option>
								<option>MARRIED</option>
								<option>DIVORCED</option>
								<option>SEPARETED</option>
								<option>WIDOWED</option>
								<option>NEVER MARRIED</option>
							</select>
							</div>
						</div>

				<div class="col-sm-4">
				<div class="form-group">
					<label for="address" class="control-label">CONTACT</label>
						<input type="text" class="form-control" maxlength="11" value="<?=$CONTACT;?>" name="CONTACT" placeholder="CONTACT" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
					</div>
				</div>

                <div class="col-sm-6">
          		  <div class="form-group">
                  	<label for="firstname" class="control-label">DATE OF BIRTH</label>
                    	<input type="date"  class="form-control" id="txtDOB" value="<?=$DATE_OF_BIRTH;?>" name="DATE_OF_BIRTH" placeholder="DATE OF BIRTH">
                  	</div>
                </div>
                <div class="col-sm-6">
					<div class="form-group">
                    <label for="address" class="control-label">AGE</label>
                      <input type="text" class="form-control" id="age" value="<?=$AGE;?>" name="AGE" placeholder="AGE" required readonly>
                      </div>
                  </div>
				<div class="col-sm-6">
                	<div class="form-group">
                  	<label for="address" class="control-label">ADDRESS</label>
                      <input class="form-control text-uppercase" value="<?=$ADDRESS;?>" name="ADDRESS" placeholder="ADDRESS" required>
                  	</div>
                </div>
				<div class="col-sm-6">
                	<div class="form-group">
                  	  <label for="address" class="control-label">DESIGNATION</label>
                      <input class="form-control text-uppercase" value="<?=$DESIGNATION;?>" name="DESIGNATION" placeholder="DESIGNATION" required>
                  	</div>
                </div>
	
                </div><!----row-->
          	</div>
          	<div class="card-footer text-muted ">
              
          	</div>
            
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
			
			<div class="col-md-12">
            <!-- jquery validation -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><span class="fa fa-car"></span> VEHICLE INFORMATON</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
				<div class="row">
                  <div class="col-sm-6">
                	<div class="form-group">
                  	  <label for="address" class="control-label">VEHICLE PLATE_NO</label>
                      <input class="form-control text-uppercase" value="<?=$VPLATE_NO;?>" name="VPLATE_NO" placeholder="VEHICLE PLATE NO" required>
                  	</div>
                </div>

				<div class="col-sm-6">
                	<div class="form-group">
                  	  <label for="address" class="control-label">VEHICLE MODEL NO</label>
                      <input class="form-control text-uppercase" value="<?=$VMODEL_NO;?>" name="VMODEL_NO" placeholder="VEHICLE MODEL NO" required>
                  	</div>
                </div>
				<div class="col-sm-6">
                	<div class="form-group">
                  	  <label for="address" class="control-label">VEHICLE MADE</label>
                      <input class="form-control text-uppercase" value="<?=$VMADE;?>" name="VMADE" placeholder="VEHICLE MADE" required>
                  	</div>
                </div>

                <div class="col-sm-6">
                	<div class="form-group">
                  	  <label for="address" class="control-label">VEHICLE CATEGORY</label>
					  <select class="form-control select2" name="VCATEGORY" required>
							<option value="<?=$VCATEGORY;?>" selected><?=$VCATEGORY;?></option>
							<option>MOTORCYCLE (SINGLE)</option>
							<option>TRICYCLE</option>
							<option>4 WHEELS</option>
							</select>
                  	</div>
                </div>
				</div>				
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                 <div class="float-right">
				<a href="member.php?&code=<?=urlencode(base64_encode($code));?>" class="btn btn-primary btn-sm"><i class="fa fa-solid fa-arrow-left-from-line"></i> BACK</a>
            	<button type="submit" class="btn bg-navy btn-sm" name="submit"><i class="fa fa-sharp fa-solid fa-floppy-disk-circle-arrow-right"></i> UPDATE</button>
				</div>
                </div>
            </div>
            <!-- /.card -->
            </div>
			</form>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php @include "includes/footer.php";?>
<script>
  $(function (){
    // Summernote
    $('.summernote').summernote();
  })
</script>
<script>
    $(document).ready(function(){
        $("#ConfirmPassword").keyup(function(){
             if ($("#Password").val() != $("#ConfirmPassword").val()) {
                 $("#msg").html("Password do not match").css("color","red");
                 $('#submit').prop('disabled',true);
             }else{
                 $("#msg").html("Password matched").css("color","green");
                 $('#submit').prop('disabled',false);
            }
      });
});
</script> 

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

  })
</script>
<script>
	$(document).ready(function(){
    $("#txtDOB").change(function(){
       var dob = $("#txtDOB").val();
    
       if(dob != null || dob != ""){
          $("#age").val(getAge(dob));
       }
  });
  
  function getAge(birth) {
    ageMS = Date.parse(Date()) - Date.parse(birth);
    age = new Date();
    age.setTime(ageMS);
    ageYear = age.getFullYear() - 1970;

    return ageYear;
   }
});
</script>
</body>
</html>

