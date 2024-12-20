<!-- Edit Staff Modal -->
<div class="modal fade" id="Edit_Staff<?php echo $staff['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Staff Account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <!-- Form -->
          <form action="function.php" method="POST">
            <div class="row g-2 mb-2">
            <script>
              function lettersOnly (input) {
                var regex = /[^a-z ]/gi;
                input.value = input.value.replace (regex, "");
              }
            </script>
              <div class="col">
                <input type="hidden" name="id" value="<?php echo $staff['id']?>"/>
                <input type="hidden" name="session_role" value="<?php echo $_SESSION['role']?>"/>
                
                <input type="text" class="form-control" name="lastname" autocomplete="off" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)" required value="<?php echo $staff['lastname']?>" required>
                <small id="emailHelp" class="form-text text-muted">Last Name</small>
              </div>
              <div class="col">
                
                <input type="text" class="form-control" name="firstname"  autocomplete="off" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)" required value="<?php echo $staff['firstname']?>" required>
                <small id="emailHelp" class="form-text text-muted">First Name</small>
              </div>
              <div class="col mb-3">
                
                <input type="text" class="form-control" name="middlename"  autocomplete="off" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)" required value="<?php echo $staff['middlename']?>" required>
                <small id="emailHelp" class="form-text text-muted">Middle Name</small>
              </div>
            </div>
            <div class="row g-2 mb-3">
              <div class="col-md-6 ">
                <input type="text" class="form-control" value="<?php echo $staff['houseNo']; ?>" name="houseNo" placeholder="House No" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                <small class="form-text text-muted">house no.</small>
              </div>
              <div class="col-md-6 ">
                <input type="text" class="form-control" value="<?php echo $staff['purokNo']; ?>" name="purokNo" placeholder="Purok No" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                <small  class="form-text text-muted">Purok No.</small>
              </div>
            </div>
            
            <!-- Contact and Gender -->
            <div class="row g-2 mb-2">
              <div class="col">
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
                <small id="emailHelp" class="form-text text-muted">Contact No.</small>
              </div>
           
            </div>

            <!-- moved to useraccount -->
            <!-- input a username and password -->
            <!-- <div class="row g-2 mb-2">
              
              <div class="col input-group">
                <label>Username</label>
                <div class="input-group">
                  <div class="input-group-text"><i class="fa-solid fa-user"></i></div>
                  <input type="text" class="form-control" name="username" id="username_edit<?php echo $staff['id']; ?>" minlength="4" maxlength="12" autocomplete="off" placeholder="Username" value="<?php echo $staff['username']?>" required>
                </div>
              </div>
              
              <div class="col input-group">
                <label>Password</label>
                <div class="input-group">
                  <div class="input-group-text"><i class="fa-solid fa-key"></i></div>
                  <input type="text" class="form-control" name="password" minlength="4" autocomplete="off" placeholder="Password" value="<?php echo $staff['password']?>" required>
                </div>
              </div>
              <label id="user_msg_edit<?php echo $staff['id']; ?>" style="color:#CC0000;" ></label>
            </div> -->
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" name="update_staff" id="btn_edit<?php echo $staff['id']; ?>" class="button-color btn">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>



<!-- <script type="text/javascript">
  $(document).ready(function() {

  var timeOut = null; // this used for hold few seconds to made ajax request

  var loading_html = '<img src="image/ajax-loader.gif" style="height: 20px; width: 20px;"/>'; // just an loading image or we can put any texts here

  //when button is clicked
  $('#username_edit<?php echo $staff['id']; ?>').keyup(function(e){

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
    $('#user_msg_edit<?php echo $staff['id']; ?>').html(loading_html); // adding the loading text or image
  });
  });

  function is_available(){
  //get the username
  var username = $('#username_edit<?php echo $staff['id']; ?>').val();

  //make the ajax request to check is username available or not
  $.post("check_username.php", { username: username },
  function(result)
  {
    console.log(result);
    if(result != 0)
    {
      $('#user_msg_edit<?php echo $staff['id']; ?>').html('Not Available');
      document.getElementById("btn_edit<?php echo $staff['id']; ?>").disabled = true;
    }
    else
    {
      $('#user_msg_edit<?php echo $staff['id']; ?>').html('<span style="color:#006600;">Available</span>');
      document.getElementById("btn_edit<?php echo $staff['id']; ?>").disabled = false;
    }
  });

  }
</script> -->


<!-- Address dropdown -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
  	function loadData(type, category_id){
  		$.ajax({
  			url : "function.php",
  			type : "POST",
  			data: {type : "rovince"},
  			success : function(data){
          $("#Province1<?php echo $staff['id']; ?>").append(data);
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
          $("#CityTown1<?php echo $staff['id']; ?>").html("");
          $("#CityTown1<?php echo $staff['id']; ?>").append(data);
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
          $("#Barangay1<?php echo $staff['id']; ?>").html("");
          $("#Barangay1<?php echo $staff['id']; ?>").append(data);
  				// if(type == "stateData"){
  				// 	$("#CityTown").html(data);
  				// }else {
  				// 	$("#Province").append(data);
  				// }
  				
  			}
  		});
  	}

  	loadData();

  	$("#Province1<?php echo $staff['id']; ?>").on("change",function(){
  		var Province = $("#Province1<?php echo $staff['id']; ?>").val();

  		if(Province != ""){
  			loadCity(Province);
  		}else{
  			$("#City").html("");
  		}
  	})

    $("#CityTown1<?php echo $staff['id']; ?>").on("change",function(){
  		var City = $("#CityTown1<?php echo $staff['id']; ?>").val();

  		if(City != ""){
  			loadBarangay(City);
  		}else{
  			$("#CityTown1<?php echo $staff['id']; ?>").html("");
  		}
  	})

  });
</script>