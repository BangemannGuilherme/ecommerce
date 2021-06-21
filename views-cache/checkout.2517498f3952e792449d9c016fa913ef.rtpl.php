<?php if(!class_exists('Rain\Tpl')){exit;}?></div> <!-- .container -->
</div> <!-- .site-header -->

<br>
<br>

<div class="product-big-title-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="product-bit-title text-center">
					<h2>Payment</h2>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="single-product-area">
	<div class="zigzag-bottom"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="product-content-right">
					<form action="/checkout" class="checkout" method="post" name="checkout">
						<div id="customer_details" class="col2-set">
							<div class="row">
								<div class="col-md-12">

									<?php if( $error != '' ){ ?>
									<div class="alert alert-danger">
										<?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
									</div>
									<?php } ?>

									<div class="woocommerce-billing-fields">
										<h3>Address</h3>
										<p id="billing_address_1_field" class="form-row form-row-wide address-field validate-required">
											<label class="" for="billing_cep_1">Zip code <abbr title="required" class="required">*</abbr>
											</label>
											<input type="text" value="<?php echo htmlspecialchars( $address["deszipcode"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" placeholder="00000000" id="billing_cep_1" name="zipcode" class="input-text ">
										</p>
										<p id="billing_address_1_field" class="form-row form-row-wide address-field validate-required">
											<label class="" for="billing_address_1">Street &emsp;&ThinSpace;<abbr title="required" class="required">*</abbr>
											</label>
											<input type="text" value="<?php echo htmlspecialchars( $address["desaddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" placeholder="Street" id="billing_address_1" name="desaddress" class="input-text ">
										</p>
										<p id="billing_number_1_field" class="form-row form-row-wide number-field validate-required">
											<label class="" for="billing_number_1">Number &ThinSpace;<abbr title="required" class="required">*</abbr>
											</label>
											<input type="text" value="<?php echo htmlspecialchars( $address["desnumber"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" placeholder="Number" id="billing_address_1" name="desnumber" class="input-text ">
										</p>
                                        <p id="billing_district_field" class="form-row form-row-wide address-field validate-required" data-o_class="form-row form-row-wide address-field validate-required">
											<label class="" for="billing_district">District &MediumSpace;&ThinSpace;&ThinSpace;<abbr title="required" class="required">*</abbr>
											</label>
											<input type="text" value="<?php echo htmlspecialchars( $address["desdistrict"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" placeholder="District" id="billing_district" name="desdistrict" class="input-text ">
										</p>
										<p id="billing_city_field" class="form-row form-row-wide address-field validate-required" data-o_class="form-row form-row-wide address-field validate-required">
											<label class="" for="billing_city">City &emsp;&emsp;<abbr title="required" class="required">*</abbr>
											</label>
											<input type="text" value="<?php echo htmlspecialchars( $address["descity"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" placeholder="City" id="billing_city" name="descity" class="input-text ">
										</p>
										<p id="billing_state_field" class="form-row form-row-first address-field validate-state" data-o_class="form-row form-row-first address-field validate-state">
											<label class="" for="billing_state">State &emsp;&emsp;</label>
											<input type="text" id="billing_state" name="desstate" placeholder="State" value="<?php echo htmlspecialchars( $address["desstate"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="input-text ">
										</p>
										<p id="billing_state_field" class="form-row form-row-first address-field validate-state" data-o_class="form-row form-row-first address-field validate-state">
											<label class="" for="billing_state">Country &MediumSpace;&MediumSpace;&ThinSpace;</label>
											<input type="text" id="billing_state" name="descountry" placeholder="Country" value="<?php echo htmlspecialchars( $address["descountry"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="input-text ">
										</p>
										<br>

										</p>
										<div class="clear"></div>
										<h3 id="order_review_heading" style="margin-top:30px;">Order Detail</h3>
										<div id="order_review" style="position: relative;">
											<table class="shop_table">
												<thead>
													<tr>
														<th class="product-name">Product</th>
														<th class="product-total">&emsp;&emsp;&emsp;&emsp;&emsp;Total</th>
													</tr>
												</thead>
												<tbody>
                                                    <?php $counter1=-1;  if( isset($products) && ( is_array($products) || $products instanceof Traversable ) && sizeof($products) ) foreach( $products as $key1 => $value1 ){ $counter1++; ?>
													<tr class="cart_item">
														<td class="product-name">
															<?php echo htmlspecialchars( $value1["desproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <strong class="product-quantity">× <?php echo htmlspecialchars( $value1["nrqtd"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong> 
														</td>
														<td class="product-total">
															<span class="amount">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;$<?php echo formatPrice($value1["vltotal"]); ?></span>
														</td>
                                                    </tr>
                                                    <?php } ?>
												</tbody>
												<tfoot>
													<tr class="cart-subtotal">
														<th>Subtotal</th>
														<td><span class="amount">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;$<?php echo formatPrice($cart["vlsubtotal"]); ?></span>
														</td>
													</tr>
													<tr class="shipping">
														<th>Shipping</th>
														<td>
															&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;$0,00
															<input type="hidden" class="shipping_method" value="free_shipping" id="shipping_method_0" data-index="0" name="shipping_method[0]">
														</td>
													</tr>
													<tr class="order-total">
														<th>&emsp;Total Order</th>
														<td><strong><span class="amount">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;$<?php echo formatPrice($cart["vltotal"]); ?></span></strong> </td>
													</tr>
												</tfoot>
											</table>
											<br>
											<br>
											<div id="payment">
												<div class="form-row place-order">
													<input type="submit" data-value="Place order" value="Pay" id="place_order" name="woocommerce_checkout_place_order" class="button alt">
												</div>
												<div class="clear"></div>
											</div>
											<br>
											<br>
											<br>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div> <!-- .container -->
</main> <!-- .main-content -->