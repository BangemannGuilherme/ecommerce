<?php if(!class_exists('Rain\Tpl')){exit;}?>                </div> <!-- .container -->
            </div> <!-- .site-header -->

<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <br>                    
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>

    <!--<a href="#" class="close"><i class="fa fa-times"></i></a>
    <div class="row">
        <div class="col-md-6">
            <h2 class="section-title">Login</h2>
            <form action="#">
                <input type="text" placeholder="Email address...">
                <input type="password" placeholder="Password...">
                <input type="submit" value="Login">
            </form>
        </div> 
        <div class="col-md-6">
            <h2 class="section-title">Create an account</h2>
            <form action="#">
                <input type="text" placeholder="Name...">
                <input type="text" placeholder="Email address...">
                <input type="text" placeholder="Phone...">
                <input type="password" placeholder="Password...">
                <input type="submit" value="Register">
            </form>
        </div> 
    </div> -->

<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">                
            <div class="col-md-6">
                
                <?php if( $error != '' ){ ?>

                <div class="alert alert-danger">
                <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>

                </div>
                <?php } ?>


                <form action="/login" id="login-form-wrap" class="login" method="post">
                    <h2>Login</h2>
                    <p class="form-row form-row-first">
                        <label for="login"><b>Email Address</b> <span class="required" ><b>*</b><br></span>
                        </label>
                        <input type="text" id="login" name="login" class="input-text">
                    </p>
                    <p class="form-row form-row-last">
                        <label for="password"><b>Password</b> <span class="required" ><b>*</b><br></span>
                        </label>
                        <input type="password" id="password" name="password" class="input-text">
                    </p>
                    <br>
                    <div class="clear"></div>
                    <p class="form-row">
                        <input type="submit" value="Login" class="button">
                        <br>
                        <br>
                        <br>
                        <label class="inline" for="rememberme"><input type="checkbox" value="forever" id="rememberme" name="rememberme"> <b>&MediumSpace;Keep conected</b> </label>
                    </p>
                    <p class="lost_password">
                        <a href="/forgot"><b>Forgot Password?</b></a>
                    </p>

                    <div class="clear"></div>
                </form>                    
            </div>
            <div class="col-md-6">

                <?php if( $errorRegister != '' ){ ?>

                <div class="alert alert-danger">
                <?php echo htmlspecialchars( $errorRegister, ENT_COMPAT, 'UTF-8', FALSE ); ?>

                </div>
                <?php } ?>


                <form id="register-form-wrap" action="/register" class="register" method="post">
                    <h2>Create an account</h2>
                    <p class="form-row form-row-first">
                        <label for="name"><b>Full name</b> <span class="required" ><b>*</b><br></span>
                        </label>
                        <input type="text" id="nome" name="name" class="input-text" value="<?php echo htmlspecialchars( $registerValues["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </p>
                    <p class="form-row form-row-first">
                        <label for="email"><b>E-mail Address</b> <span class="required" ><b>*</b><br></span>
                        </label>
                        <input type="email" id="email" name="email" class="input-text" value="<?php echo htmlspecialchars( $registerValues["email"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </p>
                    <p class="form-row form-row-first">
                        <label for="phone"><b>Phone Number</b><br>
                        </label>
                        <input type="text" id="phone" name="phone" class="input-text" value="<?php echo htmlspecialchars( $registerValues["phone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </p>
                    <p class="form-row form-row-last">
                        <label for="password"><b>Password</b> <span class="required" ><b>*</b><br></span>
                        </label>
                        <input type="password" id="password" name="password" class="input-text">
                    </p>
                    <div class="clear"></div>
                    <br>
                    <p class="form-row">
                        <input type="submit" value="Create an account" name="login" class="button">
                    </p>
                    <br>
                    <br>

                    <div class="clear"></div>
                </form>               
            </div>
        </div>
    </div>
</div>

</div> <!-- .container -->
</main> <!-- .main-content -->