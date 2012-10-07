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
	<script type='text/javascript' src='js/info_hide.js'></script>
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
					<input class='button' type='submit' value='<?php echo $lang['LOGOUT'] ?>'>
					</form>
					<br>
					<form action='../index.php' target='_blank'>
					<input class='button' type='submit' value='<?php echo $lang['PVIEW'] ?>'>
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
				<div class="h_title">&#8250; <?php echo $lang['L_PLK'] ?></div>
					<?php
					echo '<ul>';
					$i = 0;
					$dir = opendir('../pages/');
					while($file = readdir($dir)) {
						if($file !== '.' && $file !== '..' && $file !== '.htaccess') { 
						$i++;
						$parity = ($i % 2) + 1;
						$load_start = "$('#textarea').load('../pages/";
						$load_end = "');";
						$load = $load_start.$file.$load_end;
						$load_start2 = "$('#name').attr('value', '";
						$load_end2 = "');";
						$load2 = $load_start2.$file.$load_end2;
						echo '<li class="b'.$parity.'"><a href="#" onClick="'.$load.$load2.'">'.$file."</a></li>\n";
						} else {
						}
					}
					echo '</ul>';
					?>
			</div>
		</div>
		<div id="main">			
			<div class="full_w">
				<div class="h_title"><?php echo $lang['MENU_3'] ?></div>
				<div id="plik_info">
				<?php
					$nazwa = $_POST['name'];
					$tresc = $_POST['content'];
					$folder = "../pages/";

					if ($_SERVER['REQUEST_METHOD'] == 'POST') {
						file_put_contents ($folder.$nazwa, $tresc);
						echo '<div class="n_ok"><p>'.$lang['PLK_ZAP_OK'].'</p></div>';
					}
				?>
				</div>
				<form action="admin_panel_edytuj.php" method="post">
					<div class="element">
						<label for="name" readonly="readonly"><?php echo $lang['ET_NS'] ?></label>
						<input id="name" name="name" class="text" readonly="readonly">
					</div>
					<div class="element">
						<label for="content"><?php echo $lang['ET_ZAW'] ?> <span><?php echo $lang['ET_WYM'] ?></span></label>
						<textarea name="content" class="textarea" id="textarea" rows="25"></textarea>
					</div>
					<div class="entry">
						<button type="submit" class="add"><?php echo $lang['ET_ZAP'] ?></button> <button type="reset" class="cancel"><?php echo $lang['ET_COF'] ?></button>
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