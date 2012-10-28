<?php include 'header.php'; ?>

	<?php
	if($config['panel_poziomo']) {
		$pozioma_tresc = file_get_contents('pages/'.$config['PoziomyPanelText']);
		echo '<div id="cssmenu">'.$pozioma_tresc.'</div>';
	}
	?>


	<div id="lmenu">
		<?php
		if($config['panel_lewo']){
			$lewa_tresc = file_get_contents('pages/'.$config['LewyPanelText']);
			echo '<div class="box_lmenu">'.$lewa_tresc.'</div>';
		}
		?>
		
		<?php
		if($config['panel_prawo']){
			$prawa_tresc = file_get_contents('pages/'.$config['PrawyPanelText']);
			echo '<div class="box_lmenu">'.$prawa_tresc.'</div>';
		}
		?>
	</div>

	<?php
	$BodyText = file_get_contents('pages/'.$config['PlikBodyText']);
	$BodyTextType = ((!$config['panel_prawo'] && !$config['panel_lewo']) ? '_long' : '');
	echo '<div id="body'.$BodyTextType.'">'.$BodyText.'</div>';
	?>
	
<?php include 'footer.php'; ?>
	