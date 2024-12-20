<!-- 1st modal Resident Information -->
<div class="modal fade" id="Edit_Resident<?php echo $resident['id']; ?>" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Resident's Personal Information</h5>
        <button type="button" class="btn-close" id="exitCam" data-bs-dismiss="modal" aria-label="Close" onClick="window.location.reload();"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <form action="function.php" method="POST">
            <div class="row g-2 mb-2">
              <!-- Picture -->
              <div class="d-flex flex-column align-items-center text-center p-3">
                  <div id="camera">
                      <a href="<?php echo $resident['captured_image'];?>" target="_blank">
                          <img src="images/<?php echo basename($resident['captured_image']); ?>" 
                              class="capture_frame border border-dark" 
                              alt="Picture">
                      </a>
                  </div>
              </div>
              <div class="text-center d-flex pb-3">
                  <input class="col-md-4" type="hidden" name="captured_image" id="newCaptured">
              </div>

              <style>
                  .capture_frame {
                      border-radius: 50%; /* Makes the image circular */
                      width: 150px; /* Set width */
                      height: 150px; /* Set height */
                      object-fit: cover; /* Maintain aspect ratio */
                  }
              </style>

              <div class="col">
                <input type="hidden" name="id" value="<?php echo $resident['id']?>" />
                <input type="hidden" name="session_role" value="<?php echo $_SESSION['role']?>" />
                <input type="text" class="form-control" value="<?php echo $resident['lastname']?>" name="lastname" autocomplete="off" onkeyup="lettersOnly(this)" oninput="this.value = this.value.toUpperCase()" required>
                <small id="emailHelp" class="form-text text-muted">Last Name</small>
              </div>
              <div class="col">
                <input type="text" class="form-control" value="<?php echo $resident['firstname']?>" name="firstname" autocomplete="off" onkeyup="lettersOnly(this)" oninput="this.value = this.value.toUpperCase()" required>
                <small id="emailHelp" class="form-text text-muted">First Name</small>
              </div>
              <div class="col">
                <input type="text" class="form-control" value="<?php echo $resident['middlename']?>" name="middlename" autocomplete="off" onkeyup="lettersOnly(this)" oninput="this.value = this.value.toUpperCase()" required>
                <small id="emailHelp" class="form-text text-muted">Middle Name</small>
              </div>
              <div class="col-md-2">
                <select class="form-select" value="<?php echo $resident['suffixname']?>" name="suffixname" aria-label="Name Extension">
                  <option selected></option>
                  <option>Jr.</option>
                  <option>Sr.</option>
                  <option>I</option>
                  <option>II</option>
                  <option>III</option>
                  <option>IV</option>
                </select>
                <small id="emailHelp" class="form-text text-muted">Suffix</small>
              </div>
            </div>

            <!-- Personal Information -->
            <div class="row g-2">
              <div class="col mb-3">
                <select class="form-select" name="gender" id="gender" autocomplete="off" required>
                    <option value="MALE" <?php echo ($resident['gender'] == "MALE") ? 'selected' : ''; ?>>MALE</option>
                    <option value="FEMALE" <?php echo ($resident['gender'] == "FEMALE") ? 'selected' : ''; ?>>FEMALE</option>
                </select>
                <small id="genderHelp" class="form-text text-muted">Gender</small>
              </div>
              <!-- <div class="col mb-3">
                <input class="form-control" type="text" id="birthdayEdit<?php echo $resident['id']; ?>" value="<?php echo $resident['birthdate']?>" name="birthdate" readonly>
                <small id="emailHelp" class="form-text text-muted">Birthdate</small>
              </div> -->
              <div class="col mb-3">
                <input class="form-control" type="date" id="birthday<?php echo $resident['id']; ?>" name="birthdate" value="<?php echo $resident['birthdate']?>" onchange="mybirthEdit(this)" required>
                <small id="emailHelp" class="form-text text-muted">Birthdate</small>
              </div>
              <div class="col-md-2 mb-3">
                <input type="text" class="form-control" style="width: 105px;" value="<?php echo $resident['age']?>" id="editAge<?php echo $resident['id']; ?>" name="age" readonly>
                <small id="emailHelp" class="form-text text-muted">Age</small>
              </div>
            </div>

            <hr>

            <!-- Place of Birth -->
            <div class="row g-2">
              <div class="col-md-12">
                  <label><b>Place of Birth</b></label>
              </div>
              <div class="col-md-6 mb-3">
                  <input type="hidden" name="province" value="<?php echo $resident['province']; ?>">
                  <input type="hidden" name="city" value="<?php echo $resident['city']; ?>">
                  <select class="form-select" name="province" id="editProvince<?php echo $resident['id']; ?>">
                      <option selected disabled><?php echo $resident['province']; ?></option>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Province</small>
              </div>
              <div class="col-md-6 mb-3">
                  <select class="form-select" name="city" id="editCityTown<?php echo $resident['id']; ?>">
                      <option selected disabled><?php echo $resident['city']; ?></option>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">City/Town</small>
              </div>
            </div>

            <hr>

            <!-- Home Address -->
            <div class="row g-2">
              <div class="col-md-12">
                <label><b>Home Address</b></label>
              </div>
              <div class="col-md-6 mb-3">
                <input type="text" class="form-control" value="<?php echo $resident['houseNo']; ?>" minlength="4" maxlength="4" name="houseNo" placeholder="House No" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required pattern="\d{4}">
                <small id="emailHelp" class="form-text text-muted">House No.</small>
              </div>
              <div class="col-md-6 mb-3">
                <input type="text" class="form-control" value="<?php echo $resident['purokNo']; ?>" minlength="1" maxlength="1" name="purokNo" placeholder="Purok No" autocomplete="off" oninput="this.value = this.value.replace(/[^1-7.]/g, '').replace(/(\..*)\./g, '$1');" required pattern="\d{1}">
                <small id="emailHelp" class="form-text text-muted">Purok No.</small>
              </div>
            </div>

            <hr>

            <!-- Contact Information -->
            <div class="row g-2">
              <div class="col-md-12">
                <label><b>Contact Information</b></label>
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control" value="<?php echo $resident['contactNo']?>" minlength="11" maxlength="11" name="contactNo" placeholder="Your Contact Number" pattern="09[0-9]{9}" 
                      title="Please enter a valid Philippine mobile number starting with 09"
                      autocomplete="off" required 
                      oninput="
                        let value = this.value;
                        if (!value.startsWith('09')) {
                          value = '09';
                        }
                        this.value = value.replace(/[^0-9]/g, '').substr(0, 11);
                      " />
                <small id="emailHelp" class="form-text text-muted">Your Contact No.</small>
              </div>
              <div class="col-md-6">
                <input type="email" class="form-control" value="<?php echo $resident['emailAddress']?>" name="emailAddress" placeholder="Your Email Address (Optional)">
                <small id="emailHelp" class="form-text text-muted">Email Address.</small>
              </div>
            </div>

            <hr>

            <!-- Parents' Information -->
            <div class="row g-2">
              <div class="col-md-12">
                <label><b>Parents' Information</b></label>
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control" value="<?php echo $resident['motherName']?>" name="motherName" placeholder="Mother's Name" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)" required>
                <small id="emailHelp" class="form-text text-muted">Mother's Name.</small>
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control" value="<?php echo $resident['motherContactNo']?>" minlength="11" maxlength="11" name="motherContactNo" placeholder="Your Mother's Contact Number" pattern="09[0-9]{9}" 
                      title="Please enter a valid Philippine mobile number starting with 09"
                      autocomplete="off" required 
                      oninput="
                        let value = this.value;
                        if (!value.startsWith('09')) {
                          value = '09';
                        }
                        this.value = value.replace(/[^0-9]/g, '').substr(0, 11);
                      " />
                <small id="emailHelp" class="form-text text-muted">Mother's Contact No.</small>
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control" value="<?php echo $resident['fatherName']?>" name="fatherName" placeholder="Father's Name" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)" required>
                <small id="emailHelp" class="form-text text-muted">Father's Name.</small>
              </div>
              <div class="col-md-6 mb-5">
                <input type="text" class="form-control" value="<?php echo $resident['fatherContactNo']?>" minlength="11" maxlength="11" name="fatherContactNo" placeholder="Your Father's Contact Number" pattern="09[0-9]{9}" 
                      title="Please enter a valid Philippine mobile number starting with 09"
                      autocomplete="off" required 
                      oninput="
                        let value = this.value;
                        if (!value.startsWith('09')) {
                          value = '09';
                        }
                        this.value = value.replace(/[^0-9]/g, '').substr(0, 11);
                      " />
                <small id="emailHelp" class="form-text text-muted">Father's Contact No.</small>
              </div>
            </div>

            <hr>

            <!-- Additional Information -->
            <div class="row g-2">
              <div class="col-md-12">
                <label><b>Additional Information</b></label>
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control" value="<?php echo $resident['height']?>" name="height" placeholder="Height (in cm)" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                <small id="emailHelp" class="form-text text-muted">Height</small>
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control" value="<?php echo $resident['weight']?>" name="weight" placeholder="Weight (in kg)" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                <small id="emailHelp" class="form-text text-muted">Weight</small>
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control" value="<?php echo $resident['nationality']?>" name="nationality" placeholder="Nationality" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)" required>
                <small id="emailHelp" class="form-text text-muted">Nationality</small>
              </div>
              <div class="col-md-6 mb-3">
                <?php 
                  if($resident['civilStatus'] == "MARRIED")
                  {
                    echo'
                    <select class="form-select" name="civilStatus" onchange="showSpouse()" required>
                      <option value="MARRIED" selected >'.strtoupper($resident['civilStatus']).'</option>
                      <option value="SINGLE">SINGLE</option>
                      <option value="DIVORCED">DIVORCED</option>
                      <option value="WIDOWED">WIDOWED</option>
                      <option value="SEPARATED">SEPARATED</option>
                    </select>
                    <small id="emailHelp" class="form-text text-muted">Civil Status</small>
                    ';
                  }
                  else if($resident['civilStatus'] == "SINGLE")
                  {
                    echo'
                    <select class="form-select" name="civilStatus" onchange="showSpouse()" required>
                      <option value="SINGLE" selected>'.strtoupper($resident['civilStatus']).'</option>
                      <option value="MARRIED">MARRIED</option>
                      <option value="DIVORCED">DIVORCED</option>
                      <option value="WIDOWED">WIDOWED</option>
                      <option value="SEPARATED">SEPARATED</option>
                    </select>
                    <small id="emailHelp" class="form-text text-muted">Civil Status</small>
                    ';
                  }
                  else if($resident['civilStatus'] == "DIVORCED")
                  {
                    echo'
                    <select class="form-select" name="civilStatus" onchange="showSpouse()" required>
                      <option value="DIVORCED" selected>'.strtoupper($resident['civilStatus']).'</option>
                      <option value="SINGLE">SINGLE</option>
                      <option value="MARRIED">MARRIED</option>
                      <option value="WIDOWED">WIDOWED</option>
                      <option value="SEPARATED">SEPARATED</option>
                    </select>
                    <small id="emailHelp" class="form-text text-muted">Civil Status</small>
                    ';
                  }
                  else if($resident['civilStatus'] == "WIDOWED")
                  {
                    echo'
                    <select class="form-select" name="civilStatus" onchange="showSpouse()" required>
                      <option value="WIDOWED" selected>'.strtoupper($resident['civilStatus']).'</option>
                      <option value="SINGLE">SINGLE</option>
                      <option value="MARRIED">MARRIED</option>
                      <option value="DIVORCED">DIVORCED</option>
                      <option value="SEPARATED">SEPARATED</option>
                    </select>
                    <small id="emailHelp" class="form-text text-muted">Civil Status</small>
                    ';
                  }
                  else if($resident['civilStatus'] == "SEPARATED")
                  {
                    echo'
                    <select class="form-select" name="civilStatus" onchange="showSpouse()" required>
                      <option value="SEPARATED" selected>'.strtoupper($resident['civilStatus']).'</option>
                      <option value="SINGLE">SINGLE</option>
                      <option value="MARRIED">MARRIED</option>
                      <option value="DIVORCED">DIVORCED</option>
                    </select>
                    <small id="emailHelp" class="form-text text-muted">Civil Status</small>
                    ';
                  }
                ?>
              </div>
            </div>

            <hr>

            <!-- Educational Background -->
            <div class="col-md-12">
              <label><b>Educational Background (Optional)</b></label>
            </div><br>
            <!-- College -->
            <div class="row g-2">
              <div class="col-md-12">
                <label><b>College</b></label>
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control" value="<?php echo $resident['course']?>" name="course" placeholder="Course" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)">
                <small id="emailHelp" class="form-text text-muted">Course</small>
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control" value="<?php echo $resident['CSchoolName']?>" name="CSchoolName" placeholder="School Name" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)">
                <small id="emailHelp" class="form-text text-muted">School Name</small>
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control" value="<?php echo $resident['CSchoolAddress']?>" name="CSchoolAddress" placeholder="School Address" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)">
                <small id="emailHelp" class="form-text text-muted">School Address</small>
              </div>
              <div class="col-md-6 mb-4">
                <input type="text" class="form-control" value="<?php echo $resident['CYearAttended']?>" name="CYearAttended" placeholder="Year Attended Ex: 2012-2016" oninput="this.value = this.value.replace(/[^0-9-]/g, '').replace(/(\..*)\./g, '$1');">
                <small id="emailHelp" class="form-text text-muted">Year attended</small>
              </div>
            </div>

            <!-- High School -->
            <div class="row g-2">
              <div class="col-md-12">
                <label><b>High School</b></label>
              </div>
              <div class="col">
                <input type="text" class="form-control" value="<?php echo $resident['HSchoolName']?>" name="HSchoolName" placeholder="School Name" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)">
                <small id="emailHelp" class="form-text text-muted">School Name</small>
              </div>
              <div class="col">
                <input type="text" class="form-control" value="<?php echo $resident['HSchoolAddress']?>" name="HSchoolAddress" placeholder="School Address" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)">
                <small id="emailHelp" class="form-text text-muted">School Address</small>
              </div>
              <div class="col mb-4">
                <input type="text" class="form-control" value="<?php echo $resident['HYearAttended']?>" name="HYearAttended" placeholder="Year Attended Ex: 2012-2016" oninput="this.value = this.value.replace(/[^0-9-]/g, '').replace(/(\..*)\./g, '$1');">
                <small id="emailHelp" class="form-text text-muted">Year Attended</small>
              </div>
            </div>

            <!-- Elementary -->
            <div class="row g-2">
              <div class="col-md-12">
                <label><b>Elementary</b></label>
              </div>
              <div class="col">
                <input type="text" class="form-control" value="<?php echo $resident['ESchoolName']?>" name="ESchoolName" placeholder="School Name" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)">
                <small id="emailHelp" class="form-text text-muted">School Name</small>
              </div>
              <div class="col">
                <input type="text" class="form-control" value="<?php echo $resident['ESchoolAddress']?>" name="ESchoolAddress" placeholder="School Address" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)">
                <small id="emailHelp" class="form-text text-muted">School Address</small>
              </div>
              <div class="col mb-4">
                <input type="text" class="form-control" value="<?php echo $resident['EYearAttended']?>" name="EYearAttended" placeholder="Year Attended Ex: 2012-2016" oninput="this.value = this.value.replace(/[^0-9-]/g, '').replace(/(\..*)\./g, '$1');">
                <small id="emailHelp" class="form-text text-muted">Year Attended</small>
              </div>
            </div>

            <hr>

            <!-- Farmer Information -->
            <div class="row g-2">
              <div class="col-md-12">
                <label><b>Farmer Information (Optional)</b></label>
                <small>Note: Fill out this if you're a farmer</small>
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control" value="<?php echo $resident['LandSize']?>" name="LandSize" placeholder="Enter land size in sq.m (required)" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                <small id="emailHelp" class="form-text text-muted">Land Size (sq.m)</small>
              </div>
              <div class="col-md-6">
                <?php 
                if($resident['LandDirection'] == "WEST COAST") {
                  echo '<select class="form-select" value="' . $resident['LandDirection'] . '" name="LandDirection" id="LandDirection">
                    <option selected>'. $resident['LandDirection'].'</option>
                    <option value="EAST COAST">EAST COAST</option>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Land Direction</small>';
                } else if ($resident['LandDirection'] == "EAST COAST") {
                  echo '<select class="form-select" value="' . $resident['LandDirection'] . '" name="LandDirection" id="LandDirection">
                    <option selected>'. $resident['LandDirection'].'</option>
                    <option value="WEST COAST">WEST COAST</option>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Land Direction</small>';
                }
                ?>
              </div>
            </div>

            <!-- Buttons -->
            <div class="modal-footer float-end">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onClick="window.location.reload();">Cancel</button>
              <button type="submit" name="update_resident" class="button-color btn">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
 
  //Calculate Age
  $("#birthday<?php echo $resident['id']; ?>").on("input", function() {
    let bdate = $(this).val();
    let bdateformat = new Date(bdate);
    let diff_ms = Date.now() - bdateformat.getTime();
    let age_dt = new Date(diff_ms);
    let age = Math.abs(age_dt.getUTCFullYear() - 1970);
    $("#editAge<?php echo $resident['id']; ?>").val(age);
  })
