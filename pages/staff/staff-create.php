
<!-- Add Staff Modal -->
<div class="modal fade" id="Add_Staff" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Create Staff Account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <!-- Form -->
          <form action="function.php" method="POST">
            <div class="row g-2 mb-2">
              <div class="text-center d.flex pb-3">
                <?php 

                  $query = mysqli_query($con, "SELECT image FROM dashboard");
                  {
                  while($row = mysqli_fetch_array($query))
                  echo'
                  <image src="../settings/img/'.basename($row['image']).'" style="border-radius: 50%" alt="" class="w-auto" height="150">';

                  }

                ?>
              </div>

              <div class="col">
                <input type="hidden" name="id" value="<?php echo $row['id']?>"/>
                <input type="hidden" name="session_role" value="<?php echo $_SESSION['role']?>"/>
                <label >Last Name</label>
                <input type="text" class="form-control" name="lastname" placeholder="Enter Last Name" autocomplete="off" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)" required>
              </div>
              
              <div class="col">
                <label >First Name</label>
                <input type="text" class="form-control" name="firstname" placeholder="Enter First Name" autocomplete="off" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)" required>
              </div>
              <div class="col">
                <label >Middle Name</label>
                <input type="text" class="form-control" name="middlename" placeholder="Enter Middle Name" autocomplete="off" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)" required>
              </div>
            </div>

            <div class="row g-2">
              <div class="col-md-12">
                <label>Address</label>
              </div>

              
              <div class="col-md-6 mb-3">
                <input type="text" class="form-control" name="houseNo" placeholder="House No" maxlength="4" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
              </div>
              <div class="col-md-6 mb-3">
                <input type="text" class="form-control" name="purokNo" placeholder="Purok (1-7)" maxlength="1" autocomplete="off" oninput="this.value = this.value.replace(/[^1-7]/g, '');" required>
              </div>
            </div>
            
            <!-- Contact and Gender -->
            <div class="row g-2 mb-2">
              <div class="col">
                <label>Contact No.</label>
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
              <div class="col">
                <label>Gender <span class="text-danger">*</span></label>
                <select class="form-select" name="gender" required>
                  <option value="">Select Gender</option>
                  <option value="MALE">MALE</option>
                  <option value="FEMALE">FEMALE</option>
                </select>
                <div class="invalid-feedback">Please select a gender</div>
              </div>
            </div>

            <!-- input a username and password -->
            
            <div class="row g-2">
              <div class="col input-group">
                  <label>Username</label>
                  <div class="input-group">
                    <div class="input-group-text"><i class="fa-solid fa-user"></i></div>
                    <input type="text" class="form-control" name="username" id="username" minlength="4" autocomplete="off" placeholder="Username" required>
                  </div>
                </div>
                
                <div class="col input-group">
                  <label>Password</label>
                  <div class="input-group">
                    <div class="input-group-text"><i class="fa-solid fa-key"></i></div>
                    <input type="password" class="form-control" name="password" minlength="4" autocomplete="off" placeholder="Password" required>
                  </div>
                </div>
              
              <label id="user_msg" style="color:#CC0000;" ></label>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" name="save_staff" id="btn_add" class="button-color btn"> Submit </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- SCRIPT -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
    // Check Username
  $(document).ready(function() {

      var timeOut = null; // this used for hold few seconds to made ajax request

      var loading_html = '<img src="image/ajax-loader.gif" style="height: 20px; width: 20px;"/>'; // just an loading image or we can put any texts here

      //when button is clicked
      $('#username').keyup(function(e){

        // when press the following key we need not to make any ajax request, you can customize it with your own way
        switch(e.keyCode)
        {
            //case 8:   //backspace
            case 9:     //tab
            case 13:    //enter
            case 16:    //shift
            case 17:    //ctrl
            case 18:    //alt
            case 19:    //pause/break
            case 20:    //caps lock
            case 27:    //escape
            case 33:    //page up
            case 34:    //page down
            case 35:    //end
            case 36:    //home
            case 37:    //left arrow
            case 38:    //up arrow
            case 39:    //right arrow
            case 40:    //down arrow
            case 45:    //insert
            //case 46:  //delete
            return;
        }
        if (timeOut != null)
          clearTimeout(timeOut);
        timeOut = setTimeout(is_available, 1000);  // delay delay ajax request for 1000 milliseconds
        $('#user_msg').html(loading_html); // adding the loading text or image
    });
  });

  function is_available(){
      //get the username
      var username = $('#username').val();
  
      //make the ajax request to check is username available or not
      $.post("check_username.php", { username: username },
      function(result)
      {
          console.log(result);
          if(result != 0)
          {
              $('#user_msg').html('Username is already taken!');
              document.getElementById("btn_add").disabled = true;
          }
          else
          {
              $('#user_msg').html('<span style="color:#006600;">Available</span>');
              document.getElementById("btn_add").disabled = false;
          }
      });
  
  }

  // RegEX
  function lettersOnly (input) {
    var regex = /[^a-z ]/gi;
    input.value = input.value.replace (regex, "");
  }

  //Address Dropdown

  $(document).ready(function(){
  	function loadData(type, category_id){
  		$.ajax({
  			url : "function.php",
  			type : "POST",
  			data: {type : "province"},
  			success : function(data){
          $("#ProvinceAdd").append(data);
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
          $("#CityTownAdd").html("");
          $("#CityTownAdd").append(data);
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
          $("#BarangayAdd").html("");
          $("#BarangayAdd").append(data);
  				// if(type == "stateData"){
  				// 	$("#CityTown").html(data);
  				// }else {
  				// 	$("#Province").append(data);
  				// }
  				
  			}
  		});
  	}

  	loadData();

  	$("#ProvinceAdd").on("change",function(){
  		var Province = $("#ProvinceAdd").val();

  		if(Province != ""){
  			loadCity(Province);
  		}else{
  			$("#City").html("");
  		}
  	})

    $("#CityTownAdd").on("change",function(){
  		var City = $("#CityTownAdd").val();

  		if(City != ""){
  			loadBarangay(City);
  		}else{
  			$("#CityTownAdd").html("");
  		}
  	})

  });
</script>