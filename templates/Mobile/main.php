<?php include 'header.php'; ?>

	<?php
	if($config['panel_poziomo']) {
		$pozioma_tresc = file_get_contents('pages/'.$config['PoziomyPanelText']);
		echo '<div id="menu_top">'.$pozioma_tresc.'</div>';
	}
	?>
	
	<?php
	$BodyText = file_get_contents('pages/'.$config['PlikBodyText']);
	echo '<div id="body">'.$BodyText.'</div>';
	?>

	<div id="box">
		<?php
		if($config['panel_lewo']) {
			$lewa_tresc = file_get_contents('pages/'.$config['LewyPanelText']);
			echo '<div class="box_menu">'.$lewa_tresc.'</div>';
		}
		?>
		
		<?php
		if($config['panel_prawo']) {
			$prawa_tresc = file_get_contents('pages/'.$config['PrawyPanelText']);
			echo '<div class="box_menu">'.$prawa_tresc.'</div>';
		}
		?>
	</div>
	
<?php include 'footer.php'; ?>
	