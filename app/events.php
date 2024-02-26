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
            <h1>List of Events</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Events</li>
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
              <a href="#add" data-toggle="modal" class="btn bg-primary btn-sm"><i class="fa fa-plus"></i> NEW EVENT</a>
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
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>EVENT NAME</th>
                    <th>DESCRIPTION </th>
                    <th>START TIME</th>
                    <th>ENDT TIME</th>
                    <th>ACTIONS</th>
                  </tr>
                  </thead>
                  <tbody>
				        	<?php
                    $sql = "SELECT * FROM schedule_list ORDER BY start_datetime DESC";
                    $query = $conn->query($sql);
				        	$cnt=1;
                    while($row = $query->fetch_assoc()){
                      ?>
                        <tr>
                          <td><?=$cnt; ?></td>
                          <td><?=$row['title']; ?></td>
                          <td><?=$row['description']; ?></td>
                          <td><?= date('F d, Y h:i:s A',strtotime($row['start_datetime']));?></td><!----l dS \o\f F Y h:i:s A--->
                          <td><?= date('F d, Y h:i:s A',strtotime($row['end_datetime']));?></td>
                          <td align="right">
                            <div class="btn-group">
                            <button data-id="<?php echo $row['id'];?>"  class="btn bg-teal btn-sm edit"><i class="fa-solid fa fa-edit"></i> </button>
                            <button data-id="<?php echo $row['id'];?>"  class="btn bg-maroon btn-sm delete"><i class="fa-solid fa fa-trash"></i> </button>
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
  <?php include "includes/event_modal.php";?>
 <?php include "includes/footer.php";?>

 <script>
$(function(){
  $('body').on('click','.edit',function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('body').on('click','.delete',function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('body').on('click','.info',function(e){
    e.preventDefault();
    $('#infoarticle').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
  
 
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'events_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.id').val(response.id);
      $('.del_title').html(response.title);
      $('.del_description').html(response.description);
      $('.del_date').html(response.start_datetime);
      $('.del_time').html(response.end_datetime);

      $('#edit_title').val(response.title);
      $('#edit_description').val(response.description);
      $('#edit_date').val(response.start_datetime);
      $('#edit_time').val(response.end_datetime);

    }
  });
}
</script> 
</body>
</html>

