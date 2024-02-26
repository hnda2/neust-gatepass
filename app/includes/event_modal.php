<!---FOR ADD---->
<div class="modal fade" id="add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          	<div class="modal-header">
			  <h4 class="modal-title"><span class="fa fa-plus"></span> NEW EVENT/ANNOUCEMENT</h4>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="events_add.php" enctype="multipart/form-data">
          		  <div class="row">
                    <div class="col-sm-12">
                       <div class="form-group">
                             <label for="lastname" class="control-label">TITLE</label>
                            <input type="text" class="form-control"  name="title" placeholder="Title" required>
                        </div>
                    </div>
                    <div class="col-sm-12">
                       <div class="form-group">
                             <label for="lastname" class="control-label">DESCRIPTION</label>
                            <input type="text" class="form-control" name="description" placeholder="Description" required>
                        </div>
                    </div>
                    <div class="col-sm-12">
                       <div class="form-group">
                             <label for="lastname" class="control-label">START DATETIME</label>
                            <input type="datetime-local" class="form-control"  name="start_datetime" required>
                        </div>
                    </div>

                    <div class="col-sm-12">
                       <div class="form-group">
                             <label for="lastname" class="control-label">END DATETIME</label>
                             <input type="datetime-local" class="form-control" name="end_datetime" required>
                        </div>
                    </div>
                </div><!----row-->
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn bg-teal btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> CLOSE</button>
            	<button type="submit" class="btn bg-navy btn-sm" name="submit"><i class="fas fa-sharp fa-solid fa-floppy-disk-circle-arrow-right"></i> SUBMIT</button>
            	</form>
          	</div>
        </div>
    </div>
</div>
<!---FOR EDIT---->
<div class="modal fade" id="edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          	<div class="modal-header">
			  <h4 class="modal-title"><span class="fa fa-edit"></span> EDIT EVENT/ANNOUCEMENT </h4>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="events_edit.php" enctype="multipart/form-data">
          		  <div class="row">
                    <div class="col-sm-12">
                       <div class="form-group">
                             <label for="lastname" class="control-label">TITLE</label>
                             <input type="hidden" class="form-control id" name="id" required>
                            <input type="text" class="form-control" id="edit_title" name="title" required>
                        </div>
                    </div>
                    <div class="col-sm-12">
                       <div class="form-group">
                             <label for="lastname" class="control-label">DESCRIPTION</label>
                            <input type="text" class="form-control" id="edit_description" name="description" required>
                        </div>
                    </div>
                    <div class="col-sm-12">
                       <div class="form-group">
                             <label for="lastname" class="control-label">START DATETIME</label>
                            <input type="datetime-local" class="form-control" id="edit_date" name="start_datetime" required>
                        </div>
                    </div>

                    <div class="col-sm-12">
                       <div class="form-group">
                             <label for="lastname" class="control-label">END DATETIME</label>
                             <input type="datetime-local" class="form-control" id="edit_time" name="end_datetime" required>
                        </div>
                    </div>

                </div><!----row-->
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn bg-teal btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> CLOSE</button>
            	<button type="submit" class="btn bg-navy btn-sm" name="submit"><i class="fas fa-sharp fa-solid fa-floppy-disk-circle-arrow-right"></i> SUBMIT</button>
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
                <form action="events_delete.php" method="POST">
                 <input type="hidden" class="id" name="ID">
                 Event Title : <span class="del_title"></span><br>
                 Description : <span class="del_description"></span><br>
                 Date of Event : <span class="del_date"></span><br>
                 Time of Event : <span class="del_time"></span>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-teal btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> NO</button>
                <button type="submit" name="submit" class="btn bg-navy btn-sm"><i class="fas fa-sharp fa-solid fa-floppy-disk-circle-arrow-right"></i>  YES</button>
            </div>
            </form>
        </div>
    </div>
</div>


