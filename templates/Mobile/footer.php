
	<div id="footer">
	<?php
	echo $lang['CMS']; 
	$version = file_get_contents('version.kucharskov');
	echo " <b>".base64_decode($version)."</b>";
	?>
	</div>
	<a href="index.php?mobile=0" id="mobile"><?php echo $lang['SITE_FULL'] ?></a>
	</div>

</body>
</html>