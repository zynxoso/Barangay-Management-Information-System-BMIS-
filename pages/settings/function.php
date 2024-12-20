<?php 

  include '../connection.php';

  if(isset($_POST['update_bio']))
  {
      $id = mysqli_real_escape_string($con, $_POST['id']);
      $about = mysqli_real_escape_string($con, $_POST['about']);

      $query_run = mysqli_query($con, "UPDATE `dashboard` SET `about` = '$about'");

      if($query_run)
      {
          //$_SESSION['messageCreate'] = " Created Successfully";
          header("Location: maintenance.php");
          exit(0);
      
      }

  }

  if(isset($_POST['update_User']))
  {
    $user_id = mysqli_real_escape_string($con, $_POST['id']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $query_run = mysqli_query($con, "UPDATE `tblstaff` SET `username` = '$username', `password` = '$password' WHERE `id` = '$user_id' ");

    if($query_run)
    {
        header("Location: userAccount.php");
        exit(0);
    }
  }

if(isset($_POST['update_admin']))
{
  $user_id = mysqli_real_escape_string($con, $_POST['id']);
  $username = mysqli_real_escape_string($con, $_POST['username']);
  $password = mysqli_real_escape_string($con, $_POST['password']);
  $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);

  if($password !== $confirm_password)
  {
    $_SESSION['message'] = "Passwords do not match";
    header("Location: changepassword.php");
    exit(0);
  }

  $query_run = mysqli_query($con, "UPDATE `tbluser` SET `username` = '$username', `password` = '$hashed_password' WHERE `id` = '$user_id' ");

  if($query_run)
  {
    header("Location: ../../index.php");
    exit(0);
  }
}
?>

<!-- Logo -->
<?php
  if(isset($_FILES["fileImg"]["name"]))
  {
    $id = $_POST["id"];

    $src = $_FILES["fileImg"]["tmp_name"];
    $imageName = $_FILES["fileImg"]["name"];

    $target = "img/" . $imageName;

    move_uploaded_file($src, $target);

    $query = "UPDATE dashboard SET image = '$imageName' WHERE id = $id";
    mysqli_query($con, $query);

    if($query)
    {
      header("Location: maintenance.php");
    }

  }
?>

<!-- CertL function -->
<?php
  if(isset($_FILES["certLogoLeft"]["name"]))
  {
    $id = $_POST["id"];

    $src = $_FILES["certLogoLeft"]["tmp_name"];
    $imageName = $_FILES["certLogoLeft"]["name"];

    $target = "img/" . $imageName;

    move_uploaded_file($src, $target);

    $query = "UPDATE dashboard SET `certL` = '$imageName' WHERE id = $id";
    mysqli_query($con, $query);

    if($query)
    {
      header("Location: maintenance.php");
    }

  }
?>

<!-- CertR function -->
<?php
  if(isset($_FILES["certLogoRight"]["name"]))
  {
    $id = $_POST["id"];

    $src = $_FILES["certLogoRight"]["tmp_name"];
    $imageName = $_FILES["certLogoRight"]["name"];

    $target = "img/" . $imageName;

    move_uploaded_file($src, $target);

    $query = "UPDATE dashboard SET `certR` = '$imageName' WHERE id = $id";
    mysqli_query($con, $query);

    if($query)
    {
      header("Location: maintenance.php");
    }

  }
?>