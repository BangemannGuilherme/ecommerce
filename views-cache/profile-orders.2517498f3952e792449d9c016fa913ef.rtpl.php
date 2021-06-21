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

<br>
<br>
                
                <div class="cart-collaterals">
                    <h2>My Orders</h2>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>&emsp;Total amount&emsp;&emsp;</th>
                            <th>Status</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $counter1=-1;  if( isset($orders) && ( is_array($orders) || $orders instanceof Traversable ) && sizeof($orders) ) foreach( $orders as $key1 => $value1 ){ $counter1++; ?>

                        <tr>
                            <th scope="row"><?php echo htmlspecialchars( $value1["idorder"], ENT_COMPAT, 'UTF-8', FALSE ); ?></th>
                            <td>&emsp;$<?php echo htmlspecialchars( $value1["vltotal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td>&emsp;&emsp;&emsp;<?php echo htmlspecialchars( $value1["desstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&emsp;&emsp;&emsp;</td>
                            <td style="width:222px;">
                                <a class="btn btn-success" href="/payment/<?php echo htmlspecialchars( $value1["idorder"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" role="button"><b>Print</b></a>
                                <a class="btn btn-success" role="button"><b>&emsp;</b></a>
                                <a class="btn btn-default" href="/profile/orders/<?php echo htmlspecialchars( $value1["idorder"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" role="button"><b>Details</b></a>
                            </td>
                        </tr>
                        <?php }else{ ?>

                        <div class="alert alert-info">
                            Nenhum pedido foi encontrado.
                        </div>
                        <?php } ?>

                    </tbody>
                </table>
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