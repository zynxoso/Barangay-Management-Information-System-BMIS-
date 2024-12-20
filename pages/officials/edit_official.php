<!-- Edit Official Modal -->
<div class="modal fade" id="Edit_Official<?php echo $row['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Official</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <!-- Form -->
          <form action="function.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $row['id']?>"/>
            <div class="row g-2 mb-2">
              <!-- <div class="text-center d.flex pb-3">
                <img src="../../includes/assets/img/talavera_logo.png" class="w-auto" height="150" alt="Logo">
              </div> -->
              
              <div class="mb-3">
                <label for="current_image" class="form-label">Current Image</label>
                <div>
                    <?php
                        $currentImage = htmlspecialchars($row['image']);
                        if (file_exists($currentImage) && !empty($currentImage)) {
                            echo '<img id="currentImagePreview" src="' . $currentImage . '" style="border-radius: 10px; width: 100px; height: 100px;" alt="Current Official Image" class="img-fluid mx-auto d-block">';
                        } else {
                            echo '<img id="currentImagePreview" src="../settings/img/default.png" style="border-radius: 10px; width: 100px; height: 100px;" alt="Default Image" class="img-fluid mx-auto d-block">';
                        }
                    ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Upload New Image (Optional)</label>
                <input type="file" class="form-control" id="image" name="image" onchange="previewNewImage(event)">
            </div>

            <!-- JavaScript to preview new image before upload -->
            <script>
                function previewNewImage(event) {
                    const reader = new FileReader();
                    reader.onload = function() {
                        const preview = document.getElementById('currentImagePreview');
                        preview.src = reader.result;
                    };
                    reader.readAsDataURL(event.target.files[0]);
                }
            </script>



              <div class="col">
                <label >Last Name</label>
                <input type="text" class="form-control" name="lastname" autocomplete="off" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)" required value="<?php echo strtoupper($row['lastname']); ?>">
              </div>
              <div class="col">
                <label >First Name</label>
                <input type="text" class="form-control" name="firstname"  autocomplete="off" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)" required value="<?php echo strtoupper($row['firstname']); ?>">
              </div>
              <div class="col">
                <label >Middle Name</label>
                <input type="text" class="form-control" name="middlename"  autocomplete="off" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)" required value="<?php echo strtoupper($row['middlename']); ?>">
              </div>
            </div>

            
            <!-- Contact -->
            <div class="row g-2 mb-2">
              <div class="col">
                <label>Contact No.</label>
                <input type="text" class="form-control" name="contactNo" 
                       maxlength="11" 
                       placeholder="09XXXXXXXXX" 
                       pattern="09[0-9]{9}" 
                       title="Please enter a valid Philippine mobile number starting with 09"
                       autocomplete="off" 
                       required 
                       value="<?php echo $row['contactNo']; ?>"
                       oninput="
                         let value = this.value;
                         if (!value.startsWith('09')) {
                           value = '09';
                         }
                         this.value = value.replace(/[^0-9]/g, '').substr(0, 11);
                       ">
              </div>

              <!-- Gender -->
              <div class="col">
                <?php 
                  if($row['gender'] == "MALE")
                  {
                    echo'
                    <label >Gender</label>
                      <select class="form-select" name="gender" autocomplete="off" required>
                        <option value="MALE">'.strtoupper($row['gender']).'</option>
                        <option value="FEMALE">FEMALE</option>
                      </select>
                    ';
                  }

                  elseif($row['gender'] == "FEMALE")
                  {
                    echo'
                    <label>Gender</label>
                      <select class="form-select" name="gender" autocomplete="off" required>
                        <option value="FEMALE">'.strtoupper($row['gender']).'</option>
                        <option value="MALE">MALE</option>
                      </select>
                    ';
                  }
                ?>
              </div>
              <!-- Email Address -->
              <div class="col-md-12">
                <label>Email address</label>
                <input type="email" class="form-control" name="email" placeholder="(Optional)" autocomplete="off" value="<?php echo ($row['email']); ?>">
              </div>
              </div>
              <!-- Positions -->
              <div class="col mb-2">
                <?php 
                  if($row['position'] =="Barangay Captain")
                  {
                    echo '
                    <label>Position</label>
                    <select class="form-select" name="position" autocomplete="off">
                      <option value="Barangay Captain"><b>'.strtoupper($row['position']).'</b></option>
                      <option value="Kagawad(Ordinance)">Kagawad(Ordinance)</option>
                      <option value="Kagawad(Public Safety)">Kagawad(Public Safety)</option>
                      <option value="Kagawad(Tourism)">Kagawad(Tourism)</option>
                      <option value="Kagawad(Budget & Finance)">Kagawad(Budget & Finance)</option>
                      <option value="Kagawad(Agriculture)">Kagawad(Agriculture)</option>
                      <option value="Kagawad(Education)">Kagawad(Education)</option>
                      <option value="Kagawad(Infrastracture)">Kagawad(Infrastracture)</option>
                      <option value="SK Chairman">SK Chairman</option>
                      <option value="Secretary">Secretary</option>
                      <option value="Treasurer">Treasurer</option>
                    </select>
                    ';
                  }
                  if($row['position'] =="Kagawad(Ordinance)")
                  {
                    echo '
                    <label>Position</label>
                    <select class="form-select" name="position" autocomplete="off">
                      <option value="Kagawad(Ordinance)"><b>'.strtoupper($row['position']).'</b></option>
                      <option value="Barangay Captain">Barangay Captain</option>
                      <option value="Kagawad(Public Safety)">Kagawad(Public Safety)</option>
                      <option value="Kagawad(Tourism)">Kagawad(Tourism)</option>
                      <option value="Kagawad(Budget & Finance)">Kagawad(Budget & Finance)</option>
                      <option value="Kagawad(Agriculture)">Kagawad(Agriculture)</option>
                      <option value="Kagawad(Education)">Kagawad(Education)</option>
                      <option value="Kagawad(Infrastracture)">Kagawad(Infrastracture)</option>
                      <option value="SK Chairman">SK Chairman</option>
                      <option value="Secretary">Secretary</option>
                      <option value="Treasurer">Treasurer</option>
                    </select>
                    ';
                  }
                  if($row['position'] =="Kagawad(Public Safety)")
                  {
                    echo '
                    <label>Position</label>
                    <select class="form-select" name="position" autocomplete="off">
                      <option value="Kagawad(Public Safety)"><b>'.strtoupper($row['position']).'</b></option>
                      <option value="Barangay Captain">Barangay Captain</option>
                      <option value="Kagawad(Ordinance)">Kagawad(Ordinance)</option>
                      <option value="Kagawad(Tourism)">Kagawad(Tourism)</option>
                      <option value="Kagawad(Budget & Finance)">Kagawad(Budget & Finance)</option>
                      <option value="Kagawad(Agriculture)">Kagawad(Agriculture)</option>
                      <option value="Kagawad(Education)">Kagawad(Education)</option>
                      <option value="Kagawad(Infrastracture)">Kagawad(Infrastracture)</option>
                      <option value="SK Chairman">SK Chairman</option>
                      <option value="Secretary">Secretary</option>
                      <option value="Treasurer">Treasurer</option>
                    </select>
                    ';
                  }
                  if($row['position'] =="Kagawad(Tourism)")
                  {
                    echo '
                    <label>Position</label>
                    <select class="form-select" name="position" autocomplete="off">
                      <option value="Kagawad(Tourism)"><b>'.strtoupper($row['position']).'</b></option>
                      <option value="Barangay Captain">Barangay Captain</option>
                      <option value="Kagawad(Ordinance)">Kagawad(Ordinance)</option>
                      <option value="Kagawad(Public Safety)">Kagawad(Public Safety)</option>
                      <option value="Kagawad(Budget & Finance)">Kagawad(Budget & Finance)</option>
                      <option value="Kagawad(Agriculture)">Kagawad(Agriculture)</option>
                      <option value="Kagawad(Education)">Kagawad(Education)</option>
                      <option value="Kagawad(Infrastracture)">Kagawad(Infrastracture)</option>
                      <option value="SK Chairman">SK Chairman</option>
                      <option value="Secretary">Secretary</option>
                      <option value="Treasurer">Treasurer</option>
                    </select>
                    ';
                  }
                  if($row['position'] =="Kagawad(Budget & Finance)")
                  {
                    echo '
                    <label>Position</label>
                    <select class="form-select" name="position" autocomplete="off">
                      <option value="Kagawad(Budget & Finance)"><b>'.strtoupper($row['position']).'</b></option>
                      <option value="Barangay Captain">Barangay Captain</option>
                      <option value="Kagawad(Ordinance)">Kagawad(Ordinance)</option>
                      <option value="Kagawad(Public Safety)">Kagawad(Public Safety)</option>
                      <option value="Kagawad(Tourism)">Kagawad(Tourism)</option>
                      <option value="Kagawad(Agriculture)">Kagawad(Agriculture)</option>
                      <option value="Kagawad(Education)">Kagawad(Education)</option>
                      <option value="Kagawad(Infrastracture)">Kagawad(Infrastracture)</option>
                      <option value="SK Chairman">SK Chairman</option>
                      <option value="Secretary">Secretary</option>
                      <option value="Treasurer">Treasurer</option>
                    </select>
                    ';
                  }
                  if($row['position'] =="Kagawad(Agriculture)")
                  {
                    echo '
                    <label>Position</label>
                    <select class="form-select" name="position" autocomplete="off">
                      <option value="Kagawad(Agriculture)"><b>'.strtoupper($row['position']).'</b></option>
                      <option value="Barangay Captain">Barangay Captain</option>
                      <option value="Kagawad(Ordinance)">Kagawad(Ordinance)</option>
                      <option value="Kagawad(Public Safety)">Kagawad(Public Safety)</option>
                      <option value="Kagawad(Tourism)">Kagawad(Tourism)</option>
                      <option value="Kagawad(Budget & Finance)">Kagawad(Budget & Finance)</option>
                      <option value="Kagawad(Education)">Kagawad(Education)</option>
                      <option value="Kagawad(Infrastracture)">Kagawad(Infrastracture)</option>
                      <option value="SK Chairman">SK Chairman</option>
                      <option value="Secretary">Secretary</option>
                      <option value="Treasurer">Treasurer</option>
                    </select>
                    ';
                  }
                  if($row['position'] =="Kagawad(Education)")
                  {
                    echo '
                    <label>Position</label>
                    <select class="form-select" name="position" autocomplete="off">
                      <option value="Kagawad(Education)"><b>'.strtoupper($row['position']).'</b></option>
                      <option value="Barangay Captain">Barangay Captain</option>
                      <option value="Kagawad(Ordinance)">Kagawad(Ordinance)</option>
                      <option value="Kagawad(Public Safety)">Kagawad(Public Safety)</option>
                      <option value="Kagawad(Tourism)">Kagawad(Tourism)</option>
                      <option value="Kagawad(Budget & Finance)">Kagawad(Budget & Finance)</option>
                      <option value="Kagawad(Agriculture)">Kagawad(Agriculture)</option>
                      <option value="Kagawad(Infrastracture)">Kagawad(Infrastracture)</option>
                      <option value="SK Chairman">SK Chairman</option>
                      <option value="Secretary">Secretary</option>
                      <option value="Treasurer">Treasurer</option>
                    </select>
                    ';
                  }
                  if($row['position'] =="Kagawad(Infrastracture)")
                  {
                    echo '
                    <label>Position</label>
                    <select class="form-select" name="position" autocomplete="off">
                      <option value="Kagawad(Infrastracture)"><b>'.strtoupper($row['position']).'</b></option>
                      <option value="Barangay Captain">Barangay Captain</option>
                      <option value="Kagawad(Ordinance)">Kagawad(Ordinance)</option>
                      <option value="Kagawad(Public Safety)">Kagawad(Public Safety)</option>
                      <option value="Kagawad(Tourism)">Kagawad(Tourism)</option>
                      <option value="Kagawad(Budget & Finance)">Kagawad(Budget & Finance)</option>
                      <option value="Kagawad(Agriculture)">Kagawad(Agriculture)</option>
                      <option value="Kagawad(Education)">Kagawad(Education)</option>
                      <option value="SK Chairman">SK Chairman</option>
                      <option value="Secretary">Secretary</option>
                      <option value="Treasurer">Treasurer</option>
                    </select>
                    ';
                  }
                  if($row['position'] =="SK Chairman")
                  {
                    echo '
                    <label>Position</label>
                    <select class="form-select" name="position" autocomplete="off">
                      <option value="SK Chairman"><b>'.strtoupper($row['position']).'</b></option>
                      <option value="Barangay Captain">Barangay Captain</option>
                      <option value="Kagawad(Ordinance)">Kagawad(Ordinance)</option>
                      <option value="Kagawad(Public Safety)">Kagawad(Public Safety)</option>
                      <option value="Kagawad(Tourism)">Kagawad(Tourism)</option>
                      <option value="Kagawad(Budget & Finance)">Kagawad(Budget & Finance)</option>
                      <option value="Kagawad(Agriculture)">Kagawad(Agriculture)</option>
                      <option value="Kagawad(Education)">Kagawad(Education)</option>
                      <option value="Kagawad(Infrastracture)">Kagawad(Infrastracture)</option>
                      <option value="Secretary">Secretary</option>
                      <option value="Treasurer">Treasurer</option>
                    </select>
                    ';
                  }
                  if($row['position'] =="Secretary")
                  {
                    echo '
                    <label>Position</label>
                    <select class="form-select" name="position" autocomplete="off">
                      <option value="Secretary"><b>'.strtoupper($row['position']).'</b></option>
                      <option value="Barangay Captain">Barangay Captain</option>
                      <option value="Kagawad(Ordinance)">Kagawad(Ordinance)</option>
                      <option value="Kagawad(Public Safety)">Kagawad(Public Safety)</option>
                      <option value="Kagawad(Tourism)">Kagawad(Tourism)</option>
                      <option value="Kagawad(Budget & Finance)">Kagawad(Budget & Finance)</option>
                      <option value="Kagawad(Agriculture)">Kagawad(Agriculture)</option>
                      <option value="Kagawad(Education)">Kagawad(Education)</option>
                      <option value="Kagawad(Infrastracture)">Kagawad(Infrastracture)</option>
                      <option value="SK Chairman">SK Chairman</option>
                      <option value="Treasurer">Treasurer</option>
                    </select>
                    ';
                  }
                  if($row['position'] =="Treasurer")
                  {
                    echo '
                    <label>Position</label>
                    <select class="form-select" name="position" autocomplete="off">
                      <option value="Treasurer"><b>'.strtoupper($row['position']).'</b></option>
                      <option value="Barangay Captain">Barangay Captain</option>
                      <option value="Kagawad(Ordinance)">Kagawad(Ordinance)</option>
                      <option value="Kagawad(Public Safety)">Kagawad(Public Safety)</option>
                      <option value="Kagawad(Tourism)">Kagawad(Tourism)</option>
                      <option value="Kagawad(Budget & Finance)">Kagawad(Budget & Finance)</option>
                      <option value="Kagawad(Agriculture)">Kagawad(Agriculture)</option>
                      <option value="Kagawad(Education)">Kagawad(Education)</option>
                      <option value="Kagawad(Infrastracture)">Kagawad(Infrastracture)</option>
                      <option value="SK Chairman">SK Chairman</option>
                      <option value="Secretary">Secretary</option>
                    </select>
                    ';
                  }
                ?>
              </div>
              
              <!-- Start/End Date -->
              <div class="col mb-2">
                <label >Start Date</label>
                <input class="form-control" type="date" name="start_date" id="" required value="<?php echo ($row['start_date']); ?>">
              </div>
              <div class="col mb-3">
                <label >End Date</label>
                <input class="form-control" type="date" name="end_date" id="" required value="<?php echo ($row['end_date']); ?>">
              </div>

              <?php 

                if(isset($_GET['id']))
                {
                    $id = $_GET['id'];

                    $query = "SELECT * FROM tblofficials WHERE id='$id' ";
                    $query_run = mysqli_query($con, $query);

                    if(mysqli_num_rows($query_run) > 0)
                    {
                        foreach($query_run as $row)
                        {
                          $query = mysqli_query($con, "SELECT signature FROM tblofficials WHERE id = '".$_GET['id']."' ");
                            
                          echo'
                          <image src="signatures/'.basename($row['signature']).'" style="width:140px; height: 140px; margin-top:-550px; right: 331px; position: relative; border-style: solid; border-color: blue;">';
                          ?>
                            <input type="hidden" name="id" value="<?php echo $row['id']?>"/>
                          <?php
                        }
                        
                    }
                    else
                    {
                      echo "No Signature Found!";
                    }
                }
                
            ?>
            </div>

            
            

            <!-- Status -->
            <input type="hidden" name="status" value="Active">

            <div class="row modal-footer">
              <span class="col text-start">
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#EndTerm<?php echo $row['id']; ?>">End Term</button>
              </span>
              <span class="col text-end">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" name="update_official" class="button-color btn">Submit</button>
              </span>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- End term modal -->
