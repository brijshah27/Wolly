<?php
session_start();

if($_SESSION['login']==false)
{
	setcookie("wowuser",$_REQUEST["mail"],time()+60*60*24*30);
	$con = mysqli_connect("localhost","root","");
	mysqli_select_db($con, "wolly");
	
	$query = 'select * from login where MailID="'.$_REQUEST["mail"].'"';
	$result = mysqli_query($con, $query);
	
	$query_both = 'select * from login where MailID="'.$_REQUEST["mail"].'" and Password="'.$_REQUEST["pass"].'"';
	$result_both = mysqli_query($con, $query_both);
	
	if(mysqli_num_rows($result)==0) //For Wrong Mail ID
	{
		header('Location:'.$_SESSION['activepage'].'err=Problem_m');
	}
	
	else if(mysqli_num_rows($result_both)==1) //For Both is Right
	{
		$_SESSION['login']=true;
		$_SESSION['wowuser']=$_REQUEST["mail"];
		mysqli_close($con);
		header('Location:'.$_SESSION['activepage'].'');
	}
	else //For Password is Wrong
	{
		mysqli_close($con);
		header('Location:'.$_SESSION['activepage'].'err=Problem_p');
	}
}
else
{
	$_SESSION['login']=false;
	header('Location:'.$_SESSION['activepage'].''); 
}


?>