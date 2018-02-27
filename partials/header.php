<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title><?=$params['title'] ?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="<?=PATH_ASSETS ?>js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="<?=PATH_ASSETS ?>css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="<?=PATH_ASSETS ?>css/ie8.css" /><![endif]-->
	</head>
	<body<?=($params['is_home'] ? ' class="landing"' : '') ?>>
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header"<?=($params['is_home'] ? ' class="alt"' : '') ?>>
					<h1><a href="index.php">Alpha</a> by HTML5 UP</h1>
					<?php include PATH_PARTIALS . 'menu.php' ?>
				</header>