
<div class="modal fade" id="editAbout" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-body">
        <div class="container">
          <form action="function.php" method="POST">
            <div class="row g-2 mb-2">
              <div class="col">
                <input type="hidden" name="id" value="<?php echo $row['id']?>"/>
                <?php 
                  $squery = mysqli_query($con, "SELECT about FROM dashboard");
                  while($row = mysqli_fetch_array($squery))
                  { ?>
                    <label class="form-label" ><b>About:</b></label>
                    <textarea type="text" name="about" class="form-control" maxlength="1000" autocomplete="off" required rows=20><?php echo $row['about']; ?></textarea>
                    <?php
                  }
                ?>
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <input type="submit" name="update_bio" class="button-color btn" value="Update">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>