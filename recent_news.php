	<div class="col-md-4 mt-3">
		<div class="card card-default">
		  <div class="card-header">
			<h3 class="card-title">
			  <i class="fas fa-bullhorn"></i>
			  Recent News
			</h3>
		  </div>
		  
		  <!-- /.card-header -->
		  <div class="card-body">
			<?php
				$recentnews ="SELECT * FROM tbl_news WHERE IS_ACTIVE=1 ORDER BY POSTING_DATE DESC LIMIT 8";
				$recentnews_run =$conn->query($recentnews);
				if($recentnews_run->num_rows>0){
					foreach($recentnews_run as $key=> $recent){
				
				$timego=$recent['POSTING_DATE'];							
			?>

			<!--<div class="callout callout-default">
			  <h5><a href="<?='news_details.php?news='.urlencode(base64_encode($recent['ID']));?>"><?=$recent['POST_TITLE'];?></a></h5>
			</div>
			-->
			<div class="list-group">
			  <a href="<?='news_details.php?news='.urlencode(base64_encode($recent['ID']));?>" class="list-group-item list-group-item-action" aria-current="true">
				<div class="d-flex w-100 justify-content-between">
				  <h5 class="mb-1"><?=substr($recent['POST_TITLE'], 0, 40);?></h5>
				</div>
			  </a>
			</div>
			<?php } ?>
			<?php }else{?>
				<div class="callout callout-info">
				  <p>No Recents News</p>
				</div>
			<?php } ?>
		  </div>
		  <!-- /.card-body -->
		</div>
		<!-- /.card -->
		
		
		<div class="card card-default">
		  <div class="card-header">
			<h3 class="card-title">
			  <i class="fas fa-bullhorn"></i>
			  Most Popular
			</h3>
		  </div>
		  
		  <!-- /.card-header -->
		  <div class="card-body">
			<?php
				$recentnews ="SELECT * FROM tbl_news WHERE IS_ACTIVE=1 ORDER BY VIEW_COUNTER DESC LIMIT 10";
				$recentnews_run =$conn->query($recentnews);
				$cnt =1;
				if($recentnews_run->num_rows>0){
					foreach($recentnews_run as $key=> $most_views){
				
				$timego=$most_views['POSTING_DATE'];							
			?>

			<div class="list-group">
			  <a href="<?='news_details.php?news='.urlencode(base64_encode($most_views['ID']));?>" class="list-group-item list-group-item-action" aria-current="true">
				<div class="d-flex w-100 justify-content-between">
				  <h5 class="mb-1"><?=$cnt++;?>. <?=substr($most_views['POST_TITLE'], 0, 40);?></h5>
				</div>
			  </a>
			</div>
			<?php } ?>
			<?php }else{?>
				<div class="callout callout-info">
				  <p>No News</p>
				</div>
			<?php } ?>
		  </div>
		  <!-- /.card-body -->
		</div>
		<!-- /.card -->
		
	  </div>
	  
	  