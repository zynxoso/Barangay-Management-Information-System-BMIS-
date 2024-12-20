<form action="function.php" method="POST">
  <!-- 1st modal Capture -->
  <div class="modal fade" id="Add_Resident" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Take Picture</h5>
          <button type="button" class="btn-close" id="closeCam" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body d-flex flex-column align-items-center text-center">
          <label>Capture live photo</label>
          <div id="my_camera" class="pre_capture_frame border border-dark rounded"></div>
          <input type="hidden" name="captured_image" id="captured_image_data" autocomplete="off">
          <br>
          <div class="row g-2">
            <div class="col">
              <input type="button" id="captureBtn" class="button-color btn" value="Capture">
            </div>
            <div class="col">
              <input type=button id="takepicture1" class="btn btn-secondary"  value="Reset" onClick="Webcam.reset()">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" id="closeCam1" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="button-color btn" id="closeCam2" data-bs-target="#Add_Resident1" data-bs-toggle="modal">Next</button>
        </div>
      </div>
    </div>
  </div>
   <!-- 2nd modal Resident Information -->
   <div class="modal fade" id="Add_Resident1" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="staticBackdropLabel">Resident's Personal Information</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div class="text-center d.flex pb-3"> <?php 
              $query = mysqli_query($con, "SELECT image FROM dashboard");
              {
              while($row = mysqli_fetch_array($query))
              echo'<image src="../settings/img/'.basename($row['image']).'" style="border-radius: 50%" alt="" class="w-auto" height="150">';
              }
            ?> </div>
               <div class="row g-2 mb-2">
                  <div class="col">
                     <input type="hidden" name="session_role" value="<?php echo $_SESSION['role']; ?>">
                     <input type="hidden" name="causeofdeath" value="">
                     <label><b>Last Name</b> <span class="text-danger">*</span></label>
                     <input type="text" class="form-control" name="lastname" placeholder="Enter Last Name" autocomplete="off" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)" required>
                  </div>
                  <div class="col">
                     <label><b>First Name</b> <span class="text-danger">*</span></label>
                     <input type="text" class="form-control" name="firstname" placeholder="Enter First Name" autocomplete="off" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)" required>
                  </div>
                  <div class="col">
                     <label><b>Middle Name</b> <span class="text-danger">*</span></label>
                     <input type="text" class="form-control" name="middlename" placeholder="Enter Middle Name" autocomplete="off" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)" required>
                  </div>
                  <div class="col-md-2">
                     <label><b>Suffix</b></label>
                     <select class="form-select" name="suffixname" aria-label="Name Extension">
                        <option selected value="">Select Suffix</option>
                        <option value="Jr.">Jr.</option>
                        <option value="Sr.">Sr.</option>
                        <option value="I">I</option>
                        <option value="II">II</option>
                        <option value="III">III</option>
                        <option value="IV">IV</option>
                     </select>
                  </div>
               </div>

               <div class="row g-2">
                  <div class="col-md-6 mb-3">
                     <label>Gender <span class="text-danger">*</span></label>
                  <select class="form-select" name="gender" required>
                     <option value="">Select Gender</option>
                     <option value="MALE">MALE</option>
                     <option value="FEMALE">FEMALE</option>
                  </select>
                  <div class="invalid-feedback">Please select a gender</div>
                  </div>
                  <div class="col-md-4 mb-3">
                     <label>Birthdate <span class="text-danger">*</span></label>
                     <input class="form-control" type="date" id="bday" name="birthdate" required>
                     
                     <div class="invalid-feedback">Must be at least 15 years old to register</div>
                  </div>
                  <div class="col-md-2 mb-3">
                     <label>
                        <b>Age</b>
                     </label>
                     <input type="text" class="form-control" id="age" name="age" readonly>
                  </div>
               </div>
               <hr>

               <!-- Place of Birth -->
               <div class="row g-2">
                  <div class="col-md-12">
                     <label>
                        <b>Place of Birth</b>
                     </label>
                  </div>
                  <div class="col-md-6 mb-3">
                     <select class="form-select" name="province" id="Province" required placeholder="Select Province">
                        <option value="">Select Province</option>
                     </select>
                  </div>
                  <div class="col-md-6 mb-3">
                     <select class="form-select" name="city" id="CityTown" required>
                        <option value="" selected disabled>Select City/Town</option>
                     </select>
                  </div>
               </div>
               <hr>

               <!-- Home Address -->
               <div class="row g-2">
                  <div class="col-md-12">
                     <label>
                        <b>Home Address</b>
                     </label>
                  </div>
                  <div class="col-md-6 mb-3">
                     <input type="text" class="form-control" name="houseNo" maxlength="4" minlength="4" placeholder="House Number" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required pattern="\d{4}">
                  </div>
                  <div class="col-md-6 mb-3">
                     <input type="text" class="form-control" name="purokNo" maxlength="1" minlength="1" placeholder="Purok Number (1-7)" autocomplete="off" oninput="this.value = this.value.replace(/[^1-7.]/g, '').replace(/(\..*)\./g, '$1');" required pattern="\d{1}">
                  </div>
               </div>
               <hr>

               <!-- Contact Information -->
               <div class="row g-2">
                  <div class="col-md-12 mb-3">
                     <label>
                        <b>Contact Information</b>
                     </label>
                  </div>
                  <div class="col-md-6 mb-3">
                  <input type="text" class="form-control" name="contactNo" maxlength="11" placeholder="09XXXXXXXXX" 
                      pattern="09[0-9]{9}" 
                      title="Please enter a valid Philippine mobile number starting with 09"
                      autocomplete="off" required 
                      oninput="
                        let value = this.value;
                        if (!value.startsWith('09')) {
                          value = '09';
                        }
                        this.value = value.replace(/[^0-9]/g, '').substr(0, 11);
                      " />
                  </div>
                  <div class="col-md-6 mb-3">
                     <input type="email" class="form-control" name="emailAddress" placeholder="Your Email Address (Optional)" autocomplete="off">
                  </div>
               </div>
               <hr>

               <!-- Parents' Information -->
               <div class="row g-2">
                  <div class="col-md-12 mb-3">
                     <label>
                        <b>Parents' Information</b>
                     </label>
                  </div>
                  <div class="col-md-6 mb-3">
                     <input type="text" class="form-control" name="motherName" placeholder="Mother's Name" autocomplete="off" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)" required>
                  </div>
                  <div class="col-md-6 mb-3">
                     <input type="text" class="form-control" name="motherContactNo" maxlength="11" minlength="11" placeholder="Your Mother's Contact Number"pattern="09[0-9]{9}" 
                      title="Please enter a valid Philippine mobile number starting with 09"
                      autocomplete="off" required 
                      oninput="
                        let value = this.value;
                        if (!value.startsWith('09')) {
                          value = '09';
                        }
                        this.value = value.replace(/[^0-9]/g, '').substr(0, 11);
                      " />
                  </div>
                  <div class="col-md-6 mb-3">
                     <input type="text" class="form-control" name="fatherName" placeholder="Father's Name" autocomplete="off" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)" required>
                  </div>
                  <div class="col-md-6 mb-3">
                  <input type="text" class="form-control" name="fatherContactNo" maxlength="11" minlength="11" placeholder="Your Father's Contact Number"pattern="09[0-9]{9}" 
                      title="Please enter a valid Philippine mobile number starting with 09"
                      autocomplete="off" required 
                      oninput="
                        let value = this.value;
                        if (!value.startsWith('09')) {
                          value = '09';
                        }
                        this.value = value.replace(/[^0-9]/g, '').substr(0, 11);
                      " />
                  </div>
               </div>
               <hr>

               <!-- Additional Information -->
               <div class="row g-2">
                  <div class="col-md-12 mb-3">
                     <label>
                        <b>Additional Information</b>
                     </label>
                  </div>
                  <div class="col-md-6 mb-3">
                     <input type="text" class="form-control" name="height" placeholder="Height (in cm)" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                  </div>
                  <div class="col-md-6 mb-3">
                     <input type="text" class="form-control" name="weight" placeholder="Weight (in kg)" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                  </div>
                  <div class="col-md-6 mb-3">
                     <input type="text" class="form-control" name="nationality" placeholder="Nationality" autocomplete="off" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)" required>
                  </div>
                  <div class="col-md-6 mb-3">
                     <!-- <label><b>Civil Status</b></label> -->
                     <select class="form-select" id="civil-status" name="civilStatus" required>
                        <option selected disabled value="status">Select Status</option>
                        <option value="SINGLE">SINGLE</option>
                        <option value="MARRIED">MARRIED</option>
                        <option value="DIVORCED">DIVORCED</option>
                        <option value="WIDOWED">WIDOWED</option>
                        <option value="SEPARATED">SEPARATED</option>
                     </select>
                  </div>
               </div>
               <hr>

               <!-- Educational Background -->
               <div class="col-md-12 mb-3">
                  <label>
                     <b>Educational Background (Optional)</b>
                  </label>
               </div>
               <div class="row g-2">
                  <div class="col-md-12 mb-3">
                     <label>
                        <b>College</b>
                     </label>
                  </div>
                  <div class="col-md-6">
                     <input type="text" class="form-control" name="course" placeholder="Course" autocomplete="off" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)">
                  </div>
                  <div class="col-md-6 mb-3">
                     <input type="text" class="form-control" name="CSchoolName" placeholder="School Name" autocomplete="off" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)">
                  </div>
                  <div class="col-md-6 mb-3">
                     <input type="text" class="form-control" name="CSchoolAddress" placeholder="School Address" autocomplete="off" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)">
                  </div>
                  <div class="col-md-6 mb-3">
                     <input type="text" class="form-control" name="CYearAttended" placeholder="Year Attended Ex: 2012-2016" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9-]/g, '').replace(/(\..*)\./g, '$1');">
                  </div>
               </div>
               <div class="row g-2">
                  <div class="col-md-12 mb-3">
                     <label>
                        <b>High School</b>
                     </label>
                  </div>
                  <div class="col mb-3">
                     <input type="text" class="form-control" name="HSchoolName" placeholder="School Name" autocomplete="off" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)">
                  </div>
                  <div class="col mb-3">
                     <input type="text" class="form-control" name="HSchoolAddress" placeholder="School Address" autocomplete="off" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)">
                  </div>
                  <div class="col mb-3">
                     <input type="text" class="form-control" name="HYearAttended" placeholder="Year Attended Ex: 2012-2016" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9-]/g, '').replace(/(\..*)\./g, '$1');">
                  </div>
               </div>
               <div class="row g-2">
                  <div class="col-md-12 mb-3">
                     <label>
                        <b>Elementary</b>
                     </label>
                  </div>
                  <div class="col mb-3">
                     <input type="text" class="form-control" name="ESchoolName" placeholder="School Name" autocomplete="off" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)">
                  </div>
                  <div class="col mb-3">
                     <input type="text" class="form-control" name="ESchoolAddress" placeholder="School Address" autocomplete="off" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)">
                  </div>
                  <div class="col mb-3">
                     <input type="text" class="form-control" name="EYearAttended" placeholder="Year Attended Ex: 2012-2016" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9-]/g, '').replace(/(\..*)\./g, '$1');">
                  </div>
               </div>
               <hr>

               <!-- Farmer Information -->
               <div class="row g-2">
                  <div class="col-md-12 mb-3">
                     <label>
                        <b>Farmer Information (Optional)</b>
                        <small>Note: Fill out this if you're a farmer</small>
                     </label>
                  </div>

                  <div class="col-md-6 mb-3">
                     <label>
                        <b>Land Size (sq.m)</b>
                     </label>
                     <input type="text" class="form-control" name="LandSize" placeholder="Enter land size in sq.m" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                  </div>
                  
                  <div class="col-md-6 mb-3">
                     <label>
                        <b>Land Direction</b>
                     </label>
                     <select class="form-select" name="LandDirection" id="LandDirection">
                        <option value="" selected disabled>Select Direction</option>
                        <option value="WEST COAST">WEST COAST</option>
                        <option value="EAST COAST">EAST COAST</option>
                     </select>
                  </div>
               </div>

            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" id="takepicture2" data-bs-target="#Add_Resident" data-bs-toggle="modal">Previous</button>
               <button type="submit" name="save_resident" class="btn btn-primary" onclick="saveSnap()">Submit</button>
            </div>
         </div>
      </div>
   </div>
   </div>
