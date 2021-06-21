<?php if(!class_exists('Rain\Tpl')){exit;}?></div> <!-- .container -->
</div> <!-- .site-header -->

<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <br>
            <br>
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h1>My account</h1>
                </div>
            </div>
<br>
<br>
<br>
<br>
            <div class="single-product-area">
                <div class="zigzag-bottom"></div>
                <div class="container">
                    <div class="row">                
                        <div class="col-md-3">
                            <?php require $this->checkTemplate("profile-menu");?>

                        </div>
                        <div class="col-md-9">
                            <?php if( $profileMsg != '' ){ ?>

                            <div class="alert alert-success">
                                <?php echo htmlspecialchars( $profileMsg, ENT_COMPAT, 'UTF-8', FALSE ); ?>

                            </div>
                            <?php } ?>

                            <?php if( $profileError != '' ){ ?>

                            <div class="alert alert-danger">
                                <?php echo htmlspecialchars( $profileError, ENT_COMPAT, 'UTF-8', FALSE ); ?>

                            </div>
                            <?php } ?>

                            <br>
                            <br>

                            <div class="cart-collaterals">
                                <h2>My Profile</h2>
                            </div>
         
                            <form method="post" action="/profile">
                                <div class="form-group">
                                <label for="desperson"><b>Full name</b></label><br>
                                <input type="text" class="form-control" id="desperson" name="desperson" placeholder="Digite o nome aqui" value="<?php echo htmlspecialchars( $user["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                </div><br>
                                <div class="form-group">
                                <label for="desemail"><b>E-mail</b></label><br>
                                <input type="email" class="form-control" id="desemail" name="desemail" placeholder="Digite o e-mail aqui" value="<?php echo htmlspecialchars( $user["desemail"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                </div><br>
                                <div class="form-group">
                                <label for="nrphone"><b>Phone number</b></label><br>
                                <input type="tel" class="form-control" id="nrphone" name="nrphone" placeholder="Digite o telefone aqui" value="<?php echo htmlspecialchars( $user["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                </div>
                                <br>
                                <br>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                            <br>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



</div> <!-- .container -->
</main> <!-- .main-content -->