<?php
include_once "connection.php";
//Add function Barangay Clearance
if (isset($_POST["insert_barangay_clearance"])) {
    $firstname = mysqli_real_escape_string($con, $_POST["firstname"]);
    $lastname = mysqli_real_escape_string($con, $_POST["lastname"]);
    $middlename = mysqli_real_escape_string($con, $_POST["middlename"]);
    $province = mysqli_real_escape_string($con, $_POST["province"]);
    $City = mysqli_real_escape_string($con, $_POST["city"]);
    $barangay = mysqli_real_escape_string($con, $_POST["barangay"]);
    $purokNo = mysqli_real_escape_string($con, $_POST["purokNo"]);
    $clearanceType = "Barangay Clearance";
    $date = date_default_timezone_set("Asia/Manila");
    $currentDateTime = date("F j, Y - g:i:A");
    //quert to add the new data
    $query = "INSERT INTO `tbl_reports` (`firstname`, `lastname`, `middlename`, `purokNo`, `barangay`, `city`, `province`, `clearanceType`, `date`)
        VALUES ('$firstname', '$lastname', '$middlename', '$purokNo', '$barangay', '$City', '$province', '$clearanceType', '$currentDateTime')";
    if (!isset($_SESSION["role"])) {
        $insert =
            "Print Barangay Clearance with name of " .
            $firstname .
            " " .
            $lastname;
        $session_role = mysqli_real_escape_string($con, $_POST["session_role"]);
        $query1 = mysqli_query(
            $con,
            "INSERT INTO `tbl_logs` (`usertype`, `remarks`, `created_at`) VALUES ('$session_role', '$insert', '$currentDateTime')"
        );
    }
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        // $_SESSION['messageCreate'] = " Created Successfully";
        header("Location: ../../resident.php?status=success");
        exit(0);
    } else {
        // $_SESSION['messageCreate'] = " Not Created";
         header("Location: ../../resident.php?status=error");
        exit(0);
    }
    
}
//Insert function Barc cert
if (isset($_POST["insert_barc_form"])) {
    $firstname = mysqli_real_escape_string($con, $_POST["firstname"]);
    $lastname = mysqli_real_escape_string($con, $_POST["lastname"]);
    $middlename = mysqli_real_escape_string($con, $_POST["middlename"]);
    $province = mysqli_real_escape_string($con, $_POST["province"]);
    $City = mysqli_real_escape_string($con, $_POST["city"]);
    $barangay = mysqli_real_escape_string($con, $_POST["barangay"]);
    $purokNo = mysqli_real_escape_string($con, $_POST["purokNo"]);
    $clearanceType = "Certificate of BARC";
    $date = date_default_timezone_set("Asia/Manila");
    $currentDateTime = date("F j, Y - g:i:A");
    //quert to add the new data
    $query = "INSERT INTO `tbl_reports` (`firstname`, `lastname`, `middlename`, `purokNo`, `barangay`, `city`, `province` ,`clearanceType`, `date` )
   VALUES ('$firstname',
   '$lastname',
   '$middlename',
   '$purokNo',
   '$barangay',
   '$City',
   '$province',
   '$clearanceType',
   '$currentDateTime')";
    if (!isset($_SESSION["role"])) {
        $insert =
            "Print BARC CERTIFICATE with name of " .
            $firstname .
            " " .
            $lastname;
        $session_role = mysqli_real_escape_string($con, $_POST["session_role"]);
        $query1 = mysqli_query(
            $con,
            "INSERT INTO `tbl_logs` (`usertype`, `remarks`, `created_at`) VALUES ('$session_role', '$insert', '$currentDateTime')"
        );
    }
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        // $_SESSION['messageCreate'] = " Created Successfully";
        header("Location: ../../resident.php?status=success");
        exit(0);
    } else {
        // $_SESSION['messageCreate'] = " Not Created";
        header("Location: ../../resident.php?status=error");
        exit(0);
    }
}
//Insert function Job Seker cert
if (isset($_POST["insert_seeker_form"])) {
    $firstname = mysqli_real_escape_string($con, $_POST["firstname"]);
    $lastname = mysqli_real_escape_string($con, $_POST["lastname"]);
    $middlename = mysqli_real_escape_string($con, $_POST["middlename"]);
    $province = mysqli_real_escape_string($con, $_POST["province"]);
    $City = mysqli_real_escape_string($con, $_POST["city"]);
    $barangay = mysqli_real_escape_string($con, $_POST["barangay"]);
    $houseNo = mysqli_real_escape_string($con, $_POST["houseNo"]);
    $purokNo = mysqli_real_escape_string($con, $_POST["purokNo"]);
    $clearanceType = "Certificate of Job Seeker";
    $date = date_default_timezone_set("Asia/Manila");
    $currentDateTime = date("F j, Y - g:i:A");
    //quert to add the new data
    $query = "INSERT INTO `tbl_reports` (`firstname`, `lastname`, `middlename`, `houseNo`, `purokNo`, `barangay`, `city`, `province` ,`clearanceType`, `date` )
   VALUES ('$firstname',
   '$lastname',
   '$middlename',
   '$houseNo',
   '$purokNo',
   '$barangay',
   '$City',
   '$province',
   '$clearanceType',
   '$currentDateTime')";
    if (!isset($_SESSION["role"])) {
        $insert =
            " Print CERTIFICATE OF JOB SEEKER with name of " .
            $firstname .
            " " .
            $lastname;
        $session_role = mysqli_real_escape_string($con, $_POST["session_role"]);
        $query1 = mysqli_query(
            $con,
            "INSERT INTO `tbl_logs` (`usertype`, `remarks`, `created_at`) VALUES ('$session_role', '$insert', '$currentDateTime')"
        );
    }
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        // $_SESSION["messageCreate"] = " Created Successfully";
        header("Location: ../../resident.php?status=success");
        exit(0);
    } else {
        // $_SESSION["messageCreate"] = " Not Created";
         header("Location: ../../resident.php?status=error");
        exit(0);
    }
}
// josseeker oath
if (isset($_POST["insert_seeker_oath"])) {
    $firstname = mysqli_real_escape_string($con, $_POST["firstname"]);
    $lastname = mysqli_real_escape_string($con, $_POST["lastname"]);
    $middlename = mysqli_real_escape_string($con, $_POST["middlename"]);
    $province = mysqli_real_escape_string($con, $_POST["province"]);
    $City = mysqli_real_escape_string($con, $_POST["city"]);
    $barangay = mysqli_real_escape_string($con, $_POST["barangay"]);
    $houseNo = mysqli_real_escape_string($con, $_POST["houseNo"]);
    $purokNo = mysqli_real_escape_string($con, $_POST["purokNo"]);
    $clearanceType = "Oath of Job Seeker";
    $date = date_default_timezone_set("Asia/Manila");
    $currentDateTime = date("F j, Y - g:i:A");
    //quert to add the new data
    $query = "INSERT INTO `tbl_reports` (`firstname`, `lastname`, `middlename`, `houseNo`, `purokNo`, `barangay`, `city`, `province` ,`clearanceType`, `date` )
   VALUES ('$firstname',
   '$lastname',
   '$middlename',
   '$houseNo',
   '$purokNo',
   '$barangay',
   '$City',
   '$province',
   '$clearanceType',
   '$currentDateTime')";
    if (!isset($_SESSION["role"])) {
        $insert =
            "Print JOB SEEKER OATH with name of, " .
            $firstname .
            " " .
            $middlename .
            " " .
            $lastname .
            ", " .
            $age .
            ", resident of" .
            $barangay .
            $City .
            $province;
        $session_role = mysqli_real_escape_string($con, $_POST["session_role"]);
        $query1 = mysqli_query(
            $con,
            "INSERT INTO `tbl_logs` (`usertype`, `remarks`, `created_at`) VALUES ('$session_role', '$insert', '$currentDateTime')"
        );
    }
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        // $_SESSION['messageCreate'] = " Created Successfully";
        header("Location: ../../resident.php?status=success");
        exit(0);
    } else {
        // $_SESSION['messageCreate'] = " Not Created";
         header("Location: ../../resident.php?status=error");
        exit(0);
    }
}
//Add function Business Permit
if (isset($_POST["insert_business_permit"])) {
    $firstname = mysqli_real_escape_string($con, $_POST["firstname"]);
    $lastname = mysqli_real_escape_string($con, $_POST["lastname"]);
    $middlename = mysqli_real_escape_string($con, $_POST["middlename"]);
    $province = mysqli_real_escape_string($con, $_POST["province"]);
    $City = mysqli_real_escape_string($con, $_POST["city"]);
    $barangay = mysqli_real_escape_string($con, $_POST["barangay"]);
    $houseNo = mysqli_real_escape_string($con, $_POST["houseNo"]);
    $purokNo = mysqli_real_escape_string($con, $_POST["purokNo"]);
    $clearanceType = "Certificate of Business Permit";
    $date = date_default_timezone_set("Asia/Manila");
    $currentDateTime = date("F j, Y - g:i:A");
    //quert to add the new data
    $query = "INSERT INTO `tbl_reports` (`firstname`, `lastname`, `middlename`, `houseNo`, `purokNo`, `barangay`, `city`, `province`, `clearanceType`, `date` )
   VALUES ('$firstname',
   '$lastname',
   '$middlename',
   '$houseNo',
   '$purokNo',
   '$barangay',
   '$City',
   '$province',
   '$clearanceType',
   '$currentDateTime')";
    if (!isset($_SESSION["role"])) {
        $insert =
            "Print Business Permit with name of " .
            $firstname .
            " " .
            $lastname;
        $session_role = mysqli_real_escape_string($con, $_POST["session_role"]);
        $query1 = mysqli_query(
            $con,
            "INSERT INTO `tbl_logs` (`usertype`, `remarks`, `created_at`) VALUES ('$session_role', '$insert', '$currentDateTime')"
        );
    }
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION["messageCreate"] = " Created Successfully";
        header("Location: ../../resident.php?status=success");
        exit(0);
    } else {
        $_SESSION["messageCreate"] = " Not Created";
         header("Location: ../../resident.php?status=error");
        exit(0);
    }
}
//Insert function Good moral
if (isset($_POST["insert_good_moral"])) {
    $firstname = mysqli_real_escape_string($con, $_POST["firstname"]);
    $lastname = mysqli_real_escape_string($con, $_POST["lastname"]);
    $middlename = mysqli_real_escape_string($con, $_POST["middlename"]);
    $province = mysqli_real_escape_string($con, $_POST["province"]);
    $City = mysqli_real_escape_string($con, $_POST["city"]);
    $barangay = mysqli_real_escape_string($con, $_POST["barangay"]);
    $houseNo = mysqli_real_escape_string($con, $_POST["houseNo"]);
    $purokNo = mysqli_real_escape_string($con, $_POST["purokNo"]);
    $clearanceType = "Certificate of Good Moral";
    $date = date_default_timezone_set("Asia/Manila");
    $currentDateTime = date("F j, Y - g:i:A");
    //quert to add the new data
    $query = "INSERT INTO `tbl_reports` (`firstname`, `lastname`, `middlename`, `houseNo`, `purokNo`, `barangay`, `city`, `province`, `clearanceType`, `date` )
   VALUES ('$firstname',
   '$lastname',
   '$middlename',
   '$houseNo',
   '$purokNo',
   '$barangay',
   '$City',
   '$province',
   '$clearanceType',
   '$currentDateTime')";
    if (!isset($_SESSION["role"])) {
        $insert =
            "Print Good Moral with name of " . $firstname . " " . $lastname;
        $session_role = mysqli_real_escape_string($con, $_POST["session_role"]);
        $query1 = mysqli_query(
            $con,
            "INSERT INTO `tbl_logs` (`usertype`, `remarks`, `created_at`) VALUES ('$session_role', '$insert', '$currentDateTime')"
        );
    }
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION["messageCreate"] = " Created Successfully";
        header("Location: ../../resident.php?status=success");
        exit(0);
    } else {
        $_SESSION["messageCreate"] = " Not Created";
         header("Location: ../../resident.php?status=error");
        exit(0);
    }
}
//Insert function Certificate of Indigency
if (isset($_POST["insert_indigency"])) {
    $firstname = mysqli_real_escape_string($con, $_POST["firstname"]);
    $lastname = mysqli_real_escape_string($con, $_POST["lastname"]);
    $middlename = mysqli_real_escape_string($con, $_POST["middlename"]);
    $province = mysqli_real_escape_string($con, $_POST["province"]);
    $City = mysqli_real_escape_string($con, $_POST["city"]);
    $barangay = mysqli_real_escape_string($con, $_POST["barangay"]);
    $houseNo = mysqli_real_escape_string($con, $_POST["houseNo"]);
    $purokNo = mysqli_real_escape_string($con, $_POST["purokNo"]);
    $clearanceType = "Certificate of Indigency";
    $date = date_default_timezone_set("Asia/Manila");
    $currentDateTime = date("F j, Y - g:i:A");
    //quert to add the new data
    $query = "INSERT INTO `tbl_reports` (`firstname`, `lastname`, `middlename`, `houseNo`, `purokNo`, `barangay`, `city`, `province`, `clearanceType`, `date` )
   VALUES ('$firstname',
   '$lastname',
   '$middlename',
   '$houseNo',
   '$purokNo',
   '$barangay',
   '$City',
   '$province',
   '$clearanceType',
   '$currentDateTime')";
    if (!isset($_SESSION["role"])) {
        $insert =
            "Print Certificate of Indigency with name of " .
            $firstname .
            " " .
            $lastname;
        $session_role = mysqli_real_escape_string($con, $_POST["session_role"]);
        $query1 = mysqli_query(
            $con,
            "INSERT INTO `tbl_logs` (`usertype`, `remarks`, `created_at`) VALUES ('$session_role', '$insert', '$currentDateTime')"
        );
    }
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        header("Location: ../../resident.php?status=success");
        exit(0);
    } else {
         header("Location: ../../resident.php?status=error");
        exit(0);
    }
}
//Insert function Certificate of Residency
if (isset($_POST["insert_residency"])) {
    $firstname = mysqli_real_escape_string($con, $_POST["firstname"]);
    $lastname = mysqli_real_escape_string($con, $_POST["lastname"]);
    $middlename = mysqli_real_escape_string($con, $_POST["middlename"]);
    $province = mysqli_real_escape_string($con, $_POST["province"]);
    $City = mysqli_real_escape_string($con, $_POST["city"]);
    $barangay = mysqli_real_escape_string($con, $_POST["barangay"]);
    $houseNo = mysqli_real_escape_string($con, $_POST["houseNo"]);
    $purokNo = mysqli_real_escape_string($con, $_POST["purokNo"]);
    $clearanceType = "Certificate of Residency";
    $date = date_default_timezone_set("Asia/Manila");
    $currentDateTime = date("F j, Y - g:i:A");
    //quert to add the new data
    $query = "INSERT INTO `tbl_reports` (`firstname`, `lastname`, `middlename`, `houseNo`, `purokNo`, `barangay`, `city`, `province`, `clearanceType`, `date` )
   VALUES ('$firstname',
   '$lastname',
   '$middlename',
   '$houseNo',
   '$purokNo',
   '$barangay',
   '$City',
   '$province',
   '$clearanceType',
   '$currentDateTime')";
    if (!isset($_SESSION["role"])) {
        $insert =
            "Print Certificate of Residency with name of " .
            $firstname .
            " " .
            $lastname;
        $session_role = mysqli_real_escape_string($con, $_POST["session_role"]);
        $query1 = mysqli_query(
            $con,
            "INSERT INTO `tbl_logs` (`usertype`, `remarks`, `created_at`) VALUES ('$session_role', '$insert', '$currentDateTime')"
        );
    }
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        header("Location: ../../resident.php?status=success");
        exit(0);
    } else {
         header("Location: ../../resident.php?status=error");
        exit(0);
    }
}
?>
