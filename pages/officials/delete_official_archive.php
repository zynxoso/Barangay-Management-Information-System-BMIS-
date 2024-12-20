<!-- DELETE POP UP FORM (Bootstrap MODAL) -->
<div class="modal fade" id="Delete_Official_Archive<?php echo $row['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </button>
            </div>

            <form action="function.php" method="POST">

              <input type="hidden" name="id" value="<?php echo $row['id']?>"/>

              <div class="modal-body text-center" style="margin-top: -20px">
                <i class="bi bi-exclamation-circle fa-8x" style="color: #facea8"></i>

                <h1 style="font-size: 25px; margin-top: -10px; margin-bottom: 30px"> Are you sure you want to delete this record?</h1>
                <p><b>NAME: <u><?php echo $row['firstname'];?> <?php echo $row['lastname']; ?></u></b></p>
                <small> Warning: This action is final and cannot be undone! </small>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" name="delete_official_archive" class="btn btn-danger">Delete</button>
              </div>
            </form>

        </div>
    </div>
</div>

<!-- DELETE POP UP FORM -->
<div class="modal fade" id="Delete_Official_Archive<?php echo $row['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </button>
         </div>
         <form action="function.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']?>"/>
            <div class="modal-body text-center" style="margin-top: -20px">
               <i class="bi bi-exclamation-circle fa-8x" style="color: #facea8"></i>
               <h1 style="font-size: 25px; margin-top: -10px; margin-bottom: 30px"> Are you sure you want to delete this record?</h1>
               <p><b>NAME: <u><?php echo $row['firstname'];?> <?php echo $row['lastname']; ?></u></b></p>
               <small> Warning: This action is final and cannot be undone! </small>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
               <button type="submit" name="delete_official_archive" class="btn btn-danger">Delete</button>
            </div>
         </form>
      </div>
   </div>
</div>