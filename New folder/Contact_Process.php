<?php 
if($_REQUEST["user"]=="" || $_REQUEST["mail"]=="")
{	header('Location:PNF.html?');	}
else
{
$subject='Wolly - Message From: '.$_POST["mail"].' By: '.$_POST["user"];
$message=
'<p style="font-size:26px;">Wolly - Message</p>
 <p style="font-size:20px; margin:3px 0px;">From: <span style="color:#06F;">'.$_POST["mail"].'</span></p>
 <p style="font-size:20px; margin:3px 0px;">Username: <span style="color:#06F;">'.$_POST["user"].'</span></p>
 <p style="font-size:20px; margin:3px 0px; width:inherit; text-align:center;">Subject: <span style="color:#06F;">'.$_POST["sub"].'</span></p>
 <p style="font-size:20px; margin:3px 0px;">Message:</p><p style="font-size:18px; margin:10px 0px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$_POST["msg"].'</p>';

$headers  = 'From: nirav6895@gmail.com' . "\r\n" .
            'Reply-To: nirav6895@gmail.com' . "\r\n" .
            'MIME-Version: 1.0' . "\r\n" .
            'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

if(mail('nirav6895@gmail.com', $subject, $message, $headers))
{
header('Location:Contact_Us.php?msg=success');
}
else
{
echo "Slow Internet Connection";
}
}
?>
