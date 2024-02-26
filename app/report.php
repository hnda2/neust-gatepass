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
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Generate Reports</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item active">Reports</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          

       

      <div class="col-md-12">
			 <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">SEARCH BY DATE RANGE</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div> 
          <!-- /.card-header -->
          <div class="card-body">
            <div class="rows">
             <form class="form-horizontal" action="getpass_logs_filter_from_to.php" method="POST" enctype="multipart/form-data" autocomplete="off">
          		  <div class="row">
                <div class="col-sm-5">
          		  <div class="form-group">
                  	<label for="firstname" class="control-label">FROM</label>
                      <input type="date" class="form-control" name="FROM" required>
                  	</div>
                </div>
                <div class="col-sm-5">
          		  <div class="form-group">
                  	<label for="firstname" class="control-label">TO</label>
                      <input type="date" class="form-control" name="TO" required>
                    
                  	</div>
                </div>
                <div class="col-sm-2">
          		  <div class="form-group">
                  <label for="firstname" class="control-label">SEARCH</label>
                   <button type="submit" name="FROMTO" class="form-control btn btn-primary">SUBMIT</button>
                  	</div>
                </div>
                
              
                </form>
			 
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>

        </div>
        <!-- /.card -->
        </div>
        </div>
		  
		  
		  <div class="col-md-12">
			 <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">SEARCH NAME, MONTH & YEAR</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div> 

          <!-- /.card-header -->
          <div class="card-body">
            <div class="rowa">
			
             <form class="form-horizontal" method="POST" action="getpass_logs_filter_name_monthyear.php" enctype="multipart/form-data" autocomplete="off">
          		  <div class="row">
                <div class="col-sm-4">
          		  <div class="form-group">
                  	<label for="firstname" class="control-label">NAME</label>
                    <select class="form-control" name="RFID" required> 
                        <option value="" selected>- SELECT-</option>
                        <?php
                          $sql = "SELECT DISTINCT CONCAT(LASTNAME,', ',FIRSTNAME,' ',MI) AS FULLNAME,RFID FROM tbl_member ORDER BY LASTNAME ASC";
                          $query = $conn->query($sql);
                          while($aco = $query->fetch_assoc()){
                            echo "
                              <option value='".$aco['RFID']."'>".$aco['FULLNAME']."</option>
                            ";
                          }
                        ?>
                      </select>
                  	</div>
                </div>
               
                <div class="col-sm-4">
          		  <div class="form-group">
                  	<label for="firstname" class="control-label">MONTH</label>
                      <select class="form-control txtDate" name="MONTH" required>
                      <option value="" selected>- select -</option>
                      <option value="01">January</option>
                      <option value="02">February</option>
                      <option value="03">March</option>
                      <option value="04">April</option>
                      <option value="05">May</option>
                      <option value="06">June</option>
                      <option value="07">July</option>
                      <option value="08">August</option>
                      <option value="09">September</option>
                      <option value="10">October</option>
                      <option value="11">November</option>
                      <option value="12">December</option>   
                      </select>
                  	</div>
                </div>
                <div class="col-sm-2">
          		  <div class="form-group">
                  	<label for="firstname" class="control-label">YEAR</label>
                    	<select class="form-control" name="YEAR" required>
                        <?php
                          foreach(range(1990, (int)date("Y")) as $year) {
                            echo "<option selected value='".$year."'>".$year."</option>\n\r";
                        }
                        ?>
                      </select>
                  	</div>
                </div>
                <div class="col-sm-2">
          		  <div class="form-group">
                  <label for="firstname" class="control-label">SEARCH</label>
                   <button type="submit" class="btn-block btn btn-primary" name="STUDMONTHYEAR">SUBMIT</button>
                  	</div>
                </div>
                
                </div><!---end of row--->
                </form>
			 
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
        </div>
        <!-- /.card -->
          </div>                       

          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include "includes/footer.php";?>
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

</body>
</html>
