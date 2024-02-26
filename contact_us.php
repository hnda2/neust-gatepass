  <!-- Modal -->
	 <div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"> <i class="fa-solid fa-location-dot fa-beat-fade text-danger"></i> <?=$SYS_ADDRESS;?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

			  <!-- Default box -->
			  <div class="card">
				<div class="card-body row">
				  <div class="col-8">
					<div class="embed-responsive embed-responsive-16by9">
					  <iframe class="embed-responsive-item" src="https://maps.google.com/maps?q=<?=$SYS_ADDRESS;?>
					&t=&z=13&ie=UTF8&iwloc=&output=embed" allowfullscreen></iframe>
					</div>
				  </div>
				  <div class="col-4">
					<ul class="list-group">
					  <li class="list-group-item bg-teal" aria-current="true">Emergency Contact</li>
					  <li class="list-group-item"><?=$SYS_EMAIL;?></li>
            <?php
            $contact_query ="SELECT * FROM tbl_contact";
            $contact_query_run=$conn->query($contact_query);
            if($contact_query_run->num_rows>0){
                foreach ($contact_query_run as $key => $value_contact) {
                  $PHONE_NUMBER =$value_contact['PHONE_NUMBER'];
                  $PHONE_NETWORK =$value_contact['PHONE_NETWORK'];
                  echo '<li class="list-group-item"> <i class="fas fa-light fa-phone-office"></i> '.$PHONE_NUMBER.'-'.$PHONE_NETWORK.'</li>';
                }
            }else{
                  echo ' <li class="list-group-item">No Contact</li>';
            }
            ?>
					</ul>
				  </div>
				</div>
			  </div>


            </div>
			<!--
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn bg-teal" data-dismiss="modal">Close</button>
            </div>--->
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
	  
	  
	    <!-- Modal -->
	 <div class="modal fade" id="about">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"> <span class="fa fa-info-circle"></span> About Us</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
				 <div class="col-12">
					<p>
            
          <?=$SYS_ABOUT;?>
					
					</p>
				  </div>
            </div>
			<!--
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn bg-teal" data-dismiss="modal">Close</button>
            </div>--->
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->