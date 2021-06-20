<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

		<!-- Favicon -->
		<link rel="shortcut icon" href="/resources/site/images/favicon-games.ico"/>	
		
		<title>Ecommerce Video Game</title>

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

	<!--<form action="/products">
		<div class="input-group input-group-sm" style="width: 50%">
		  <input type="text" name="search" class="form-control pull-right" placeholder="Olá o que você está procurando hoje?"  value= ""> 
		  <div class="input-group-btn">
			<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
		  </div>
		</div>
	  </form>-->


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
						<a href="/cart" class="cart"><i class="icon-cart"></i> <span class="cart-amunt">Total in cart: $<?php echo getCartVlSubTotal(); ?></span></a>
						<?php if( checkLogin(false) ){ ?>
						<a href="/profile" class="profile"><i class="fa fa-user"></i>&ThickSpace;&ThickSpace; <?php echo getUserName(); ?> - Profile</a>
						<a href="/logout" class="logout"><i class="fas fa-sign-out-alt"></i>Logout</a>
						<?php }else{ ?>
						<a href="/login" class="login-button"><i class="fas fa-sign-in-alt"></i>Login/Register</a>
						<?php } ?>
					</div> <!-- .right-section -->

					<div class="main-navigation">
						<button class="toggle-menu"><i class="fa fa-bars"></i></button>
						<ul class="menu">
							<li class="menu-item home current-menu-item"><a href="/"><i class="icon-home"></i></a></li>
							<li class="menu-item"><a href="/products">Products</a></li>
							<?php require $this->checkTemplate("categories-menu");?>
						</ul> <!-- .menu -->
						<br>

						<form action="/products">
							<div class="search-form">
								<label><button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button></label>
							  <input type="text" name="search" class="form-control pull-right" placeholder="     Search..."  value= ""> 
							  <div class="input-group-btn">
								<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
							  </div>
							</div>
						  </form>

						<!--<div class="search-form">
							<label><img src="/resources/site/images/icon-search.png"></label>
							<input type="text" placeholder="Search...">
						</div>  .search-form -->

					</div> <!-- .container -->
				</div> <!-- .site-header -->