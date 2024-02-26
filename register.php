<?php include "header.php";?>
<body class="hold-transition sidebar-mini">
      <?php include "top_navbar.php";?>
	  <section class="content">
			<div class="container col-md-6">
			<div class="row">
			<div class="mt-3">
			<?php
				if(isset($_SESSION['error'])){
				  echo "
					<div class='alert alert-danger alert-dismissible' id='alert'>
					  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					  <h4><i class='icon fa fa-warning'></i> Error!</h4>
					  ".$_SESSION['error']."
					</div>
				  ";
				  unset($_SESSION['error']);
				}
				if(isset($_SESSION['success'])){
				  echo "
					<div class='alert alert-success alert-dismissible' id='alert'>
					  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					  <h4><i class='icon fa fa-check'></i> Waiting for Approval!</h4>
					  ".$_SESSION['success']."
					</div>
				  ";
				  unset($_SESSION['success']);
				}
			  ?>
			  <div class="card card-outline card-primary">
				<div class="card-body">
					<div class="register-logo">
					<?php 
						if($SYS_LOGO==""){
						?>
							<img src="images/no-image-icon.png" width="130" height="130" class="img-circle elevation-0"/>
						<?php }else{ ?>
							<img src="data:image/jpg;charset=utf8;base64,<?=base64_encode($SYS_LOGO); ?>" width="130" height="130" class="img-circle elevation-0"> </a>
						<?php }?>
					<br>
					<a href="#"></a>
					</div>

				  <p class="login-box-msg" style="font-size:15pt">CREATE YOUR ACCOUNT</p>
				  <form class="form-horizontal" action="registersave.php" method="POST" onSubmit="return valid();">
					   <div class="row">
						   <div class="col-sm-5">
							  <div class="form-group">
								<label for="firstname" class="control-label">FIRST NAME</label>
									<input type="text" class="form-control text-uppercase" name="FIRSTNAME" placeholder="FIRST NAME" required>
								</div>
							</div>
						
							 <div class="col-sm-2">
							  <div class="form-group">
								<label for="firstname" class="control-label">M.I</label>
									<input type="text" class="form-control text-uppercase" maxlength="1" name="MI" placeholder="M.I">
								</div>
							</div>
							 <div class="col-sm-5">
							  <div class="form-group">
								<label for="firstname" class="control-label">LAST NAME</label>
									<input type="text" class="form-control text-uppercase" name="LASTNAME" placeholder="LAST NAME" required>
								</div>
							</div>
							<div class="col-sm-6">
							<div class="form-group">
								<label for="firstname" class="control-label">AGE</label>
								<input type="text" id="age" class="form-control" name="AGE" placeholder="AGE" required readonly>
								<!-- <select class="form-control" id="age" name="AGE"  required>
								<option value="" selected disabled>-Select-</option>
								<?php 
								for($value = 1; $value <= 100; $value++){ 
									echo('<option value="' . $value . '">' . $value . '</option>');
								}
								?>
								</select> -->
								</div>
							</div>
							<div class="col-sm-6">
							<div class="form-group">
								<label for="firstname" class="control-label">DATE OF BIRTH</label>
									<input type="date" id="txtDOB" class="form-control" name="DATE_OF_BIRTH" placeholder="Date of Birth">
								</div>
							</div>

							<div class="col-sm-6">
							  <div class="form-group">
								<label for="firstname" class="control-label">GENDER </label>
								  <select class="form-control select2" name="GENDER" required>
									<option value="" selected>-SELECT-</option>
									<option>MALE</option>
									<option>FEMALE</option>
								  </select>
								</div>
							</div>

							
							<div class="col-sm-6">
							<div class="form-group">
								<label for="address" class="control-label">CONTACT</label>
								  <input type="text" class="form-control" name="CONTACT" placeholder="Contact" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
								</div>
							</div>

						   <div class="col-sm-6">
							<div class="form-group">
								<label for="address" class="control-label">PERMANENT ADDRESS</label>
								  <input type="text" class="form-control text-uppercase" name="ADDRESS" placeholder="ADDRESS" required>
								  
								</div>
							</div>

							<div class="col-sm-6">
							<div class="form-group">
								<label for="firstname" class="control-label">BARANGAY</label>
								<select class="form-control select2" name="BARANGAY" required>
									<option value="" selected>- Select -</option>
									<?php
									require_once('conn.php');
									$sql ="SELECT * FROM tbl_barangay ORDER BY BARANGAY";
									$query = $conn->query($sql);
									while($row =$query->fetch_assoc()){
									?>
										<option value="<?=$row['BARANGAY'];?>"><?=$row['BARANGAY'];?></option>
									<?php } ?>
								</select>
								</div>
							</div>
							

							<div class="col-sm-12">
									<div class="form-group">
							<label for="address" class="control-label">EMAIL</label>
							<input type="email" class="form-control" name="EMAIL" id="email" onBlur="userAvailability()"  placeholder="EMAIL" required>
								<span id="user-availability-status1"></span>
								</div>
							</div>

							
							<div class="col-sm-6">
									<div class="form-group">
							<label for="address" class="control-label">PASSWORD</label>
							<input type="password" class="form-control" id="Password" name="PASSWORD" placeholder="PASSWORD" required>
								</div>
							</div>
							<div class="col-sm-6">
									<div class="form-group">
							<label for="address" class="control-label">CONFIRM PASSWORD</label>
							<input type="password" class="form-control" id="ConfirmPassword" name="PASSWORD" placeholder="PASSWORD" required>
						  </div>
							</div>

							<div class="col-sm-12">
									<div class="form-group">
							<span id="msg"></span>  
						  </div>
							</div>

						  <div class="col-10">
							<div class="icheck-primary">
							  <input type="checkbox" id="agreeTerms" name="terms" value="agree" required>
							  <label for="agreeTerms">
							  I agree to the <a href="#" data-toggle="modal" data-target="#exampleModal">terms</a>
							  </label>
							</div>
						  </div>
					  <!-- /.col -->
					  <div class="col-6">
						<button type="submit" name="register" id="submit" class="btn bg-primary btn-block"> <i class="fa fa-solid fa-arrows-to-dot"></i> REGISTER</button>
					  </div>
					  <div class="col-6">
						<a href="index.php" class="btn bg-navy btn-block"> <i class="fa fa-solid fa-arrow-right-from-bracket"></i>  BACK</a>
					  </div>
					  <!-- /.col -->
					</div>
					  
				  </form>
				  <a href="signin.php" class="text-center">Already have an account?</a>
				</div>
				<!-- /.form-box -->
			  </div><!-- /.card -->
			</div>
			</div>
		</div>
</section>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Terms and Conditions</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p style="color:#000">The use of this website is subject to the following terms of use: The content of the pages of this website is for your general information and use only. It is subject to change without notice. This website uses cookies to monitor browsing preferences.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

 <?php include "contact_us.php";?>
<?php include "footer.php";?>
<script>
    function userAvailability() {
    $("<span class='fa fa-star'></span>").show();
    jQuery.ajax({
    url: "email_availability.php",
    data:'email='+$("#email").val(),
    type: "POST",
    success:function(data){
    $("#user-availability-status1").html(data);
    $("#loaderIcon").hide();
    },
    error:function (){}
    });
    }
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