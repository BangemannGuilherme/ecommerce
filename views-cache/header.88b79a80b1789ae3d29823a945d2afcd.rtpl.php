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
					<a href="/views/site/index.html" id="branding">
						<img src="/resources/site/images/logo.png" alt="" class="logo">
						<div class="logo-text">
							<h1 class="site-title">Guiboy Ecommerce</h1>
							<small class="site-description">------------------------------------------------</small>
						</div>
					</a> <!-- #branding -->

					<div class="right-section pull-right">
						<a href="/resources/site/cart.html" class="cart"><i class="icon-cart"></i> 0 items in cart</a>
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

						<div class="mobile-navigation"></div> <!-- .mobile-navigation -->
					</div> <!-- .main-navigation -->
				</div> <!-- .container -->
			</div> <!-- .site-header -->

			<div class="home-slider">
				<ul class="slides">
					<li data-bg-image="/resources/site/dummy/slide-1.jpg">
						<div class="container">
							<div class="slide-content">
								<h2 class="slide-title">GTA VII</h2>
								<small class="slide-subtitle">$790.00</small>
								
								<p>Perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur.</p>
								
								<a href="/resources/site/cart.html" class="button">Add to cart</a>
							</div>

							<img src="/resources/site/dummy/game-cover-1.jpg" class="slide-image">
						</div>
					</li>
					<li data-bg-image="/resources/site/dummy/slide-2.jpg">
						<div class="container">
							<div class="slide-content">
								<h2 class="slide-title">R6</h2>
								<small class="slide-subtitle">$290.00</small>
								
								<p>Perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur.</p>
								
								<a href="/resources/site/cart.html" class="button">Add to cart</a>
							</div>

							<img src="/resources/site/dummy/game-cover-2.jpg" class="slide-image">
						</div>
					</li>
					<li data-bg-image="/resources/site/dummy/slide-3.jpg">
						<div class="container">
							<div class="slide-content">
								<h2 class="slide-title">BF9</h2>
								<small class="slide-subtitle">$390.00</small>
								
								<p>Perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur.</p>
								
								<a href="/resources/site/cart.html" class="button">Add to cart</a>
							</div>

							<img src="/resources/site/dummy/game-cover-3.jpg" class="slide-image">
						</div>
					</li>
				</ul> <!-- .slides -->
			</div>