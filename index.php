<?php include "header.php";?>
    <body id="page">
	<?php include "top_navbar.php";?>
        <div class="containera text-center">
		 <section class="col-md-12">
		<div class="container" data-aos="zoom-out" data-aos-delay="100"><br><br><br>

    
		<h1 class="bo1 text-uppercase" style="text-shadow: 2px 2px 2px #000;color:#FFF;font-weight:bold;font-size:40pt;font-family: century gothic;text-justify">
		<span style="color:#0984e3;font-size:50pt">N</span>UEVA 
		<span style="color:#0984e3;font-size:50pt">E</span>CIJA 
		<span style="color:#0984e3;font-size:50pt">U</span>NIVERSITY
		</h1>
		<h1 class="bo1 text-uppercase" style="text-shadow: 2px 2px 2px #000;color:#FFF;font-weight:bold;font-size:40pt;font-family: century gothic;text-justify">
		<span>of</span>
		<span style="color:#0984e3;font-size:50pt">S</span>CIENCE 
		<span>and</span> 
		<span style="color:#0984e3;font-size:50pt">T</span>ECHNOLOGY 
		</h1>
			<br>
			 <?php 
						if($SYS_LOGO==""){
						?>
							<img src="images/no-image-icon.png" width="250" height="250" class="img-circle elevation-0"/>
						<?php }else{ ?>
							<img src="data:image/jpg;charset=utf8;base64,<?=base64_encode($SYS_LOGO); ?>" width="250" height="250" class="img-circle elevation-0"> </a>
						<?php }?>
                <!-- <br><br>
                 <div class="d-flexa">
				  <a href="#" class="button btn bg-teal" data-toggle="modal" data-target="#modal-xl"> <i class="fa fa-sharp fa-regular fa-location-pin fa-beat-fade"></i> LOCATION</a>
                 <a href="register.php" class="button btn bg-primary"> <span class="fa fa-registered"></span> REPORT</a>
                <a href="signin.php" class="button btn bg-danger"> <span class="fa fa-unlock"></span> LOGIN</a>
			    </div>
				-->
			</div>
		  </section>

        </div>
  
   <?php include "contact_us.php";?>
   <?php include "footer.php";?>
    </body>
</html>
