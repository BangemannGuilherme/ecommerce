<?php if(!class_exists('Rain\Tpl')){exit;}?><script>
            function getDadosEnderecoPorCEP(cep) {
                let url = 'https://viacep.com.br/ws/'+cep+'/json/unicode/'

                let xmlHttp = new XMLHttpRequest()
                xmlHttp.open('GET', url)

                xmlHttp.onreadystatechange = () => {
                    if(xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                        let dadosJSONText = xmlHttp.responseText
                        let dadosJSONObj = JSON.parse(dadosJSONText)

                        document.getElementById('billing_address_1').value = dadosJSONObj.logradouro
                        document.getElementById('billing_address_2').value = dadosJSONObj.complemento
                        document.getElementById('billing_district').value = dadosJSONObj.bairro
                        document.getElementById('billing_city').value = dadosJSONObj.localidade
                        document.getElementById('billing_state').value = dadosJSONObj.uf

                        
                    }
                }

                xmlHttp.send()
            }
 </script>

</div> <!-- .container -->
</div> <!-- .site-header -->



<div class="product-big-title-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="product-bit-title text-center">
					<h2>Pagamento</h2>
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

									<div class="woocommerce-billing-fields">
										<h3>Endereço de entrega</h3>

	
										</p>
										<div class="clear"></div>
										<h3 id="order_review_heading" style="margin-top:30px;">Detalhes do Pedido</h3>
										<div id="order_review" style="position: relative;">
											<table class="shop_table">
												<thead>
													<tr>
														<th class="product-name">Produto</th>
														<th class="product-total">Total</th>
													</tr>
												</thead>
												<tbody>
                                                    <?php $counter1=-1;  if( isset($products) && ( is_array($products) || $products instanceof Traversable ) && sizeof($products) ) foreach( $products as $key1 => $value1 ){ $counter1++; ?>
													<tr class="cart_item">
														<td class="product-name">
															<?php echo htmlspecialchars( $value1["desproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <strong class="product-quantity">× <?php echo htmlspecialchars( $value1["nrqtd"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong> 
														</td>
														<td class="product-total">
															<span class="amount">R$<?php echo formatPrice($value1["vltotal"]); ?></span>
														</td>
                                                    </tr>
                                                    <?php } ?>
												</tbody>
												<tfoot>
													<tr class="cart-subtotal">
														<th>Subtotal</th>
														<td><span class="amount">R$<?php echo formatPrice($cart["vlsubtotal"]); ?></span>
														</td>
													</tr>
													<tr class="shipping">
														<th>Frete</th>
														<td>
															$ 0,00
															<input type="hidden" class="shipping_method" value="free_shipping" id="shipping_method_0" data-index="0" name="shipping_method[0]">
														</td>
													</tr>
													<tr class="order-total">
														<th>Total do Pedido</th>
														<td><strong><span class="amount">R$<?php echo formatPrice($cart["vltotal"]); ?></span></strong> </td>
													</tr>
												</tfoot>
											</table>
											<div id="payment">
												<div class="form-row place-order">
													<input type="submit" data-value="Place order" value="Continuar" id="place_order" name="woocommerce_checkout_place_order" class="button alt">
												</div>
												<div class="clear"></div>
											</div>
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