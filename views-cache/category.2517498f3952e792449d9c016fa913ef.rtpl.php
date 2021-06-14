<?php if(!class_exists('Rain\Tpl')){exit;}?>				</div> <!-- .container -->
			</div> <!-- .site-header -->
			<main class="main-content">
				<div class="container">
					<div class="page">
						<div class="filter-bar">
							<div class="filter">
								<span>
									<label style="text-transform: uppercase; color:rgb(0, 0, 0);"><b><?php echo htmlspecialchars( $category["descategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?> &emsp;&emsp;&emsp;&emsp;</b></label>
								</span>
								<span>
									<label>Sort by:</label>
									<select name="#">
										<option value="#">Popularity</option>
										<option value="#">Highest Rating</option>
										<option value="#">Lowest price</option>
									</select>
								</span>
								<span>
									<label>Genre</label>
									<select name="#">
										<option value="#">Show All</option>
										<option value="#">Action</option>
										<option value="#">Racing</option>
										<option value="#">Strategy</option>
									</select>
								</span>
								<span>
									<label>Show:</label>
									<select name="#">
										<option value="#">8</option>
										<option value="#">16</option>
										<option value="#">24</option>
									</select>
								</span>
							</div> <!-- .filter -->

							<div class="pagination">
								<a href="#" class="page-number"><i class="fa fa-angle-left"></i></a>
								<span class="page-number current">1</span>
								<a href="#" class="page-number">2</a>
								<a href="#" class="page-number">3</a>
								<a href="#" class="page-number">...</a>
								<a href="#" class="page-number">12</a>
								<a href="#" class="page-number"><i class="fa fa-angle-right"></i></a>
							</div> <!-- .pagination -->
						</div> <!-- .filter-bar -->
						
						<div class="product-list">
							<?php $counter1=-1;  if( isset($products) && ( is_array($products) || $products instanceof Traversable ) && sizeof($products) ) foreach( $products as $key1 => $value1 ){ $counter1++; ?>

								<div class="product">
									<div class="inner-product">
										<div class="figure-image">
											<a href="/resources/site/single.html"><img src="/resources/site/dummy/game-1.jpg" alt="Game 1"></a>
										</div>
										<h3 class="product-title"><a href="#">Alpha Protocol</a></h3>
										<p>Lorem ipsum dolor sit consectetur adipiscing elit do eiusmod tempor...</p>
										<a href="#" class="button">Add to cart</a>
										<a href="#" class="button muted">Read Details</a>
									</div>
								</div> <!-- .product -->
							<?php } ?>

						</div> <!-- .product-list -->

						<div class="pagination-bar">
							<div class="pagination">
								<a href="#" class="page-number"><i class="fa fa-angle-left"></i></a>
								<span class="page-number current">1</span>
								<a href="#" class="page-number">2</a>
								<a href="#" class="page-number">3</a>
								<a href="#" class="page-number">...</a>
								<a href="#" class="page-number">12</a>
								<a href="#" class="page-number"><i class="fa fa-angle-right"></i></a>
							</div> <!-- .pagination -->
						</div>
					</div>
				</div> <!-- .container -->
			</main> <!-- .main-content -->
		
	</body>

</html>