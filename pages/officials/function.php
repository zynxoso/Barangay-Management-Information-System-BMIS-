<?php
include "../connection.php";

if (isset($_POST["add_official"])) {
    // $output_dir = "signatures/";/* Path for file upload */
    // $RandomNum = time();
    // $ImageName = str_replace(' ','-',strtolower($_FILES['image']['name'][0]));
    // $ImageType = $_FILES['image']['type'][0];

    // $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
    // $ImageExt = str_replace('.','',$ImageExt);
    // $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
    // $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
    // $ret[$NewImageName]= $output_dir.$NewImageName;

    // /* Try to create the directory if it does not exist */
    // if (!file_exists($output_dir))
    // {
    // 	@mkdir($output_dir, 0777);
    // }
    // move_uploaded_file($_FILES["image"]["tmp_name"][0],$output_dir."/".$NewImageName );

    $position = mysqli_real_escape_string($con, $_POST["position"]);
    $lastname = mysqli_real_escape_string($con, $_POST["lastname"]);
    $firstname = mysqli_real_escape_string($con, $_POST["firstname"]);
    $middlename = mysqli_real_escape_string($con, $_POST["middlename"]);
    $contactNo = mysqli_real_escape_string($con, $_POST["contactNo"]);
    $start_date = mysqli_real_escape_string($con, $_POST["start_date"]);
    $end_date = mysqli_real_escape_string($con, $_POST["end_date"]);
    $status = mysqli_real_escape_string($con, $_POST["status"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $gender = mysqli_real_escape_string($con, $_POST["gender"]);
    $province = mysqli_real_escape_string($con, $_POST["province"]);
    $City = mysqli_real_escape_string($con, $_POST["City"]);
    $barangay = mysqli_real_escape_string($con, $_POST["barangay"]);

    // Handle the image upload
    // $image = $_FILES["image"]["name"]; // Get the original file name
    $targetDir = "../pages/staff/image"; // Directory where you want to save the image
    $targetFile = $targetDir . basename($image); // Full path to save the image

    // Check if directory exists, if not create it
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true); // Create directory recursively
    }

        // If upload is successful, save the file path in the database
        $query = "INSERT INTO `tblofficials` (`position`, `lastname`, `firstname`, `middlename`, `contactNo`, `start_date`, `end_date`, `status`, `email`, `gender`, `province`, `City`, `barangay`, `image`) 
                  VALUES ('$position', '$lastname', '$firstname', '$middlename', '$contactNo', '$start_date', '$end_date', '$status', '$email', '$gender', '$province', '$City', '$barangay', '$targetFile')";

        $query_run = mysqli_query($con, $query);

        if ($query_run) {
            header("Location: officials.php?status=success");  
            exit(0);
        } else {
            header("Location: officials.php?status=error");
            exit(0);
        }
    
}

