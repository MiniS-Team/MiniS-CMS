<?php require "../config.php"; ?>
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