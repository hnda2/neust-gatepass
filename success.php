<?php
	include "header.php";
?>
 <meta http-equiv="refresh" content="10;url=success_logout.php">
<body class="hold-transition sidebar-mini">
<?php include "top_navbar.php";?>

<section class="content">
 <div class="container-fluid container">
	  <div class="row">
		<div class="col-md-8 mt-3">
		  <div class="card card-outline card-primary offset-md-5" style="color:#000">
			<div class="card-header text-center">
			  <a href="#" class="h4">SUCCESSFULLY RESET</a>
			</div>
			<div class="card-body">
			  <p class="login-box-msg">Your password has been successfully reset, Please wait.. you will redirect to login page. 
			  Thank you for your patient!</p>
			</div>
		  </div>
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