//Edit function
if (isset($_POST["update_official"])) {
    // $output_dir = "signatures/";/* Path for file upload */
    // $RandomNum = time();
    // $ImageName = str_replace(' ','-',strtolower($_FILES['image']['name'][0]));
    // $ImageType = $_FILES['image']['type'][0];

    // $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
    // $ImageExt = str_replace('.','',$ImageExt);
    // $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
    // $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
    // $ret[$NewImageName]= $output_dir.$NewImageName;

    // /* Try to create the directory if it does not exist */
    // if (!file_exists($output_dir))
    // {
    // 	@mkdir($output_dir, 0777);
    // }
    // move_uploaded_file($_FILES["image"]["tmp_name"][0],$output_dir."/".$NewImageName );

    $id = mysqli_real_escape_string($con, $_POST["id"]);
    $position = mysqli_real_escape_string($con, $_POST["position"]);
    $lastname = mysqli_real_escape_string($con, $_POST["lastname"]);
    $firstname = mysqli_real_escape_string($con, $_POST["firstname"]);
    $middlename = mysqli_real_escape_string($con, $_POST["middlename"]);
    $contactNo = mysqli_real_escape_string($con, $_POST["contactNo"]);
    $start_date = mysqli_real_escape_string($con, $_POST["start_date"]);
    $end_date = mysqli_real_escape_string($con, $_POST["end_date"]);
    $status = mysqli_real_escape_string($con, $_POST["status"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $gender = mysqli_real_escape_string($con, $_POST["gender"]);
    $province = mysqli_real_escape_string($con, $_POST["province"]);
    $City = mysqli_real_escape_string($con, $_POST["City"]);
    $barangay = mysqli_real_escape_string($con, $_POST["barangay"]);

    // Check if a new image is uploaded
    if (!empty($_FILES["image"]["name"])) {
        $output_dir = "../pages/staff/image"; // Folder for storing images
        $RandomNum = time();
        $ImageName = str_replace(
            " ",
            "-",
            strtolower($_FILES["image"]["name"])
        );
        $ImageExt = pathinfo($ImageName, PATHINFO_EXTENSION);
        $NewImageName =
            pathinfo($ImageName, PATHINFO_FILENAME) .
            "-" .
            $RandomNum .
            "." .
            $ImageExt;

        // Create directory if it doesn't exist
        if (!file_exists($output_dir)) {
            mkdir($output_dir, 0777, true);
        }

        // Move the uploaded file to the target directory
        if (
            move_uploaded_file(
                $_FILES["image"]["tmp_name"],
                $output_dir . $NewImageName
            )
        ) {
            // Get the current image path
            $currentImageQuery = mysqli_query(
                $con,
                "SELECT `image` FROM `tblofficials` WHERE `id` = '$id'"
            );
            $currentImageRow = mysqli_fetch_assoc($currentImageQuery);
            $oldImagePath = $currentImageRow["image"];

            // Delete old image if it exists
            if (file_exists($oldImagePath) && !empty($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Update the database with the new image path and other information
            $imagePath = $output_dir . $NewImageName;
            $query = "UPDATE `tblofficials` SET 
            `position` = '$position', 
            `lastname` = '$lastname', 
            `firstname` = '$firstname',  
            `middlename` = '$middlename', 
            `contactNo` = '$contactNo', 
            `email` = '$email', 
            `start_date` = '$start_date', 
            `end_date` = '$end_date', 
            `status` = '$status', 
            `gender` = '$gender', 
            `province` = '$province', 
            `City` = '$City', 
            `barangay` = '$barangay', 
            `image` = '$imagePath' 
            WHERE `id` = '$id'";
        } else {
            die("Image upload failed.");
        }
    } else {
        // If no new image was uploaded, update other information only
        $query = "UPDATE `tblofficials` SET 
        `position` = '$position', 
        `lastname` = '$lastname', 
        `firstname` = '$firstname',  
        `middlename` = '$middlename', 
        `contactNo` = '$contactNo', 
        `email` = '$email', 
        `start_date` = '$start_date', 
        `end_date` = '$end_date', 
        `status` = '$status', 
        `gender` = '$gender', 
        `province` = '$province', 
        `City` = '$City', 
        `barangay` = '$barangay' 
        WHERE `id` = '$id'";
    }

    // Execute the query
    ($query_run = mysqli_query($con, $query)) or die(mysqli_error($con));

    if ($query_run) {
        header("Location: officials.php?status=success1");  
        exit(0);
    } else {
        echo "Update failed.";
    }

    // Close the connection
    $con->close();
}

//Delete function
if (isset($_POST["delete_official"])) {
    $id = mysqli_real_escape_string($con, $_POST["id"]);

    // query to delete a record
    $query = "DELETE FROM tblofficials WHERE id=$id";

    if (mysqli_query($con, $query)) {
       
        header("Location: officials.php?status=success2");  
        exit(0);
    }
}

// Active function
if (isset($_POST["Active"])) {
    $id = $_POST["id"];
    $status = "Active";
    // query to update the data
    $sql = "UPDATE tblofficials SET status = '$status' WHERE id = '$id'";
    if ($result2 = $con->query($sql)) {
        header("location:officials.php");
    }
}

// Restore function
if (isset($_POST["Active"])) {
    $id = $_POST["id"];

    $position = mysqli_real_escape_string($con, $_POST["position"]);
    $lastname = mysqli_real_escape_string($con, $_POST["lastname"]);
    $firstname = mysqli_real_escape_string($con, $_POST["firstname"]);
    $middlename = mysqli_real_escape_string($con, $_POST["middlename"]);
    $contactNo = mysqli_real_escape_string($con, $_POST["contactNo"]);
    $province = mysqli_real_escape_string($con, $_POST["province"]);
    $City = mysqli_real_escape_string($con, $_POST["City"]);
    $barangay = mysqli_real_escape_string($con, $_POST["barangay"]);
    $start_date = mysqli_real_escape_string($con, $_POST["start_date"]);
    $end_date = mysqli_real_escape_string($con, $_POST["end_date"]);
    $status = mysqli_real_escape_string($con, $_POST["status"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $gender = mysqli_real_escape_string($con, $_POST["gender"]);

    $query_run = "INSERT INTO `tblofficials` (`position`, `lastname`, `firstname`, `middlename`, `contactNo`, `province`, `City`, `barangay`, `start_date`, `end_date`, `status`,  `email`,`gender`)
   VALUES 
    ('$position',
    '$lastname',
    '$firstname',
    '$middlename',
    '$contactNo',
    '$province',
    '$City',
    '$barangay',
    '$start_date',
    '$end_date',
    '$status',
    '$email',
    '$gender')";

    if ($result2 = $con->query($query_run)) {
        header("Location: officials.php");
    }
}

// Restore delete function
if (isset($_POST["Active"])) {
    $id = mysqli_real_escape_string($con, $_POST["id"]);

    // query to delete a record
    $query = "DELETE FROM tbl_archives WHERE id=$id";

    if (mysqli_query($con, $query)) {
        header("Location: officials.php");
        exit(0);
    }
}

// Archive function

if (isset($_POST["Inactive"])) {
    $id = $_POST["id"];

    $position = mysqli_real_escape_string($con, $_POST["position"]);
    $lastname = mysqli_real_escape_string($con, $_POST["lastname"]);
    $firstname = mysqli_real_escape_string($con, $_POST["firstname"]);
    $middlename = mysqli_real_escape_string($con, $_POST["middlename"]);
    $contactNo = mysqli_real_escape_string($con, $_POST["contactNo"]);
    $province = mysqli_real_escape_string($con, $_POST["province"]);
    $City = mysqli_real_escape_string($con, $_POST["City"]);
    $barangay = mysqli_real_escape_string($con, $_POST["barangay"]);
    $start_date = mysqli_real_escape_string($con, $_POST["start_date"]);
    $end_date = mysqli_real_escape_string($con, $_POST["end_date"]);
    $status = mysqli_real_escape_string($con, $_POST["status"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $gender = mysqli_real_escape_string($con, $_POST["gender"]);
    $reason = mysqli_real_escape_string($con, $_POST["reason"]);

    $query_run = "INSERT INTO `tbl_archives` (`position`, `lastname`, `firstname`, `middlename`, `contactNo`, `province`, `City`, `barangay`, `start_date`, `end_date`, `status`,  `email`, `gender`, `reason`)
   VALUES 
  ('$position',
  '$lastname',
  '$firstname',
  '$middlename',
  '$contactNo',
  '$province',
  '$City',
  '$barangay',
  '$start_date',
  '$end_date',
  '$status',
  '$email',
  '$gender',
  '$reason')";

    if ($result2 = $con->query($query_run)) {
        header("Location: officials.php");
    }
}

// Inactive function
if (isset($_POST["Inactive"])) {
    $id = $_POST["id"];
    $status = "Inactive";
    // query to update the data
    $sql = "UPDATE tblofficials SET status = '$status' WHERE id = '$id'";

    // query to delete a record
    $query = "DELETE FROM tblofficials WHERE id=$id";
    if ($result2 = $con->query($query)) {
        header("location:officials.php");
    }
}

// Archive delete function
if (isset($_POST["delete_official_archive"])) {
    $id = mysqli_real_escape_string($con, $_POST["id"]);

    // query to delete a record
    $query = "DELETE FROM tbl_archives WHERE id=$id";

    if (mysqli_query($con, $query)) {
        header("Location: archive.php");
        exit(0);
    }
}

// End Term function

if (isset($_POST["EndTerm"])) {
    $id = $_POST["id"];

    $position = mysqli_real_escape_string($con, $_POST["position"]);
    $lastname = mysqli_real_escape_string($con, $_POST["lastname"]);
    $firstname = mysqli_real_escape_string($con, $_POST["firstname"]);
    $middlename = mysqli_real_escape_string($con, $_POST["middlename"]);
    $contactNo = mysqli_real_escape_string($con, $_POST["contactNo"]);
    $province = mysqli_real_escape_string($con, $_POST["province"]);
    $City = mysqli_real_escape_string($con, $_POST["City"]);
    $barangay = mysqli_real_escape_string($con, $_POST["barangay"]);
    $start_date = mysqli_real_escape_string($con, $_POST["start_date"]);
    $end_date = mysqli_real_escape_string($con, $_POST["end_date"]);
    $status = mysqli_real_escape_string($con, $_POST["status"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $gender = mysqli_real_escape_string($con, $_POST["gender"]);
    $reason = mysqli_real_escape_string($con, $_POST["reason"]);

    $query_run = "INSERT INTO `tbl_archives` (`position`, `lastname`, `firstname`, `middlename`, `contactNo`, `province`, `City`, `barangay`, `start_date`, `end_date`, `status`,  `email`, `gender`, `reason`)
   VALUES 
    ('$position',
    '$lastname',
    '$firstname',
    '$middlename',
    '$contactNo',
    '$province',
    '$City',
    '$barangay',
    '$start_date',
    '$end_date',
    '$status',
    '$email',
    '$gender',
    '$reason')";

    if ($result2 = $con->query($query_run)) {
        header("Location: officials.php?status=success2"); 
    }
}

// End Term delete function
if (isset($_POST["EndTerm"])) {
    $id = mysqli_real_escape_string($con, $_POST["id"]);

    // query to delete a record
    $query = "DELETE FROM tblofficials WHERE id=$id";

    if (mysqli_query($con, $query)) {
        header("Location: officials.php?status=success2"); 
        exit(0);
    }
}

/* Address Combo Box function */
$str = "";
if (isset($_POST["type"]) && $_POST["type"] == "City") {
    $sql = "SELECT DISTINCT citytown FROM tbl_barangays WHERE province = '{$_POST["province"]}'";

    ($query = mysqli_query($con, $sql)) or die("Query Unsuccessful.");

    $str = "";
    while ($row = mysqli_fetch_assoc($query)) {
        $str .= "<option value='{$row["citytown"]}'>{$row["citytown"]}</option>";
    }
    echo $str;
} elseif (isset($_POST["type"]) && $_POST["type"] == "Barangay") {
    $sql = "SELECT DISTINCT barangay FROM tbl_barangays WHERE CityTown = '{$_POST["CityTown"]}'";

    ($query = mysqli_query($con, $sql)) or die("Query Unsuccessful.");

    $str = "";
    while ($row = mysqli_fetch_assoc($query)) {
        $str .= "<option value='{$row["barangay"]}'>{$row["barangay"]}</option>";
    }
    echo $str;
} elseif (isset($_POST["type"])) {
    $sql = "SELECT distinct province from tbl_barangays order by province";

    ($query = mysqli_query($con, $sql)) or die("Query Unsuccessful.");

    while ($row = mysqli_fetch_assoc($query)) {
        $str .= "<option value='{$row["province"]}'>{$row["province"]}</option>";
    }
    echo $str;
}

?>
