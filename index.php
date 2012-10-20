<?php
if(!file_exists('config.php')) {
	echo "<div style='font-family: Helvetica Neue,Helvetica,Arial,sans-serif; font-size: 13px; width: 350px; margin: 0 auto; text-align: center; color: #FFFFFF; border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25); border-radius: 4px 4px 4px 4px; border-style: solid; border-width: 1px; box-shadow: 0 1px 0 rgba(255, 255, 255, 0.25) inset; margin-bottom: 18px; padding: 7px 15px; position: relative; background-color: #C43C35; background-image: -moz-linear-gradient(center top , #EE5F5B, #C43C35); background-repeat: repeat-x; border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25); text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);'>";
	echo "File <b>config.php</b> required by MiniS CMS has not been found!";
	echo "</div>";
	die;
} else {
	require 'config.php';
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title><?php echo $site_name ?></title>
	<meta http-equiv="Content-Language" content="<?php echo $site_lang ?>">
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
	<meta name="generator" content="<?php echo $lang['CMS'] ?> by M. Kucharskov & MiniS Team">
	<meta name="google-site-verification" content="<?php echo $site_gsv ?>">
	<meta name="description" content="<?php echo $site_description ?>">
	<meta name="keywords" content="<?php echo $site_keywords ?>">	

	<link rel="stylesheet" type="text/css" href="css/base.css">
	<link rel="stylesheet" type="text/css" href="css/<?php echo $style_name ?>">
	
	<script type="text/javascript" src="js/JQuery.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
		$('a.menu').click(function() {
			var rel = $(this).attr('rel');
			{
				$('#bodytext').fadeOut('slow', function(){
				$('#bodytext').load('pages/'+rel+'.txt');
			});
			$('#bodytext').fadeIn('slow');
			$('#bodytext_long').fadeOut('slow', function(){
				$('#bodytext_long').load('pages/'+rel+'.txt');
			});
			$('#bodytext_long').fadeIn('slow');
			$('#bodytext_vlong').fadeOut('slow', function(){
				$('#bodytext_vlong').load('pages/'+rel+'.txt');
			});
			$('#bodytext_vlong').fadeIn('slow');
			}
		});
	});
	</script>
</head>
<body>
<br>

<div id="kontener">

	<!-- NAGŁOWEK -->
	<div id="header">
		<img src="img/MiniS.png" alt="">
	</div>
	<!-- NAGŁOWEK KONIEC -->

	<!-- POZIOME MENU -->
	<?php
	if($panel_poziomo)
	{
	$pozioma_tresc = file_get_contents('pages/'.$PoziomyPanelText);
	echo '<div id="panel_poziomo">'.$pozioma_tresc.'</div>';
	}
	?>
	<!-- POZIOME MENU KONIEC -->
	
	<!-- LEWE MENU -->
	<?php
	if($panel_lewo)
	{
	$lewa_tresc = file_get_contents('pages/'.$LewyPanelText);
	echo '<div id="panel_lewo">'.$lewa_tresc.'</div>';
	}
	?>
	<!-- LEWE MENU KONIEC -->

	<!-- ŚRODKOWE POLE -->
	<?php
	$BodyText = file_get_contents('pages/'.$PlikBodyText);
	$BodyTextType = (!$panel_lewo && !$panel_prawo) ? '_vlong' : ((!$panel_prawo || !$panel_lewo) ? '_long' : '');
	echo '<div id="bodytext'.$BodyTextType.'">'.$BodyText.'</div>';
	?>
	<!-- ŚRODKOWE POLE KONIEC -->

	<!-- PRAWE MENU -->
	<?php
	if($panel_prawo)
	{
	$prawa_tresc = file_get_contents('pages/'.$PrawyPanelText);
	echo '<div id="panel_prawo">'.$prawa_tresc.'</div>';
	}
	?>
	<!-- PRAWE MENU KONIEC -->
	
	<!-- STOPKA NIE USUWAĆ! -->
	<div id="footer">
	<?php
	echo $lang['CMS']; 
	$version = file_get_contents('version.kucharskov');
	echo " <b>".base64_decode($version)."</b>";
	?>
	by <a href="http://Kucharskov.cba.pl" target="_blank">M. Kucharskov</a> & MiniS Team<br>
	<img src="img/MiniS_small.png" alt="">
	</div>
	<!-- KONIEC STOPKI -->
	
</div>

</body>
</html>