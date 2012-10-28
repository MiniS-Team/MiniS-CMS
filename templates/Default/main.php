<?php include 'header.php'; ?>

	<!-- POZIOME MENU -->
	<?php
	if($config['panel_poziomo'])
	{
	$pozioma_tresc = file_get_contents('pages/'.$config['PoziomyPanelText']);
	echo '<div id="panel_poziomo">'.$pozioma_tresc.'</div>';
	}
	?>
	<!-- POZIOME MENU KONIEC -->
	
	<!-- LEWE MENU -->
	<?php
	if($config['panel_lewo'])
	{
	$lewa_tresc = file_get_contents('pages/'.$config['LewyPanelText']);
	echo '<div id="panel_lewo">'.$lewa_tresc.'</div>';
	}
	?>
	<!-- LEWE MENU KONIEC -->

	<!-- ŚRODKOWE POLE -->
	<?php
	$BodyText = file_get_contents('pages/'.$config['PlikBodyText']);
	$BodyTextType = (!$config['panel_lewo'] && !$config['panel_prawo']) ? '_vlong' : ((!$config['panel_prawo'] || !$config['panel_lewo']) ? '_long' : '');
	echo '<div id="bodytext'.$BodyTextType.'">'.$BodyText.'</div>';
	?>
	<!-- ŚRODKOWE POLE KONIEC -->

	<!-- PRAWE MENU -->
	<?php
	if($config['panel_prawo'])
	{
	$prawa_tresc = file_get_contents('pages/'.$config['PrawyPanelText']);
	echo '<div id="panel_prawo">'.$prawa_tresc.'</div>';
	}
	?>
	<!-- PRAWE MENU KONIEC -->
	
<?php include 'footer.php'; ?>
	