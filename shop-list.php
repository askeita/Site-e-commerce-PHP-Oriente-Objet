<?php require("header.php") ?>
		<!-- content -->
		<div id="content">
			<div class="shop-main container">
				<div class="row">
					<div class="col-md-3">
						<aside class="left-shop">

							<div class="shop-categories mb30">
								<h1 class="asidetitle">Categories</h1>

								<ul>
                                    <li><a href="#">Women	<span>(25)</span></a></li>
                                    <li><a href="#">Men	<span>(235)</span></a></li>
                                    <li><a href="#">Bags	<span>(89)</span></a></li>
                                    <li><a href="#">Shoes	<span>(109)</span></a></li>
                                    <li><a href="#">Jeans	<span>(129)</span></a></li>
									<li><a href="#">Accessories	<span>(123)</span></a></li>
								</ul>
							</div>

							<div class="shop-price mb30">
								<h1 class="asidetitle">Price</h1>


								<p>
								  <input type="text" id="amount">
								</p>

								 
								<div id="slider-range"></div>

							</div>

							<div class="brands mb30">
								<h1 class="asidetitle">Colors</h1>
								
								<form action="#">
								<ul>
									<li><input type="checkbox" value="Brand">White <span>(15)</span></li>
									<li><input type="checkbox" value="Brand">Black <span>(31)</span></li>
									<li><input type="checkbox" value="Brand">Grey <span>(89)</span></li>
									<li><input type="checkbox" value="Brand">Red <span>(95)</span></li>
									<li><input type="checkbox" value="Brand">Blue <span>(26)</span></li>
								</ul>
								</form>
								
							</div>

                            <div class="brands mb30">
                                <h1 class="asidetitle">Sizes</h1>

                                <form action="#">
                                    <ul>
                                        <li><input type="checkbox" value="Brand">S <span>(15)</span></li>
                                        <li><input type="checkbox" value="Brand">M <span>(31)</span></li>
                                        <li><input type="checkbox" value="Brand">L <span>(89)</span></li>
                                        <li><input type="checkbox" value="Brand">XL <span>(95)</span></li>
                                        <li><input type="checkbox" value="Brand">XXL <span>(26)</span></li>
                                        <li><input type="checkbox" value="Brand">XXXL <span>(26)</span></li>
                                        <li><input type="checkbox" value="Brand">4XL <span>(26)</span></li>
                                    </ul>
                                </form>

                            </div>

                            <div class="brands mb30">
                                <h1 class="asidetitle">Brands</h1>

                                <form action="#">
                                    <ul>
                                        <li><input type="checkbox" value="Brand">Adidas <span>(15)</span></li>
                                        <li><input type="checkbox" value="Brand">Nike <span>(31)</span></li>
                                        <li><input type="checkbox" value="Brand">Puma <span>(89)</span></li>
                                        <li><input type="checkbox" value="Brand">Armani <span>(95)</span></li>
                                        <li><input type="checkbox" value="Brand">Calvin Klein <span>(26)</span></li>
                                        <li><input type="checkbox" value="Brand">Raulph Lauren <span>(26)</span></li>
                                        <li><input type="checkbox" value="Brand">Envato <span>(26)</span></li>
                                    </ul>
                                </form>

                            </div>
							
							<div class="tags mb10">
								<h1 class="asidetitle">Tags</h1>
								
								<ul>
									<li><a href="#">E-commerce</a></li>
									<li><a href="#">Elegant</a></li>
									<li><a href="#">Store</a></li>
									<li><a href="#">Clean</a></li>
									<li><a href="#">Modern</a></li>
								</ul>
								<div class="clear"></div>
								
							</div>

						</aside>
						<!-- End aside shop -->
					</div>

					<div class="col-md-9">
						<div class="shop-content">
							<div class="toolbar">
					            <div class="sort-select">
					              <label>Sort by</label>
					              <select class="selectBox">
					                <option>Default Sorting</option>
					                <option>Price</option>
					                <option>High To Low</option>
					                <option>Low To High</option>
					              </select>
					            </div>
					            <div class="sort-select">
					              <label>Show</label>
					              <select class="selectBox">
					                <option>12</option>
					                <option>16</option>
					                <option>20</option>
					              </select>
					            </div>
					            <div class="lg-panel htabs">

					            <span>View</span>
					              <a id="list" class="list-btn active" href="shop-list.html" ><i class="fa fa-th-list"></i></a> 
					              <a href="shop-grid.html" id="grid" class="grid-btn"><i class="fa fa-th"></i></a> 
					            </div>
					        </div>

					    <div class="shop-list">
								<?php
									foreach ($itemsHome as $item):
								?>
					        	<div class="grid-item2 mb30">

					        		<div class="row">

										<div class="arrival-overlay col-md-4">
											<a href="<?php echo HOST.FOLDER.'single/'.$item["iditems"] ?>"></a>
											<img src="<?php echo $item["url"] ?>" alt="">
										</div>

										<div class="col-md-8">
											<div class="list-content">

												<h1><?php echo $item["libelle"] ?></h1>

												<div class="list-midrow">

													<ul>
