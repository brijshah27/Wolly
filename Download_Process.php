<?php
	if(!isset($_GET["id"]))		{	header('Location:PNF.html?');	}
	
	$con = mysqli_connect("localhost","root","");
	mysqli_select_db($con, "wolly");
	$down='select WLoc from wallpapers where WID='.$_GET["id"].'';
	$result_down=mysqli_query($con,$down);
	
	if(mysqli_num_rows($result_down)==0)	//for enter wrong id by hacker
	{	header('Location:PNF.html?');	}
	
	$row_down=mysqli_fetch_array($result_down);
	
	$pos = stripos($row_down["WLoc"], '/');
	$filename=substr($row_down["WLoc"],($pos+1));	// YOUR File name retrive from database
    $path="WBig/".$row_down["WLoc"]; // YOUR Root path for pdf folder storage
	
	$pos = stripos($filename, '.');
	$file_extension=substr($filename,($pos+1));
	switch( $file_extension )
	{
	case "gif": $type="image/gif"; break;
	case "png": $type="image/png"; break;
	case "jpeg":
	case "jpg": $type="image/jpg"; break;
	default: $type="application/force-download";
	}
		
	ob_clean();
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: public"); 
    header("Content-Description: File Transfer");
    header("Content-Type:".$type); // Send type of file
    header("Content-Disposition: attachment; filename=".$filename.";");	 // Send File Name
    header("Content-Transfer-Encoding: binary");
    header("Content-Length: ".filesize($path)); // Send File Size
    @readfile($path);
    exit;

?>