<div class="modal fade" id="EndTerm<?php echo $row['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
              <input type="hidden" name="barangay" value="<?php echo $row['barangay']?>"/>
              <input type="hidden" name="City" value="<?php echo $row['City']?>"/>
              <input type="hidden" name="province" value="<?php echo $row['province']?>"/>
              <input type="hidden" name="start_date" value="<?php echo $row['start_date']?>"/>
              <input type="hidden" name="end_date" value="<?php echo $row['end_date']?>"/>
              <input type="hidden" name="status" value="<?php echo $row['status']?>"/>
              <input type="hidden" name="email" value="<?php echo $row['email']?>"/>
              <input type="hidden" name="gender" value="<?php echo $row['gender']?>"/>

              <div class="modal-body text-center" style="margin-top: -20px">
                <i class="bi bi-exclamation-circle fa-8x" style="color: #facea8"></i>

                <h1 style="font-size: 25px; margin-top: -10px; margin-bottom: 30px"> Are you sure you want to End this term?</h1>
                <p><b>NAME: <u><?php echo $row['firstname'];?> <?php echo $row['lastname']; ?></u></b></p>
                <small> Warning: This action is will set as <b>Inactive</b>! </small>
              </div>
              <div class="row mb-2">
                <div class="col mx-5">
                  <label ><b>Reason:</b></label>
                  <input class="form-control" name="reason" required placeholder="Comment here..."></input>
                </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" name="EndTerm" class="btn btn-danger">Confirm</button>
              </div>
            </form>

        </div>
    </div>
