
<?php include "includes/header.php";?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
	<?php include "includes/navbar.php";?>
  <!-- /.navbar -->
<!-- Main Sidebar Container -->
	<?php include "includes/sidebar.php";?>
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Staff Records</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Staff</li>
            </ol>
          </div>
        </div>
			<?php
        if(isset($_SESSION['error'])){
          echo "
            <div id='alert' class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div id='alert' class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
			<div class="card">
			
			<div class="card-header">
             <h3 class="card-title"> 
             <button data-target="#newstaff" data-toggle="modal" class="btn btn-primary btn-sm"> <i class="fa fa-plus"></i> REGISTER </button>
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
			
              <table id="example1" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>#</th>
				          <th>STATUS</th>
                  <th>NAME </th>
                  <th>USERNAME</th>
                  <th>PASSWORD </th>
                  <th>TOOL</th>
                </tr>
                </thead>
                <tbody>
				        <?php
                    $sql = "SELECT * FROM tbl_account WHERE ROLE !='ADMIN'";
                    $query = $conn->query($sql);
                    $cnt=1;
                    while($row = $query->fetch_assoc()){
                      ?>
                        <tr>
                          <td><?=$cnt; ?></td>
						              <td>
                          <?php 
                            if ($row['ACC_STATUS'] ==0){
                              echo '<a href="staff_confirmed.php?confirmed='.$row['ID'].'">
                            <i class="fa fa-check-circle text-danger" aria-hidden="true"></i> Disabled</a>
                              ';
                            }elseif($row['ACC_STATUS']==1){
                                echo '<a href=staff_disabled.php?confpending='.$row['ID'].'"><i class="fa fa-check-circle text-success"></i> Enabled</a>';
                            }
                            ?>
                          </td>
                          <td><?=$row['LASTNAME'].', '.$row['FIRSTNAME'].' '.$row['MI'];?></td>
                          <td><?=$row['EMAIL']; ?></td>
						              <td><?=$row['PASSWORD']; ?>
                           <a href="staff_reset_password.php?resetpass=<?=$row['ID'];?>" style="float:right" class="btn bg-primary btn-xs">
                           <span class="fa fa-recycle" aria-hidden="true"></span> RESET</a>
                          </td>
                          <td align="right">
                            <div class="btn-group">
                            <button data-id="<?=$row['ID'];?>" data-lastname="<?=$row['LASTNAME'];?>" data-firstname="<?=$row['FIRSTNAME'];?>" data-mi="<?=$row['MI'];?>" data-email="<?=$row['EMAIL'];?>" data-password="<?=$row['PASSWORD'];?>" onclick="confirmEdit(this);" class="btn bg-teal btn-sm"><i class="fa fa-solid fa-edit"></i> </button> 
                            <button data-id="<?=$row['ID'];?>" data-name="<?=$row['LASTNAME'].', '.$row['FIRSTNAME'].' '.$row['MI'];?>" onclick="confirmDelete(this);" class="btn bg-maroon btn-sm"><i class="fa fa-solid fa-trash-can-xmark"></i> </button>   
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
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
 <?php 
 include "includes/staff_modal.php"; 
 include "includes/footer.php"
 ?>
<script>
    function userCheckEmailAvailability() {
    jQuery.ajax({
    url: "staff_check_availability.php",
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
 function confirmDelete(self) {
    var id = self.getAttribute("data-id");
    var name = self.getAttribute("data-name");
    document.getElementById("form-delete-user").id.value = id;
    document.getElementById("form-delete-user").name.value = name;
    $("#myModal").modal("show");
}
function confirmEdit(self) {
    var id = self.getAttribute("data-id");
    var firstname = self.getAttribute("data-firstname");
    var mi = self.getAttribute("data-mi");
    var lastname = self.getAttribute("data-lastname");
    var email = self.getAttribute("data-email");
    var password = self.getAttribute("data-password");
    document.getElementById("form_edit_staff").id.value = id;
    document.getElementById("form_edit_staff").FIRSTNAME.value = firstname;
    document.getElementById("form_edit_staff").MI.value = mi;
    document.getElementById("form_edit_staff").LASTNAME.value = lastname;
    document.getElementById("form_edit_staff").EMAIL.value = email;
    document.getElementById("form_edit_staff").PASSWORD.value = password;
    $("#editstaff").modal("show");
}

</script>

</body>
</html>
