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
  	<title>Admin Login</title>
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
						<h2 class="heading-section"><!--<b>Guiboy</b>Ecommerce<b>--><br>Admin</b>Login</br></h2>
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="col-md-6 col-lg-4">
						<div class="login-wrap py-5">
							<div class="img d-flex align-items-center justify-content-center" style="background-image: url(/resources/admin/dist/login/images/logo2x.png);"></div>
							<h3 class="text-center mb-0">Welcome</h3>
							<p class="text-center">Sign in by entering the information below</p>

							<!--<form action="#" class="login-form">-->
							<form action="/admin/login" method="post" id="form-user">
								<div class="form-group">
									<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-user"></span></div>
									<input type="text" class="form-control" id="deslogin" name="login" placeholder="Username">
									<!--<input type="text" class="form-control" placeholder="Username" name="login">-->
									<span class='error-msg login'></span>
								</div>
								<div class="form-group">
									<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lock"></span></div>
									<input type="password" class="form-control" id="despassword" name="password" placeholder="Password">
									<!--<input type="password" class="form-control" placeholder="Password" name="password">-->
									<span class='error-msg passwd'></span>
								</div>
								<div class="col-xs-8">
									<div class="checkbox icheck">
										<label>
											<input type="checkbox"> Remember Me
										</label>
									</div>

				<!--<form action="/admin/login" method="post">
					<div class="form-group has-feedback">
					  <input type="text" class="form-control" placeholder="Login" name="deslogin">
					  <span class="glyphicon glyphicon-user form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
					  <input type="password" class="form-control" placeholder="Password" name="despassword">
					  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
					</div>-->
	            					<div class="form-group d-md-flex">
										<div class="w-100 text-md-right">
											<a href="/admin/forgot">Forgot Password</a>
										</div>
	            					</div>
	            					<div class="form-group">
	            					<button type="submit" class="btn form-control btn-primary rounded submit px-3">SIGN IN</button>
	            					</div>
								</div>
								<?php if( $msgError != '' ){ ?> 
								<div class="alert alert-danger alert-dismissible" style="margin: 5px;">
									<!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true"  style="color: rgb(255, 255, 255)"><b>?? (n??o funfa)</b></button>-->
									<p> <i class="fa fa-exclamation-triangle" aria-hidden="true" style="color: rgb(255, 255, 255)"></i>&nbsp;<br><b style="color: rgb(255, 255, 255)"><?php echo htmlspecialchars( $msgError, ENT_COMPAT, 'UTF-8', FALSE ); ?></b></br></p>
								</div>
								<?php } ?>
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

	
<!-- /.validations -->
<script type="text/javascript" src="/resources/admin/js/login_valdn.js"></script>

</html>