</div>

<!-- Address dropdown -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
  	function loadData(type, category_id){
  		$.ajax({
  			url : "function.php",
  			type : "POST",
  			data: {type : "province"},
  			success : function(data){
          $("#Province<?php echo $row['id'] ?>").append(data);
  				// if(type == "stateData"){
  				// 	$("#CityTown").html(data);
  				// }else {
  				// 	$("#Province").append(data);
  				// }
  				
  			}
  		});
  	}

    function loadCity(province){
  		$.ajax({
  			url : "function.php",
  			type : "POST",
  			data: {type : "City", province : province},
  			success : function(data){
          $("#CityTown<?php echo $row['id'] ?>").html("");
          $("#CityTown<?php echo $row['id'] ?>").append(data);
  				// if(type == "stateData"){
  				// 	$("#CityTown").html(data);
  				// }else {
  				// 	$("#Province").append(data);
  				// }
  				
  			}
  		});
  	}

    function loadBarangay(CityTown){
  		$.ajax({
  			url : "function.php",
  			type : "POST",
  			data: {type : "Barangay", CityTown : CityTown},
  			success : function(data){
          $("#Barangay<?php echo $row['id'] ?>").html("");
          $("#Barangay<?php echo $row['id'] ?>").append(data);
  				// if(type == "stateData"){
  				// 	$("#CityTown").html(data);
  				// }else {
  				// 	$("#Province").append(data);
  				// }
  				
  			}
  		});
  	}

  	loadData();

  	$("#Province<?php echo $row['id'] ?>").on("change",function(){
  		var Province = $("#Province<?php echo $row['id'] ?>").val();

  		if(Province != ""){
  			loadCity(Province);
  		}else{
  			$("#City").html("");
  		}
  	})

    $("#CityTown<?php echo $row['id'] ?>").on("change",function(){
  		var City = $("#CityTown<?php echo $row['id'] ?>").val();

  		if(City != ""){
  			loadBarangay(City);
  		}else{
  			$("#CityTown<?php echo $row['id'] ?>").html("");
  		}
  	})

  });
</script>