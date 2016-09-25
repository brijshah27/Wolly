<html>
<head>
<?php
	if(!isset($_GET["id"]))		{	header('Location:PNF.html?');	}
	$con = mysqli_connect("localhost","root","");
	mysqli_select_db($con, "wolly");
	$cat = 'select * from categories where CID='.$_GET["id"].''; //for fetch categories name
	$result_cat = mysqli_query($con, $cat);
	
	if(mysqli_num_rows($result_cat)==0)	//for enter wrong id by hacker
	{	header('Location:PNF.html?');	}
	
	$row_cat = mysqli_fetch_array($result_cat);
?>
    
  	<title>Wolly - <?php echo $row_cat["Cname"];?></title>
    <link href="css/css_Paper.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/css_File.css" rel="stylesheet" type="text/css" media="all">
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
		window.location.assign("File.php?id=<?php echo $row_cat["CID"];?>&wid="+$i+"");
		}
	}
    </script>

</head>

<body onLoad="Paper('')">

<?php 
if(session_id() == ''){session_start();}
$_SESSION['activepage']='File.php?id='.$_GET["id"].'&';
include('Paper.php');
?>

<div class="wall" id="Wall">

	<div class="wall_start"><?php echo $row_cat["Cname"];?></div>

	<div class="wallpaper">
    
    <?php
if($row_cat["Sub"]==0)
{
	if(!isset($_GET["wid"]))	{	$i=1;	}
	else
	{
		$_SESSION['activepage']='File.php?id='.$_GET["id"].'&wid='.$_GET["wid"].'&';
		$i=$_GET["wid"];
	}

	$img='select * from wallpapers where CID='.$row_cat["CID"].' ORDER BY WID DESC LIMIT '.(($i-1)*9).', 9'; //for fetch 9 wp of most sub categories
	$result_img = mysqli_query($con, $img);
	
	if(mysqli_num_rows($result_img)==0)	//for enter wrong id by hacker
	{	header('Location:PNF.html?');	}
	
	while($row_img = mysqli_fetch_array($result_img))
	{
		echo '<a href="Big_File.php?id='.$row_img["WID"].'"><div class="small_img"><img src="WSmall/'.$row_img["WLoc"].'" alt="'.$row_img["Wname"].'"/></div></a>';
		$last=$row_img["WID"];
	}

	
	echo '</div>';

    echo '<div class="wall_end">';
	
	$next='select WID from wallpapers where CID='.$row_cat["CID"].' and  WID<'.$last.' ORDER BY WID DESC LIMIT 0 , 1'; /*Here change is made*/
	$result_next = mysqli_query($con, $next);
	$row_next = mysqli_fetch_array($result_next);
	
	if(mysqli_num_rows($result_next)==0 && $i<=1)
	{
	echo '
	<p class="txt_left" style="color:#000;  text-decoration:line-through;">Previous</p>
	<a id="page_p" class="txt_left" style="margin-left:450px;" onclick="page(0)">Page : '.$i.'</a>
	<a id="page_input" class="txt_left" style="margin-left:450px; display:none;">Page : <input id="input" type="text" size="2" onblur="page(1)" onchange="page(2)" placeholder="'.$i.'"></a>
	<p class="txt_right" style="color:#000; text-decoration:line-through;">Next</p>';
	}
	
	else if(mysqli_num_rows($result_next)==0)
	{
	echo '
	<a href="File.php?id='.$row_cat["CID"].'&wid='.($i-1).'" class="txt_left">Previous</a>
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
	<a href="File.php?id='.$row_cat["CID"].'&wid='.($i+1).'" class="txt_right">Next</a>';
	}
	
	else
	{
    echo '
	<a href="File.php?id='.$row_cat["CID"].'&wid='.($i-1).'" class="txt_left">Previous</a>
	<a id="page_p" class="txt_left" style="margin-left:450px;" onclick="page(0)">Page : '.$i.'</a>
	<a id="page_input" class="txt_left" style="margin-left:450px; display:none;">Page : <input id="input" type="text" size="2" onblur="page(1)" onchange="page(2)" placeholder="'.$i.'"></a>
	<a href="File.php?id='.$row_cat["CID"].'&wid='.($i+1).'" class="txt_right">Next</a>';
	}
	    
	echo '</div>'; //div of Wall_end 	

echo '</div>'; /*Wall END*/
	
	
	/*FOOTER Start*/
	echo '
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
	
	</div>';	/*FOOTER END*/
}
	
else
{
	$sub='select * from categories where SID='.$row_cat["CID"].' ORDER BY Cname';
	$result_sub = mysqli_query($con, $sub);
		
	while($row_sub = mysqli_fetch_array($result_sub))
	{
		$img='select WLoc from categories_cache where CID='.$row_sub["CID"].' LIMIT 0 , 1';//for fetch wp disply in cat
		$result_img=mysqli_query($con,$img);
		$row_img = mysqli_fetch_array($result_img);
		echo '<a href="File.php?id='.$row_sub["CID"].'"><div class="small_img"><img src="WSmall/'.$row_img["WLoc"].'" alt="'.$row_sub["Cname"].'"/><p class="cname">'.$row_sub["Cname"].'</p></div></a>';
	}
		
	echo '
	</div>

    <div class="wall_end">
	<p style="float:left; margin-left:50px; margin-top:12px;">All Rights Reserved</p>
	<p style="float:right; margin-right:50px; margin-top:12px;">Copyright Recived</p>
	</div>';

echo '</div>'; /*Wall END*/
}

	mysqli_close($con);
	?>
	


    <div class="only_for_margin"></div>

</body>
</html>