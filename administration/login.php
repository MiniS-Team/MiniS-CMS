<?php require '../config.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $site_name ?> - <?php echo $lang['KOM'] ?></title>
	<meta http-equiv='Content-Language' content='<?php echo $site_lang ?>'>
	<meta http-equiv='Content-type' content='text/html; charset=UTF-8'>
	<meta name="generator" content="<?php echo $lang['CMS'] ?> by M. Kucharskov & MiniS Team">	

	<link rel='stylesheet' type='text/css' href='css/login.css'>
</head>
<body>

<?php

$login=$_POST['user'];
$pass=$_POST['pass'];

session_name('MiniSLogin');
session_start();

if ($login == $my_login && $pass == $my_pass) {
	header("Refresh:3; url=admin_panel.php");
	$_SESSION['username'] = $my_login;
	echo '<div id="space"></div><div id="log_box"><div id="log_ok">'.$lang['ZALOG_OK'].'<br>'.$lang['ZALOG_CZEK'].'</div></div>';
} else {
	header("Refresh:3; url=index.php");
	echo '<div id="space"></div><div id="log_box"><div id="log_no">'.$lang['ZALOG_NO'].'</div></div>';
}
?>
 
</body>
</html>