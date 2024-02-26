<div id="Receipt<?=$ID;?>" class="modal fade modal-fullscreen">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
             
			<div class="modal-header">
            <h5 class="modal-title"><i class="fa fa-sharp fa-solid fa-file-certificate"></i> GETPASS RECEIPT </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
			</div>
			
            <div class="modal-body">
                <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="cert_proceed_pdf.php?q=<?=urlencode(base64_encode($ID));?>" allowfullscreen></iframe>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-teal btn-sm" data-dismiss="modal"> <span class="fa fa-times"></span> CLOSE</button>
                <!-- <button type="submit" name="form-print-cert" class="btn bg-navy btn-sm"><i class="fa fa-sharp fa-solid fa-file-certificate"></i> PROCEED</button> -->
            </div>
        </div>
    </div>
</div>


