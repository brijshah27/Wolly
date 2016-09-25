<html>
<head>
	<title>Categories</title>
    <link href="css/css_Paper.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/css_Cat.css" rel="stylesheet" type="text/css" media="all">
	<script src="js_Paper.js"></script>
	</head>

<body onLoad="Paper('Categories')">

<?php 
if(session_id() == ''){session_start();}
$_SESSION['activepage']="Categories.php?";
include('Paper.php');
?>

<div class="wall" id="Wall">

	<div class="wall_start">All Categories</div>

	<div class="wallpaper">
    <?php 
	$con = mysqli_connect("localhost","root","");
	mysqli_select_db($con, "wolly");
	$cat = 'select CID,Cname from categories where SID=0 ORDER BY Cname'; //for fetch most sup categories
	$result_cat = mysqli_query($con, $cat);
	while($row_cat = mysqli_fetch_array($result_cat))
	{
	$img='select WLoc from categories_cache where CID='.$row_cat["CID"].' LIMIT 0 , 1';//for fetch wp disply in cat 
	$result_img=mysqli_query($con,$img);
	$row_img=mysqli_fetch_array($result_img);
	
	echo '<a href="File.php?id='.$row_cat["CID"].'"><div class="small_img"><img src="WSmall/'.$row_img["WLoc"].'" alt="'.$row_cat["Cname"].'"/><p class="cname">'.$row_cat["Cname"].'</p></div></a>';
	}

	?>
	</div>

	<div class="wall_end">
	<p style="float:left; margin-left:50px; margin-top:12px;">All Rights Reserved</p>
	<p style="float:right; margin-right:50px; margin-top:12px;">Copyright Recived</p>
	</div>

</div>

    <div class="only_for_margin"></div>

</body>
</html>