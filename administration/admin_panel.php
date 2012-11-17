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

function escape($string) {
	return ((get_magic_quotes_gpc()) ? $string : addslashes($string));
}

session_name('MiniSLogin');
session_start();

/**
 * Wyłączenie cache tam, gdzie niepotrzebne
 */
header('Pragma: no-cache');
header('Expires: Thu, 1 Jan 1970 00:00:01 GMT');
header('Cache-control: no-cache, must-revalidate');

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
		<div id="sidebar">
			<div class="box">
				<div class="h_title">&#8250; <?php echo $lang['SK_INFO'] ?></div>
				<p class="b1">
				<?php
				$version = @file_get_contents('http://Kucharskov.cba.pl/MiniS_CMS/.kucharskov/version.kucharskov');
				$version_local = @file_get_contents('../version.kucharskov');
				
				if(!$version) {
				echo $lang['VER'].": <font class='red'>".$lang['NO_FILE']."</font><br>";
				} else {
				echo $lang['VER'].": <b>".base64_decode($version)."</b><br>";
				}
				
				if(!$version_local) {
				echo $lang['VER_LOC'].": <font class='red'>".$lang['NO_FILE']."</font><br>";
				} else {
				echo $lang['VER_LOC'].": <b>".base64_decode($version_local)."</b><br>";
				}
				
				echo $lang['SK_ST'].": ";
				if ($version_local > $version) {
				echo "<font class='blue'>".$lang['SK_DEV']."</font><br>"; 
				}
				else if ($version_local == $version) {
				echo "<font class='green'>".$lang['SK_AK']."</font><br>"; 
				} else {
				echo "<font class='red'>".$lang['SK_NAK']."</font><br>";
	
				echo "<br><a href='http://www.mediafire.com/?ap6bc8d7odakw' target='_blank' id='pnw-button' class='button'>".$lang['SK_PNW']."</a>";
				}
				?>
				</p>
			</div>
		</div>
		<div id="main">			
			<div class="full_w">
				<div class="h_title"><?php echo $lang['MENU_1'] ?></div>
				<div class="align-center">
					<a href='admin_panel.php?settings=admin'><p class='button'><?php echo $lang['CONFIG_CAT1'] ?></p></a>
					<a href='admin_panel.php?settings=page'><p class='button'><?php echo $lang['CONFIG_CAT2'] ?></p></a>
					<a href='admin_panel.php?settings=styles'><p class='button'><?php echo $lang['CONFIG_CAT3'] ?></p></a>
				</div>
				<?php
				$dane = $config;
				if (!$_GET['settings']) {
				} else if ($_GET['settings'] == "admin") {
				if ($_GET['settings'] == "admin" && $_SERVER['REQUEST_METHOD'] == 'POST') {
					$error = array();
					$dane = $_POST;
					if(!$dane['my_login']) $error[] = $lang['CONFIG_NO_LOGIN'];
					if(!$dane['my_pass']) $error[] = $lang['CONFIG_NO_PASS'];
					if(!$error) {
						$configString = "<?php\nrequire('lang/{$lang['NAME']}.php');\n\$config = array(\n";
						foreach($dane as $k => $v) {
							if ($k == "my_pass") {
								$v = hash('sha512', $v);
							}
							$v = escape($v);
							$configString .= "'{$k}' => '{$v}',\n";
						}
						$configString .= "'site_name' => '{$config[site_name]}',\n";
						$configString .= "'site_lang' => '{$config[site_lang]}',\n";
						$configString .= "'site_gsv' => '{$config[site_gsv]}',\n";
						$configString .= "'site_keywords' => '{$config[site_keywords]}',\n";
						$configString .= "'site_description' => '{$config[site_description]}',\n";
						$configString .= "'template_name' => '{$config[template_name]}',\n";
						$configString .= "'style_name' => '{$config[style_name]}',\n";
						$configString .= "'panel_lewo' => ".$config[panel_lewo].",\n";
						$configString .= "'panel_prawo' => ".$config[panel_prawo].",\n";
						$configString .= "'panel_poziomo' => ".$config[panel_poziomo].",\n";
						$configString .= "'PlikBodyText' => '{$config[PlikBodyText]}',\n";
						$configString .= "'LewyPanelText' => '{$config[LewyPanelText]}',\n";
						$configString .= "'PrawyPanelText' => '{$config[PrawyPanelText]}',\n";
						$configString .= "'PoziomyPanelText' => '{$config[PoziomyPanelText]}',\n";
						$configString .= ");
@ini_set('allow_url_fopen', 1);
?>";
						file_put_contents("../config.php", $configString);
						echo "<div id='info_hide'><div class='n_ok'><p>".$lang['INSTAL_LANG_1']."</p></div></div>";
					} else {
							echo "<div id='info_hide'><div class='n_error'><p>{$lang['CONFIG_ERRORS']}</p></div><ul>";
						foreach($error as $err) {
							echo "<li>{$err}</li>";
						}
							echo "</ul></div>";
					}
				}
				echo "
				<form action='admin_panel.php?settings=admin' method='post'>
				<div class='left' style='width: 35%;'>
				<label>{$lang['CONFIG_LOGIN']}: </label><input type='text' class='input text' name='my_login' value='{$dane['my_login']}' required><br><br>
				<label>{$lang['CONFIG_PASS']}: </label><input type='password' class='input text' name='my_pass' required><br><br>
				</div>
				<div class='right' style='width: 55%;'></div>
				<div class='clear'></div>
				<button type='submit'>".$lang['ET_ZAP']."</button>
				</form>";
				} else if ($_GET['settings'] == "page") {
				if ($_GET['settings'] == "page" && $_SERVER['REQUEST_METHOD'] == 'POST') {
					$error = array();
					$dane = $_POST;
					if(!$dane['site_name']) $error[] = $lang['CONFIG_NO_SITE_NAME'];
					if(!$dane['site_lang']) $error[] = $lang['CONFIG_NO_SITE_LANG'];
					if(!$error) {
						$configString = "<?php\nrequire('lang/{$lang['NAME']}.php');\n\$config = array(\n";
						$configString .= "'my_login' => '{$config[my_login]}',\n";
						$configString .= "'my_pass' => '{$config[my_pass]}',\n";
						foreach($dane as $k => $v) {
							$v = escape($v);
							$configString .= "'{$k}' => '{$v}',\n";
						}
						$configString .= "'template_name' => '{$config[template_name]}',\n";
						$configString .= "'style_name' => '{$config[style_name]}',\n";
						$configString .= "'panel_lewo' => ".$config[panel_lewo].",\n";
						$configString .= "'panel_prawo' => ".$config[panel_prawo].",\n";
						$configString .= "'panel_poziomo' => ".$config[panel_poziomo].",\n";
						$configString .= "'PlikBodyText' => '{$config[PlikBodyText]}',\n";
						$configString .= "'LewyPanelText' => '{$config[LewyPanelText]}',\n";
						$configString .= "'PrawyPanelText' => '{$config[PrawyPanelText]}',\n";
						$configString .= "'PoziomyPanelText' => '{$config[PoziomyPanelText]}',\n";
						$configString .= ");
@ini_set('allow_url_fopen', 1);
?>";
						file_put_contents("../config.php", $configString);
						echo "<div id='info_hide'><div class='n_ok'><p>".$lang['INSTAL_LANG_1']."</p></div></div>";
					} else {
							echo "<div id='info_hide'><div class='n_error'><p>{$lang['CONFIG_ERRORS']}</p></div><ul>";
						foreach($error as $err) {
							echo "<li>{$err}</li>";
						}
							echo "</ul></div>";
					}
				}
				echo "
				<form action='admin_panel.php?settings=page' method='post'>
				<div class='left' style='width: 35%;'>
				<label>{$lang['CONFIG_SITE_NAME']}: </label><input type='text' class='input text' name='site_name' value='{$dane['site_name']}' required><br><br>
				<label>{$lang['CONFIG_SITE_LANG']}: </label><input type='text' class='input text' name='site_lang' value='".(($dane['site_lang']) ? $dane['site_lang'] : $lang['CODE'])."'><br><br>
				<label>{$lang['CONFIG_SITE_GSV']}: </label><input type='text' class='input text' name='site_gsv' value='{$dane['site_gsv']}'><br><br>
				</div>
				<div class='right' style='width: 55%;'>
				<label>{$lang['CONFIG_SITE_KEYWORDS']}: </label><input type='text' class='input text' name='site_keywords' value='{$dane['site_keywords']}'><br><br>
				<label>{$lang['CONFIG_SITE_DESC']}: </label><input type='text' class='input text' name='site_description' value='{$dane['site_description']}'><br><br>
				</div>
				<div class='clear'></div>
				<button type='submit'>".$lang['ET_ZAP']."</button>
				</form>";
				} else if ($_GET['settings'] == "styles") {
				$templates = scandir('../templates');
				$templates = array_diff($templates, array('.', '..', 'index.php'));
				$styles = scandir('../templates/'.$config['template_name'].'/css/colors');
				$styles = array_diff($styles, array('.', '..'));
				if ($_GET['settings'] == "styles" && $_SERVER['REQUEST_METHOD'] == 'POST') {
					$dane = $_POST;
					$configString = "<?php\nrequire('lang/{$lang['NAME']}.php');\n\$config = array(\n";
					$configString .= "'my_login' => '{$config[my_login]}',\n";
					$configString .= "'my_pass' => '{$config[my_pass]}',\n";
					$configString .= "'site_name' => '{$config[site_name]}',\n";
					$configString .= "'site_lang' => '{$config[site_lang]}',\n";
					$configString .= "'site_gsv' => '{$config[site_gsv]}',\n";
					$configString .= "'site_keywords' => '{$config[site_keywords]}',\n";
					$configString .= "'site_description' => '{$config[site_description]}',\n";
					foreach($dane as $k => $v) {
						if ($k == "panel_lewo" || $k == "panel_prawo" || $k == "panel_poziomo") {
							if ($v === "on") {
								$v = "1";
							}
						}
						$v = escape($v);
						$configString .= "'{$k}' => '{$v}',\n";
					}
                                        $config['panel_lewo'] = $dane['panel_lewo'];
                                        $config['panel_prawo'] = $dane['panel_prawo'];
                                        $config['panel_poziomo'] = $dane['panel_poziomo'];

					$configString .= ");
@ini_set('allow_url_fopen', 1);
?>";
					file_put_contents("../config.php", $configString);
					echo "<div id='info_hide'><div class='n_ok'><p>".$lang['INSTAL_LANG_1']."</p></div></div>";
					}
				echo "
				<form action='admin_panel.php?settings=styles' method='post'>
				<div class='left' style='width: 35%;'>
				<label>{$lang['CONFIG_PLEWO']}: </label><input type='checkbox' name='panel_lewo'". ((!isset($config['panel_lewo'])) ? '' : ' checked=\'checked\'') . "><br><br>
				<label>{$lang['CONFIG_PPRAWO']}: </label><input type='checkbox' name='panel_prawo'". ((!isset($config['panel_lewo'])) ? '' : ' checked=\'checked\'') . "><br><br>
				<label>{$lang['CONFIG_PPOZIOMO']}: </label><input type='checkbox' name='panel_poziomo'". ((!isset($config['panel_lewo'])) ? '' : ' checked=\'checked\'') . "><br><br>
				<label>{$lang['CONFIG_TEMPLATE_NAME']}: </label>
				<select name='template_name' style='width: 50%'>";
				foreach ($templates as $templateName)
				{
					echo "<option>{$templateName}</option>";
				}
				echo "</select><br><br>
				<label>{$lang['CONFIG_STYLE_NAME']}: </label>
				<select name='style_name' style='width: 50%'>";
				foreach ($styles as $styleName)
				{
					echo "<option>{$styleName}</option>";
				}
				echo "</select><br><br>
				</div>
				<div class='right' style='width: 55%;'>
				<label>{$lang['CONFIG_BODY_TEXT']}: </label><input type='text' class='input text' name='PlikBodyText' value='{$dane['PlikBodyText']}'><br><br>
				<label>{$lang['CONFIG_PLEWO_TEXT']}: </label><input type='text' class='input text' name='LewyPanelText' value='{$dane['LewyPanelText']}'><br><br>
				<label>{$lang['CONFIG_PPRAWO_TEXT']}: </label><input type='text' class='input text' name='PrawyPanelText' value='{$dane['PrawyPanelText']}'><br><br>
				<label>{$lang['CONFIG_PPOZIOMO_TEXT']}: </label><input type='text' class='input text' name='PoziomyPanelText' value='{$dane['PoziomyPanelText']}'><br><br>
				</div>
				<div class='clear'></div>
				<button type='submit'>".$lang['ET_ZAP']."</button>
				</form>";
				}
				?>
			</div>
			
			<div class="full_w">
				<div class="h_title"><?php echo $lang['SK_ZM'] ?></div>
				<?php
				$changelog = file_get_contents('http://Kucharskov.cba.pl/MiniS_CMS/.kucharskov/changelog.kucharskov');
				
				if(!$changelog) {
				echo "<font class='red'><p>".$lang['NO_FILE']."</p></font>";
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