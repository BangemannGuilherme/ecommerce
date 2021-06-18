<?php if(!class_exists('Rain\Tpl')){exit;}?>				</div> <!-- .container -->
			</div> <!-- .site-header -->
			<main class="main-content">
				<div class="container">
					<div class="page">
						
						<!--<table class="cart">
							<thead>
								<tr>
									<th class="product-name">Product Name</th>
									<th class="product-price">Price</th>
									<th class="product-qty">Quantity</th>
									<th class="product-total">Total</th>
									<th class="action"></th>
								</tr>
							</thead>
							<tbody>
								<?php $counter1=-1;  if( isset($products) && ( is_array($products) || $products instanceof Traversable ) && sizeof($products) ) foreach( $products as $key1 => $value1 ){ $counter1++; ?>

								<tr>
									<td class="product-name">
										<div class="product-thumbnail">
											<a href="/products/<?php echo htmlspecialchars( $value1["desurl"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><img src="<?php echo htmlspecialchars( $value1["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt=""></a>
										</div>
										<div class="product-detail">
											<h3 href="/products/<?php echo htmlspecialchars( $value1["desurl"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="product-title"><?php echo htmlspecialchars( $value1["desproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure nobis architecto dolorum, alias laborum sit odit, saepe expedita similique eius enim quasi obcaecati voluptates, autem eveniet ratione veniam omnis modi.</p>
										</div>
									</td>
									<td class="product-price">$<?php echo htmlspecialchars( $value1["vlprice"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
									<td class="product-quantity">
										<div class="quantity buttons_added">
											<input type="button" class="minus" value="-" onclick="window.location.href = '/cart/<?php echo htmlspecialchars( $value1["idproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete'">
											<input type="text" onkeypress="return onlynumber();" size="4" class="input-text qty text" title="Quantity" value="<?php echo htmlspecialchars( $value1["nrqtd"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" min="0" step="1">
											<input type="button" class="plus" value="+" onclick="window.location.href = '/cart/<?php echo htmlspecialchars( $value1["idproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/add'">
										</div>
									</td>
									<td class="product-total"><b>$<?php echo htmlspecialchars( $value1["vltotal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></b></td>
									<td class="action"><a href="/cart/<?php echo htmlspecialchars( $value1["idproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/deleteall"><i class="fa fa-times"></i></a></td>
								</tr>
								<?php } ?>

							</tbody>
						</table> .cart -->

						<div class="cart-total">
							<p><strong>Subtotal:</strong> $<?php echo htmlspecialchars( $cart["vlsubtotal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
							<p><strong>Shipment:</strong> $00.00</p>
							<p class="total"><strong>Total</strong><span class="num">$<?php echo htmlspecialchars( $cart["vltotal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span></p>
							<p>
								<form action="/checkout" class="checkout" method="post" name="checkout">
									<div id="payment">
										<div class="form-row place-order">
											<input type="submit" data-value="Place order" value="Finalize and pay" id="place_order" name="woocommerce_checkout_place_order" class="button alt">
										</div>
										<div class="clear"></div>
									</div>
									<!--<a href="#" class="button">Finalize and pay</a>-->
								</form>
							</p>
						</div> <!-- .cart-total -->
						
					</div>
				</div> <!-- .container -->
			</main> <!-- .main-content -->



			<script> 
			
			function onlynumber(evt) {
				var theEvent = evt || window.event;
				var key = theEvent.keyCode || theEvent.which;
				key = String.fromCharCode( key );
				//var regex = /^[0-9.,]+$/;
				var regex = /^[0-9.]+$/;
				if( !regex.test(key) ) {
				   theEvent.returnValue = false;
				   if(theEvent.preventDefault) theEvent.preventDefault();
				}
			 }

			</script>

		