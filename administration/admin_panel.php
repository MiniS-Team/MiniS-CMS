<?php
if(!file_exists('../config.php'))
{
echo "<div style='font-family: Helvetica Neue,Helvetica,Arial,sans-serif; font-size: 13px; width: 350px; margin: 0 auto; text-align: center; color: #FFFFFF; border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25); border-radius: 4px 4px 4px 4px; border-style: solid; border-width: 1px; box-shadow: 0 1px 0 rgba(255, 255, 255, 0.25) inset; margin-bottom: 18px; padding: 7px 15px; position: relative; background-color: #C43C35; background-image: -moz-linear-gradient(center top , #EE5F5B, #C43C35); background-repeat: repeat-x; border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25); text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);'>";
echo "File <b>config.php</b> required by MiniS CMS has not been found!";
echo "</div>";
die;
}
require '../config.php';

session_name('MiniSLogin');
session_start();

if(!$_SESSION['username'])
{
 header("Location: index.php");
 exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $site_name ?> - <?php echo $lang['PA']  ?></title>
	<meta http-equiv='Content-Language' content='<?php echo $site_lang ?>'>
	<meta http-equiv='Content-type' content='text/html; charset=UTF-8'>
	<meta name="generator" content="<?php echo $lang['CMS'] ?> by M. Kucharskov & MiniS Team">	

	<link rel="stylesheet" type="text/css" href="css/admin.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/navi.css" media="screen">
	
	<script type='text/javascript' src='../js/JQuery.min.js'></script>
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
					<form action='logout.php'>
					<input class='button' type='submit' value='<?php echo $lang['WYLOG'] ?>'>
					</form>
					<br>
					<form action='../index.php' target='_blank'>
					<input class='button' type='submit' value='<?php echo $lang['PODGL'] ?>'>
					</form>
				</div>
			</div>
		</div>
		<div id="nav">
			<ul>
				<li class="upp"><a href='admin_panel.php' class='menu'><?php echo $lang['MENU_1'] ?></a></li>
				<li class="upp"><a href='admin_panel_edytuj.php' class='menu'><?php echo $lang['MENU_3'] ?></a></li>
				<li class="upp"><a href='admin_panel_dodaj.php' class='menu'><?php echo $lang['MENU_4'] ?></a></li>
			</ul>
		</div>
	</div>
	
	<div id="content">
		<div id="sidebar">
			<div class="box">
				<div class="h_title">&#8250; <?php echo $lang['SK_INFO'] ?></div>
				<p class="b1">
				<?php
				$version = file_get_contents('http://Kucharskov.cba.pl/MiniS_CMS/.kucharskov/version.kucharskov');
				$version_local = file_get_contents('../version.kucharskov');
				
				if(!$version) {
				echo $lang['WER'].": <font style='color: #FF0000; font-weight: bold;'>".$lang['NO_PL']."</font><br>";
				} else {
				echo $lang['WER'].": <b>".base64_decode($version)."</b><br>";
				}
				
				if(!$version_local) {
				echo $lang['WER_LOC'].": <font style='color: #FF0000; font-weight: bold;'>".$lang['NO_PL']."</font><br>";
				} else {
				echo $lang['WER_LOC'].": <b>".base64_decode($version_local)."</b><br>";
				}
				
				echo $lang['SK_ST'].": ";
				if ($version_local==$version) {
				echo "<font style='color: #008000; font-weight: bold;'>".$lang['SK_AK']."</font><br>"; 
				} else {
				echo "<font style='color: #FF0000; font-weight: bold;'>".$lang['SK_NAK']."</font><br>";

				echo "<form action='http://www.mediafire.com/?ap6bc8d7odakw' target='_blank'>";
				echo "<input class='button' type='submit' value=".$lang['SK_PNW'].">";
				echo "</form>";
				}
				?>
				</p>
			</div>
		</div>
		<div id="main">			
			<div class="full_w">
				<div class="h_title"><?php echo $lang['MENU_1'] ?></div>
				<div class="n_error"><p>Wersja skryptu nie obsługuje konfiguracji zdalnej. Edytuj plik config.php</p></div>
			</div>
			
			<div class="full_w">
				<div class="h_title"><?php echo $lang['SK_ZM'] ?></div>
				<?php
				$changelog = file_get_contents('http://Kucharskov.cba.pl/MiniS_CMS/.kucharskov/changelog.kucharskov');
				
				if(!$changelog) {
				echo "<font style='color: #FF0000; font-weight: bold;'><p>".$lang['NO_PL']."</p></font>";
				} else {
				echo $changelog;
				}
				?>
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