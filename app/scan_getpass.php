<?php include "includes/header.php";?>
<style>
@charset "utf-8";
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap');
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}
html {
  font-size: 16px;
}
body {
/*display: flex;*/
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100vh;
  background-color: #000;
  font-family: 'Roboto', sans-serif;
}
.clock {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  position: relative;
  z-index: 10;
  padding: 30px 30px 20px;
  border-radius: 10px;
  background-color: ;
  border:3px solid white;
  color: #fff;
  letter-spacing: 1px;
}
.clock::before {
  position: absolute;
  top: -2px;
  right: -2px;
  bottom: -2px;
  left: -2px;
  z-index: -1;
  /*filter: blur(10px);*/
  border-radius: 10px;
  background-color: ;
  border:3px solid white;
  content: '';
}
.clock-date {
  font-size: 1.25rem;
}
.clock-time {
  font-size: 5rem;
}
@media screen and (max-width: 100%) {
  .clock {
    padding: 20px 20px 10px;
  }
  .clock-date {
    font-size: .9375rem;
  }
  .clock-time {
    font-size: 3.75rem;
  }
}
</style>
<body class="hold-transition login-page1" style="background:url(../images/bg.jpg);/* Full height */
  height: 100%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;">
<div class="wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container">
        <h4  class="text-center display-4 text-white"><i class="fa fa-solid fa-id-card"></i> SCAN GATEPASS</h4>
      </div>
	  
      <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="container">
        <div class="container-fluid">
			<div class="clock">
			<?php 
				if($SYS_LOGO==""){
				?>
					<img src="images/no-image-icon.png" width="130" height="130" class="img-circle elevation-0"/>
				<?php }else{ ?>
					<img src="data:image/jpg;charset=utf8;base64,<?=base64_encode($SYS_LOGO); ?>" width="130" height="130" class="img-circle elevation-0"> </a>
				<?php }?>
		  <div class="clock-date">Sunday, January 01, 2022</div>
		  <div class="clock-time">00:00:00</div>
		</div>
            <form action="scan_getpass_check.php" autocomplete="off" method="POST">
                <div class="row mt-3">
                  
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="input-group input-group-lg">
                                <input type="text" class="form-control form-control-lg" name="RFID" placeholder="READ RFID" required autofocus style="color: white;">
                                <div class="input-group-append">
                                    <!-- <button type="submit" class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                    </button> -->
                                    
									                    <a href="member.php" class="btn btn-lg btn-default">
                                        <i class="fa fa-desktop"></i>
                                    </a>
                                    <a href="event_tab.php" class="btn btn-lg btn-default">
                                        <i class="fa fa-calendar"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row mt-3">
                <div class="col-md-12" id="alert">
                     <?php
					  if(isset($_SESSION['error'])){
						echo $_SESSION['error'];
						unset($_SESSION['error']);
					  }
					  if(isset($_SESSION['success'])){
						echo $_SESSION['success'];
						unset($_SESSION['success']);
					  }
					  ?>
                </div>
            </div>
            <br>
        </div>
    </section>
	</div>
<!-- jQuery -->
<?php include "includes/footer.php";?>
<script>
function clock() {
  let d = new Date();

  let year = d.getFullYear();
  let month = d.toLocaleString("en-US", {
    month: "long",
  });
  let date = ("0" + d.getDate()).slice(-2);
  let dayNum = d.getDay();
  let day = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"][dayNum];
  //let hr = ("0" + d.getHours()).slice(-2);
  //let min = ("0" + d.getMinutes()).slice(-2);
  //let sec = ("0" + d.getSeconds()).slice(-2);
  let hh = d.getHours();
  let mm = d.getMinutes();
  let ss = d.getSeconds();
  let session = "AM";

  if(hh == 0){
      hh = 12;
  }
  if(hh > 12){
      hh = hh - 12;
      session = "PM";
   }

   hh = (hh < 10) ? "0" + hh : hh;
   mm = (mm < 10) ? "0" + mm : mm;
   ss = (ss < 10) ? "0" + ss : ss;
    
   let time = hh + ":" + mm + ":" + ss + " " + session;

  document.querySelector(".clock-date").innerHTML = day + ", " + month + " " + date + ", " + year;
  //document.querySelector(".clock-time").innerHTML = hr + ":" + min + ":" + sec;
  document.querySelector(".clock-time").innerHTML = time; 
  //let t = setTimeout(function(){ currentTime() }, 1000);
}

setInterval(clock, 1000);
</script>
</body>
</html>