<!--														<li><span class="high-price">$1899.00</span></li> -->
														<li><span class="low-price"><?php echo $item["price"]; ?></span></li>
													</ul>

													<img src="upload/stars.png" alt="">

													<div class="reviews"><a href="#">21 Rewiew(s)</a>  /  <a href="#">Add a Review</a></div>
													<div class="clear"></div>
												</div>

												<p class="list-desc">We possess within us two minds. So far I have written only of the conscious mind.. Our subconscious mind contains such power and complexity that it literally staggers the imagination.</p>

												<div class="list-downrow">

													<a href="#" id='items-<?php $item["iditems"] ?>' class="medium-button button-red add-cart">Add to Cart</a>

													<ul>
														<li><a href="#" class="wishlist"><i class="fa fa-heart"></i> Add to Wishlist</a></li>
														<li><a href="#" class="compare"><i class="fa fa-retweet"></i>Add to Compare</a></li>
													</ul>
													<div class="clear"></div>

												</div>
											</div>
										</div>								
									</div>
					        	</div>
								<?php 
									echo '<script>$("a#items-'.$item["iditems"].'.medium-button.button-red.add-cart").data("test", '.json_encode($item).');</script>';
									endforeach;
								?>
						</div>
				

					        <div class="shop-pag">
					        	<p class="pag-p">Items <span>1 to 12</span> of 78 Total</p>

								<div class="right-pag">
						        	 <div class="sort-select">
							              <label>Show</label>
							              <select class="selectBox">
							                <option>12</option>
							                <option>24</option>
							                <option>36</option>
							              </select>
						            </div>

						            <div class="pagenation clearfix">
										<ul>
											<li class="active"><a href="#">1</a></li>
											<li><a href="#">2</a></li>
											<li><a href="#">3</a></li>
											<li><a href="#">4</a></li>
											<li><a href="#">5</a></li>
											<li><a href="#">&gt;</a></li>
										</ul>
									</div>
					        		<div class="clear"></div>
								</div>
				        		<div class="clear"></div>
					        </div>
						</div>
					</div>
				</div>
			</div>
			<!-- End shopmain -->
			<div class="partners">
				<div class="container">
					<div class="row">
						<div class="col-sm-2">
							<a href="#"><img src="upload/partners1.png" alt=""></a>
						</div>
						<div class="col-sm-2">
							<a href="#"><img src="upload/partners2.png" alt=""></a>
						</div>
						<div class="col-sm-2">
							<a href="#"><img src="upload/partners3.png" alt=""></a>
						</div>
						<div class="col-sm-2">
							<a href="#"><img src="upload/partners4.png" alt=""></a>
						</div>
						<div class="col-sm-2">
							<a href="#"><img src="upload/partners5.png" alt=""></a>
						</div>
						<div class="col-sm-2">
							<a href="#"><img src="upload/partners6.png" alt=""></a>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		<!-- End content -->

	<script>
	    $( "#tabs" ).tabs();
	    $( "#accordion" ).accordion();
	    $(function() {
	    $( "#slider-range" ).slider({
	      range: true,
	      min: 0,
	      max: 500,
	      values: [ 0, 500 ],
	      slide: function( event, ui ) {
	        $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
	      }
	    });
	    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
	      " - $" + $( "#slider-range" ).slider( "values", 1 ) );
	  });
	</script>
	
<?php require("footer.php"); ?>