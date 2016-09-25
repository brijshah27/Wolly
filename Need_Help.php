<html>
<head>
	<title>Need Help</title>
	<link href="css/css_Paper.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/css_Forget.css" rel="stylesheet" type="text/css" media="all">
	<script src="js_Paper.js"></script>
	<script>
	function fun(a)
	{
	 document.getElementById('infop').style.display="none";
	 document.getElementById('infom').style.display="none";
	 document.getElementById('infob').style.display="none";
	 document.getElementById(a).style.display="block";
	}
	function funprocess()
	{
	 document.getElementById("process_text").style.display="block";
	 document.getElementById("process_text").innerHTML="Process - Forget";
	 document.getElementById("procp").style.display="none";
	 document.getElementById("procm").style.display="none";
	 document.getElementById("procb").style.display="none";
	 
	 if(document.getElementById("p").checked)
	 {
	 document.getElementById("process_text").innerHTML="Process - Forget Password";
	 document.getElementById("procp").style.display="block";
	 document.getElementById("procm").style.display="none";
	 document.getElementById("procb").style.display="none";
	 }
	 else if(document.getElementById("m").checked)
	 {
	 document.getElementById("process_text").innerHTML="Process - Forget Mail ID"; 
	 document.getElementById("procp").style.display="none";
	 document.getElementById("procm").style.display="block";
	 document.getElementById("procb").style.display="none";
	 }
	 else if(document.getElementById("b").checked)
	 {
	 document.getElementById("process_text").innerHTML="Process - Forget Both";
	 document.getElementById("procp").style.display="none";
	 document.getElementById("procm").style.display="none";
	 document.getElementById("procb").style.display="block";
	 }
	}
    </script>
</head>

<body onLoad="Paper('')">

<?php 
if(session_id() == ''){session_start();}
$_SESSION['activepage']="Forget.php?";
include('Paper.php');
?>

<div class="wall" id="Wall">

	<div class="wall_start">Need Help</div>
	
<div class="wallpaper">
<p class="process_text" id="process_text">Process</p>
<?php 
if(isset($_GET["msg"]))
{
	echo '<script>document.getElementById("process_text").style.display="none"</script>';
	echo '<p class="process_text" style="display:block;">Process Complete</p>';
	if($_GET["msg"]=="Success_P")
	{
	 echo '<p class="text">Password is reset</p>';
	}
	else if($_GET["msg"]=="Success_M" && isset($_GET["mail"]))
	{
	 echo '<p class="text">Your Mail ID is '.$_GET["mail"].'</p>';
	}
	else if($_GET["msg"]=="Success_B" && isset($_GET["mail"]))
	{
	 echo '<p class="text">Password is reset</p>';
	 echo '<p class="text">Your Mail ID is '.$_GET["mail"].'</p>';
	}
}
else if(isset($_GET["pro"]))
{
	echo '<script>document.getElementById("process_text").style.display="none"</script>';
	echo '<p class="process_text" style="display:block;">Problem In Process</p>';
	echo '<p class="text">You Entered Data is Wrong...</p>';
}
?>

<form method="post" action="Forget_Process.php">
<div id="procp" class="process">
Enter Your Mail ID: <input type="text" size="30" name="p_mail" placeholder="xyz@abc.com"><br /><br />
Enter Your Favriout Color: <input type="text" size="30" name="p_que" placeholder="like Blue"><br /><br />
Enter New Password: <input type="password" size="30" name="p_pass" placeholder="* * * * * * * * *"><br /><br />
<button type="submit" value="password" name="p_button" class="send">Reset</button><br /><br />
</div>

<div id="procm" class="process">
Enter Your Mobile No: <input type="text" size="30" name="m_mobile" placeholder="Mobile No"><br /><br />
Enter Password: <input type="password" size="30" name="m_pass" placeholder="* * * * * * * * *"><br /><br />
<button type="submit" value="mail" class="send" name="m_button">Get Mail ID</button><br /><br />
</div>

<div id="procb" class="process">
Enter Your Mobile No: <input type="text" size="30" name="b_mobile" placeholder="Mobile No"><br /><br />
Enter Your Favriout Color: <input type="text" size="30" name="b_que" placeholder="like blue"><br /><br />
Enter New Password: <input type="password" size="30" name="b_pass" placeholder="* * * * * * * * *"><br /><br />
<button type="submit" value="both" class="send" name="b_button">Reset</button><br /><br />

</div>
</form>
<?php
if(isset($_GET["pro"]))
{
	if($_GET["pro"]=="Pro_Pass")
	{
	 echo '<script>document.getElementById("procp").style.display="block"</script>';
	}
	else if($_GET["pro"]=="Pro_Mail")
	{
	 echo '<script>document.getElementById("procm").style.display="block"</script>';
	}
	else if($_GET["pro"]=="Pro_Both")
	{
	 echo '<script>document.getElementById("procb").style.display="block"</script>';
	}
}
?>

<p class="process_text" style="display:block;">Which type of help you need???</p>

<div class="form_forget">
<input type="radio" name="forget" id="p" onClick="fun('infop')"> Forget Password<br />
<input type="radio" name="forget" id="m" onClick="fun('infom')"> Forget Mail Id<br />
<input type="radio" name="forget" id="b" onClick="fun('infob')"> Forget Both<br />
<input type="submit" value="Process" id="submit_forget" onClick="funprocess()"/>
</div>

<div id="infop" class="about_need">
<p style="font-size:23px; padding-bottom:8px; border-bottom:1px solid #FFF;">Forget Password</p>
<p>You can reset your password by conformation Mail ID and answer of security question asked when you signed up...</p>
</div>

<div id="infom" class="about_need">
<p style="font-size:23px; padding-bottom:8px; border-bottom:1px solid #FFF;">Forget Mail ID</p>
<p>You can recover your Mail ID by conformation of Mobile Number and Password for that mail ID...</p>
</div>

<div id="infob" class="about_need">
<p style="font-size:23px; padding-bottom:8px; border-bottom:1px solid #FFF;">Forget Both</p>
<p>You can reset your password and recover your mail Id by conformation Mobile Number and answer of security question asked when you signed up...</p>
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