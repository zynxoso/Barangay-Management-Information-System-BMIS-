function showSpouseChildrenFields() {
  var civilStatus = document.getElementById("civilStatus").value;
  var spouseNameField = document.getElementById("spouse-name");
  var spouseChildrenFields = document.getElementById("spouse-children-fields");
  if (civilStatus == "married") {
    spouseNameField.style.display = "block";
    spouseChildrenFields.style.display = "block";
  } else {
    spouseNameField.style.display = "none";
    spouseChildrenFields.style.display = "none";
  }
}
function showChildNameFields() {
  var numChildren = document.getElementById("num-children").value;
  var childNameFields = document.getElementById("child-name-fields");
  childNameFields.innerHTML = "";
  for (var i = 1; i <= numChildren; i++) {
    var childNameField = `
      <div class="col-md-6">
        <div class="col mb-2">
          <input type="text" class="form-control" value="<?php echo $row['childrenName']?>" name="childrenName" placeholder="Child ${i} Name" id="child-${i}-name" name="child-${i}-name">
        </div>
        <div class="col mb-3"></div>
      </div>
    `;
    childNameFields.innerHTML += childNameField;
  }
}
function calcAge() {
  // Get the birthdate input field
  const birthdayInput = document.getElementById("birthday");
  // Get the age input field
  const ageInput = document.getElementById("editAge");
  // Calculate the age based on the birthdate
  const birthdate = new Date(birthdayInput.value);
  const now = new Date();
  const diff = now.getTime() - birthdate.getTime();
  const age = Math.floor(diff / (1000 * 60 * 60 * 24 * 365.25));
  // Update the age input field
  ageInput.value = age;
}
// Configure a few settings and attach camera 250x187
Webcam.set({
  width: 250,
  height: 250,
  image_format: 'jpeg',
  jpeg_quality: 90
});
document.getElementById('reuploadPic').addEventListener('click', function() {
  Webcam.attach('#camera');
});
document.getElementById('ChangePicture1').addEventListener('click', function() {
    Webcam.attach( '#camera' );
}); 
document.getElementById('capture').addEventListener('click', function() {
  // take snapshot and get image data
  Webcam.snap(function(data_uri) {
    // display preview
    document.getElementById('camera').innerHTML =
      '<img id="capture_frame" src="' + data_uri + '"/>';
    $("#newCaptured").val(data_uri);
    // Display result
     document.getElementById('result').innerHTML = 
    '<img id="capture_frame" src="'+data_uri+'"/>';
    $("#newCaptured").val(data_uri); 
  });
});
document.getElementById('exitCam').addEventListener('click', function() {
  Webcam.reset();
});
document.getElementById('exitCam1').addEventListener('click', function() {
  Webcam.reset();
});
function changeSnap() {
  var base64data = $("#newCaptured").val();
  $.ajax({
    type: "POST",
    dataType: "json",
    url: "function.php",
    data: {
      image: base64data
    },
    success: function(data) {
      alert(data);
    }
  });
}