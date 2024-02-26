<div class="preloader flex-column justify-content-center align-items-center" style="background:rgba(0, 0, 0,0.40)">
    <img class="animation__shakes" src="images/loading-loader.gif" alt="AdminLTELogo" height="60" width="60">
  </div>
		<ul class="cb-slideshow list-group">
			<li><span>Image 01</span><div><h3></h3></div></li>
            <li><span>Image 02</span><div><h3></h3></div></li>
            <li><span>Image 03</span><div><h3></h3></div></li>
            <li><span>Image 04</span><div><h3></h3></div></li>
            <li><span>Image 05</span><div><h3></h3></div></li>
            <li><span>Image 06</span><div><h3></h3></div></li>
        </ul>
			<nav class="navbar navbar-expand-lg navbar-light bg-lights" style="background:rgba(6, 82, 221,1.0);color:#fff;border-bottom:3px solid orange">
			  <a class="navbar-brand text-white" href="#"><?=$SYS_ADDRESS;?></a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				 <i class="fa fa-sharp fa-light fa-bars text-white"></i>
			  </button>

			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
				<a class="nav-link text-white" href="index.php?<?=urlencode(base64_encode($code));?>nav-link=<?=urlencode(base64_encode($code));?>"><i class="fa fa-solid fa-home"></i> HOME</a>
				</li>
				  <li class="nav-item">
					<a class="nav-link text-white" href="#about" data-toggle="modal"> <span class="fa fa-info-circle"></span> ABOUT US</a>
				  </li>
				  <!-- <li class="nav-item">
					<a class="nav-link text-white" href="news.php?<?=urlencode(base64_encode($code));?>nav-link=<?=urlencode(base64_encode($code));?>"><i class="fa fa-solid fa-newspaper"></i> NEWS</a>
				  </li> -->
				 <!-- <li class="nav-item">
					<a class="nav-link text-white" href="announcement.php?<?=urlencode(base64_encode($code));?>nav-link=<?=urlencode(base64_encode($code));?>"><i class="fa fa-regular fa-bullhorn fa-fade"></i> ANNOUNCEMENTS</a>
				  </li>
-->


				</ul>
				<form class="form-inline my-2 my-lg-0">
				
				<div class="btn-group">
				 <!---<a href="register.php" class="button btn bg-apple text-white"> <span class="fa fa-registered"></span> REGISTER</a>--->
				  <a href="signin.php?<?=urlencode(base64_encode($code));?>nav-link=<?=urlencode(base64_encode($code));?>" class="button btn bg-oranges text-white"> <span class="fa fa-unlock"></span> LOGIN</a>
				  </div>
				</form>
			  </div>
			</nav>