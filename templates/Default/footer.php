	<!-- STOPKA NIE USUWAĆ! -->
	<div id="footer">
	
	<?php
	echo $lang['CMS']; 
	$version = file_get_contents('version.kucharskov');
	echo " <b>".base64_decode($version)."</b>";
	?>
	by <a href="http://Kucharskov.cba.pl" target="_blank">M. Kucharskov</a> & MiniS Team<br>
	<img src="img/MiniS_small.png" alt=""><br>
	<a href="index.php?mobile=1" id="mobile"><?php echo $lang['SITE_MOBILE'] ?></a>
	</div>
	<!-- KONIEC STOPKI -->
	</div>

</body>
</html>