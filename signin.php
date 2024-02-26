<?php include "header.php";?>
<body class="hold-transition sidebar-mini">
 <?php include "top_navbar.php";?>
<section class="content">
	<div class="container col-md-3">
	<div class="row">
		 <div class="col-md-12 mt-3">
		  <div class="card card-outline card-primary" style="color:#000"><!--style="background: rgba(0, 0, 0, 0.40);"--->
			<div class="card-header text-center">
		   <?php 
			if($SYS_LOGO==""){
			?>
				<img src="images/no-image-icon.png" width="130" height="130" class="img-circle elevation-0"/>
			<?php }else{ ?>
				<img src="data:image/jpg;charset=utf8;base64,<?=base64_encode($SYS_LOGO); ?>" width="130" height="130" class="img-circle elevation-0"> </a>
			<?php }?>
			</div>
			<div class="card-body">
			  <p class="login-box-msg">PLEASE LOGIN</p>
			  <form action="login.php" method="POST">
				<div class="row">
				<div class="col-sm-12">
				  <div class="form-group">
						 <input type="email" name="EMAIL" class="form-control" placeholder="EMAIL" required>
					</div>
				</div>
				
				<div class="col-sm-12">
				  <div class="form-group">
						<input type="password" name="PASSWORD" class="form-control" placeholder="PASSWORD" required>
					</div>
				</div>
				</div>
			
				  <div class="row">
				 
				  <!-- /.col -->
				  <div class="col-6">
					<button type="submit" name="login" class="btn btn-primary btn-block"> <i class="fa fa-duotone fa-right-to-bracket"></i> LOGIN</button>
				  </div>
				  <!-- <div class="col-4">
					<a href="register.php" class="btn btn-block btn-primary">REGISTER</a>
				   </div> -->
				   <div class="col-6">
				   <a href="index.php" class="btn btn-block bg-navy"><span class="fa fa-home"></span> HOME</a>
				   </div>
				</div>
			  </form><br>
			<!--<a href="forgot-password.php" class="text-center"> <span class="fa fa-lock"></span> Forgot Password?</a>-->
			<!-- /.card-body -->
		  </div>
		</div>	
			
			<?php
			if(isset($_SESSION['error'])){
			  echo "
				<div class='alert alert-danger alert-dismissible' id='alert'>
				  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				  <h4><i class='icon fa fa-exclamation-triangle' aria-hidden='true'></i>Error!</h4>
				  ".$_SESSION['error']."
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
