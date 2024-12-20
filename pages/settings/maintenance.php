<?php
    include '../../includes/header.php';
    include '../../includes/scripts.php';
?>
<?php
  include '../connection.php';

  //Dashbaord/login logo
  $_SESSION["id"] = 1; // Fill session id with user's id to get user's data like name and image name
  $sessionId = $_SESSION["id"];
  $user = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM dashboard WHERE id = $sessionId"));

?>

<style media="screen">
  .upload{
    width: 140px;
    position: relative;
    margin: auto;
    text-align: center;
  }
  .upload img{
    border-radius: 50%;
    border: 8px solid #DCDCDC;
    width: 125px;
    height: 125px;
  }
  .upload .rightRound{
    position: absolute;
    bottom: 0;
    right: 0;
    background: #00B4FF;
    width: 32px;
    height: 32px;
    line-height: 33px;
    text-align: center;
    border-radius: 50%;
    overflow: hidden;
    cursor: pointer;
  }
  .upload .leftRound{
    position: absolute;
    bottom: 0;
    left: 0;
    background: red;
    width: 32px;
    height: 32px;
    line-height: 33px;
    text-align: center;
    border-radius: 50%;
    overflow: hidden;
    cursor: pointer;
  }
  .upload .fa{
    color: white;
  }
  .upload input{
    position: absolute;
    transform: scale(2);
    opacity: 0;
  }
  .upload input::-webkit-file-upload-button, .upload input[type=submit]{
    cursor: pointer;
  }
</style>

<!-- <div class="row pb-5 g-2">
  <div class="">
    <div class="input-group">
      <div class="card bg-light my-3" style="width: 100%;">
        <div class="card-body">
          <div class="d-flex">
            <div class="flex-shrink-0">
              <input type="hidden" name="id" value="<?php echo $row['id']?>"/>

              <form class="form" id = "form" action="function.php" enctype="multipart/form-data" method="post">
                <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                <div class="upload">
                  <img src="img/<?php echo basename($user['image'])  ?>" id = "image">

                  <div class="bg-success rightRound" id = "upload">
                    <input type="file" name="fileImg" id = "fileImg" accept=".jpg, .jpeg, .png">
                    <i class = "fa fa-camera text-white"></i>
                  </div>

                  <div class="leftRound" id = "cancel" style = "display: none;">
                    <i class = "fa fa-times text-white"></i>
                  </div>
                  <div class="rightRound" id = "confirm" style = "display: none;">
                    <input type="submit">
                    <i class = "fa fa-check" ></i>
                  </div>
                </div>
              </form>

              <script type="text/javascript">
                document.getElementById("fileImg").onchange = function(){
                  document.getElementById("image").src = URL.createObjectURL(fileImg.files[0]); // Preview new image

                  document.getElementById("cancel").style.display = "block";
                  document.getElementById("confirm").style.display = "block";

                  document.getElementById("upload").style.display = "none";
                }

                var userImage = document.getElementById('image').src;
                document.getElementById("cancel").onclick = function(){
                  document.getElementById("image").src = userImage; // Back to previous image

                  document.getElementById("cancel").style.display = "none";
                  document.getElementById("confirm").style.display = "none";

                  document.getElementById("upload").style.display = "block";
                }
              </script>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<br>
<hr>
<br> -->

