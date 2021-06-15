<?php if(!class_exists('Rain\Tpl')){exit;}?>				</div> <!-- .container -->
			</div> <!-- .site-header -->
			<main class="main-content">
				<div class="container">
					<div class="page">
						
						<table class="cart">
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
									<td class="product-qty">
										<div class="quantity buttons_added">
											<input type="button" class="minus" value="-" onclick="window.location.href = '/cart/<?php echo htmlspecialchars( $value1["idproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete'">
											<input type="number" size="4" class="input-text qty text" title="Qty" value="<?php echo htmlspecialchars( $value1["nrqtd"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" min="0" step="1">
											<input type="button" class="plus" value="+" onclick="window.location.href = '/cart/<?php echo htmlspecialchars( $value1["idproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/add'">
										</div>
										<!--<select name="/cart/<?php echo htmlspecialchars( $value1["idproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/add">
											<option value="<?php echo htmlspecialchars( $value1["nrqtd"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["nrqtd"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
											<option value="2">2</option>
											<option value="3">3</option>
										</select>-->
									</td>
									<td class="product-total">$<?php echo htmlspecialchars( $value1["vltotal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
									<td class="action"><a href="/cart/{value.idproduct}/remove"><i class="fa fa-times"></i></a></td>
								</tr>
								<?php } ?>

							</tbody>
						</table> <!-- .cart -->

						<div class="cart-total">
							<p><strong>Subtotal:</strong> $650.00</p>
							<p><strong>Shipment:</strong> $15.00</p>
							<p class="total"><strong>Total</strong><span class="num">$665.00</span></p>
							<p>
								<a href="/" class="button muted">Continue Shopping</a>
								<a href="#" class="button">Finalize and pay</a>
							</p>
						</div> <!-- .cart-total -->
						
					</div>
				</div> <!-- .container -->
			</main> <!-- .main-content -->

		