<?php include "header.php";?>
  <body>
  <?php include "top_navbar.php";?>
    <main role="main">
      <section class="jumbotron text-center text-white card" style="background:rgba(6, 82, 221,0.70)">
        <div class="container">
          <div class="card bg-transparent" style="box-shadow:none">
          <h1 class="jumbotron-heading">ANNOUNCEMENTS/EVENTS</h1>
          <p class="lead text-mutedd">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
          </div>
        </div>
      </section>
	  
      <div class="album py---5 bg-light">
        <div class="container">
          <div class="row">
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
    
              $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM schedule_list");
              $total_records = mysqli_fetch_array($result_count);
              $total_records = $total_records['total_records'];
              $total_no_of_pages = ceil($total_records / $total_records_per_page);
              $second_last = $total_no_of_pages - 1; // total page minus 1

              $annc ="SELECT * FROM schedule_list ORDER BY start_datetime DESC LIMIT $offset, $total_records_per_page";
              $annc_run =$conn->query($annc);
              if($annc_run->num_rows >0){
            ?>
            <?php
              foreach ($annc_run as $key => $annc_row) {
                
            ?>
              <div class="col-md-12">
                <div class="card mb-4 box-shadow">
                 
                  <div class="card-body">
                  <a href=""><p><?=$annc_row['title'];?></p></a>
                    <p class="card-text"><?=$annc_row['description']?></p>
                    <div class="d-flex justify-content-between align-items-center">
                      <small class="text-muted">

                      <?php
											$date_posted=$annc_row['date_posted'];
											$seconds_ago = (time() - strtotime($date_posted));
											if ($seconds_ago >= 31536000) {
												echo "Posted <span class='fa fa-calendar'></span> " . intval($seconds_ago / 31536000) . " years ago";
											} elseif ($seconds_ago >= 2419200) {
												echo "Posted <span class='fa fa-calendar-week'></span> " . intval($seconds_ago / 2419200) . " months ago";
											} elseif ($seconds_ago >= 86400) {
												echo "Posted <span class='fa fa-calendar-days'></span> " . intval($seconds_ago / 86400) . " days ago";
											} elseif ($seconds_ago >= 3600) {
												echo "Posted <span class='fa fa-clock'></span> " . intval($seconds_ago / 3600) . " hours ago";
											} elseif ($seconds_ago >= 60) {
												echo "Posted <span class='fa fa-clock'></span> " . intval($seconds_ago / 60) . " minutes ago";
											} else {
												echo "Posted <span class='fa fa-clock'></span> less than a minute ago";
											}
										
										?>

                      </small>
					  
                    </div>
                  </div>
                </div>
				
              </div>
              <?php } ?>
            <?php }else{ ?>
              <div class="alert bg-teal col-md-12 text-center" role="alert">NO EVENTS/ANNOUNCEMENTS</div>
            <?php } ?>

          </div>
		  
		  <nav aria-label="Page navigation example">
					<ul class="pagination">
					
						<!---<li class='page-item'><a href='?page_no=1' class='page-link'>First</a></li>--->
						<li <?php if($page_no <= 1){ echo "class='disabled page-item'"; } ?>>
						<a class='page-link' <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Previous</a>
						</li>
						
					<?php 
					if ($total_no_of_pages <= 10){  	 
						for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
							if ($counter == $page_no) {
						   echo "<li class='active page-item'><a class='page-link'>$counter</a></li>";	
								}else{
						   echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
								}
						}
					}
					elseif($total_no_of_pages > 10){
						
					if($page_no <= 4) {			
					 for ($counter = 1; $counter < 8; $counter++){		 
							if ($counter == $page_no) {
						   echo "<li class='active page-item'><a class='page-link'>$counter</a></li>";	
								}else{
						   echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
								}
						}
						echo "<li class='page-item'><a class='page-link'>...</a></li>";
						echo "<li class='page-item'><a class='page-link' href='?page_no=$second_last'>$second_last</a></li>";
						echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
						}

					 elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
						echo "<li class='page-item'><a class='page-link' href='?page_no=1'>1</a></li>";
						echo "<li class='page-item'><a class='page-link' href='?page_no=2'>2</a></li>";
						echo "<li class='page-item'><a class='page-link'>...</a></li>";
						for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
						   if ($counter == $page_no) {
						   echo "<li class='active page-item'><a class='page-link'>$counter</a></li>";	
								}else{
						   echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
								}                  
					   }
					   echo "<li class='page-item'><a class='page-link'>...</a></li>";
					   echo "<li class='page-item'><a class='page-link' href='?page_no=$second_last'>$second_last</a></li>";
					   echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
							}
						
						else {
						echo "<li class='page-item'><a class='page-link' href='?page_no=1'>1</a></li>";
						echo "<li class='page-item'><a class='page-link' href='?page_no=2'>2</a></li>";
						echo "<li class='page-item'><a class='page-link'>...</a></li>";

						for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
						  if ($counter == $page_no) {
						   echo "<li class='active page-item'><a class='page-link'>$counter</a></li>";	
								}else{
						   echo "<li class='page-item'><a href='?page_no=$counter' class='page-link'>$counter</a></li>";
								}                   
								}
							}
					}
				?>
					
					<li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled page-item'"; } ?>>
					<a class='page-link' <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>Next</a>
					</li>
					<?php if($page_no < $total_no_of_pages){
						echo "<li class='page-item'><a href='?page_no=$total_no_of_pages' class='page-link'>Last</a></li>";
						} ?>
					
				</ul>
				</nav>
				
        </div>
      </div>

    </main>
    <?php include "contact_us.php";?>
   <?php include "footer.php";?>
    </body>
</html>