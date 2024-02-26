
<div id="myModal<?=$row['ID'];?>" class="modal fade">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
             
			<div class="modal-header">
            <h5 class="modal-title"><i class="fa fa-solid fa-trash-can-xmark"></i> CONFIRM</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
			</div>
 
            <div class="modal-body">
                <form method="POST" id="form-cert-user">
				<input type="hidden" name="id">
				<div class="row">
				<div class="embed-responsive embed-responsive-16by9">
				  <iframe class="embed-responsive-item" src="request_certificates.php?q=<?=$row['ID'];?>" allowfullscreen></iframe>
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


