function Paper(a)
{
	if(a!="")
	{
	document.getElementById(a).style.textShadow="2px 2px 5px #000";
	document.getElementById(a).style.backgroundColor="transparent";
	}
	
	document.getElementById("Wall").style.display="block";
	document.getElementById("footer").style.display="block";
}

function displayblock()
{
	document.getElementById("logindivl").style.display="block";
	//document.getElementById("pass").focus();
}
function displaynone(a)
{
	if( typeof lfocused === 'undefined' || a==0)
	lfocused=0;	//false
	else if(a==1)	
	lfocused=1;	//true
	else{}
		
	if(lfocused==1)
	document.getElementById("logindivl").style.display="block";
	else
	document.getElementById("logindivl").style.display="none";
}

function searchblock()
{
	document.getElementById("searchleft").style.display="block";
	//document.getElementById("pass").focus();
}
function searchnone(b)
{
	if( typeof sfocused === 'undefined' || b==0)
	sfocused=0;	//false
	else if(b==1)	
	sfocused=1;	//true
	else{}
		
	if(sfocused==1)
	document.getElementById("searchleft").style.display="block";
	else
	document.getElementById("searchleft").style.display="none";
}


/*----------------------------------------------Un Common function-------------------------------------------------*/

function Contact()
{
	var flag=true;
	var x=document.getElementById("User_name");
	if(x.value=="")
	{	
	 	flag=false;
		x.style.border="2px solid #000";
		document.getElementById("UN_Notice").innerHTML="Required";
	}
	else
	{
		x.style.border="1px solid #00f";
		document.getElementById("UN_Notice").innerHTML="";
	}
	
	x=document.getElementById("Mail Id");
	var n=x.value.length;
	if(x.value=="")
	{
		flag=false;
		x.style.border="2px solid #000";
		document.getElementById("MI_Notice").innerHTML="Required";
	}
	else if(x.value.substr(n-10,10)=="@gmail.com" ||x.value.substr(n-10,10)=="@yahoo.com" ||x.value.substr(n-12,12)=="@hotmail.com")
	{
		x.style.border="1px solid #00f";
		document.getElementById("MI_Notice").innerHTML="";
	}
	else
	{
		flag=false;
		x.style.border="2px solid #000";
		document.getElementById("MI_Notice").innerHTML="Wrong Mail ID";	
	}
	return flag;
}

function Sign_Up()
{
	var flag=true;
	var x=document.getElementById("User_name");
	if(x.value=="")
	{	
	 	flag=false;
		x.style.border="2px solid #000";
		document.getElementById("UN_Notice").innerHTML="Required";
	}
	else
	{
		x.style.border="1px solid #00f";
		document.getElementById("UN_Notice").innerHTML="";
	}
	
	x=document.getElementById("Mail Id");
	var n=x.value.length;
	if(x.value=="")
	{
		flag=false;
		x.style.border="2px solid #000";
		document.getElementById("MI_Notice").innerHTML="Required";
	}
	else if(x.value.substr(n-10,10)=="@gmail.com" ||x.value.substr(n-10,10)=="@yahoo.com" ||x.value.substr(n-12,12)=="@hotmail.com")
	{
		x.style.border="1px solid #00f";
		document.getElementById("MI_Notice").innerHTML="";
	}
	else
	{
		flag=false;
		x.style.border="2px solid #000";
		document.getElementById("MI_Notice").innerHTML="Wrong Mail ID";	
	}
	
	x=document.getElementById("Mobile");
	if(x.value=="")
	{
		flag=false;
		x.style.border="2px solid #000";
		document.getElementById("MN_Notice").innerHTML="Required";
	}
	else
	{
		x.style.border="1px solid #00f";
		document.getElementById("MN_Notice").innerHTML="";
	}
	
	x=document.getElementById("Password");
	if(x.value.length<8||x.value.length>25)
	{
		flag=false;
		x.style.border="2px solid #000";
		//document.getElementById("PW_Notice").style.color="#000";
	}
	else
	{
		x.style.border="1px solid #00f";
		document.getElementById("PW_Notice").innerHTML="";
	}
	
	var y=document.getElementById("RPassword");
	if(x.value!=y.value)
	{
		flag=false;
		y.style.border="2px solid #000";
		//document.getElementById("RPW_Notice").style.color="#000";
		document.getElementById("RPW_Notice").innerHTML="Must Same As Upper Password";
	}
	else
	{
		y.style.border="1px solid #00f";
		document.getElementById("RPW_Notice").innerHTML="";
	}
	
	var x=document.getElementById("SQuestion");
	if(x.value=="")
	{	
	 	flag=false;
		x.style.border="2px solid #000";
		document.getElementById("SQ_Notice").innerHTML="Required";
	}
	else
	{
		x.style.border="1px solid #00f";
		document.getElementById("SQ_Notice").innerHTML="";
	}
	return flag;
}