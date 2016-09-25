<?php
$con = mysqli_connect("localhost","root","");
mysqli_select_db($con, "wolly");
$mail_query='select * from login where MailID="'.$_REQUEST["mail"].'"';
$mail_result=mysqli_query($con,$mail_query);
if(mysqli_num_rows($mail_result)==0)
{
	$photo_name=$_FILES['profile']['name'];
	echo $photo_name;
	if($photo_name!=NULL)
	{
		$pos = stripos($photo_name, '.');
		$file_extension=substr($photo_name,($pos+1));
		if($file_extension=="jpg" || $file_extension=="jpeg" || $file_extension=="png" || $file_extension=="gif")
		{
			move_uploaded_file($_FILES['profile']['tmp_name'],'profile/'.$_REQUEST["mail"].'.'.$file_extension);
		}
		else
		{
			mysqli_close($con);
			header('Location:Sign_Up.php?msg=problem_profile');
		}
	}
	$query = 'insert into login (Username,MailID,Password,Mobile,Question,Profile) values("'.$_REQUEST["user"].'","'.$_REQUEST["mail"].'","'.$_REQUEST["pass"].'","'.$_REQUEST["mobile"].'","'.$_REQUEST["que"].'","'.$file_extension.'")';
	$result = mysqli_query($con, $query);
	mysqli_close($con);
	//header('Location:Sign_Up.php?msg=success');
}
else
{
	header('Location:Sign_Up.php?msg=problem_mail&mail='.$_REQUEST["mail"].'');
}
?>