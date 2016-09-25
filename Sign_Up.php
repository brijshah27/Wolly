<html>
<head>
	<title>Sign_Up</title>
	<link href="css/css_Paper.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/css_Sign_Up.css" rel="stylesheet" type="text/css" media="all">
	<script src="js_Paper.js"></script>
</head>

<body onLoad="Paper('')">

<?php 
if(session_id() == ''){session_start();}
$_SESSION['activepage']="Sign_Up.php?";
include('Paper.php');
?>

<div class="wall" id="Wall">

	<div class="wall_start">Required Details for Sign Up</div>

<div class="wallpaper">
<?php 
if(isset($_GET["msg"]))
{
 if($_GET["msg"]=='success')
 {
	 $_SESSION['activepage']="Sign_Up.php?msg=success&";
	 echo '<p class="signup_text">Successfully Signed Up</p>';
 }
 else if($_GET["msg"]=='problem_mail' && isset($_GET["mail"]))
 {
 $_SESSION['activepage']="Sign_Up.php?msg=problem_mail&";
 echo	'<p style="color:#f00;" class="signup_text">'.$_GET["mail"].' is already Used. . . <a href="forget.php?mail='.$_GET["mail"].'">Need Help?</a></p>';
 }
 else if($_GET["msg"]=='problem_profile')
 {
 $_SESSION['activepage']="Sign_Up.php?msg=problem_mail&";
 echo	'<p style="color:#000;" class="signup_text">Photo format is not valid. . . </p>';
 }
}
?>
<form action="Sign_Up_process.php" method="post" onSubmit="return Sign_Up()" enctype="multipart/form-data">
<table style="float:left;" class="form_signup">

<tr>
<td>Username</td>
<td><input type="text" size="30" id="User_name" name="user" placeholder="Username"></td>
<td id="UN_Notice" class="required"></td>
</tr>

<tr>
<td>Mail Id</td>
<td><input type="text" size="30" id="Mail Id" name="mail" placeholder="xyz@abc.com"></td>
<td id="MI_Notice" class="required"></td>
</tr>

<tr>
<td>Mobile No</td>
<td><input type="tel" size="30" id="Mobile" name="mobile" placeholder="Phone Number"></td>
<td id="MN_Notice" class="required"></td>
</tr>

<tr>
<td>Password</td>
<td><input type="password" size="30" id="Password" name="pass" placeholder="Password"></td>
<td id="PW_Notice" class="required">Password must be 8-25 charcter</td>
</tr>

<tr>
<td>Retype Password</td>
<td><input type="password" size="30" id="RPassword" placeholder="Retype Password"></td>
<td id="RPW_Notice" class="required">Re-Enter Password</td>
</tr>

<tr>
<td>Security Question</td>
<td><input type="text" size="30" id="SQuestion" name="que" placeholder="Enter Your Favriout Color"></td>
<td id="SQ_Notice" class="required"></td>
</tr>

<!--<tr>
<td>Profile Picture:</td>
<td colspan="2"><input type="file" id="Upload"></td>
</tr>
-->

</table>


<div id="profile"><input type="file" name="profile" id="pro" onChange="profile()" accept="image/gif, image/jpeg, image/png"></div>

<input type="submit" name="submit" value="Sign Up" id="submit_signup"/>
</form>
</div>	
    
    <div class="wall_end">
	<p style="float:left; margin-left:50px; margin-top:12px;">All Rights Reserved</p>
	<p style="float:right; margin-right:50px; margin-top:12px;">Copyright Recived</p>
	</div>
	
</div>

    <div class="only_for_margin"></div>
    
</body>
</html>