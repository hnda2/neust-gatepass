<?php
error_reporting(0);
	session_start();
	include "header.php";
	if(!isset($_SESSION['userid']) || trim($_SESSION['userid']) == ''){
		header('location: index.php');
	}

	$sql = "SELECT * FROM tbl_member WHERE ID = '".$_SESSION['userid']."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();
	
?>
<body class="hold-transition sidebar-mini">
<?php include "top_navbar.php";?>
<section class="content">
		<div class="container-fluid container">
		<div class="row">
		<div class="col-md-8 mt-3">
		  <div class="card card-outline card-primary offset-md-5" style="color:#000">
			<div class="card-header text-center">
			  <a href="#" class="h4">RECOVER NOW</a>
			</div>
			<div class="card-body">
			  
			  <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>
			  <p class="login-box-msg">WELCOME  <b><?=$user['LASTNAME'].', '.$user['MI'].' '.$user['FIRSTNAME'];?></b></p>
			  <form action="recover_pass_submit.php" method="post" autocomplete="off">
				<div class="input-group mb-3">
				<input type="hidden" name="id" class="form-control" value="<?=$user['ID'];?>">
				  <input type="password" name="NEWPASSWORD" class="form-control" placeholder="ENTER NEW PASSWORD" required>
				  <div class="input-group-append">
					<div class="input-group-text">
					  <span class="fas fa-lock"></span>
					</div>
				  </div>
				</div>
				<div class="row">
				  <div class="col-6">
					<button type="submit" name="btnrecover" class="btn bg-primary btn-block">SUBMIT</button>
				  </div>
				  <div class="col-6">
					<a href="signin.php" class="btn bg-navy btn-block"> <span class="fa fa-unlock"></span> LOGIN</a>
				  </div>
				</div>
			  </form>
			</div>
		  </div>
		  
		   <?php
        if(isset($_SESSION['error'])){
          echo "
            <div id='alert' class='offset-md-5 alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div id='alert' class='offset-md-5 alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
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
