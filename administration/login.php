<?php 
if(!file_exists('../config.php')) {
	echo "<div style='text-align: center; margin: 0 auto;'>";
	echo "<div style='font-family: Helvetica Neue,Helvetica,Arial,sans-serif; font-size: 13px; width: 350px; margin: 0 auto; text-align: center; color: #FFFFFF; border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25); border-radius: 4px 4px 4px 4px; border-style: solid; border-width: 1px; box-shadow: 0 1px 0 rgba(255, 255, 255, 0.25) inset; margin-bottom: 18px; padding: 7px 15px; position: relative; background-color: #C43C35; background-image: -moz-linear-gradient(center top , #EE5F5B, #C43C35); background-repeat: repeat-x; border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25); text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);'>";
	echo "File <b>config.php</b> required by MiniS CMS has not been found!";
	echo "</div>";
	echo "</div>";
	die;
} else {
	require '../config.php';
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title><?php echo $config['site_name'] ?> - <?php echo $lang['COM'] ?></title>
	<meta http-equiv="Content-Language" content="<?php echo $config['site_lang'] ?>">
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
	<meta name="generator" content="<?php echo $lang['CMS'] ?> by M. Kucharskov & MiniS Team">	

	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>

<?php

$login=$_POST['user'];
$pass=$_POST['pass'];

session_name('MiniSLogin');
session_start();

if ($login == $config['my_login'] && $pass == $config['my_pass']) {
	header("Refresh:3; url=admin_panel.php");
	$_SESSION['username'] = $config['my_login'];
	echo '<div id="space"></div><div id="log_box"><div id="log_ok">'.$lang['LOGIN_OK'].'<br>'.$lang['LOGIN_WAIT'].'</div></div>';
} else {
	header("Refresh:3; url=index.php");
	echo '<div id="space"></div><div id="log_box"><div id="log_no">'.$lang['LOGIN_NO'].'</div></div>';
}
?>
 
</body>
</html>