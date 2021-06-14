<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Ecommerce Video Game | Cart</title>

		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto:100,300,400,700|" rel="stylesheet" type="text/css">
		<link href="/resources/site/fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="/resources/site/fonts/lineo-icon/style.css" rel="stylesheet" type="text/css">

		<!-- Loading main css file -->
		<link rel="stylesheet" href="/resources/site/style.css">
		
		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->

	</head>


	<body class="slider-collapse">
		
		<div id="site-content">
			<div class="site-header">
				<div class="container">
					<a href="/" id="branding">
						<img src="/resources/site/images/logo.png" alt="" class="logo">
						<div class="logo-text">
							<h1 class="site-title">Guiboy Ecommerce</h1>
							<small class="site-description">------------------------------------------------</small>
						</div>
					</a> <!-- #branding -->

					<div class="right-section pull-right">
						<a href="/cart" class="cart"><i class="icon-cart"></i> 0 items in cart</a>
						<a href="#" class="login-button">Login/Register</a>
					</div> <!-- .right-section -->

					<div class="main-navigation">
						<button class="toggle-menu"><i class="fa fa-bars"></i></button>
						<ul class="menu">
							<li class="menu-item home current-menu-item"><a href="/views/site/index.html"><i class="icon-home"></i></a></li>
							<li class="menu-item"><a href="/resources/site/products.html">Accessories</a></li>
							<li class="menu-item"><a href="/resources/site/products.html">Promotions</a></li>
							<li class="menu-item"><a href="/resources/site/products.html">PC</a></li>
							<li class="menu-item"><a href="/resources/site/products.html">Playstation</a></li>
							<li class="menu-item"><a href="/resources/site/products.html">Xbox</a></li>
							<li class="menu-item"><a href="/resources/site/products.html">Wii</a></li>
						</ul> <!-- .menu -->
						<div class="search-form">
							<label><img src="/resources/site/images/icon-search.png"></label>
							<input type="text" placeholder="Search...">
						</div> <!-- .search-form -->