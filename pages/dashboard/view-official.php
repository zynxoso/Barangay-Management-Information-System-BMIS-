<!-- View Staff Modal -->
<div class="modal fade" id="View_Official<?php echo $row['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog modal-md">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">View mode</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <div class="row g-2">
               <div class="col">
                  <label><b> Last Name </b></label>
                  <p class="form-control"><?php echo $row['lastname']?></p>
               </div>
               <div class="col">
                  <label><b> First Name </b></label>
                  <p class="form-control"><?php echo $row['firstname']?></p>
               </div>
               <div class="col">
                  <label><b> Middle Name </b></label>
                  <p class="form-control"><?php echo $row['middlename']?></p>
               </div>
            </div>
            <div class="mb-2">
               <label><b> Address </b></label>
               <p class="form-control">
                  <?php echo $row['address']; ?>
               </p>
            </div>
            <div class="row g-2 mb-2">
               <div class="col">
                  <label><b> Email Address </b></label>
                  <p class="form-control">
                     <?php echo $row['email']; ?>
                  </p>
               </div>
               <div class="col-4">
                  <label><b> Contact No. </b></label>
                  <p class="form-control">
                     <?php echo $row['contactNo']; ?>
                  </p>
               </div>
            </div>
            <div class="row g-2 mb-2">
               <div class="col">
                  <label><b> Position </b></label>
                  <p class="form-control">
                     <?php echo $row['position']; ?>
                  </p>
               </div>
               <div class="col-4">
                  <label><b> Gender </b></label>
                  <p class="form-control">
                     <?php echo $row['gender']; ?>
                  </p>
               </div>
            </div>
            <!-- Start/End Date -->
            <div class="row g-2 mb-2">
               <div class="col-md-6">
                  <label class="form-label"><b> Start Date </b></label>
                  <p class="form-control" type="date" name="start_date" id="" required>
                     <?php echo $row['start_date']; ?>
                  </p>
               </div>
               <div class="col">
                  <label class="form-label"><b> End Date </b></label>
                  <p class="form-control" type="date" name="end_date" id="" requried>
                     <?php echo $row['end_date']; ?>
                  </p>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>