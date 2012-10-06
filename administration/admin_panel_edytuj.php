<?php
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
						echo '<div class="n_ok"><p>Zapisano zmiany!</p></div>';
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