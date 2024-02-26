<?php @include "includes/header.php";?>
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
            <h1>List of Records</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Accounts Record</li>
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
                <?php
                  if($user['ROLE']=="ADMIN"){
                  ?>
                <button type="button" data-toggle="modal" data-target="#addmember" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> REGISTER</button>
                <?php } ?> 
                <a href="member_export_excel.php?export" class="btn btn-success btn-sm"><i class="fa fa-file-excel"></i> EXPORT </a>
				        <a href="scan_getpass.php?&code=<?=urlencode(base64_encode($code))?>" class="btn bg-navy btn-sm"> <i class="fa fa-solid fa-id-card"></i> SCAN GETPASS </a>
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
                    <th>STATUS</th>
                    <th>GATEPASS NO</th>
                    <th>NAME</th>
                    <th>GENDER</th>
                    <th>CONTACT</th>
                    <th>ACTIONS</th>
                  </tr>
                  </thead>
                  <tbody>
					      <?php
 
                    $sql = "SELECT * FROM tbl_member ORDER BY LASTNAME ASC";
                    $query = $conn->query($sql);
				            $cnt=1;
                    while($row = $query->fetch_assoc()){
                      $ID =$row['ID'];
                      ?>
                        <tr>
                          <td><?=$cnt; ?></td>
                          <td><?=$row['RFID']; ?></td>
                          <td>
                          <?php 
                            if ($row['ACC_STATUS'] ==0){
                              echo '<a href="member_active.php?confirmed='.$row['ID'].'">
                            <i class="fa fa-times-circle text-danger" aria-hidden="true"></i> DISABLED</a>
                              ';
                            }elseif($row['ACC_STATUS']==1){
                                echo '<a href="member_diactive.php?confpending='.$row['ID'].'"><i class="fa fa-check-circle text-success"></i> ENABLED</a>';
                            }
                            ?>
                          </td>
                          <td><?=$row['GETPASSNO']; ?></td>
                          <td><?=$row['LASTNAME'].',  '.$row['FIRSTNAME'].' '.$row['MI']; ?></td>
                          <td><?=$row['GENDER']; ?></td>
                          <td><?=$row['CONTACT']; ?></td>
                          <td align="right">
							            <div class="btn-group">
                          
                            <a href="<?='member_update.php?q='.urlencode(base64_encode($row['ID']));?>&code=<?=urlencode(base64_encode($code));?>" class="btn bg-olive btn-sm" data-tips="tooltip" data-placement="top" title="UPDATE RECORD"><i class="fa-solid fa fa-edit"></i> </a>
                            <a href="<?='member_info.php?q='.urlencode(base64_encode($row['ID']));?>&code=<?=urlencode(base64_encode($code));?>" class="btn bg-teal btn-sm" data-tips="tooltip" data-placement="top" title="INFORMATION"><i class="fa-solid fa fa-info-circle"></i> </a>
                            <button  data-toggle="modal" data-target="#Receipt<?=$ID;?>" class="btn btn-primary btn-sm" data-tips="tooltip" data-placement="top" title="RECEIPT"> <i class="fa fa-solid fa-print"></i></button>   
                            <?php @include "includes/request_modal.php";?>
                            <?php
                          if($user['ROLE']=="ADMIN"){
                          ?>
                            <button data-id="<?=$row['ID'];?>" onclick="confirmDelete(this);" class="btn bg-maroon btn-sm" data-tips="tooltip" data-placement="top" title="DELETE RECORD"><i class="fa fa-solid fa-trash-can-xmark"></i> </button>    
                          <?php } ?>
                          </div>
                          </td>
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
 <?php @include "includes/member_modal.php";?>
 <?php @include "includes/footer.php";?>
 <script>
    function userCheckEmailAvailability() {
    jQuery.ajax({
    url: "member_check_availability.php",
    data:'email='+$("#CheckEmail").val(),
    type: "POST",
    success:function(data){
    $(".user-availability-status1").html(data);
    },
    error:function (){}
    });
    }
</script>
<script>
    $(document).ready(function(){
        $("#ConfirmPassword").keyup(function(){
             if ($("#Password").val() != $("#ConfirmPassword").val()) {
                 $("#msg").html("Password do not match").css("color","red");
                 $('#submit').prop('disabled',true);
             }else{
                 $("#msg").html("Password matched").css("color","green");
                 $('#submit').prop('disabled',false);
            }
      });
});
</script> 
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

  })
</script>
<script>
 function confirmDelete(self) {
    var id = self.getAttribute("data-id");
    document.getElementById("form-delete-user").id.value = id;
    $("#myModal").modal("show");
}
</script>
<script>
	$(document).ready(function(){
    $("#txtDOB").change(function(){
       var dob = $("#txtDOB").val();
    
       if(dob != null || dob != ""){
          $("#age").val(getAge(dob));
       }
  });
  
  function getAge(birth) {
    ageMS = Date.parse(Date()) - Date.parse(birth);
    age = new Date();
    age.setTime(ageMS);
    ageYear = age.getFullYear() - 1970;

    return ageYear;
   }
});
</script>
<script>
  $(function () {
  $('[data-tips="tooltip"]').tooltip()
})
</script>
</body>
</html>

