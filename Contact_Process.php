<?php 
$con = mysqli_connect("localhost","root","");
mysqli_select_db($con,"wolly");
$query = 'insert into contact_us (username,mail_id,subject,message) values("'.$_REQUEST["user"].'","'.$_REQUEST["mail"].'","'.$_REQUEST["sub"].'","'.$_REQUEST["msg"].'")';
$result = mysqli_query($con, $query);
header('Location:Contact_Us.php?msg=success');
mysqli_close($con);
?>
