
<!-- Add -->
<div class="modal fade " id="newstaff">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          	<div class="modal-header">
			  <h4 class="modal-title"><span class="fa fa-plus"></span> REGISTRATION FORM</h4>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="staff_add.php" onSubmit="return valid();" id="form_add_staff">
          		<div class="row">
				  
					<div class="col-sm-5">
						<div class="form-group">
						<label for="firstname" class="control-label">FIRST NAME</label>
							<input type="text" class="form-control text-uppercase" name="FIRSTNAME" placeholder="FIRST NAME" required>
						</div>
					</div>
				
						<div class="col-sm-2">
						<div class="form-group">
						<label for="firstname" class="control-label">M.I</label>
							<input type="text" class="form-control text-uppercase" maxlength="1" name="MI" placeholder="M.I">
						</div>
					</div>
						<div class="col-sm-5">
						<div class="form-group">
						<label for="firstname" class="control-label">LAST NAME</label>
							<input type="text" class="form-control text-uppercase" name="LASTNAME" placeholder="LAST NAME" required>
						</div>
					</div>
				<div class="col-sm-12">
				<div class="form-group">
				<label for="address" class="control-label">EMAIL</label>
					<input type="email" class="form-control" name="EMAIL" id="CheckEmail" onBlur="userCheckEmailAvailability()"  placeholder="EMAIL" required>
					<span class="user-availability-status1"></span>
					</div>
				</div>

                			
              <div class="col-sm-12">
				 <div class="form-group">
                <label for="address" class="control-label">PASSWORD</label>
                <input type="password" class="form-control" id="Password" name="PASSWORD" placeholder="PASSWORD" required>
                  	</div>
                </div>

                <div class="col-sm-12">
			          <div class="form-group">
                <label for="address" class="control-label">RETYPE PASSWORD</label>
                <input type="password" class="form-control" id="ConfirmPassword" name="PASSWORD" placeholder="RETYPE PASSWORD" required>
              </div>
            </div>

                <div class="col-sm-12">
                  <div class="form-group">
                    <span id="msg"></span>  
                  </div>
                </div>


				
                </div><!----row-->
			</form>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn bg-teal btn-sm pull-left" data-dismiss="modal"><i class="fa fa-times"></i> CLOSE</button>
            	<button type="submit" id="submit" form="form_add_staff" name="form_add_staff" class="btn bg-navy btn-sm"><i class="fa fa-solid fa-trash-can-xmark"></i> SUBMIT</button>
          	</div>
        </div>
    </div>
</div>

<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
             
			<div class="modal-header">
            <h5 class="modal-title"><i class="fa fa-solid fa-trash-can-xmark"></i> CONFIRM</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
			</div>
 
            <div class="modal-body">
                <p> Are you sure you want to delete this user?</p>
                <form method="POST" action="staff_delete.php" id="form-delete-user">
                    <input type="hidden" name="id">
					<div class="col-sm-12">
					<div class="form-group">
						<label for="address" class="control-label">FULL NAME</label>
						<input type="text" class="form-control" name="name" placeholder="NAME" required readonly>
						</div>
					</div>
                </form>
            </div>
 
            <div class="modal-footer">
                <button type="button" class="btn bg-teal btn-sm" data-dismiss="modal"> <span class="fa fa-times"></span> CANCEL</button>
                <button type="submit" form="form-delete-user" name="form-delete-user" class="btn bg-navy btn-sm"><i class="fa fa-solid fa-trash-can-xmark"></i> CONFIRM</button>
            </div>
 
        </div>
    </div>
</div>



<div class="modal fade " id="editstaff">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          	<div class="modal-header">
			  <h4 class="modal-title"><span class="fa fa-plus"></span> UPDATE USER</h4>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="staff_edit.php" onSubmit="return valid();" id="form_edit_staff">
          		<div class="row">
				  <input type="hidden" name="id">
					<div class="col-sm-5">
						<div class="form-group">
						<label for="firstname" class="control-label">FIRST NAME</label>
							<input type="text" class="form-control text-uppercase" name="FIRSTNAME" placeholder="FIRST NAME" required>
						</div>
					</div>
				
						<div class="col-sm-2">
						<div class="form-group">
						<label for="firstname" class="control-label">M.I</label>
							<input type="text" class="form-control text-uppercase" maxlength="1" name="MI" placeholder="M.I">
						</div>
					</div>
						<div class="col-sm-5">
						<div class="form-group">
						<label for="firstname" class="control-label">LAST NAME</label>
							<input type="text" class="form-control text-uppercase" name="LASTNAME" placeholder="LAST NAME" required>
						</div>
					</div>
				<div class="col-sm-12">
				<div class="form-group">
				<label for="address" class="control-label">EMAIL</label>
					<input type="email" class="form-control" name="EMAIL" id="CheckEmail" onBlur="userCheckEmailAvailability()"  placeholder="EMAIL" required>
					</div>
				</div>

                			
              <div class="col-sm-12">
				 <div class="form-group">
                <label for="address" class="control-label">PASSWORD</label>
                <input type="text" class="form-control" name="PASSWORD" placeholder="PASSWORD" required>
                  	</div>
				</div>
		
                </div><!----row-->
			</form>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn bg-teal btn-sm pull-left" data-dismiss="modal"><i class="fa fa-times"></i> CLOSE</button>
            	<button type="submit" form="form_edit_staff" name="form_edit_staff" class="btn bg-navy btn-sm"><i class="fa fa-solid fa-trash-can-xmark"></i> SUBMIT</button>
          	</div>
        </div>
    </div>
</div>