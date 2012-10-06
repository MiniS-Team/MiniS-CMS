<?php 
if(!file_exists('../config.php'))
{
echo "<div style='font-family: Helvetica Neue,Helvetica,Arial,sans-serif; font-size: 13px; width: 350px; margin: 0 auto; text-align: center; color: #FFFFFF; border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25); border-radius: 4px 4px 4px 4px; border-style: solid; border-width: 1px; box-shadow: 0 1px 0 rgba(255, 255, 255, 0.25) inset; margin-bottom: 18px; padding: 7px 15px; position: relative; background-color: #C43C35; background-image: -moz-linear-gradient(center top , #EE5F5B, #C43C35); background-repeat: repeat-x; border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25); text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);'>";
echo "File <b>config.php</b> required by MiniS CMS has not been found!";
echo "</div>";
die;
}
require "../config.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $site_name ?> - <?php echo $lang['PA'] ?></title>
	<meta http-equiv='Content-Language' content='<?php echo $site_lang ?>'>
	<meta http-equiv='Content-type' content='text/html; charset=UTF-8'>
	<meta name="generator" content="<?php echo $lang['CMS'] ?> by M. Kucharskov & MiniS Team">	

	<link rel='stylesheet' type='text/css' href='css/login.css'>
</head>
<body>

<div class="wrap">
	<div id="content">
		<div id="main">
			<div class="full_w">
				<form action="login.php" method="post">
					<label for="login"><?php echo $lang['LOG'] ?>:</label>
					<input type="text" name="user" id="login" class="text">
					<label for="pass"><?php echo $lang['HAS'] ?>:</label>
					<input id="pass" name="pass" type="password" class="text" />
					<div class="sep"></div>
					<button type="submit" class="ok"><?php echo $lang['ZALOG'] ?></button>
				</form>
			</div>
			<div class="footer">&raquo; <?php echo $site_name ?> | <?php echo $lang['PA'] ?></div>
		</div>
	</div>
</div>
</body>
</html>