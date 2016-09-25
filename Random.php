<html>
<head>
	<title>Random Wallpapers</title>
	<link href="css/css_Paper.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/css_Ran.css" rel="stylesheet" type="text/css" media="all">
	<script src="js_Paper.js"></script>
</head>

<body onLoad="Paper('Random')">

<?php 
if(session_id() == ''){session_start();}
$_SESSION['activepage']="Random.php?";
include('Paper.php');
?>

<div class="wall" id="Wall">

	<div class="wall_start">Random Wallpapers</div>

<div class="wallpaper">
    <?php 
	if(!isset($_GET["rid"]))	{	$i=0;	}
	else
	{
		$_SESSION['activepage']='Wallpaper.php?rid='.$_GET["rid"].'&';
		$i=$_GET["rid"];
	}
	$con = mysqli_connect("localhost","root","");
	mysqli_select_db($con, "wolly");
	$count='select WID from wallpapers';
	$result_count = mysqli_query($con, $count);
	$total=mysqli_num_rows($result_count);
 	//echo $total."-----";
	$j=0;
	while($j<9)
	{
		
		$img = 'select * from wallpapers where WID='.($total-rand($i,$i+2)).''; //for fetch 9 latest Walpaper
		//echo ($total-$i)."-".($total-($i+2))."&";
		$i=$i+3;
		$result_img = mysqli_query($con, $img);
	
		if(mysqli_num_rows($result_img)==0)	//for enter wrong id by hacker
		{	$i=0;	}
		else
		{
		$row_img = mysqli_fetch_array($result_img);
		echo '<a href="Big_File.php?id='.$row_img["WID"].'"><div class="small_img"><img src="WSmall/'.$row_img["WLoc"].'" alt="'.$row_img["Wname"].'"/></div></a>'; //<p>'.$row_img["WID"].'</p>
		$j++;
		}
	}
	?>
</div>

	<div class="wall_end">
	<a href="Random.php?rid=<?php echo $i;?>" style="float:left; margin-left:48%; margin-top:12px; color:#FFF;">Next</a>
	</div>
    
</div>

	<div class="only_for_margin"></div>

</body>
</html>