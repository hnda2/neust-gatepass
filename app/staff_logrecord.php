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
            <h1>User Activity Log</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Activity Log</li>
            </ol>
          </div>
        </div>
        <?php
          // Display error or success messages
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
        <!-- Staff Records -->
        <div class="card">
          <div class="card-header">
             
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
                  <th>Account no</th>
                  <th>LOGIN</th>
                  <th>LOGOUT</th>  
                  <th>USERNAME</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  // Retrieve data from tbl_userlog
                  $logSql = "SELECT * FROM tbl_userlog";
                  $logQuery = $conn->query($logSql);
                  $logCnt = 1;

                  while($logRow = $logQuery->fetch_assoc()){
                ?>
                  <tr>
                    <td><?=$logCnt; ?></td>
                    <td><?=$logRow['UID']; ?></td>
                    <td><?=$logRow['LOGTIME']; ?></td>
                    <td><?=$logRow['LOGOUT']; ?></td>
                  
                   
                    <td><?=$logRow['USERNAME']; ?></td>
                  </tr>
                <?php
                    $logCnt++;
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
