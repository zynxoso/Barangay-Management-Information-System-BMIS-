<?php


  //Certificate Left Side
  $_SESSION["id"] = 2; // Fill session id with user's id to get user's data like name and image name
  $certL = $_SESSION["id"];
  $user = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM dashboard WHERE id = $certL"));

  //Certificate Right Side
  $_SESSION["id"] = 3; // Fill session id with user's id to get user's data like name and image name
  $certR = $_SESSION["id"];
  $user = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM dashboard WHERE id = $certR"));


?>