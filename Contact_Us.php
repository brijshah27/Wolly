<html>
<head>
	<title>Contact Us</title>
	<link href="css/css_Paper.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/css_Contact.css" rel="stylesheet" type="text/css" media="all">
	<script src="js_Paper.js"></script>
</head>

<body onLoad="Paper('Contact_Us')">

<?php 
if(session_id() == ''){session_start();}
$_SESSION['activepage']="Contact_Us.php?";
include('Paper.php');
?>

<div class="wall" id="Wall">

	<div class="wall_start">Required Details</div>

<div class="wallpaper">
<?php 
if(isset($_GET["msg"]))
{
 if($_GET["msg"]=='success')
 {
	 $_SESSION['activepage']="Contact_Us.php?msg=success&";
	 echo '<p class="Contact_text">Successfully Sent Your Msg</p>';
 }
}
?>

<form action="Contact_process.php" method="post" onSubmit="return Contact()" class="form_contact">
<table>

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
<td>Subject</td>
<td><input type="text" size="30" spellcheck="true" id="Subject" name="sub" placeholder="Subject"></td>
</tr>

<tr>
<td>Message</td>
<td colspan="2"><textarea rows="4" cols="40" spellcheck="true" id="message" name="msg" placeholder="Enter Your Message.."></textarea></td>
</tr>

</table>
<input type="submit" name="submit" value="Send" id="submit_contact"/>
</form>

<div class="contact_div">
<p>You Can Also Contact Us Manually...</p>
<p>Mobile No: +918866882892</p>
<p>Mail ID: nirav6895@gmail.com</p>
<p>Mobile No: +919898789159</p>
<p>Mail ID: brijshah62@gmail.com</p>
</div>

</div>	
    
    <div class="wall_end">
	<p style="float:left; margin-left:50px; margin-top:12px;">All Rights Reserved</p>
	<p style="float:right; margin-right:50px; margin-top:12px;">Copyright Recived</p>
	</div>
	
</div>

    <div class="only_for_margin"></div>

</body>
</html>