</form>

   <script>
      //Script for business id
      window.onload = function() {
         let lastID = localStorage.getItem("lastBusinessID");
         let nextID = lastID ? parseInt(lastID) + 1 : 1;
         let businessID = "RS" + String(nextID).padStart(7, '0');
         document.getElementById('businessIDField').value = businessID;
         localStorage.setItem("lastBusinessID", nextID);
      };
      //Income numbers with coma
      document.addEventListener('DOMContentLoaded', function() {
         var incomeInput = document.getElementById('income');
         incomeInput.addEventListener('input', function() {
            var input = incomeInput.value;
            // Remove non-digit characters
            input = input.replace(/[^0-9.]/g, '');
            // Format the number
            input = formatCurrency(input);
            incomeInput.value = input;
         });

         function formatCurrency(value) {
            // Remove leading zeros
            value = value.replace(/^0+/, '');
            // Remove any non-digit characters except the dot
            value = value.replace(/[^0-9.]/g, '');
            // Split the value into integer and decimal parts
            var parts = value.split('.');
            var integerPart = parts[0];
            var decimalPart = parts[1] || '';
            // Add thousand separators to the integer part
            integerPart = integerPart.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
            // Limit the decimal part to 2 digits
            decimalPart = decimalPart.substring(0, 2);
            // Combine the integer and decimal parts with the currency symbol
            return '₱' + integerPart + (decimalPart.length > 0 ? '.' + decimalPart : '');
         }
      });
   </script>

  <!-- Capture -->
  <script language="JavaScript">
  let isCapturing = false;

  Webcam.set({
    width: 400,
    height: 300,
    image_format: 'jpeg',
    jpeg_quality: 90
  });	 

  // Keyboard event handler for the entire document
  document.addEventListener('keydown', function(event) {
    if (isCapturing) {
      if (event.key === 'Enter' || event.key === ' ') {
        event.preventDefault();
        Swal.fire({
          icon: 'warning',
          title: 'Camera Active',
          text: 'Please use the Capture button to take a photo',
          confirmButtonColor: '#4CAF50'
        });
      } else if (event.key === 'Escape') {
        event.preventDefault();
        Swal.fire({
          icon: 'info',
          title: 'Camera Active',
          text: 'Please use the Close button to exit camera mode',
          confirmButtonColor: '#4CAF50'
        });
      }
    }
  });

  // enable camera
  function enableCamera() {
    Webcam.attach('#my_camera');
    isCapturing = true;
    Swal.fire({
      icon: 'info',
      title: 'Camera Activated',
      text: 'Please use the Capture button to take your photo',
      confirmButtonColor: '#4CAF50'
    });
  }

  document.getElementById('takepicture').addEventListener('click', enableCamera);
  document.getElementById('takepicture1').addEventListener('click', enableCamera);
  document.getElementById('takepicture2').addEventListener('click', enableCamera);

  document.getElementById('captureBtn').addEventListener('click', function() {
    if (!isCapturing) {
      Swal.fire({
        icon: 'error',
        title: 'Camera Not Active',
        text: 'Please activate the camera first',
        confirmButtonColor: '#4CAF50'
      });
      return;
    }
    // take snapshot and get image data
    Webcam.snap(function(data_uri) {
      // display results in page
      document.getElementById('my_camera').innerHTML = 
      '<img id="my_camera" src="'+data_uri+'"/>';
      document.getElementById("captured_image_data").value = data_uri;

      Swal.fire({
        title: 'Success!',
        text: 'Photo captured successfully!',
        icon: 'success',
        confirmButtonText: 'OK',
        confirmButtonColor: '#4CAF50'
      });
      isCapturing = false;
    });
  });

  // Close camera functions
  function closeCamera() {
    Webcam.reset();
    isCapturing = false;
  }

  document.getElementById('closeCam').addEventListener('click', closeCamera);
  document.getElementById('closeCam1').addEventListener('click', closeCamera);
  document.getElementById('closeCam2').addEventListener('click', closeCamera);

  function saveSnap() {
    const imageData = $("#captured_image_data").val();
    if (!imageData) {
      Swal.fire({
        icon: 'error',
        title: 'No Photo',
        text: 'Please capture a photo before submitting',
        confirmButtonColor: '#4CAF50'
      });
      return false;
    }
    $.ajax({
      type: "POST",
      dataType: "json",
      url: "function.php",
      data: {image: imageData},
      success: function(data) { 
      alert(data);
      }
    });
  }
