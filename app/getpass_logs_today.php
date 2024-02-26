<?php @include "includes/header.php";?>
<!-- <style>
 .modal {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    overflow: hidden;
}
.modal-dialog {
  max-width: 100%;
    margin: 0;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    height: 100vh;
    display: flex;
    position: fixed;
    z-index: 100000;
}
.modal-header {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    border: none;
}
.modal-content {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    border-radius: 0;
    box-shadow: none;
}
.modal-body {
    position: absolute;
    top: 50px;
    bottom: 0;
    font-size: 15px;
    overflow: auto;
    margin-bottom: 60px;
    padding: 0 15px 0;
    width: 100%;
}
.modal-footer {
    position: absolute;
    right: 0;
    bottom: 0;
    left: 0;
    height: 60px;
    padding: 10px;
    background: #f1f3f5;
}
/* to delete the scrollbar */
/*
::-webkit-scrollbar {
    -webkit-appearance: none;
    background: #f1f3f5;
    border-left: 1px solid darken(#f1f3f5, 10%);
    width: 10px;
}
::-webkit-scrollbar-thumb {
    background: darken(#f1f3f5, 20%);
}
*/
</style> -->
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- .navbar -->
  <?php @include "includes/navbar.php";?>
  <!-- /.navbar -->
  <?php @include "includes/sidebar.php";?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daily Summary Logs</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Gatepass Record</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
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
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
             <h3 class="card-title"> 
             <div class="btn-group">
             <a href="getpass_logs_today_export.php?CURRENT_DATE=<?=$CURRENT_DATE;?>" class="btn btn-success btn-sm"><i class="fa fa-file-excel"></i> SAVE TO EXCEL</a>
             </div>
            </h3>
			      	<div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-hover">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>RFID</th>
                    <th>FULL NAME</th>
                    <th>DATE RECORDED</th>
                    <th>LOGIN</th>
                    <th>LOGOUT</th>
                    <th>DURATION</th>
                  </tr>
                  </thead>
                  <tbody>
					      <?php
 
                    $sql = "SELECT * FROM tbl_member tm INNER JOIN tbl_logged tr ON tm.RFID=tr.RFID WHERE tr.LOGDATE='$CURRENT_DATE' ORDER BY tr.LOGDATE DESC";
                    $query = $conn->query($sql);
				            $cnt=1;
                    while($row = $query->fetch_assoc()){
                      $id =$row['ID'];
                      ?>
                        <tr>
                          <td><?=$cnt; ?></td>
                          <td><?=$row['RFID']; ?></td>
                          <td>
                          <a href="<?='member_info.php?q='.urlencode(base64_encode($row['ID']));?>&code=<?=urlencode(base64_encode($code));?>"><i class="fa-solid fa fa-info-circle"></i> 
                            <?=$row['LASTNAME'].',  '.$row['FIRSTNAME'].' '.$row['MI']; ?>
                            </a>
                          </td>
                          <td><?=$row['LOGDATE']; ?></td>
                          <td><?=$row['LOGIN']; ?></td>
                          <td><?=$row['LOGOUT'];?></td>
                          <td><?=$row['DURATION'];?></td>
                          
                        </tr>
                        
                      <?php
                      
					            $cnt++;
                    }
                  ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
 <?php 
 
 @include "includes/footer.php";
 ?>
</body>
</html>

