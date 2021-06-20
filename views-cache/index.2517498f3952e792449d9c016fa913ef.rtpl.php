<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="mobile-navigation"></div> <!-- .mobile-navigation -->
					</div> <!-- .main-navigation -->
				</div> <!-- .container -->
			</div> <!-- .site-header -->

			<!--<div class="home-slider">
				<ul class="slides">
					<?php $counter1=-1;  if( isset($products) && ( is_array($products) || $products instanceof Traversable ) && sizeof($products) ) foreach( $products as $key1 => $value1 ){ $counter1++; ?>

					<li data-bg-image="<?php echo htmlspecialchars( $value1["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
						<div class="container">
							<div class="slide-content">
								<h2 class="product-title"><a href="/products/<?php echo htmlspecialchars( $value1["desurl"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["desproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></h2>
								<small class="price">$<?php echo htmlspecialchars( $value1["vlprice"], ENT_COMPAT, 'UTF-8', FALSE ); ?></small>
								
								<p>Perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur.</p>
								
								<a href="/cart" class="button">Add to cart</a>
							</div>

							<img src="<?php echo htmlspecialchars( $value1["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="slide-image">
						</div>
					</li>
					<?php } ?>

					<!-- <li data-bg-image="/resources/site/dummy/slide-2.jpg">
						<div class="container">
							<div class="slide-content">
								<h2 class="slide-title">R6</h2>
								<small class="slide-subtitle">$290.00</small>
								
								<p>Perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur.</p>
								
								<a href="/cart" class="button">Add to cart</a>
							</div>

							<img src="/resources/site/dummy/game-cover-2.jpg" class="slide-image">
						</div>
					</li>-->
				</ul> <!-- .slides -->
			</div>
			<!-- .home-slider -->

			<main class="main-content">
				<div class="container">
					<div class="page">
						<section>
							<header>
								<h2 class="section-title">Products</h2>
								<a href="/products" class="all">Show All</a>
							</header>

							<div class="product-list">
								<?php $counter1=-1;  if( isset($products) && ( is_array($products) || $products instanceof Traversable ) && sizeof($products) ) foreach( $products as $key1 => $value1 ){ $counter1++; ?>

								<div class="product">
									<div class="inner-product">
										<div class="figure-image">
											<a><img src="<?php echo htmlspecialchars( $value1["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt=""></a>
										</div>
										<h3 class="product-title"><a href="/products/<?php echo htmlspecialchars( $value1["desurl"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["desproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></h3>
										<small class="price">$<?php echo htmlspecialchars( $value1["vlprice"], ENT_COMPAT, 'UTF-8', FALSE ); ?></small>
										<!-- <p>Lorem ipsum dolor sit consectetur adipiscing elit do eiusmod tempor...</p> -->
										<a href="/cart/<?php echo htmlspecialchars( $value1["idproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/add" class="button">Add to cart</a>
										<a href="/products/<?php echo htmlspecialchars( $value1["desurl"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="button muted">Read Details</a>
									</div>
								</div> <!-- .product -->
								<?php } ?>

							</div> <!-- .product-list -->

						</section>
					</div>
				</div> <!-- .container -->
			</main> <!-- .main-content -->

			