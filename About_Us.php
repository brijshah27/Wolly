<html>
<head>
	<title>About Us</title>
    <link href="css/css_Paper.css" rel="stylesheet" type="text/css" media="all">
	<link href="css/css_About.css" rel="stylesheet" type="text/css" media="all">
    <script src="js_Paper.js"></script>
</head>

<body onLoad="Paper('About_Us')">

<?php 
if(session_id() == ''){session_start();}
$_SESSION['activepage']="About_Us.php?";
include('Paper.php');
?>

<div class="wall" id="Wall">

	<div class="wall_start">Something About Us</div>
	
    <div class="wallpaper" style="padding-bottom:0px;">
		<div class="about">

<p>This website is established to downnload high quality wallpapers as well as HD wallappers. We offer diffrent categories as per user requirnment which can be found in Categories tab.</p>
<p>This world famous portal has been constantly innovating and providing a wholesome and complete entertainment.</p>
<p>No doubt <a href="Wallpaper.php" class="alink">Wolly.com</a> has become a part and parcel of the daily itinerary of millions of netizens from all over the world.</p>
<br />
<span>Our office is in Ahmedabad.</span>
<br />
<span>Any suggestion of your is our primary goal.</span>
<br />
<span>For more details go to the <a href="Contact_Us.php" class="alink">Contact Us</a> page.</span>
<br />

<p style="text-align:center;">"Thank you"</p>
<div>
<img src="images/2012-11-14 19.36.21.jpg" class="img_brij">
<img src="images/578776_192271540903232_18945846_n.jpg" class="img_nirav">
</div>
<div>
<span class="name_brij">Brij Shah</span>
<span class="name_nirav">Nirav Patel</span>
</div>
<div>
<span class="no_brij">IU1241050043</span>
<span class="no_nirav">IU1241050030</span>
</div>
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
