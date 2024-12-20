<!-- DELETE POP UP FORM (Bootstrap MODAL) -->
<div class="modal fade" id="Delete_Staff<?php echo $staff['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </button>
            </div>

            <form action="function.php" method="POST">

              <input type="hidden" name="id" value="<?php echo $staff['id']?>"/>
              <input type="hidden" name="firstname" value="<?php echo $staff['firstname']?>"/>
              <input type="hidden" name="lastname" value="<?php echo $staff['lastname']?>"/>
              <input type="hidden" name="session_role" value="<?php echo $_SESSION['role']?>"/>

              <div class="modal-body text-center" style="margin-top: -20px">
                <i class="bi bi-exclamation-circle fa-8x" style="color: #facea8"></i>

                <h1 style="font-size: 25px; margin-top: -10px; margin-bottom: 30px"> Are you sure you want to delete this record?</h1>
                <p><b>NAME: <u><?php echo $staff['firstname'];?> <?php echo $staff['lastname']; ?></u></b></p>
                <small> Warning: This action is final and cannot be undone! </small>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" name="delete_staff" class="btn btn-danger">Delete</button>
              </div>
            </form>

        </div>
    </div>
</div>

