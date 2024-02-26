<!---FOR ADD---->
<div class="modal fade" id="add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          	<div class="modal-header">
			  <h4 class="modal-title"><span class="fa fa-plus"></span> POST NEWS</h4>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="news_add.php" enctype="multipart/form-data">
          		  <div class="row">
                    <div class="col-sm-12">
                       <div class="form-group">
                             <label for="lastname" class="control-label">TITLE</label>
                            <input type="text" class="form-control" maxlength="40" name="POST_TITLE" placeholder ="POST TITLE" required>
                        </div>
                    </div>
                    <div class="col-sm-12">
                <div class="form-group">
                  	<label for="address" class="control-label">DETAILS</label>
                      <textarea rows="8" class="form-control summernote" name="POST_DETAILS" placeholder="Address"></textarea>
                  	</div>
                </div>

                <div class="col-md-12">
                <div class="form-group">
                    <label for="photo" class="control-label">IMAGE</label>
                    <input class="form-control" name="NEWS_IMAGE" type="file" id="NewsformFile" onchange="Newspreview()" required><br>
                   <img id="newsframe" src="" class="img-fluid " style="border-radius:10px">
                </div>
                </div>

                </div><!----row-->
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            	<button type="submit" class="btn btn-primary btn-sm" name="submit"><i class="fa fa-save"></i> Save</button>
            	</form>
          	</div>
        </div>
    </div>
</div>
<!---FOR EDIT---->
<div class="modal fade" id="myModalEdit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          	<div class="modal-header">
			  <h4 class="modal-title"><span class="fa fa-edit"></span> UPDATE NEWS </h4>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="news_edit.php" id="form-edit-news" enctype="multipart/form-data">
          		  <div class="row">
                    <input type="hidden" class="form-control" name="id" required>
                    <div class="col-sm-12">
                       <div class="form-group">
                             <label for="lastname" class="control-label">TITLE</label>
                             <input type="text" class="form-control" maxlength="40" name="title" required>
                        </div>
                    </div>

                    <div class="col-sm-12">
                       <div class="form-group">
                             <label for="lastname" class="control-label">DETAILS</label>
                             <textarea rows="8" class="form-control summernote" name="details" placeholder="DETAILS" required></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12">
                       <div class="form-group">
                             <label for="lastname" class="control-label">STATUS</label>
                            <select name="active" class="form-control" required>
                                <option id="active" selected></option>
                                <option value="0">NOT ACTIVE</option>
                                <option value="1">ACTIVE</option>
                            </select>
                        </div>
                    </div>

                </div><!----row-->
                </form>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn bg-teal btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> CLOSE</button>
            	<button type="submit" form="form-edit-news" class="btn bg-navy btn-sm" name="form-edit-news"><i class="fa fa-sharp fa-regular fa-floppy-disk-circle-arrow-right"></i> SUBMIT</button>
          	</div>
        </div>
    </div>
</div>
<!---FOR DELETE---->
<div class="modal fade" id="myModalDelete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title"><span class="fa fa-question-circle"></span> Are you sure you want to delete this record?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="news_delete.php" method="POST" id="form-delete-news">
                 <input type="hidden" class="id" name="id">
                 <div class="col-md-12">
                    <div class="form-group">
                        <label for="">TITLE</label>
                        <input type="text" name="title_delete" class="form-control" readonly>
                    </div>
                 </div>
                 </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-teal btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> NO</button>
                <button type="submit" form="form-delete-news" name="form-delete-news" class="btn bg-navy btn-sm"><i class="fa fa-thrash"></i> <i class="fa fa-sharp fa-solid fa-trash-xmark"></i>  YES</button>
            </div>
            
        </div>
    </div>
</div>


<div class="modal fade" id="myModalDeleteComment">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title"><span class="fa fa-question-circle"></span> CONFIRM</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="news_comments_delete.php" method="POST" id="form-delete-comments">
                <input type="hidden" class="id" name="id">
                 <p>Are you sure you want to delete this comment?</p>
                 </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-teal btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> NO</button>
                <button type="submit" form="form-delete-comments" name="form-delete-comments" class="btn bg-navy btn-sm"><i class="fa fa-sharp fa-solid fa-trash-xmark"></i>  YES</button>
            </div>
            
        </div>
    </div>
</div>

<div class="modal fade" id="myModalApprovedComment">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title"><span class="fa fa-question-circle"></span> CONFIRM</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="news_comments_approved_.php" method="POST" id="form-approved-comments">
                 <input type="hidden" class="id" name="id">
                 <span>Are you sure you want to approved this commnent?</span>
                 </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-teal btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> NO</button>
                <button type="submit" form="form-approved-comments" name="form-approved-comments" class="btn bg-navy btn-sm"><i class="fa fa-sharp fa-solid fa-trash-xmark"></i>  YES</button>
            </div>
            
        </div>
    </div>
</div>


<div class="modal fade" id="myModalEditPhoto">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title"><span class="fa fa-edit"></span> UPDATE PICTURE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="news_edit_photo.php" method="POST" id="form-edit_photo-news" enctype="multipart/form-data">
                 <input type="hidden" class="id" name="id">
                 <div class="col-md-12">
                <div class="form-group">
                    <label for="photo" class="control-label">SELECT IMAGE</label>
                    <input class="form-control" name="NEWS_IMAGE_EDIT" type="file" id="editNewsformFile" onchange="editNewspreview()" required><br>
                   <img id="editnewsframe" src="" class="img-fluid " style="border-radius:10px">
                </div>
                </div>
                 </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-teal btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> CLOSE</button>
                <button type="submit" form="form-edit_photo-news" name="form-edit_photo-news" class="btn bg-navy btn-sm"><i class="fa fa-sharp fa-regular fa-floppy-disk-circle-arrow-right"></i>   SUBMIT</button>
            </div>
            
        </div>
    </div>
</div>