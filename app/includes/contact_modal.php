<!---FOR ADD---->
<div class="modal fade" id="add">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
			  <h4 class="modal-title"><span class="fa fa-plus"></span> NEW CONTACT</h4>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="contact_add.php?return=<?php echo basename($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
          		  <div class="row">
                    <div class="col-sm-12">
                       <div class="form-group">
                             <label for="lastname" class="control-label">PROVIDER</label>
                            <input type="text" class="form-control" name="PHONE_NETWORK" placeholder ="PROVIDER" required>
                        </div>
                    </div>
                    <div class="col-sm-12">
                       <div class="form-group">
                             <label for="lastname" class="control-label">MOBILE NO</label>
                            <input type="text" maxlength="11" class="form-control" name="PHONE_NUMBER" placeholder ="MOBILE NO" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  required>
                        </div>
                    </div>

                </div><!----row-->
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn bg-teal btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> CLOSE</button>
            	<button type="submit" class="btn bg-navy btn-sm" name="submit"><i class="fa fa-sharp fa-regular fa-floppy-disk-circle-arrow-right"></i> SUBMIT</button>
            	</form>
          	</div>
        </div>
    </div>
</div>
<!---FOR EDIT---->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
			  <h4 class="modal-title"><span class="fa fa-edit"></span> EDIT CONTACT</h4>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="contact_edit.php?return=<?=basename($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
          		  <div class="row">
                    <div class="col-sm-12">
                       <div class="form-group">
                             <label for="lastname" class="control-label">PROVIDER</label>
                            <input type="hidden" class="form-control id" name="id" required>
                            <input type="text" class="form-control" id="edit_provider" name="PHONE_NETWORK" required>
                        </div>
                    </div>
                    <div class="col-sm-12">
                       <div class="form-group">
                             <label for="lastname" class="control-label">MOBILE NO</label>
                            <input type="text" maxlength="11" class="form-control" id="edit_mobileno" name="PHONE_NUMBER" placeholder ="MOBILE NO" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  required>
                        </div>
                    </div>
                </div><!----row-->
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn bg-teal btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> CLOSE</button>
            	<button type="submit" class="btn bg-navy btn-sm" name="submit"><i class="fa fa-sharp fa-regular fa-floppy-disk-circle-arrow-right"></i> SUBMIT</button>
            	</form>
          	</div>
        </div>
    </div>
</div>
<!---FOR DELETE---->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title"><span class="fa fa-question-circle"></span> Are you sure you want to delete this record?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="contact_delete.php?return=<?php echo basename($_SERVER['PHP_SELF']); ?>" method="POST">
                 <input type="hidden" class="id" name="ID">
                 PROVIDER : <span class="del_provider"></span><br>
                 MOBILE NO : <span class="del_mobileno"></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-teal btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> NO</button>
                <button type="submit" name="submit" class="btn bg-navy btn-sm"><i class="fa fa-sharp fa-regular fa-floppy-disk-circle-arrow-right"></i> YES</button>
            </div>
            </form>
        </div>
    </div>
</div>


