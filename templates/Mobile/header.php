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
	<meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" /> 

	<link rel="stylesheet" type="text/css" href="templates/Mobile/css/base.css">
	<link rel="stylesheet" type="text/css" href="templates/Mobile/css/colors.css">
	
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
		$('a.menu').click(function() {
			var rel = $(this).attr('rel');
			{
				$('#body').fadeOut('slow', function(){
				$('#body').load('pages/'+rel+'.txt');
			});
			$('#body').fadeIn('slow');
			}
		});
	});
	</script>
</head>
<body>
	
<div id="top">
