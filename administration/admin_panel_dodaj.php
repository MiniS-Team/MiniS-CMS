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

session_name('MiniSLogin');
session_start();

if(!$_SESSION['username'])
{
	header("Location: index.php");
	exit;
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title><?php echo $config['site_name'] ?> - <?php echo $lang['PA']  ?></title>
	<meta http-equiv="Content-Language" content="<?php echo $config['site_lang'] ?>">
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
	<meta name="generator" content="<?php echo $lang['CMS'] ?> by M. Kucharskov & MiniS Team">	

	<link rel="stylesheet" type="text/css" href="css/admin.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/navi.css" media="screen">
	
	<script type="text/javascript" src="../js/JQuery.min.js"></script>
	<script type="text/javascript" src="js/info_hide.js"></script>
</head>
<body>
<div class="wrap">
	<div id="header">
		<div id="top">
			<div class="left">
				<img src="img/MiniS.png">
			</div>
			<div class="right">
				<div class="align-right">
					<a href="logout.php" class="button"><?php echo $lang['LOGOUT'] ?></a>
					<br><br>
					<a href="../index.php" class="button" target="_blank"><?php echo $lang['PVIEW'] ?></a>
				</div>
			</div>
		</div>
		<div id="nav">
			<ul>
				<li class="upp"><a href="admin_panel.php" class="menu"><?php echo $lang['MENU_1'] ?></a></li>
				<li class="upp"><a href="admin_panel_edytuj.php" class="menu"><?php echo $lang['MENU_3'] ?></a></li>
				<li class="upp"><a href="admin_panel_dodaj.php" class="menu"><?php echo $lang['MENU_4'] ?></a></li>
			</ul>
		</div>
	</div>


	<div id="content">
		<div id="main">			
			<div class="full_w">
				<div class="h_title"><?php echo $lang['MENU_4'] ?></div>
				<div id="info_hide">
				<?php
					$nazwa=$_POST['name'];
					$tresc=$_POST['content'];
					$folder="../pages/";
					$roz=".txt";

					if ($_SERVER['REQUEST_METHOD'] == 'POST') {
						if (!$nazwa) {
							echo '<div class="n_error"><p>'.$lang['ET_BD_NO_NAZW'].'</p></div>';
						} else {
						if (preg_match('/^[a-zA-Z0-9_]{1,}$/D', $nazwa)) {
							if (file_exists($folder.$nazwa.$roz)) {
								echo '<div class="n_error"><p>'.$lang['PLK_ZAP_NO'].'</p></div>';
							} else {
								file_put_contents ($folder.$nazwa.$roz, $tresc);
								echo '<div class="n_ok"><p>'.$lang['PLK_ZAP_OK'].'</p></div>';	
							}
						} else {
							echo '<div class="n_error"><p>'.$lang['ET_BD_NAZW'].'</p></div>';
						}
						}
					}
				?>
				</div>
							
				<form action="admin_panel_dodaj.php" method="post">
					<div class="element">
						<label for="name"><?php echo $lang['ET_NS'] ?> <span class="red"><?php echo $lang['ET_WYM'] ?></span></label>
						<input id="name" name="name" class="text err">
					</div>
					<div class="element">
						<label for="content"><?php echo $lang['ET_ZAW'] ?> <span><?php echo $lang['ET_WYM'] ?></span></label>
						<textarea name="content" class="textarea" id="textarea" rows="25"></textarea>
					</div>
					<div class="entry">
						<button type="submit" class="add"><?php echo $lang['ET_ZAP'] ?></button> <button type="reset" class="cancel"><?php echo $lang['ET_AN'] ?></button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<div id="footer">
		<div class="left">
			<p>Design: <a href="http://kilab.pl" target="_blank">Paweł Balicki</a></p>
		</div>
		<div class="right">
			<p><?php echo $lang['CMS'] ?>: <a href="http://kucharskov.cba.pl" target="_blank">M. Kucharskov</a> & MiniS Team</p>
		</div>
	</div>
</div>

</body>
</html>