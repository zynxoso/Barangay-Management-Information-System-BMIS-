<!-- STATUS POP UP FORM -->
<div class="modal fade" id="setActive<?php echo $row['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </button>
         </div>
         <form action="function.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']?>"/>
            <input type="hidden" name="position" value="<?php echo $row['position']?>"/>
            <input type="hidden" name="lastname" value="<?php echo $row['lastname']?>"/>
            <input type="hidden" name="firstname" value="<?php echo $row['firstname']?>"/>
            <input type="hidden" name="middlename" value="<?php echo $row['middlename']?>"/>
            <input type="hidden" name="contactNo" value="<?php echo $row['contactNo']?>"/>
            <input type="hidden" name="start_date" value="<?php echo $row['start_date']?>"/>
            <input type="hidden" name="end_date" value="<?php echo $row['end_date']?>"/>
            <input type="hidden" name="status" value="<?php echo $row['status']?>"/>
            <input type="hidden" name="email" value="<?php echo $row['email']?>"/>
            <input type="hidden" name="gender" value="<?php echo $row['gender']?>"/>
            <div class="modal-body text-center" style="margin-top: -20px">
               <i class="bi bi-exclamation-circle fa-8x" style="color:rgb(255, 37, 37)"></i>
               <h1 style="font-size: 25px; margin-top: -10px; margin-bottom: 30px"> Are you sure you want</h1>
               <p><b><u><?php echo $row['firstname'];?> <?php echo $row['lastname']; ?></u></b> to set as <b>Active</b>?</p>
            </div>
            <div class="modal-footer">
               <button type="submit" name="Active" class="btn-primary btn">Confirm</button>
               <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
            </div>
         </form>
      </div>
   </div>
</div>