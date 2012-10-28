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

	<link rel="stylesheet" type="text/css" href="templates/Dark_Magic/css/base.css">
	<link rel="stylesheet" type="text/css" href="templates/Dark_Magic/css/colors/<?php echo $config['style_name'] ?>">
	
	<script type="text/javascript" src="js/JQuery.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
		$('a.menu').click(function() {
			var rel = $(this).attr('rel');
			{
				$('#body').fadeOut('slow', function(){
				$('#body').load('pages/'+rel+'.txt');
			});
			$('#body').fadeIn('slow');
			$('#body_long').fadeOut('slow', function(){
			});
			$('#body_long').fadeIn('slow');
			}
		});
	});
	</script>
</head>
<body>

<div id="top">

	<div id="header">
		<img src="img/MiniS.png" alt="">
	</div>