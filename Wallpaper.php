<html>
<head>
	<title>Wolly</title>
	<link href="css/css_Paper.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/css_Wall.css" rel="stylesheet" type="text/css" media="all">
	<script src="js_Paper.js"></script>
    <script>
    function page(a)
	{
		if(a==0)
		{
		document.getElementById("page_p").style.display="none";
		document.getElementById("page_input").style.display="block";
		document.getElementById("input").focus();
		}
		else if(a==1)
		{
		document.getElementById("page_p").style.display="block";
		document.getElementById("page_input").style.display="none";
		}
		else if(a==2)
		{
		$i=document.getElementById("input").value;
		window.location.assign("Wallpaper.php?wid="+$i+"");
		}
	}
    </script>
</head>

<body onLoad="Paper('Wallpaper')">

<?php 
if(session_id() == ''){session_start();}
$_SESSION['activepage']="Wallpaper.php?";
include('Paper.php');
?>


<div class="wall" id="Wall">

	<div class="wall_start">Latest Wallpapers</div>

<div class="wallpaper">
    <?php 
	if(!isset($_GET["wid"]))	{	$i=1;	}
	else
	{
		$_SESSION['activepage']='Wallpaper.php?wid='.$_GET["wid"].'&';
		$i=$_GET["wid"];
	}
	
	$con = mysqli_connect("localhost","root","");
	mysqli_select_db($con, "wolly");
	$img = 'select * from wallpapers ORDER BY WID DESC LIMIT '.(($i-1)*9).' , 9'; //for fetch 9 latest Walpaper
	$result_img = mysqli_query($con, $img);
	
	if(mysqli_num_rows($result_img)==0)	//for enter wrong id by hacker
	{	header('Location:PNF.html?');	}
	
	while($row_img = mysqli_fetch_array($result_img))
	{
	echo '<a href="Big_Wallpaper.php?id='.$row_img["WID"].'"><div class="small_img"><img src="WSmall/'.$row_img["WLoc"].'" alt="'.$row_img["Wname"].'"/></div></a>';
	$last=$row_img["WID"];
	}
	?>
</div>
    		
	<div class="wall_end">
	<?php
	$next='select WID from wallpapers where WID<'.$last.' ORDER BY WID DESC LIMIT 0 , 1'; /*Here change is made*/
	$result_next = mysqli_query($con, $next);
	$row_next = mysqli_fetch_array($result_next);
	
	if(mysqli_num_rows($result_next)==0)
	{
	echo '
	<a href="Wallpaper.php?wid='.($i-1).'" class="txt_left">Previous</a>
	<a id="page_p" class="txt_left" style="margin-left:450px;" onclick="page(0)">Page : '.$i.'</a>
	<a id="page_input" class="txt_left" style="margin-left:450px; display:none;">Page : <input id="input" type="text" size="2" onblur="page(1)" onchange="page(2)" placeholder="'.$i.'"></a>
	<p class="txt_right" style="color:#000; text-decoration:line-through;">Next</p>';
	}
	else if($i<=1)
	{
	echo '
	<p class="txt_left" style="color:#000; text-decoration:line-through;">Previous</p>
	<a id="page_p" class="txt_left" style="margin-left:450px;" onclick="page(0)">Page : '.$i.'</a>
	<a id="page_input" class="txt_left" style="margin-left:450px; display:none;">Page : <input id="input" type="text" size="2" onblur="page(1)" onchange="page(2)" placeholder="'.$i.'"></a>
	<a href="Wallpaper.php?wid='.($i+1).'" style="float:right; margin-right:50px; margin-top:12px; color:#FFF;">Next</a>';
	}
	else
	{
    echo '
	<a href="Wallpaper.php?wid='.($i-1).'" class="txt_left">Previous</a>
	<a id="page_p" class="txt_left" style="margin-left:450px;" onclick="page(0)">Page : '.$i.'</a>
	<a id="page_input" class="txt_left" style="margin-left:450px; display:none;">Page : <input id="input" type="text" size="2" onblur="page(1)" onchange="page(2)" placeholder="'.$i.'"></a>
	<a href="Wallpaper.php?wid='.($i+1).'" class="txt_right">Next</a>';
	}
	mysqli_close($con);
	?>    
	</div>

</div>

<div class="wall" id="footer">

	<div class="wall_start">Trending</div>
	
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