<div class="row pb-5 g-2">
<div class="col-md-4">
    <!-- Certificate Left logo -->
    <div class="card" style="background-color: #4CAF50;">
      <div class="card-body">
      <label class="mt-2 mb-3 text-light">Logo for Dashboards and etc.</label>
      <div class="flex-shrink-0">
              <input type="hidden" name="id" value="<?php echo $row['id']?>"/>

              <form class="form" id = "form" action="function.php" enctype="multipart/form-data" method="post">
                <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                <div class="upload">
                  <img class="bg-light" src="img/<?php echo basename($user['image'])  ?>" id = "image">

                  <div class="bg-light rightRound" id = "upload">
                    <input type="file" name="fileImg" id = "fileImg" accept=".jpg, .jpeg, .png">
                    <i class = "fa fa-camera text-success"></i>
                  </div>

                  <div class="leftRound" id = "cancel" style = "display: none;">
                    <i class = "fa fa-times text-success"></i>
                  </div>
                  <div class="rightRound" id = "confirm" style = "display: none;">
                    <input type="submit">
                    <i class = "fa fa-check" ></i>
                  </div>
                </div>
              </form>

              <script type="text/javascript">
                document.getElementById("fileImg").onchange = function(){
                  document.getElementById("image").src = URL.createObjectURL(fileImg.files[0]); // Preview new image

                  document.getElementById("cancel").style.display = "block";
                  document.getElementById("confirm").style.display = "block";

                  document.getElementById("upload").style.display = "none";
                }

                var userImage = document.getElementById('image').src;
                document.getElementById("cancel").onclick = function(){
                  document.getElementById("image").src = userImage; // Back to previous image

                  document.getElementById("cancel").style.display = "none";
                  document.getElementById("confirm").style.display = "none";

                  document.getElementById("upload").style.display = "block";
                }
              </script>
            </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <!-- Certificate Left logo -->
    <div class="card">
      <div class="card-body">
      <label class="mt-2 mb-3">Certificate Logo Left Side</label>
        <form class="form" id="form" action="function.php" enctype="multipart/form-data" method="post">
          <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
          <div class="upload">
            <img src="img/<?php echo basename($user['certL'])  ?>" id="certL" class="img-fluid rounded-circle">
            <div class="rightRound bg-success" id="uploadL">
              <input type="file" name="certLogoLeft" id="certLogoLeft" accept=".jpg, .jpeg, .png">
              <i class="fa fa-camera text-white"></i>
            </div>
            <div class="leftRound" id="cancelL" style="display: none;">
              <i class="fa fa-times"></i>
            </div>
            <div class="rightRound" id="confirmL" style="display: none;">
              <input type="submit">
              <i class="fa fa-check"></i>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <!-- Certificate Right logo -->
    <div class="card">
      <div class="card-body">
        <label class="mt-2 mb-3">Certificate Logo Right Side</label>
        <form class="form" id="form" action="function.php" enctype="multipart/form-data" method="post">
          <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
          <div class="upload">
            <img src="img/<?php echo basename($user['certR'])  ?>" id="certR" class="img-fluid rounded-circle">
            <div class="rightRound bg-success" id="uploadR">
              <input type="file" name="certLogoRight" id="certLogoRight" accept=".jpg, .jpeg, .png">
              <i class="fa fa-camera text-white"></i>
            </div>
            <div class="leftRound" id="cancelR" style="display: none;">
              <i class="fa fa-times"></i>
            </div>
            <div class="rightRound" id="confirmR" style="display: none;">
              <input type="submit">
              <i class="fa fa-check"></i>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<style media="screen">
  .upload {
    width: 140px;
    position: relative;
    margin: auto;
    text-align: center;
  }
  .upload img {
    border-radius: 50%;
    border: 8px solid #DCDCDC;
    width: 125px;
    height: 125px;
  }
  .upload .rightRound {
    position: absolute;
    bottom: 0;
    right: 0;
    background: #00B4FF;
    width: 32px;
    height: 32px;
    line-height: 33px;
    text-align: center;
    border-radius: 50%;
    overflow: hidden;
    cursor: pointer;
  }
  .upload .leftRound {
    position: absolute;
    bottom: 0;
    left: 0;
    background: red;
    width: 32px;
    height: 32px;
    line-height: 33px;
    text-align: center;
    border-radius: 50%;
    overflow: hidden;
    cursor: pointer;
  }
  .upload .fa {
    color: white;
  }
  .upload input {
    position: absolute;
    transform: scale(2);
    opacity: 0;
  }
  .upload input::-webkit-file-upload-button, .upload input[type=submit] {
    cursor: pointer;
  }
</style>

<!-- Script for certL -->
<script type="text/javascript">
  document.getElementById("certLogoLeft").onchange = function(){
    document.getElementById("certL").src = URL.createObjectURL(certLogoLeft.files[0]); // Preview new image

    document.getElementById("cancelL").style.display = "block";
    document.getElementById("confirmL").style.display = "block";

    document.getElementById("uploadL").style.display = "none";
  }

  var userImage = document.getElementById('certL').src;
  document.getElementById("cancelL").onclick = function(){
    document.getElementById("certL").src = userImage; // Back to previous image

    document.getElementById("cancelL").style.display = "none";
    document.getElementById("confirmL").style.display = "none";

    document.getElementById("uploadL").style.display = "block";
  }
</script>

<!-- CertR -->
<script type="text/javascript">
  document.getElementById("certLogoRight").onchange = function(){
    document.getElementById("certR").src = URL.createObjectURL(certLogoRight.files[0]); // Preview new image

    document.getElementById("cancelR").style.display = "block";
    document.getElementById("confirmR").style.display = "block";

    document.getElementById("uploadR").style.display = "none";
  }

  var userImage = document.getElementById('certR').src;
  document.getElementById("cancelR").onclick = function(){
    document.getElementById("certR").src = userImage; // Back to previous image

    document.getElementById("cancelR").style.display = "none";
    document.getElementById("confirmR").style.display = "none";

    document.getElementById("uploadR").style.display = "block";
  }
</script>





<!-- Script for certL -->
<script type="text/javascript">
  document.getElementById("certLogoLeft").onchange = function(){
    document.getElementById("certL").src = URL.createObjectURL(certLogoLeft.files[0]); // Preview new image

    document.getElementById("cancelL").style.display = "block";
    document.getElementById("confirmL").style.display = "block";

    document.getElementById("uploadL").style.display = "none";
  }

  var userImage = document.getElementById('certL').src;
  document.getElementById("cancelL").onclick = function(){
    document.getElementById("certL").src = userImage; // Back to previous image

    document.getElementById("cancelL").style.display = "none";
    document.getElementById("confirmL").style.display = "none";

    document.getElementById("uploadL").style.display = "block";
  }
</script>

<!-- CertR -->
<script type="text/javascript">
  document.getElementById("certLogoRight").onchange = function(){
    document.getElementById("certR").src = URL.createObjectURL(certLogoRight.files[0]); // Preview new image

    document.getElementById("cancelR").style.display = "block";
    document.getElementById("confirmR").style.display = "block";

    document.getElementById("uploadR").style.display = "none";
  }

  var userImage = document.getElementById('certR').src;
  document.getElementById("cancelR").onclick = function(){
    document.getElementById("certR").src = userImage; // Back to previous image

    document.getElementById("cancelR").style.display = "none";
    document.getElementById("confirmR").style.display = "none";

    document.getElementById("uploadR").style.display = "block";
  }
</script>