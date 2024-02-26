<?php include "includes/header.php";?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- .navbar -->
  <?php include "includes/navbar.php";?>
  <!-- /.navbar -->
  <?php include "includes/sidebar.php";?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
              <?php
                $sql = "SELECT * FROM tbl_member";
                $query = $conn->query($sql);
                echo "<h3>".$query->num_rows."</h3>";
              ?>
                <p> Gatepass</p>
              </div>
              <div class="icon">
                <i class="ion ion-card"></i>
              </div>
              <a href="member.php?<?=urlencode(base64_encode($code));?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-teal">
              <div class="inner">
              <?php
                $sql = "SELECT * FROM tbl_logged WHERE STATUS = 'IN' AND DATE(LOGDATE)=DATE(NOW())";
                $query = $conn->query($sql);
                echo "<h3>".$query->num_rows."</h3>";
              ?>
                <p>Vehicle</p>
              </div>
              <div class="icon">
              <i class="fas fa-car"></i>
              </div>
             <a href="getpass_logs_today.php?<?=urlencode(base64_encode($code));?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-maroon">
              <div class="inner">
              <?php
               $sql = "SELECT * FROM tbl_logged WHERE DATE(LOGDATE)=DATE(NOW())";
                $query = $conn->query($sql);
                echo "<h3>".$query->num_rows."</h3>";
              ?>
                <p>Today Logs</p>
              </div>
              <div class="icon">
                <i class="ion ion-home"></i>
              </div>
              <a href="getpass_logs_today.php?<?=urlencode(base64_encode($code));?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
              <?php
                $sql = "SELECT * FROM tbl_account WHERE ROLE='STAFF'";
                $query = $conn->query($sql);
                echo "<h3>".$query->num_rows."</h3>";
              ?>
                <p>Staff</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <?php
                if($user['ROLE']=="ADMIN"){
                ?>
               <a href="staff.php?<?=urlencode(base64_encode($code));?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                <?php } else{?>
                  <a href="#" data-tips="tooltip" data-placement="top" title="YOUR ACCOUNT IS DISABLED FOR THIS LINK" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  <?php } ?>
              </div>
          </div>
    

        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <section class="col-lg-12 connectedSortable">
		    <?php
              if(isset($_SESSION['error'])){
                echo "
                <div id='alert' class='alert alert-danger' id='alert'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <h4><i class='icon fa fa-warning'></i> ERROR!</h4>
                  ".$_SESSION['error']."
                </div>
                ";
                unset($_SESSION['error']);
              }
              if(isset($_SESSION['success'])){
                echo "
                <div id='alert' class='alert alert-success' id='alert'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <h4><i class='icon fa fa-check'></i> SUCCESS!</h4>
                  ".$_SESSION['success']."
                </div>
                ";
                unset($_SESSION['success']);
              }
              ?>
			 <!-- Default box -->
			  <div class="card">
				<div class="card-header">
				  <h3 class="card-title">ANNOUCEMENT AND EVENT</h3>

				  <div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
					  <i class="fas fa-minus"></i>
					</button>
					<button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
					  <i class="fas fa-times"></i>
					</button>
				  </div>
				</div>
				<div class="card-body">
      <div id="calendar"></div>
        
			<!-- Event Details Modal -->
			
			
				<div class="modal fade" id="event-details-modal">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
							<h5 class="modal-title"><span class="fa fa-calendar-days"></span> EVENT DETAILS</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
							   <dl>
								<dt class="text-muted">Title</dt>
								<dd id="title" class="fw-bold fs-4"></dd>
								<dt class="text-muted">Description</dt>
								<dd id="description" class=""></dd>
								<dt class="text-muted">Start</dt>
								<dd id="start" class=""></dd>
								<dt class="text-muted">End</dt>
								<dd id="end" class=""></dd>
							</dl>
								
							</div>
							<div class="modal-footer">
								<!-- <button type="button" class="btn bg-teal btn-sm" id="edit" data-id=""> <i class="fa fa-edit"></i> Edit</button>
								<button type="button" class="btn bg-maroon btn-sm" id="delete" data-id=""> <i class="fa-solid fa fa-trash"></i> Delete</button> -->
								<button type="button" class="btn bg-navy btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
							</div>
						</div>
					</div>
				</div>

				<!-- Event Details Modal -->

			<?php 
			$schedules = $conn->query("SELECT * FROM schedule_list");
			$sched_res = [];
			// foreach($schedules->fetch_all(MYSQLI_ASSOC) as $Srow){
			// 	$Srow['sdate'] = date("F d, Y h:i A",strtotime($Srow['start_datetime']));
			// 	$Srow['edate'] = date("F d, Y h:i A",strtotime($Srow['end_datetime']));
			// 	$sched_res[$Srow['id']] = $Srow;

			// }
      foreach ($schedules as $key => $row) {
        $row['sdate'] = date("F d, Y h:i A",strtotime($row['start_datetime']));
				$row['edate'] = date("F d, Y h:i A",strtotime($row['end_datetime']));
				$sched_res[$row['id']] = $row;
      }
			?>
			<?php 
			if(isset($conn)) $conn->close();
			?>
				  
				  
				</div>
				<!-- /.card-body -->
				<div class="card-footer">
				  
				</div>
				<!-- /.card-footer-->
			  </div>
      <!-- /.card -->
          </section>
		  <!-- <section class="col-lg-4 connectedSortable">

			  <div class="card">
				<div class="card-header">
				  <h3 class="card-title">NEW ANNOUCEMENT/EVENT</h3>

				  <div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
					  <i class="fas fa-minus"></i>
					</button>
					<button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
					  <i class="fas fa-times"></i>
					</button>
				  </div>
				</div>
				<div class="card-body">
					<form action="event_schedule.php" method="post" id="schedule-form">
					<input type="hidden" name="id" value="">
					<div class="form-group">
						<label for="title" class="control-label">Title</label>
						<input type="text" class="form-control" name="title" id="title" required>
					</div>
					<div class="form-group">
						<label for="description" class="control-label">Description</label>
						<textarea rows="3" class="form-control" name="description" id="description" required></textarea>
					</div>
					<div class="form-group">
						<label for="start_datetime" class="control-label">Start</label>
						<input type="datetime-local" class="form-control" name="start_datetime" id="start_datetime" required>
					</div>
					<div class="form-group">
						<label for="end_datetime" class="control-label">End</label>
						<input type="datetime-local" class="form-control" name="end_datetime" id="end_datetime" required>
					</div>
				</form>
				</div>
				<div class="card-footer">
				  <button class="btn btn-primary btn-sm" type="submit" form="schedule-form"><i class="fa fa-save"></i> SAVE</button>
          <button class="btn btn-default border btn-sm" type="reset" form="schedule-form"><i class="fa fa-reset"></i> CANCEL</button>
				</div>
			  </div>
          </section>
        </div>
      </div>
    </section> -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include "includes/footer.php";?>
  <script>
    var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
	</script>
	<script src="../plugins/fullcalendar/js/script.js"></script>
  <script>
  $(function () {
  $('[data-tips="tooltip"]').tooltip()
})
</script>
</body>
</html>


 
