<?php require("header.php"); ?>
		<!-- content -->
		<div id="content">


			<div class="shop-main container">
				<div class="row">
					<div class="col-md-3">
						<aside class="left-shop">

							<div class="shop-categories mb30">
								<h1 class="asidetitle">Categories</h1>
								<ul>
                                    <?php
                                        foreach($this->categories as $categorie)
                                            echo "<li class='shop-categories-item' id='categorie-".$categorie["idcategories"]."'>".$categorie["name"]."</li>";
                                    ?>
								</ul>
							</div>

							<div class="shop-price mb30">
								<h1 class="asidetitle">Price</h1>
								<p>
								  <input type="text" id="amount" value="0">
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
												<h1>
													<a href="<?php echo HOST.FOLDER.'single/'.$item["iditems"] ?>">
													<?php echo $item["libelle"] ?></a>
												</h1>

												<div class="list-midrow">

													<ul>
														<li><span class="low-price"><?php echo $item["price"]; ?>€</span></li>
													</ul>

													<img src="upload/stars.png" alt="">

													<div class="reviews"><a href="#">21 Rewiew(s)</a>  /  <a href="#">Add a Review</a></div>
													<div class="clear"></div>
												</div>

												<p class="list-desc"><?php echo $item["description"] ?></p>

												<div class="list-downrow">
                                                    <a href="#" id='items-<?php echo $item["iditems"] ?>' class="medium-button button-red add-cart">Add to Cart</a>

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
                                    echo '<script>$("a#items-'.$item["iditems"].'.medium-button.button-red.add-cart").data("item", '.json_encode($item).');</ncurses_scr_init(filename)pt>';
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
	<script type="text/javascript" src="<?php echo HOST.FOLDER ?>js/jquery.superfish.js"></script>
	<script type="text/javascript" src="<?php echo HOST.FOLDER ?>js/jquery.bxslider.js"></script>

	<script type="text/javascript" src="<?php echo HOST.FOLDER ?>js/bootstrap.js"></script>
	<script type="text/javascript" src="<?php echo HOST.FOLDER ?>js/retina-1.1.0.min.js"></script>
	<script type="text/javascript" src="<?php echo HOST.FOLDER ?>js/jquery.nicescroll.min.js"></script>
	<script type="text/javascript" src="<?php echo HOST.FOLDER ?>js/jquery.nicescroll.min.js"></script>
	<script type="text/javascript" src="<?php echo HOST.FOLDER ?>js/plugins-scroll.js"></script>
  	<script type="text/javascript" src="<?php echo HOST.FOLDER ?>js/jquery.isotope.min.js"></script>
	<script type="text/javascript" src="<?php echo HOST.FOLDER ?>js/jquery.imagesloaded.min.js"></script>
	<script type="text/javascript" src="<?php echo HOST.FOLDER ?>js/jquery.appear.js"></script>
	<script type="text/javascript" src="<?php echo HOST.FOLDER ?>js/jquery.countTo.js"></script>
	<script src="<?php echo HOST.FOLDER ?>js/jquery.parallax.js"></script>
     <!-- jQuery KenBurn Slider  -->
    <script type="text/javascript" src="<?php echo HOST.FOLDER ?>js/jquery.themepunch.revolution.min.js"></script>
	<script type="text/javascript" src="<?php echo HOST.FOLDER ?>js/script.js"></script>

	<script src="<?php echo HOST.FOLDER ?>js/myScripts.js"></script>

<?php require("footer.php"); ?>