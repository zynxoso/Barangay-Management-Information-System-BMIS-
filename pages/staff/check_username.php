<?php
	//mysql query to select field username if it's equal to the username that we check '  
require "../connection.php";
$result = mysqli_query($con,"SELECT username FROM tblstaff WHERE username = '".$_POST['username']."' ");
$cnt = mysqli_num_rows($result);
print($cnt);
?>