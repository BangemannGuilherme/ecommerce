<?php if(!class_exists('Rain\Tpl')){exit;}?><!doctype html>
<html lang="en">

  <!-- Favicon -->
  <link rel="shortcut icon" href="/resources/admin/img/favicon-games.ico"/>

  <!-- Error Message Style -->
  <style type="text/css">
    .error-msg{ font-family: Arial, Helvetica, sans-serif; color: rgb(255, 0, 0);}
  </style>

  <!-- BEGIN head -->
  <head>
  	<title>Admin Recovery E-mail</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="/resources/admin/dist/login/css/style.css">

	</head>

	<body>
		<section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-6 text-center mb-5">
						<h2 class="heading-section"><!--<b>Guiboy</b>Ecommerce<b>--><br>Admin</b>Recovery E-mail</br></h2>
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="col-md-6 col-lg-4">
						<div class="login-wrap py-5">
							<div class="img d-flex align-items-center justify-content-center" style="background-image: url(/resources/admin/dist/login/images/logo2x.png);"></div>
							<h3 class="text-center mb-0">Forgot Password?</h3>
							<p class="text-center">Please, enter your recovery e-mail below</p>

							<!--<form action="#" class="login-form">-->
							<form action="/admin/forgot" method="post">
								<div class="form-group">
									<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-envelope"></span></div>
									<input type="email" class="form-control" id="email" name="email" placeholder="E-mail">
								</div>
								<div class="col-xs-8">	            				
	            					<div class="form-group">
										<button type="submit" class="btn form-control btn-primary rounded submit px-3">RECOVERY PASSWORD</button>
	            					</div>
								</div>
								<div class="text-center">
									<a href="/admin/forgot/sent">AA</a>
								</div>
								<div class="text-center">
									<a href="/admin/login">Sign in as a different user</a>
								</div>
	          				</form>
	          				<!--<div class="w-100 text-center mt-4 text">
	          					<p class="mb-0">Don't have an account?</p>
		          				<a href="#">Sign Up</a>
	          					</div>-->
	        			</div>
					</div>
				</div>
			</div>

		</section>

				<script src="/resources/admin/dist/new/js/jquery.min.js"></script>
				<script src="/resources/admin/dist/new/js/popper.js"></script>
				<script src="/resources/admin/dist/new/js/bootstrap.min.js"></script>
				<script src="/resources/admin/dist/new/js/main.js"></script>
	</body>

</html>

