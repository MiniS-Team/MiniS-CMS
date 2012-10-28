<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title><?php echo $config['site_name'] ?></title>
	<meta http-equiv="Content-Language" content="<?php echo $config['site_lang'] ?>">
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
	<meta name="generator" content="<?php echo $lang['CMS'] ?> by M. Kucharskov & MiniS Team">
	<meta name="google-site-verification" content="<?php echo $config['site_gsv'] ?>">
	<meta name="description" content="<?php echo $config['site_description'] ?>">
	<meta name="keywords" content="<?php echo $config['site_keywords'] ?>">

	<link rel="stylesheet" type="text/css" href="templates/Default/css/base.css">
	<link rel="stylesheet" type="text/css" href="templates/Default/css/colors/<?php echo $config['style_name'] ?>">
	
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