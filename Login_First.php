<html>
<head>
	<title>Login First</title>
    <link href="css/css_Paper.css" rel="stylesheet" type="text/css" media="all">
    <script src="js_Paper.js"></script>
	<style>
	.Login_First ul
	{
	padding::50px;
	font-size:36px;
	font-family:"Comic Sans MS", cursive;
	color:#000; 		
	}
	.Login_First li
	{
	padding-left:50px;
	font-size:18px;
	font-family:"Comic Sans MS", cursive;
	color:#06F; 
	}
	</style>
</head>

<body onLoad="Paper('')">

<?php
include('Paper.php');
if(session_id() == ''){session_start();}

if($_SESSION['activepage']!='Login_First.php?' && $_SESSION['activepage']!='Login_First.php?err=Problem_m' && $_SESSION['activepage']!='Login_First.php?err=Problem_m')
{	$_SESSION['temppage']=$_SESSION['activepage'];	}


$_SESSION['activepage']='Login_First.php?';

if($_SESSION['login']==true)
{
	$_SESSION['activepage']=$_SESSION['temppage'];
	unset($_SESSION['temppage']);
	header('Location:'.$_SESSION['activepage'].'');
}
?>

<div class="wall" id="Wall">

	<div class="wall_start">Login First</div>
	
    <div class="wallpaper" style="padding-bottom:0px;">
	
    <div class="Login_First">
    <ul>First of You Have To Login...</ul>
    <li>For Watch & Download Wallpaper...</li>
    <li>For like/dislike Wallpaper...</li>
    <li>For More Facilities...</li>
    </div>
    
    <div class="only_for_margin"></div>
    
    </div>	
    
    <div class="wall_end">
	<p style="float:left; margin-left:50px; margin-top:12px;">All Rights Reserved</p>
	<p style="float:right; margin-right:50px; margin-top:12px;">Copyright Recived</p>
	</div>
	
</div>

<div class="only_for_margin"></div>

</body>
</html>
