<?php if(!class_exists('Rain\Tpl')){exit;}?>				</div> <!-- .container -->
			</div> <!-- .site-header -->
			
			<main class="main-content">
				<div class="container">
					<div class="page">
						
						<div class="entry-content">
							<div class="row">
								<div class="col-sm-6 col-md-4">
									<div class="product-images">
										<figure class="large-image">
											<a><img src="<?php echo htmlspecialchars( $product["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></a>
										</figure>
									<!--<div class="thumbnails">
											<a href="/resources/site/dummy/image-2.jpg"><img src="/resources/site/dummy/small-thumb-1.jpg" alt=""></a>
											<a href="/resources/site/dummy/image-3.jpg"><img src="/resources/site/dummy/small-thumb-2.jpg" alt=""></a>
											<a href="/resources/site/dummy/image-4.jpg"><img src="/resources/site/dummy/small-thumb-3.jpg" alt=""></a>
										</div>-->
									</div>
								</div>
								<div class="col-sm-6 col-md-8">
									<h2 class="entry-title"><?php echo htmlspecialchars( $product["desproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h2>
									<small class="price">$<?php echo htmlspecialchars( $product["vlprice"], ENT_COMPAT, 'UTF-8', FALSE ); ?></small>
									<div class="product-inner-category">
										<p>Genres: <?php $counter1=-1;  if( isset($categories) && ( is_array($categories) || $categories instanceof Traversable ) && sizeof($categories) ) foreach( $categories as $key1 => $value1 ){ $counter1++; ?> <a href="/categories/<?php echo htmlspecialchars( $value1["idcategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["descategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&nbsp;&nbsp;</a><?php } ?>.
									</div>

									<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
									<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae.</p>
									<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod.</p>

									<div class="addtocart-bar">
										<form action="/cart/<?php echo htmlspecialchars( $product["idproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/add">
											<!--<label for="#">Quantity</label>
											<select name="#">
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
											</select>-->
											<input type="submit" value="Add to cart">
										</form>

										<div class="social-links square">
											<strong>Share</strong>
											<a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
											<a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
											<a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
											<a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<!--<section>
							<header>
								<h2 class="section-title">Similiar Product</h2>
							</header>
							<div class="product-list">
								<div class="product">
									<div class="inner-product">
										<div class="figure-image">
											<img src="dummy/game-1.jpg" alt="Game 1">
										</div>
										<h3 class="product-title"><a href="#">Alpha Protocol</a></h3>
										<small class="price">$20.00</small>
										<p>Lorem ipsum dolor sit consectetur adipiscing elit do eiusmod tempor...</p>
										<a href="#" class="button">Add to cart</a>
										<a href="#" class="button muted">Read Details</a>
									</div>
								</div> <!-- .product 
							
								<div class="product">
									<div class="inner-product">
										<div class="figure-image">
											<img src="dummy/game-2.jpg" alt="Game 2">
										</div>
										<h3 class="product-title"><a href="#">Grand Theft Auto V</a></h3>
										<small class="price">$20.00</small>
										<p>Lorem ipsum dolor sit consectetur adipiscing elit do eiusmod tempor...</p>
										<a href="#" class="button">Add to cart</a>
										<a href="#" class="button muted">Read Details</a>
									</div>
								</div> <!-- .product 
							
								<div class="product">
									<div class="inner-product">
										<div class="figure-image">
											<img src="/resources/site/dummy/game-3.jpg" alt="Game 3">
										</div>
										<h3 class="product-title"><a href="#">Need for Speed rivals</a></h3>
										<small class="price">$20.00</small>
										<p>Lorem ipsum dolor sit consectetur adipiscing elit do eiusmod tempor...</p>
										<a href="#" class="button">Add to cart</a>
										<a href="#" class="button muted">Read Details</a>
									</div>
								</div> <!-- .product 
							
								<div class="product">
									<div class="inner-product">
										<div class="figure-image">
											<img src="/resources/site/dummy/game-4.jpg" alt="Game 4">
										</div>
										<h3 class="product-title"><a href="#">Big game hunter</a></h3>
										<small class="price">$20.00</small>
										<p>Lorem ipsum dolor sit consectetur adipiscing elit do eiusmod tempor...</p>
										<a href="#" class="button">Add to cart</a>
										<a href="#" class="button muted">Read Details</a>
									</div>
								</div> <!-- .product
								
							</div> <!-- .product-list 
						</section>-->

						
					</div>
				</div> <!-- .container -->
			</main> <!-- .main-content -->