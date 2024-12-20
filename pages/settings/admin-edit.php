
<div class="modal fade" id="admin<?php echo htmlspecialchars($row['id']); ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4CAF50;">
        <h5 class="modal-title text-light" id="staticBackdropLabel">ID selected: <?php echo htmlspecialchars($row['id']); ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <form  method="POST">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>" />

            <div class="mb-3">
              <label class="form-label">Username</label>
              <input class="form-control" type="text" name="username" placeholder="username" autocomplete="off" required value="<?php echo htmlspecialchars($row['username']); ?>" onkeyup="checkUsername(this.value);">
            </div>

            <div class="mb-3">
              <label class="form-label">Password</label>
              <input class="form-control " type="password" name="password" placeholder="password" autocomplete="off" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Confirm Password</label>
              <input class="form-control" type="password" name="confirm_password" placeholder="confirm password" autocomplete="off" required>
            </div>

            <div class="mb-3 form-check">
              <input class="form-check-input" type="checkbox" id="flexCheckDefault<?php echo htmlspecialchars($row['id']); ?>" onclick="togglePasswordVisibility('<?php echo htmlspecialchars($row['id']); ?>');">
              <label class="form-check-label" for="flexCheckDefault<?php echo htmlspecialchars($row['id']); ?>">
                Show Password
              </label>
            </div>

            <div class="modal-footer mt-4">
              <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" name="update_admin" class="btn btn-outline-primary">Update</button>
            </div>
          </form>
        </div>
      </div> 
    </div>
  </div>
</div>

<script>
  function togglePasswordVisibility(modalId) {
    const modal = document.querySelector(`#admin${modalId}`);
    const passwordFields = modal.querySelectorAll('input[type="password"]');
    passwordFields.forEach(field => {
      field.type = field.type === 'password' ? 'text' : 'password';
    });
  }
</script>



<?php

//Update Admin
if(isset($_POST['update_admin']))
{
  $user_id = mysqli_real_escape_string($con, $_POST['id']);
  $username = mysqli_real_escape_string($con, $_POST['username']);
  $password = mysqli_real_escape_string($con, $_POST['password']);
  $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);

  if($password !== $confirm_password)
  {
    echo "<script>
    Swal.fire({
        icon: 'error',
        title: 'Passwords do not match!',
        text: 'Make sure Password and Confirm password match!',
        confirmButtonText: 'OK'
    });
  </script>";
  }else{
    $hashedpassword = password_hash($confirm_password, PASSWORD_DEFAULT);
    $query_run = mysqli_query($con, "UPDATE `tbluser` SET `username` = '$username', `password` = '$hashedpassword' WHERE `id` = '$user_id' ");
    echo "<script>
    Swal.fire({
        icon: 'success',           
        title: 'Successfully Edited', 
        text: 'Your profile has been successfully updated!', 
        confirmButtonText: 'OK'     
    });
  </script>";
  }
} 


?>
