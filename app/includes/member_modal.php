
<!-- Add -->
<div class="modal fade " id="addmember">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          	<div class="modal-header">
			  <h4 class="modal-title"><span class="fa fa-plus"></span> REGISTRATION FORM</h4>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>


          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="member_add.php" enctype="multipart/form-data">
          		<div class="row">
				  <div class="col-sm-2">
						<div class="form-group">
						<label for="firstname" class="control-label">RFID NUMBER</label>
							<input type="text" class="form-control text-uppercase" name="RFID" autocomplete="off" placeholder="RFID" required>
						</div>
					</div>
					<div class="col-sm-4">
                	<div class="form-group">
                  	  <label for="address" class="control-label">LICENSE NO</label>
                      <input class="form-control text-uppercase" name="LICENSE_NO" placeholder="LICENSE NO" required>
                  	</div>
                </div>

				<div class="col-sm-4">
						<div class="form-group">
							<label for="address" class="control-label">DL CLASSIFICATION</label>
							<select class="form-control" name="DLCLASSIFICATION" required>
								<option value="<?=$DLCLASSIFICATION;?>" selected><?=$DLCLASSIFICATION;?></option>
								<option>NON-PROFESSIONAL</option>
								<option>PROFESSIONAL</option>
								<option>STUDENT LICENSE</option>
							</select>
							</div>
						</div>

				<div class="col-sm-2">
                	<div class="form-group">
                  	  <label for="address" class="control-label">DL CODE</label>
                      <input class="form-control text-uppercase" name="DLCODE" placeholder="DL CODE" required>
                  	</div>
                </div>

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
					<div class="col-sm-4">
						<div class="form-group">
						<label for="firstname" class="control-label">GENDER </label>
							<select class="form-control select2" name="GENDER" required>
							<option value="<?=$GENDER;?>" selected><?=$GENDER;?></option>
							<option>MALE</option>
							<option>FEMALE</option>
							</select>
						</div>
					</div>

							
						<div class="col-sm-4">
						<div class="form-group">
							<label for="firstname" class="control-label">CIVIL STATUS </label>
							<select class="form-control select2" name="CIVIL_STATUS" required>
							<option value="<?=$CIVIL_STATUS;?>" selected><?=$CIVIL_STATUS;?></option>
								<option>SINGLE</option>
								<option>MARRIED</option>
							</select>
							</div>
						</div>

				<div class="col-sm-4">
				<div class="form-group">
					<label for="address" class="control-label">CONTACT</label>
						<input type="text" class="form-control" maxlength="11" name="CONTACT" placeholder="CONTACT" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
					</div>
				</div>

                <div class="col-sm-6">
          		  <div class="form-group">
                  	<label for="firstname" class="control-label">DATE OF BIRTH</label>
                    	<input type="date"  class="form-control" id="txtDOB" name="DATE_OF_BIRTH" placeholder="DATE OF BIRTH">
                  	</div>
                </div>
                <div class="col-sm-6">
					<div class="form-group">
                    <label for="address" class="control-label">AGE</label>
                      <input type="text" class="form-control" id="age" name="AGE" placeholder="AGE" required readonly>
                      </div>
                  </div>
				<div class="col-sm-6">
                	<div class="form-group">
                  	<label for="address" class="control-label">ADDRESS</label>
                      <input class="form-control text-uppercase" name="ADDRESS" placeholder="ADDRESS" required>
                  	</div>
                </div>
				<div class="col-sm-6">
                	<div class="form-group">
                  	  <label for="address" class="control-label">DESIGNATION</label>
							<select class="form-control select2" name="DESIGNATION" required>
							<option value="<?=$DESIGNATION;?>" selected><?=$DDESIGNATION;?></option>
							<option>STUDENT</option>
							<option>FACULTY</option>
							<option>VISITORS</option>
							</select>
                  	</div>
                </div>

				
				<div class="col-sm-12">
                	<div class="form-group">
                  	  <label for="address" class="control-label">VEHICLE INFORMATON</label>
                     
                  	</div>
                </div>

				<div class="col-sm-6">
                	<div class="form-group">
                  	  <label for="address" class="control-label">VEHICLE PLATE_NO</label>
                      <input class="form-control text-uppercase" name="VPLATE_NO" placeholder="VEHICLE PLATE NO" required>
                  	</div>
                </div>

				<div class="col-sm-6">
                	<div class="form-group">
                  	  <label for="address" class="control-label">VEHICLE MODEL NO</label>
                      <input class="form-control text-uppercase" name="VMODEL_NO" placeholder="VEHICLE MODEL NO" required>
                  	</div>
                </div>
				<div class="col-sm-6">
                	<div class="form-group">
                  	  <label for="address" class="control-label">VEHICLE MADE</label>
                      <input class="form-control text-uppercase" name="VMADE" placeholder="VEHICLE MADE" required>
                  	</div>
                </div>

				<div class="col-sm-6">
                	<div class="form-group">
                  	  <label for="address" class="control-label">VEHICLE CATEGORY</label>
					  <select class="form-control select2" name="VCATEGORY" required>
					  <option value="<?=$VCATEGORY;?>" selected><?=$VCATEGORY;?></option>
							<option>MOTORCYCLE (SINGLE)</option>
							<option>TRICYCLE</option>
							<option>4 WHEELS</option>
							</select>
                  	</div>
                </div>
                </div><!----row-->
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn bg-teal btn-sm pull-left" data-dismiss="modal"><i class="fa fa-times"></i> CLOSE</button>
            	<button type="submit" class="btn bg-navy btn-sm" name="submit"><i class="fa fa-check-square-o"></i> SUBMIT</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
             
			<div class="modal-header">
            <h5 class="modal-title"><span class="fa fa-question-circle"></span>Please Confirm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
			</div>
 
            <div class="modal-body">
                <p> Are you sure you want to delete this record?</p>
                <form method="POST" action="member_delete.php" id="form-delete-user">
                    <input type="hidden" name="id">
                </form>
            </div>
 
            <div class="modal-footer">
                <button type="button" class="btn bg-teal btn-sm" data-dismiss="modal"> <span class="fa fa-times"></span> CANCEL</button>
                <button type="submit" form="form-delete-user" name="form-delete-user" class="btn bg-navy btn-sm"><i class="fa fa-solid fa-trash-can-xmark"></i> CONFIRM</button>
            </div>
 
        </div>
    </div>
</div>



