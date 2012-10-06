<?php
require '../config.php';

if(!$_SESSION['username']){header("url=index.php");}

session_name('MiniSLogin');
session_start();
session_destroy();

header("Refresh:1; url=../index.php");
?>
<html>
<head>
	<title><?php echo $site_name ?> - <?php echo $lang['PRZEK'] ?></title>
	<meta http-equiv='Content-Language' content='<?php echo $site_lang ?>'>
	<meta http-equiv='Content-type' content='text/html; charset=UTF-8'>
	<meta name="generator" content="<?php echo $lang['CMS'] ?> by M. Kucharskov">	

	<link rel='stylesheet' type='text/css' href='css/login.css'>
</head>
<body>
<div id="space"></div>
	<div id="log_box">
		<div id="logout">
		<?php echo $lang['PRZEK_'] ?>
		</div>
	</div>
</body>
</html>