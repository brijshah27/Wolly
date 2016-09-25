<div class="wall" style="display:block; margin-top:0px; margin-right:0px;">
	<div class="wallpaper" style="padding-bottom:0px; box-shadow:none; background-color:transparent; width:1250px;">
    
        <a href="Wallpaper.php"><img id="logo" src="images/Wolly_hover.png" alt="Wolly" ></a>
		
	</div>
<!----------------------------Wallpaper div Finish --------------------------------------->

    <div class="toolbar">
		<div class="corner"></div>
		<a href="Wallpaper.php" id="Wallpaper" class="tools">Home</a>
		<a href="Categories.php" id="Categories" class="tools">Categories</a>
		<a href="Random.php" id="Random" class="tools">Random</a>
		<a href="Contact_Us.php" id="Contact_Us" class="tools">Contact Us</a>
		<a href="About_Us.php" id="About_Us" class="tools">About Us</a>
		<div class="corner"></div>
	</div>
    
</div>

<!----------------------------Search div : Start ------------------------------->
        <div id="searchdiv" onMouseOver="searchblock()" onMouseOut="searchnone()">
        	<form action="Search_Result.php" method="get" style="height:inherit;">
            <div id="searchleft" style="display:none;"><input type="search" size="35" name="search" onclick="searchnone(1)" onblur="searchnone(0)" placeholder="Search in Wolly"></div>
            <div id="searchright"><input type="submit"></div>
            </form>
        </div>
    <!----------------------------Search div : Finish ------------------------------->
        
    <!----------------------------Login div : Start ---------------------------------------------->
        <div id="logindiv" onMouseOver="displayblock()" onMouseOut="displaynone()">
            <form action="login_process.php" method="post" style="height:inherit;">
            <!--------------------------------Login div Left : Start ----------------------------------------------->
            <div id="logindivl" style="display:none;">
            <?php
			if(session_id() == ''){session_start();}
			if(!(isset($_SESSION['login']))){$_SESSION["login"]=false;}
			
			if($_SESSION['login']==true)
			{
				$con = mysqli_connect("localhost","root","");
				mysqli_select_db($con, "wolly");
				$query_login='select Profile from login where MailID="'.$_SESSION["wowuser"].'"';
				$result_login=mysqli_query($con,$query_login);
				$row_login=mysqli_fetch_array($result_login);
				if($row_login["Profile"]==NULL)
				{
				echo '
				<img src="images/default_profile.png" alt="Profile" width="inherit" height="inherit">';
				}
				else
				{
				echo '
				<img src="Profile/'.$_SESSION['wowuser'].'.'.$row_login["Profile"].'" alt="Profile" width="inherit" height="inherit">';
				}
			}
			else
			{
				if(isset($_COOKIE["wowuser"]))
				{
				echo '
				<div>
                <input type="text" size="25" name="mail" id="mail"  onclick="displaynone(1)" onblur="displaynone(0)" value="'.$_COOKIE["wowuser"].'" placeholder="Mail ID">';
				}
				else
				{
				echo '
				<div>
                <input type="text" size="25" name="mail" id="mail"  onclick="displaynone(1)" onblur="displaynone(0)" placeholder="Mail ID">';
				}
				
				echo 
				'<a href="sign_up.php">Create New Account</a>
                <p id="WMNotice">Wrong Mail Id</p>
				</div>
				<div>
				<input type="password" size="25" name="pass" id="pass" onclick="displaynone(1)" onblur="displaynone(0)" style="margin-top:5.5%;" placeholder="Password">
				<a href="Forget.php">Need Help</a>
                <p id="WPNotice">Wrong Password</p>
                </div>';
			}
			?>
            </div> 
            <!----------------------------Login div left Finish --------------------------------------->
           
            <!----------------------------Login div Right Start --------------------------------------->
            <?php			
			if($_SESSION['login']==true)
			{
				echo '
				<div id="logindivr" style="background-image:url(images/logout_button.png);">
				<input type="submit" id="login" value="logout">';
			}
				
			else
			{
				echo '
				<div id="logindivr" style="background-image:url(images/login_button.png);">
				<input type="submit" id="login" value="Login">';
				if(isset($_GET['err']))
				{ 
					if($_GET['err']=='Problem_m')
					{
					echo '<script>
						document.getElementById("WMNotice").style.display="block";
						document.getElementById("mail").style.border="2px solid #F00";
						document.getElementById("logindiv").style.borderLeft="2px solid #F00";
						</script>';
					}
					else if($_GET['err']=='Problem_p')
					{
					echo '<script>
						document.getElementById("WPNotice").style.display="block";
						document.getElementById("pass").style.border="2px solid #F00";
						document.getElementById("logindiv").style.borderLeft="4px solid #F00";
						</script>';
					}
				}
			}
			?>
			</div>
            <!----------------------------Login div Right Finish --------------------------------------->
            </form>
		</div>
    <!----------------------------Login div Finish --------------------------------------->
	
	<a href="https://www.facebook.com" target="_blank"><div id="facebook"></div></a>
	<a href="https://www.twitter.com" target="_blank"><div id="twitter"></div></a>