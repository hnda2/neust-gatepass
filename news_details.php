<?php 
include "header.php";
if (empty($_SESSION['token'])) {
 $_SESSION['token'] = bin2hex(random_bytes(32));
}

if(isset($_POST['submit'])){
  //Verifying CSRF Token
	if (!empty($_POST['csrftoken'])) {
		if (hash_equals($_SESSION['token'], $_POST['csrftoken'])) {
		$name=$_POST['NAME'];
		$email=$_POST['EMAIL'];
		$comment=$_POST['COMMENT'];
		$newsid =base64_decode(urldecode($_GET['news']));
		$st1='0';
		$query=mysqli_query($conn,"INSERT into tbl_comments(NEWS_ID,NAME,EMAIL,COMMENT,STATUS) values('$newsid','$name','$email','$comment','$st1')");
		if($query):
		 $_SESSION['success']="comment successfully submit. Comment will be display after admin review";
		  unset($_SESSION['token']);
		else :
		 $_SESSION['error']="Something went wrong. Please try again.";  

		endif;

	}
  }
}


$news_id =base64_decode(urldecode($_GET['news']));
$sql = "SELECT VIEW_COUNTER FROM tbl_news WHERE ID = '$news_id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$visits = $row["VIEW_COUNTER"];
		$sql = "UPDATE tbl_news SET VIEW_COUNTER = $visits+1 WHERE ID ='$news_id'";
		$conn->query($sql);
	}
}else{
	echo "no results";
}
?>
    <body class="hold-transition sidebar-mini">
      <?php include "top_navbar.php";?>

		 <section class="content">
			<div class="container-fluid" data-aos="zoom-out" data-aos-delay="100">
				<div class="row">
                <div class="col-md-8 mt-3">
				<div class="list-group">
				<?php
				
					$currenturl="http://".$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
					$newsquery = "SELECT * FROM tbl_news WHERE ID='$news_id'"; 
					$news_run=$conn->query($newsquery);
					if($news_run -> num_rows >0){
					foreach($news_run as $value){
						
					$time_details=$value['POSTING_DATE'];
				?>
                    <div class="list-group-item">
					<div class="row">
						<div class="col px-4">
							<h3><span class="fa fa-solid fa-newspaper text-primary"></span> <a style="color:#34495e;" href="<?='news_details.php?news='.urlencode(base64_encode($value['ID']));?>"><?=$value['POST_TITLE'];?></a></h3>
						</div>
					</div>
				</div>
      
                        <div class="list-group-item">
                            <div class="row">
                                <div class="col-auto">
									<?php 
								  if($value['POST_IMAGE']==""){
								  ?>
								   <img src="images/no-image-icon.png" class="img-fluid img-thumbnaill elevation-1" alt="User Image" width="400" height="400">
								  <?php }else{ ?>
									<img src="data:image/jpg;charset=utf8;base64,<?=base64_encode($value['POST_IMAGE']); ?>" width="400" height="400" class="img-fluid img-thumbnaill elevation-1">
								  <?php }?>
                                </div>
                                <div class="col px-4">
                                    <div>
                                        <div class="float-rightS">
										 <!--<h3><?=$value['POST_TITLE'];?></h3>--->
                                        <p class="text-muted"><span class='fa fa-user text-muted text-lowercase'></span> 
										<b>Posted by:</b> <?=$value['POSTED_BY'];?> on <?=htmlentities($value['POSTING_DATE'])?> 
										
										 <?php if($value['LAST_UPDATE_BY']!=''):?>
											  | <b>Last Updated by </b> <?php echo htmlentities($value['LAST_UPDATE_BY']);?> on </b><?php echo htmlentities($value['UPDATION_DATE']);?>
											<?php endif;?>
										</p>
										<p class="text-muted">
										<?php
											
											$seconds_ago_details = (time() - strtotime($time_details));
											if ($seconds_ago_details >= 31536000) {
												echo "Posted <span class='fa fa-calendar'></span> " . intval($seconds_ago_details / 31536000) . " years ago";
											} elseif ($seconds_ago_details >= 2419200) {
												echo "Posted <span class='fa fa-calendar-week'></span> " . intval($seconds_ago_details / 2419200) . " months ago";
											} elseif ($seconds_ago_details >= 86400) {
												echo "Posted <span class='fa fa-calendar-days'></span> " . intval($seconds_ago_details / 86400) . " days ago";
											} elseif ($seconds_ago_details >= 3600) {
												echo "Posted <span class='fa fa-clock'></span> " . intval($seconds_ago_details / 3600) . " hours ago";
											} elseif ($seconds_ago_details >= 60) {
												echo "Posted <span class='fa fa-clock'></span> " . intval($seconds_ago_details / 60) . " minutes ago";
											} else {
												echo "Posted <span class='fa fa-clock'></span> less than a minute ago";
											}
										
										?>
										</p>
										</div>
                                        <p class="mb-0 text-justify"><?=$value['POST_DETAILS'];?></p>
                                    </div>
									<span class="badge bg-primary float-lefts"> <i class="fa fa-solid fa-eye"></i> <?php print $value['VIEW_COUNTER']; ?> Visits </span>
									 <div class="float-right">
									 <p><strong>Share:</strong> 
									 <a href="http://www.facebook.com/share.php?u=<?php echo $currenturl;?>" target="_blank"><i class="fa fa-brands fa-square-facebook"></i></a> 
									<a href="https://twitter.com/share?url=<?php echo $currenturl;?>" target="_blank"> <i class="fa fa-brands fa-square-twitter text-cyan"></i></a> 
									<a href="https://web.whatsapp.com/send?text=<?php echo $currenturl;?>" target="_blank"> <i class="fa fa-brands fa-square-whatsapp text-success"></i></a>
									<a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $currenturl;?>" target="_blank"><i class="fa fa-brands fa-linkedin text-danger"></i> </a>
									</p>
									 </div>
                                </div>
                            </div>
                        </div>
                      
					<?php } ?>
					
					<?php }else{ ?>
						<div class="list-group-item">
							<div class="row">
								<div class="col px-4">
									<div>
										<h3><span class="fa fa-calendar-lines-pen"></span> No Events </h3>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
							<!-- left column -->
							<?php
					  if(isset($_SESSION['error'])){
						echo "
						<div id='alert' class='alert alert-danger'>
						  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						  <h4><i class='icon fa fa-warning'></i> ERROR!</h4>
						  ".$_SESSION['error']."
						</div>
						";
						unset($_SESSION['error']);
					  }
					  if(isset($_SESSION['success'])){
						echo "
						<div class='alert bg-teal' id='alert'>
						  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						  <h4><i class='icon fa fa-check'></i> SUCCESS!</h4>
						  ".$_SESSION['success']."
						</div>
						";
						unset($_SESSION['success']);
					  }
					  ?>
					</div>
					
					<!-- general form elements -->
					<div class="card card-default">
					  <div class="card-header">
						<h3 class="card-title">Leave a comment</h3>
					  </div>
					  <!-- /.card-header -->
					  <!-- form start -->
					  <form method="POST">
					  <input type="hidden" name="csrftoken" value="<?php echo htmlentities($_SESSION['token']); ?>" />
						<div class="card-body">
						  <div class="form-group">
							<input type="text" class="form-control text-capitalize" name="NAME" placeholder="Enter Your Fullname" required>
						  </div>
						  <div class="form-group">
							<input type="email" class="form-control" name="EMAIL" placeholder="Enter Your Valid Email" required>
						  </div>
							<div class="form-group">
								<textarea id="summernote" name="COMMENT" required></textarea>
							</div>
						</div>
						<!-- /.card-body -->
						<div class="card-footer">
						  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
						</div>
					  </form>
					</div>
            <!-- general form elements -->
				<!------commmnet section---->
		
				
				<?php 

			if (isset($_GET['page_no']) && $_GET['page_no']!="") {
				$page_no = $_GET['page_no'];
				} else {
					$page_no = 1;
					}

				$total_records_per_page = 10;
				$offset = ($page_no-1) * $total_records_per_page;
				$previous_page = $page_no - 1;
				$next_page = $page_no + 1;
				$adjacents = "2"; 

				$result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM `tbl_comments` WHERE NEWS_ID='$news_id' AND STATUS=1");
				$total_records = mysqli_fetch_array($result_count);
				$total_records = $total_records['total_records'];
				$total_no_of_pages = ceil($total_records / $total_records_per_page);
				$second_last = $total_no_of_pages - 1; // total page minus 1

				$sts=1;
				$query="SELECT * FROM tbl_comments WHERE NEWS_ID='$news_id' AND STATUS='$sts' ORDER BY COMMENT_DATE DESC LIMIT $offset, $total_records_per_page";
				$query_run =$conn->query($query);
				if($query_run -> num_rows >0){
				foreach($query_run as $key=> $comment_news) {
				?>
				 <div class="card card-widget">
              <div class="card-header">
                <div class="user-block">
                  <img class="img-circle" src="images/profile.jpg" alt="User Image">
                  <span class="username"><a href="#"><?=$comment_news['NAME'];?></a></span>
                  <span class="description">Shared publicly  

				  <?php
											
						$seconds_ago_comment = (time() - strtotime($comment_news['COMMENT_DATE']));
						if ($seconds_ago_comment >= 31536000) {
							echo "<span class='fa fa-calendar'></span> " . intval($seconds_ago_comment / 31536000) . " years ago";
						} elseif ($seconds_ago_comment >= 2419200) {
							echo "<span class='fa fa-calendar-week'></span> " . intval($seconds_ago_comment / 2419200) . " months ago";
						} elseif ($seconds_ago_comment >= 86400) {
							echo "<span class='fa fa-calendar-days'></span> " . intval($seconds_ago_comment / 86400) . " days ago";
						} elseif ($seconds_ago_comment >= 3600) {
							echo "<span class='fa fa-clock'></span> " . intval($seconds_ago_comment / 3600) . " hours ago";
						} elseif ($seconds_ago_comment >= 60) {
							echo "<span class='fa fa-clock'></span> " . intval($seconds_ago_comment / 60) . " minutes ago";
						} else {
							echo "<span class='fa fa-clock'></span> less than a minute ago";
						}
					
					?>
				  </span>
                </div>
                <!-- /.user-block -->
                <div class="card-tools">
                 
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- post text -->
                <p><?=$comment_news['COMMENT'];?></p>

            </div>
          </div>
			<?php } ?>
			
			
           
     
			<?php }else{?>
			
			<div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">
                 <i class="fas fa-comment text-teal"></i>
                  No Comments
                </h3>
              </div>
            </div>
			
			<?php } ?>
					<nav aria-label="Page navigation example">
					<ul class="pagination">
					
						<!---<li class='page-item'><a href='?page_no=1' class='page-link'>First</a></li>--->
						<li <?php if($page_no <= 1){ echo "class='disabled page-item'"; } ?>>
						<a class='page-link' <?php if($page_no > 1){ echo "href='?page_no=$previous_page&news=$news_id'"; } ?>>Previous</a>
						</li>
					<?php 
					if ($total_no_of_pages <= 10){  	 
						for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
							if ($counter == $page_no) {
						   echo "<li class='active page-item'><a class='page-link'>$counter</a></li>";	
								}else{
						   echo "<li class='page-item'><a class='page-link' href='?page_no=$counter&news=".urlencode(base64_encode($news_id))."'>$counter</a></li>";
								}
						}
					}
					elseif($total_no_of_pages > 10){
						
					if($page_no <= 4) {			
					 for ($counter = 1; $counter < 8; $counter++){		 
							if ($counter == $page_no) {
						   echo "<li class='active page-item'><a class='page-link'>$counter</a></li>";	
								}else{
						   echo "<li class='page-item'><a class='page-link' href='?page_no=$counter&news=".urlencode(base64_encode($news_id))."'>$counter</a></li>";
								}
						}
						echo "<li class='page-item'><a class='page-link'>...</a></li>";
						echo "<li class='page-item'><a class='page-link' href='?page_no=$second_last&news=".urlencode(base64_encode($news_id))."'>$second_last</a></li>";
						echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages&news=".urlencode(base64_encode($news_id))."'>$total_no_of_pages</a></li>";
						}

					 elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
						echo "<li class='page-item'><a class='page-link' href='?page_no=1&news=".urlencode(base64_encode($news_id))."'>1</a></li>";
						echo "<li class='page-item'><a class='page-link' href='?page_no=2&news=".urlencode(base64_encode($news_id))."'>2</a></li>";
						echo "<li class='page-item'><a class='page-link'>...</a></li>";
						for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
						   if ($counter == $page_no) {
						   echo "<li class='active page-item'><a class='page-link'>$counter</a></li>";	
								}else{
						   echo "<li class='page-item'><a class='page-link' href='?page_no=$counter&news=".urlencode(base64_encode($news_id))."'>$counter</a></li>";
								}                  
					   }
					   echo "<li class='page-item'><a class='page-link'>...</a></li>";
					   echo "<li class='page-item'><a class='page-link' href='?page_no=$second_last&news=".urlencode(base64_encode($news_id))."'>$second_last</a></li>";
					   echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages&news=".urlencode(base64_encode($news_id))."'>$total_no_of_pages</a></li>";      
							}
						
						else {
						echo "<li class='page-item'><a class='page-link' href='?page_no=1&news=".urlencode(base64_encode($news_id))."'>1</a></li>";
						echo "<li class='page-item'><a class='page-link' href='?page_no=2&news=".urlencode(base64_encode($news_id))."'>2</a></li>";
						echo "<li class='page-item'><a class='page-link'>...</a></li>";

						for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
						  if ($counter == $page_no) {
						   echo "<li class='active page-item'><a class='page-link'>$counter</a></li>";	
								}else{
						   echo "<li class='page-item'><a href='?page_no=$counter&news=".urlencode(base64_encode($news_id))."' class='page-link'>$counter</a></li>";
								}                   
								}
							}
					}
				?>
					
					<li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled page-item'"; } ?>>
					<a class='page-link' <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page&news=".urlencode(base64_encode($news_id))."'"; } ?>>Next</a>
					</li>
					<?php if($page_no < $total_no_of_pages){
						echo "<li class='page-item'><a href='?page_no=$total_no_of_pages&news=".urlencode(base64_encode($news_id))."' class='page-link'>Last</a></li>";
						} ?>
					
				</ul>
				</nav>
			
			<!----end of comment--->
                </div>
				<?php include "recent_news.php";?>
            </div>
			
			</div>
		  </section>
	   <?php include "contact_us.php";?>
	   <?php include "footer.php";?>
      <script>
	  $(function () {
		$('#summernote').summernote()
	  })
	</script>
    </body>
</html>