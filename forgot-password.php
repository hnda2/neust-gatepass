<?php 
	error_reporting(0);
	session_start();
	include "header.php";
   if(isset($_POST['login'])){ 
	$LNAME = strtoupper($_POST['LASTNAME']);     
	$CONTACT = $_POST['CONTACT'];     
	$EMAIL = $_POST['EMAIL'];

	$sql = mysqli_query($conn, "SELECT * FROM tbl_member WHERE LASTNAME = '$LNAME' AND CONTACT = '$CONTACT' AND EMAIL='$EMAIL'");
	$result = mysqli_num_rows($sql);

	if($result > 0)
	{
	  while($row = mysqli_fetch_array($sql)){

		$_SESSION['userid']=$row['ID'];
		$_SESSION['logged']="true";
		$session = "1"; 
		header('location: recover-password.php');
	  }    

	}else
	{
	$_SESSION['error']='incorrect username and password';
	   
	}
	 
  }

  ?>

<body class="hold-transition sidebar-mini">
<?php include "top_navbar.php";?>

<section class="content">
	<div class="container-fluid container">
	<div class="row">
	<div class="col-md-8 mt-3">
		 
		  <div class="card card-outline card-primary offset-md-5" style="color:#000">
			<div class="card-header text-center">
			  <a href="#" class="h4">FORGOT PASSWORD</a>
			</div>
			<div class="card-body">
			  
			  <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password. Please your details.
			  
			  </p>
			  <form action="#" method="post" autocomplete="off">
			   
			   
			   <div class="input-group mb-3">
				  <input type="text" name="LASTNAME" class="form-control" placeholder="LAST NAME" required>
				  <div class="input-group-append">
					<div class="input-group-text">
					  <span class="fas fa-user"></span>
					</div>
				  </div>
				</div>
				<div class="input-group mb-3">
				  <input type="text" name="CONTACT" class="form-control" placeholder="CONTACT" required>
				  <div class="input-group-append">
					<div class="input-group-text">
					  <span class="fas fa-user"></span>
					</div>
				  </div>
				</div>
				
				<div class="input-group mb-3">
				  <input type="email" name="EMAIL" class="form-control" placeholder="EMAIL" required>
				  <div class="input-group-append">
					<div class="input-group-text">
					  <span class="fas fa-envelope"></span>
					</div>
				  </div>
				</div>

				<div class="row">
				  <div class="col-6">
					<button type="submit" name="login" class="btn bg-primary btn-block"><i class="fa fa-solid fa-arrows-spin"></i> RESET PASSWORD</button>
				  </div>
				  <div class="col-6">
					<a href="signin.php" class="btn bg-navy btn-block"><span class="fa fa-unlock"></span> LOGIN</a>
				  </div>
				</div>

			  </form>
			</div>
			</div>
			 <?php
			  if(isset($_SESSION['error'])){
				echo "
				  <div id='alert' class='callout callout-danger text-center mt20 offset-md-5'>
					<p>".$_SESSION['error']."</p> 
				  </div>
				";
				unset($_SESSION['error']);
			  }
			?>
		</div>
	  </div>
	</div>
	</section>


<?php include "contact_us.php";?>
<?php include "footer.php";?>
	<script type="text/javascript">
	$(document).ready(function () {
	window.setTimeout(function() {
		$("#alert").fadeTo(1000, 0).slideUp(1000, function(){
			$(this).remove(); 
		});
	}, 5000);

	});
</script>

</body>
</html>
