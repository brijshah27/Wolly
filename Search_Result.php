<html>
<head>

<?php
if(!isset($_REQUEST["search"]))
{
 header('Location:PNF.html');
}

$con = mysqli_connect("localhost","root","");
mysqli_select_db($con, "wolly");
$query_search='select * from wallpapers where Wname like "%'.$_REQUEST["search"].'%"';
$result_search=mysqli_query($con,$query_search);
if(mysqli_num_rows($result_search)==0)
{
 header('Location:PNF.html');
}
?>

	<title>Result of <?php echo $_REQUEST["search"]; ?></title>
	<link href="css/css_Paper.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/css_Cat.css" rel="stylesheet" type="text/css" media="all">
	<script src="js_Paper.js"></script>
</head>

<body onLoad="Paper('Wallpaper')">

<?php 
if(session_id() == ''){session_start();}
$_SESSION['activepage']="Search_Result.php?search=".$_REQUEST["search"]."";
include('Paper.php');
?>

<div class="wall" id="Wall">

	<div class="wall_start">Result of <?php echo $_REQUEST["search"]; ?></div>

<div class="wallpaper">

	<?php 
	while($row_search = mysqli_fetch_array($result_search))
	{
	echo '<a href="Big_File.php?id='.$row_search["WID"].'"><div class="small_img"><img src="WSmall/'.$row_search["WLoc"].'" alt="'.$row_search["Wname"].'"/></div></a>';
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