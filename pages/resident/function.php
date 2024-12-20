<?php
require_once '../connection.php';
/* Address Combo Box function */
$str = "";
if(isset($_POST['type']) && $_POST["type"] == "City"){
  $sql = "SELECT DISTINCT citytown FROM tbl_barangays WHERE province = '{$_POST['province']}'";
  $query = mysqli_query($con,$sql) or die("Query Unsuccessful.");
  $str = "";
  while($row = mysqli_fetch_assoc($query)){
    $str .= "<option value='{$row['citytown']}'>{$row['citytown']}</option>";
  }
  echo $str;
}else if(isset($_POST['type']) && $_POST["type"] == "Barangay"){
  $sql = "SELECT DISTINCT barangay FROM tbl_barangays WHERE CityTown = '{$_POST['CityTown']}'";
  $query = mysqli_query($con,$sql) or die("Query Unsuccessful.");
  $str = "";
  while($row = mysqli_fetch_assoc($query)){
    $str .= "<option value='{$row['barangay']}'>{$row['barangay']}</option>";
  }
  echo $str;
}else if(isset($_POST['type'])){
  $sql = "SELECT distinct province from tbl_barangays order by province";
  $query = mysqli_query($con,$sql) or die("Query Unsuccessful.");
  while($row = mysqli_fetch_assoc($query)){
    $str .= "<option value='{$row['province']}'>{$row['province']}</option>";
  }
  echo $str;
}
//Add function
if(isset($_POST['save_resident']))
{
  $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
  $contactNo = mysqli_real_escape_string($con, $_POST['contactNo']);
  // captured image save to...
  $folderPath = 'images/';
  $image_parts = explode(";base64,", $_POST['captured_image']);
  $image_type_aux = explode("images/", $image_parts[0]);
  $image_type = $image_type_aux[0];
  $image_base64 = base64_decode($image_parts[1]);
  $file = $folderPath . $firstname .' '. $lastname . ' - ' . $contactNo .'.jpeg';
  file_put_contents($file, $image_base64);
  $suffixname = mysqli_real_escape_string($con, $_POST['suffixname']);
  $gender = mysqli_real_escape_string($con, $_POST['gender']);
  $age = mysqli_real_escape_string($con, $_POST['age']);
  // $dateBirth = mysqli_real_escape_string($con, $_POST['birthdate']);
  // $birthdate = date_format($dateBirth,"F d Y");
  // $birthdate = date('F-d-Y', strtotime($con, $_POST['birthdate']));
  $birthdate = mysqli_real_escape_string($con, $_POST['birthdate']);
  $houseNo = mysqli_real_escape_string($con, $_POST['houseNo']);
  $purok = mysqli_real_escape_string($con, $_POST['purokNo']);
  $barangay = mysqli_real_escape_string($con, $_POST['barangay']);
  $city = mysqli_real_escape_string($con, $_POST['city']);
  $province = mysqli_real_escape_string($con, $_POST['province']);
  $middlename = mysqli_real_escape_string($con, $_POST['middlename']);
  $emailAddress = mysqli_real_escape_string($con, $_POST['emailAddress']);
  $motherName = mysqli_real_escape_string($con, $_POST['motherName']);
  $fatherName = mysqli_real_escape_string($con, $_POST['fatherName']);
  $motherContactNo = mysqli_real_escape_string($con, $_POST['motherContactNo']);
  $fatherContactNo = mysqli_real_escape_string($con, $_POST['fatherContactNo']);
  $height = mysqli_real_escape_string($con, $_POST['height']);
  $weight = mysqli_real_escape_string($con, $_POST['weight']);
  $nationality = mysqli_real_escape_string($con, $_POST['nationality']);
  $civilStatus = mysqli_real_escape_string($con, $_POST['civilStatus']);
  $course = mysqli_real_escape_string($con, $_POST['course']);
  $CSchoolName = mysqli_real_escape_string($con, $_POST['CSchoolName']);
  $CSchoolAddress = mysqli_real_escape_string($con, $_POST['CSchoolAddress']);
  $CYearAttended = mysqli_real_escape_string($con, $_POST['CYearAttended']);
  $HSchoolName = mysqli_real_escape_string($con, $_POST['HSchoolName']);
  $HSchoolAddress = mysqli_real_escape_string($con, $_POST['HSchoolAddress']);
  $HYearAttended = mysqli_real_escape_string($con, $_POST['HYearAttended']);
  $ESchoolName = mysqli_real_escape_string($con, $_POST['ESchoolName']);
  $ESchoolAddress = mysqli_real_escape_string($con, $_POST['ESchoolAddress']);
  $EYearAttended = mysqli_real_escape_string($con, $_POST['EYearAttended']);
  $captured_image = $file;
  $LandSize = isset($_POST['LandSize']) ? mysqli_real_escape_string($con, $_POST['LandSize']) : null; // for BARC
  $LandDirection = isset($_POST['LandDirection']) ? mysqli_real_escape_string($con, $_POST['LandDirection']) : null; // for BARC
  
  //quert to add the new data
  $query = "INSERT INTO `tblresident` (`firstname`, `lastname`, `gender`, `age`, `middlename`, `suffixname`, `birthdate`, `houseNo`, `purokNo`, `barangay`, `city`, `province`, `contactNo`, `emailAddress`, `motherName`, `fatherName`, `motherContactNo`, `fatherContactNo`, `height`, `weight`, `nationality`, `civilStatus`, `course`, `CSchoolName`, `CSchoolAddress`, `CYearAttended`, `HSchoolName`, `HSchoolAddress`, `HYearAttended`, `ESchoolName`, `ESchoolAddress`, `EYearAttended`, `captured_image`, `LandSize`, `LandDirection`) VALUES ('$firstname','$lastname','$gender','$age','$middlename','$suffixname','$birthdate','$houseNo','$purok','$barangay','$city','$province','$contactNo','$emailAddress','$motherName','$fatherName','$motherContactNo','$fatherContactNo','$height','$weight','$nationality','$civilStatus','$course','$CSchoolName','$CSchoolAddress','$CYearAttended','$HSchoolName','$HSchoolAddress','$HYearAttended','$ESchoolName','$ESchoolAddress','$EYearAttended','$captured_image','$LandSize','$LandDirection')";


  // query to send data to logs
  $date = date_default_timezone_set('Asia/Manila'); 
  $currentDateTime = date('F j, Y - g:i:A');
  $insert = mysqli_real_escape_string($con, "Added Resident with name of ".$firstname ." " .$lastname);
  $session_role = mysqli_real_escape_string($con, $_POST['session_role']);
  $query1 = "INSERT INTO `tbl_logs` (`usertype`, `remarks`, `created_at`) VALUES ('$session_role', '$insert', '$currentDateTime')";
  mysqli_query($con, $query1);
  $query_run = mysqli_query($con, $query);
  if($query_run)
  {
    $_SESSION['status'] = "Created Successfully";
    $_SESSION['status_code'] = "success";
    header("Location: resident.php");
    exit(0);
  }
  else{
    $_SESSION['status'] = "Your Data is NOT UPLOADED";
    $_SESSION['status_code'] = "error";
    header("Location: resident.php");
    exit(0);
  }
}

  //Edit function
  if(isset($_POST['update_resident'])){
    $folderPath = 'images/';
    $image_parts = explode(";base64,", $_POST['captured_image']);
    $image_type_aux = explode("images/", $image_parts[0]);
    $image_type = $image_type_aux[0];
    $image_base64 = base64_decode($image_parts[0]);
    $file = $folderPath . uniqid() . '.jpeg';
    file_put_contents($file, $image_base64); 
    $user_id = mysqli_real_escape_string($con, $_POST['id']);
    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $contactNo = mysqli_real_escape_string($con, $_POST['contactNo']);
    $suffixname = mysqli_real_escape_string($con, $_POST['suffixname']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $age = mysqli_real_escape_string($con, $_POST['age']);
    $birthdate = mysqli_real_escape_string($con, $_POST['birthdate']);
    $houseNo = mysqli_real_escape_string($con, $_POST['houseNo']);
    $barangay = mysqli_real_escape_string($con, $_POST['barangay']);
    $city = mysqli_real_escape_string($con, $_POST['city']);
    $province = mysqli_real_escape_string($con, $_POST['province']);
    $purok = mysqli_real_escape_string($con, $_POST['purokNo']);
    $middlename = mysqli_real_escape_string($con, $_POST['middlename']);
    $emailAddress = mysqli_real_escape_string($con, $_POST['emailAddress']);
    $motherName = mysqli_real_escape_string($con, $_POST['motherName']);
    $fatherName = mysqli_real_escape_string($con, $_POST['fatherName']);
    $motherContactNo = mysqli_real_escape_string($con, $_POST['motherContactNo']);
    $fatherContactNo = mysqli_real_escape_string($con, $_POST['fatherContactNo']);
    $height = mysqli_real_escape_string($con, $_POST['height']);
    $weight = mysqli_real_escape_string($con, $_POST['weight']);
    $nationality = mysqli_real_escape_string($con, $_POST['nationality']);
    $civilStatus = mysqli_real_escape_string($con, $_POST['civilStatus']);
    $course = mysqli_real_escape_string($con, $_POST['course']);
    $CSchoolName = mysqli_real_escape_string($con, $_POST['CSchoolName']);
    $CSchoolAddress = mysqli_real_escape_string($con, $_POST['CSchoolAddress']);
    $CYearAttended = mysqli_real_escape_string($con, $_POST['CYearAttended']);
    $HSchoolName = mysqli_real_escape_string($con, $_POST['HSchoolName']);
    $HSchoolAddress = mysqli_real_escape_string($con, $_POST['HSchoolAddress']);
    $HYearAttended = mysqli_real_escape_string($con, $_POST['HYearAttended']);
    $ESchoolName = mysqli_real_escape_string($con, $_POST['ESchoolName']);
    $ESchoolAddress = mysqli_real_escape_string($con, $_POST['ESchoolAddress']);
    $EYearAttended = mysqli_real_escape_string($con, $_POST['EYearAttended']);
    $LandSize = mysqli_real_escape_string($con, $_POST['LandSize']); //for BARC//
    $LandDirection = mysqli_real_escape_string($con, $_POST['LandDirection']); //for BARC//
    // query to update the data
   
    $query_run = mysqli_query($con, "UPDATE `tblresident` SET `firstname`='$firstname',`lastname`='$lastname',`contactNo`='$contactNo',`suffixname`='$suffixname',`gender`='$gender',`age`='$age',`birthdate`='$birthdate',`houseNo`='$houseNo',`purokNo`='$purok',`middlename`='$middlename',`emailAddress`='$emailAddress',`motherName`='$motherName',`fatherName`='$fatherName',`motherContactNo`='$motherContactNo',`fatherContactNo`='$fatherContactNo',`height`='$height',`weight`='$weight',`nationality`='$nationality',`civilStatus`='$civilStatus',`course`='$course',`CSchoolName`='$CSchoolName',`CSchoolAddress`='$CSchoolAddress',`CYearAttended`='$CYearAttended',`HSchoolName`='$HSchoolName',`HSchoolAddress`='$HSchoolAddress',`HYearAttended`='$HYearAttended',`ESchoolName`='$ESchoolName',`ESchoolAddress`='$ESchoolAddress',`EYearAttended`='$EYearAttended',`LandSize`='$LandSize',`LandDirection`='$LandDirection' WHERE `id`='$user_id'");
    // query to send data to logs
    $date = date_default_timezone_set('Asia/Manila'); 
    $currentDateTime = date('F j, Y - g:i:A');
    $insert = mysqli_real_escape_string($con, "Updated Resident with name of ".$firstname ." " .$lastname);
    $session_role = mysqli_real_escape_string($con, $_POST['session_role']);
    $query1 = mysqli_query($con, "INSERT INTO `tbl_logs` (`usertype`, `remarks`, `created_at`) VALUES ('$session_role', '$insert', '$currentDateTime')");
    // mysqli_query($con, $query1);
    if($query_run)
    {
        header("Location: resident.php");
        exit(0);
    }
  }
  //Delete function
  if(isset($_POST['delete_resident']))
  {
    $id = mysqli_real_escape_string($con, $_POST['id']);
    // query to delete a record
    $query = "DELETE FROM tblresident WHERE id=$id";
    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    // query to send data to logs
    $date = date_default_timezone_set('Asia/Manila'); 
    $currentDateTime = date('F j, Y - g:i:A');
    $insert = mysqli_real_escape_string($con, "Deleted Resident with name of ".$firstname ." " .$lastname);
    $session_role = mysqli_real_escape_string($con, $_POST['session_role']);
    $query1 = "INSERT INTO `tbl_logs` (`usertype`, `remarks`, `created_at`) VALUES ('$session_role', '$insert', '$currentDateTime')";
    mysqli_query($con, $query1);
    if (mysqli_query($con, $query)) {
      header("Location: resident.php");
        exit(0);
    }
  }

   //add business
if (isset($_POST['submit_business'])) {

  // Store form data in session for later use (optional)
  $_SESSION['business_amount'] = $_POST['business_amount'];
  $_SESSION['business_type'] = $_POST['business_type'];
  $_SESSION['business_name'] = $_POST['business_name'];
  $_SESSION['business_location'] = $_POST['business_location'];
  $_SESSION['Official_Receipt'] = $_POST['Official_Receipt'];

  // Capture form data and escape for safety
  $resident_id = mysqli_real_escape_string($con, $_POST['resident_id']); 
  $businessName = mysqli_real_escape_string($con, $_POST['business_name']);
  $businessLocation = mysqli_real_escape_string($con, $_POST['business_location']);
  $businessType = mysqli_real_escape_string($con, $_POST['business_type']);
  $businessAmount = mysqli_real_escape_string($con, $_POST['business_amount']);
  $OfficialReceipt = mysqli_real_escape_string($con, $_POST['Official_Receipt']);

  // Query to insert business log into tbl_business_logs
  $query = "INSERT INTO tbl_business_logs (user_id, BusinessName, BusinessLocation, BusinessType, BusinessAmount, Official_Receipt) 
            VALUES ('$resident_id', '$businessName', '$businessLocation', '$businessType', '$businessAmount', '$OfficialReceipt')";

  // Query to log the action in the tbl_logs table
  $date = date_default_timezone_set('Asia/Manila'); 
  $currentDateTime = date('F j, Y - g:i:A');
  $insert = mysqli_real_escape_string($con, "Added business data for resident ID: $resident_id");
  $session_role = mysqli_real_escape_string($con, $_POST['session_role']); // Assuming session role is provided
  $query1 = "INSERT INTO tbl_logs (usertype, remarks, created_at) VALUES ('$session_role', '$insert', '$currentDateTime')";

  // Execute both queries
  $query_run = mysqli_query($con, $query);
  $query_run_log = mysqli_query($con, $query1);

  // Check if the queries were successful
  if ($query_run && $query_run_log) {
      $_SESSION['status'] = "Business data added successfully.";
      $_SESSION['status_code'] = "success";
      $redirectUrl = "clearances/cert/business_permit_form.php?id=" . $resident_id . "&certificate_type=" . urlencode($businessType);
      
      // Redirect with parameters
      header("Location: $redirectUrl");
      exit(0);
  } else {
      $_SESSION['status'] = "Failed to add business data.";
      $_SESSION['status_code'] = "error";
      header("Location: resident.php"); 
      exit(0);
  }
}

?>