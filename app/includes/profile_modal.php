<!-- Add -->
<div class="modal fade" id="profile">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
			<h4 class="modal-title"> <i class="fa fa-solid fa-camera-retro"></i> CHANGE PHOTO</h4>
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="profile_update.php?return=<?php echo basename($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
				      <div class="row">
				        <div class="col-md-12">
                <div class="form-group">
                <input type="hidden" class="form-control" name="ID" value="<?=$user['ID']; ?>">
                    <label for="photo" class="control-label">PHOTO:</label>
                    <input class="form-control" name="image" type="file" id="formFile" onchange="preview()"><br>
                   <img id="frame" src="" class="img-fluid " style="border-radius:10px">
                </div>
                </div>
               
               </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn bg-teal btn-sm" data-dismiss="modal"><i class="fa fa-close"></i> CLOSE</button>
            	<button type="submit" class="btn bg-navy btn-sm" name="upload"><i class="fa fa-solid fa-floppy-disk-circle-arrow-right"></i> SUBMIT</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<div class="modal fade" id="logout">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title"><i class="fa fa-sharp fa-solid fa-right-from-bracket"></i> LOGOUT</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <p>Are you sure you want to logout now?</p>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn bg-teal btn-sm" data-dismiss="modal"><i class="fas fa-close"></i> CLOSE</button>
      <a href="logout.php" class="btn bg-navy btn-sm" onclick="updateLogoutTime()"><i class="fa fa-sharp fa-solid fa-right-from-bracket"></i> LOGOUT</a>
    </div>

    </div>
    <!-- /.modal-content -->
  </div>
<!-- /.modal-dialog -->
</div>

<div class="modal fade" id="editProfile">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><span class="fa fa-edit"></span> UPDATE DETAILS</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="profile_update_save.php?return=<?php echo basename($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
          		  <div class="form-group">
                  	<label for="username" class="col-sm-3 control-label">USERNAME</label>

                  	<div class="col-sm-12">
                    	<input type="text" class="form-control" name="USERNAME" value="<?php echo $user['EMAIL']; ?>">
                  	</div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">PASSWORD</label>

                    <div class="col-sm-12"> 
                      <input type="password" class="form-control" name="PASSWORD" value="<?php echo $user['PASSWORD']; ?>">
                    </div>
                </div>
                <div class="form-group">
                  	<label for="firstname" class="col-sm-3 control-label">FIRST NAME</label>

                  	<div class="col-sm-12">
                    	<input type="text" class="form-control" name="FIRSTNAME" value="<?php echo $user['FIRSTNAME']; ?>">
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="lastname" class="col-sm-3 control-label">M.I</label>

                  	<div class="col-sm-12">
                    	<input type="text" class="form-control" name="MI" value="<?php echo $user['MI']; ?>">
                  	</div>
                </div>

                <div class="form-group">
                  	<label for="lastname" class="col-sm-3 control-label">LAST NAME</label>

                  	<div class="col-sm-12">
                    	<input type="text" class="form-control" name="LASTNAME" value="<?php echo $user['LASTNAME']; ?>">
                  	</div>
                </div>
    
                <div class="form-group">
                    <label for="curr_password" class="col-sm-12 control-label">CURRENT PASSWORD <i> input current password to save changes</i></label>

                    <div class="col-sm-12">
                      <input type="password" class="form-control" name="curr_password" placeholder="input current password to save changes" required>
                    </div>
                </div>
				
            </div>
            <div class="modal-footer">
              <button type="button" class="btn bg-teal btn-sm" data-dismiss="modal"><i class="fa fa-close"></i> CLOSE</button>
              <button type="submit" class="btn bg-navy btn-sm" name="save"><i class="fa fa-solid fa-trash-can-xmark"></i> SUBMIT</button>
            </div>
			  </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->  