</script>

<!-- Include jQuery -->
<script type="text/javascript" src="js/jquery.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    // Function to load provinces
    function loadData() {
        $.ajax({
            url: "function.php",
            type: "POST",
            data: { type: "province" },
            success: function(data) {
                $("#editProvince<?php echo $resident['id']; ?>").append(data);
                // Load the city based on the hidden input
                loadCity($("input[name='province']").val());
            }
        });
    }

    // Function to load cities based on selected province
    function loadCity(province) {
        $.ajax({
            url: "function.php",
            type: "POST",
            data: { type: "City", province: province },
            success: function(data) {
                $("#editCityTown<?php echo $resident['id']; ?>").html(""); // Clear previous options
                $("#editCityTown<?php echo $resident['id']; ?>").append(data);
                // Set the selected city from the hidden input
                var selectedCity = $("input[name='city']").val();
                if (selectedCity) {
                    $("#editCityTown<?php echo $resident['id']; ?>").val(selectedCity);
                }
                // Load barangays based on the selected city
                loadBarangay(selectedCity);
            }
        });
    }

    // Function to load barangays based on selected city
    function loadBarangay(CityTown) {
        $.ajax({
            url: "function.php",
            type: "POST",
            data: { type: "Barangay", CityTown: CityTown },
            success: function(data) {
                $("#editBarangay<?php echo $resident['id']; ?>").html(""); // Clear previous options
                $("#editBarangay<?php echo $resident['id']; ?>").append(data);
                // Set the selected barangay from the hidden input
                var selectedBarangay = $("input[name='barangay']").val();
                if (selectedBarangay) {
                    $("#editBarangay<?php echo $resident['id']; ?>").val(selectedBarangay);
                }
            }
        });
    }

    // Load provinces on page load
    loadData();

    // Event listener for province dropdown change
    $("#editProvince<?php echo $resident['id']; ?>").on("change", function() {
        var Province = $(this).val();
        if (Province != "") {
            loadCity(Province);
        } else {
            $("#editCityTown<?php echo $resident['id']; ?>").html(""); // Clear city dropdown
        }
    });

    // Event listener for city dropdown change
    $("#editCityTown<?php echo $resident['id']; ?>").on("change", function() {
        var City = $(this).val();
        if (City != "") {
            loadBarangay(City);
        } else {
            $("#editBarangay<?php echo $resident['id']; ?>").html(""); // Clear barangay dropdown
        }
    });
});
</script>