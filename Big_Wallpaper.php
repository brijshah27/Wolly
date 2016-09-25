<!--this file is same as Big_File.php except two lines marked by comment below  -->
<!--also next prev href is changed-->
<html>
<head>
<?php
	if(session_id() == ''){session_start();}
	if(!(isset($_SESSION['login']))){$_SESSION["login"]=false;}
	if($_SESSION['login']==false)
	{	header('Location:Login_First.php');		}

	if(!isset($_GET["id"]))		{	header('Location:PNF.html?');	}
	
	$con = mysqli_connect("localhost","root","");
	mysqli_select_db($con, "wolly");
	$img='select * from wallpapers where WID='.$_GET["id"].''; //for fetch only particuler one wallpaper
	$result_img = mysqli_query($con, $img);
	
	if(mysqli_num_rows($result_img)==0)	//for enter wrong id by hacker
	{	header('Location:PNF.html?');	}
	
	$row_img = mysqli_fetch_array($result_img);
	
	$cat='select Cname from categories where CID='.$row_img["CID"].''; //for fetch name of category of that wp
	$result_cat = mysqli_query($con, $cat);
	$row_cat = mysqli_fetch_array($result_cat);
?>
	<title>Wolly - <?php echo $row_cat["Cname"];?></title>
	<link href="css/css_Paper.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/css_Wall.css" rel="stylesheet" type="text/css" media="all">
	<script src="js_Paper.js"></script>
</head>

<body onLoad="Paper('')">

<?php 
if(session_id() == ''){session_start();}
$_SESSION['activepage']='Big_Wallpaper.php?id='.$_GET["id"].'&';
include('Paper.php');
?>

<div class="wall" id="Wall">

	<div class="wall_start">Latest Wallpapers</div>

	<div class="wallpaper" style="padding-bottom:0px;">
	<?php
	echo '<a href="Download_Process.php?id='.$row_img["WID"].'"><img src="WBig/'.$row_img["WLoc"].'" class="big_img" alt="'.$row_img["Wname"].'"/></a>';
	
	echo '<div id="W_info"><p id="W_heading">'.$row_img["Wname"].'</p></div>';
	?>
	</div>

	<div class="wall_end">
	<?php
	$prev='select WID from wallpapers where WID>'.$row_img["WID"].' ORDER BY WID LIMIT 0 , 1'; /*Here change is made*/
	$result_prev = mysqli_query($con, $prev);
	$row_prev = mysqli_fetch_array($result_prev);
	
	$next='select WID from wallpapers where WID<'.$row_img["WID"].' ORDER BY WID DESC LIMIT 0 , 1'; /*Here change is made*/
	$result_next = mysqli_query($con, $next);
	$row_next = mysqli_fetch_array($result_next);
	
	if(mysqli_num_rows($result_next)==0)
	{
	echo '
	<a href="Big_Wallpaper.php?id='.$row_prev["WID"].'" style="float:left; margin-left:50px; margin-top:12px; color:#FFF;">Previous</a>
	<p style="float:right; margin-right:50px; margin-top:12px; color:#000; text-decoration:line-through;">Next</p>';
	}
	else if(mysqli_num_rows($result_prev)==0)
	{
	echo '
	<p style="float:left; margin-left:50px; margin-top:12px; color:#000; text-decoration:line-through;">Previous</p>
	<a href="Big_Wallpaper.php?id='.$row_next["WID"].'" style="float:right; margin-right:50px; margin-top:12px; color:#FFF;">Next</a>';
	}
	else
	{
    echo '
	<a href="Big_Wallpaper.php?id='.$row_prev["WID"].'" style="float:left; margin-left:50px; margin-top:12px; color:#FFF;">Previous</a>
	<a href="Big_Wallpaper.php?id='.$row_next["WID"].'" style="float:right; margin-right:50px; margin-top:12px; color:#FFF;">Next</a>';
	}
	mysqli_close($con);
	?>
    
	</div>

</div>


<div class="wall" id="footer">

	<div class="wall_start">Treading</div>
	
    <div class="wallpaper" style="padding-bottom:0px;">
    <table border="0px">
    <tr>
    <td><a href="#"><li>Related_1</li></a></td>
    <td><a href="#"><li>Related_2</li></a></td>
    <td><a href="#"><li>Related_3</li></a></td>
    </tr>
    <tr>
    <td><a href="#"><li>Related_4</li></a></td>
    <td><a href="#"><li>Related_5</li></a></td>
    <td><a href="#"><li>Related_6</li></a></td>
    </tr>
    <tr>
    <td><a href="#"><li>Related_7</li></a></td>
    <td><a href="#"><li>Related_8</li></a></td>
    <td><a href="#"><li>Related_9</li></a></td>
    </tr>
    </table>
    </ul>
    </div>
	
    <div class="wall_end">
	<p style="float:left; margin-left:50px; margin-top:12px;">All Rights Reserved</p>
	<p style="float:right; margin-right:50px; margin-top:12px;">Copyright Recived</p>
	</div>
	
</div>

<div class="only_for_margin"></div>

</body>
</html>