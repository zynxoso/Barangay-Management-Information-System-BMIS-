<?php
if (isset($_GET["id"]) && isset($_GET["status"])) {
    $id = $_GET["id"];
    $status = $_GET["status"];
    mysqli_query($con, "update login set status='$status' where id='$id'");
    header("location:index.php");
    die();
}

?>