</script>
   <!-- Address dropdown -->
   <script type="text/javascript" src="js/jquery.js"></script>
   <script type="text/javascript">
      $(document).ready(function() {
         function loadData(type, category_id) {
            $.ajax({
               url: "function.php",
               type: "POST",
               data: {
                  type: "province"
               },
               success: function(data) {
                  $("#Province").html("");
                  $("#Province").append(data);
               }
            });
         }

         function loadCity(province) {
            $.ajax({
               url: "function.php",
               type: "POST",
               data: {
                  type: "City",
                  province: province
               },
               success: function(data) {
                  $("#CityTown").html("");
                  $("#CityTown").append(data);
               }
            });
         }

         function loadBarangay(CityTown) {
            $.ajax({
               url: "function.php",
               type: "POST",
               data: {
                  type: "Barangay",
                  CityTown: CityTown
               },
               success: function(data) {
                  $("#Barangay").html("");
                  $("#Barangay").append(data);
               }
            });
         }
         loadData();
         $("#Province").on("change", function() {
            var Province = $("#Province").val();
            if (Province != "") {
               loadCity(Province);
            } else {
               $("#City").html("");
            }
         })
         $("#CityTown").on("change", function() {
            var City = $("#CityTown").val();
            if (City != "") {
               loadBarangay(City);
            } else {
               $("#CityTown").html("");
            }
         })
         $("#bday").on("input", function() {
            var bdate = $(this).val();
            var bdateformat = new Date(bdate);
            var diff_ms = Date.now() - bdateformat.getTime();
            var age_dt = new Date(diff_ms);
            var age = Math.abs(age_dt.getUTCFullYear() - 1970);
            $("#age").val(age);
         })
      });
   </script>
   <script>
      function validateAge(input) {
         const birthDate = new Date(input.value);
         const today = new Date();
         let age = today.getFullYear() - birthDate.getFullYear();
         const monthDiff = today.getMonth() - birthDate.getMonth();
         
         if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
             age--;
         }
         
         if (age < 15) {
             input.setCustomValidity('Must be at least 15 years old to register');
             Swal.fire({
                 icon: 'error',
                 title: 'Age Restriction',
                 text: 'Resident must be at least 15 years old to register',
                 confirmButtonColor: '#4CAF50'
             });
         } else {
             input.setCustomValidity('');
         }
      }
   </script>
   <!-- RegEx -->
   <script>
      function lettersOnly(input) {
         var regex = /[^a-z ]/gi;
         input.value = input.value.replace(regex, "");
      }
   </script>
