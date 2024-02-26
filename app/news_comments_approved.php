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
            <h1>Approved Post/News Comments</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Comments</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
		  
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
		  
            <div class="card">
              <div class="card-header">
              <h3 class="card-title"> 
              <a href="#add" data-toggle="modal" class="btn bg-olive btn-sm"><i class="fa fa-plus"></i> POST NEWS</a>
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
                <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped text-">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>STATUS</th>
                    <th class="text-nowrap">NAME</th>
                    <th class="text-nowrap">EMAIL</th>
                    <th class="text-nowrap">COMMENT</th>
                    <th class="text-nowrap">COMMENT DATE</th>
                    <th class="text-nowrap">POST IMAGE</th>
                    <th class="text-nowrap">POST TITLE</th>
                    
                  </tr>
                  </thead>
                  <tbody>
				        	<?php
                    $sql = "SELECT *,tn.ID as newsID, tc.ID as commID FROM tbl_news tn INNER JOIN tbl_comments tc ON tn.ID=tc.NEWS_ID WHERE STATUS=1 ORDER BY tn.POSTING_DATE ASC";
                    $query = $conn->query($sql);
				        	  $cnt=1;
                    while($row = $query->fetch_assoc()){
                        $comments = "SELECT * FROM tbl_comments WHERE NEWS_ID='".$row['newsID']."'";
                        $comments_run =$conn->query($comments);
                      ?>
                        <tr>
                          <td><?=$cnt; ?></td>
                          <td>
                            <div class="btn-group">
                            <button class="btn bg-teal btn-sm">APPROVED</button>
                            <button data-id="<?=$row['commID'];?>" onclick="confirmDeleteComment(this);" class="btn bg-maroon btn-sm delete"><i class="fa-solid fa fa-trash"></i> </button>
                           </div>
                          </td>
                          <td><?=$row['NAME']; ?></td>
                          <td><?=$row['EMAIL']; ?></td>
                          <td><?=$row['COMMENT']; ?></td>
                          <td><?=$row['COMMENT_DATE']; ?></td>
                          <td>
                          <?php 
                            if($row['POST_IMAGE']==""){
                            ?>
                            <img src="../images/no-image-icon.png" class="elevation-1" width="50" height="50" alt="User Image">
                            <?php }else{ ?>
                              <a href="data:image/jpg;charset=utf8;base64,<?=base64_encode($row['POST_IMAGE']); ?>" data-toggle="lightbox" data-title="<i class='fa fa-newspaper'></i> <?=$row['POST_TITLE'];?>" data-gallery="gallery" allowfullscreen="true">
                              <img src="data:image/jpg;charset=utf8;base64,<?=base64_encode($row['POST_IMAGE']); ?>" width="50" height="50" class="img-fluid img-thumbnaill elevation-1">
                              </a>
                            <?php }?>
                          </td>
                          <td class="text-wrap"><?=$row['POST_TITLE']; ?></td>
                          <!-- <td align="right">
                            <div class="btn-group">
                            <button data-id="<?=$row['newsID'];?>" onclick="confirmEdit(this);" data-title="<?=$row['POST_TITLE']; ?>" data-details="<?=$row['POST_DETAILS']; ?>" data-active="<?=$row['IS_ACTIVE'];?>" class="btn bg-teal btn-sm edit"><i class="fa-solid fa fa-edit"></i> </button>
                            <button data-id="<?=$row['newsID'];?>" onclick="confirmDelete(this);" data-title="<?=$row['POST_TITLE']; ?>" class="btn bg-maroon btn-sm delete"><i class="fa-solid fa fa-trash"></i> </button>
                            </div>
                          </td> -->
                        </tr>
                      <?php
					        $cnt++;
                    }
                  ?>
                  </tbody>
                 
                </table>
                </div>
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
  <?php include "includes/news_modal.php";?>
 <?php include "includes/footer.php";?>

<script>
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>

<script>
      function Newspreview() {
          newsframe.src = URL.createObjectURL(event.target.files[0]);
      }
      function NewsclearImage() {
          document.getElementById('NewsformFile').value = null;
          newsframe.src = "";
      }

      function confirmDeleteComment(self) {
          var id = self.getAttribute("data-id");
          document.getElementById("form-delete-comments").id.value = id;
          $("#myModalDeleteComment").modal("show");
      }

  </script>
</body>
</html>

