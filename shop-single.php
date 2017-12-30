<!DOCTYPE html>
<html lang="en">
<?php require("header.php"); ?>
        <!-- content -->
        <div id="content">
                <div class="product-page container">
                        <div class="row">
                                <div class="col-md-6">
                                        <div class="single-img">
                                                <div class="sp-wrap">
                                                        <a href="images/1.jpg"><img src="<?php echo HOST.FOLDER ?>images/1_tb.jpg" alt=""></a>
                                                        <a href="images/2.jpg"><img src="<?php echo HOST.FOLDER ?>images/2_tb.jpg" alt=""></a>
                                                        <a href="images/3.jpg"><img src="<?php echo HOST.FOLDER ?>images/3_tb.jpg" alt=""></a>
                                                        <a href="images/4.jpg"><img src="<?php echo HOST.FOLDER ?>images/4_tb.jpg" alt=""></a>
                                                        <a href="images/5.jpg"><img src="<?php echo HOST.FOLDER ?>images/5_tb.jpg" alt=""></a>
                                                        <a href="images/6.jpg"><img src="<?php echo HOST.FOLDER ?>images/6_tb.jpg" alt=""></a>
                                                </div>
                                                <div id="test"></div>
                                        </div>
                                </div>
                                <div class="col-md-6">
                                        <div class="single-desc">
                                                <div class="top-single">
                                                        <span>Shop  /  Men  /  Jackets  /  Black Leather Jacket</span>
                                                        <div class="right-arrows">
                                                                <a href="#"><i class="fa fa-angle-left"></i></a>
                                                                <a href="#"><i class="fa fa-angle-right"></i></a>
                                                        </div>
                                                    <div class="clear"></div>
                                                </div>

                                                <div class="middle-single">

                                                        <h1><?php echo $itemHome[0]["libelle"] ?></h1>

                                                        <img src="upload/stars.png" alt="">

                                                        <div class="reviews">
                                                                <a href="#" id="elem-reviews">21 Rewiew(s)</a>  /  
                                                                <a href="#">Add a Review</a>
                                                        </div>
                                                    <div class="clear"></div>
                                                </div>

                                                <div class="single-price">
                                                        <ul>
                                                                <!-- <li><span class="high-price">$1 899.00</span></li> -->
                                                                <li><span class="low-price"><?php echo $itemHome[0]["price"]; ?>€</span></li>
                                                        </ul>
                                                </div>

                                            <div class="single-infos">
                                                <p><span>Brand:</span><?php echo $itemHome[0]["categorie"]; ?></p>
                                                <p><span>Product Code:</span><?php echo $itemHome[0]["code_item"]; ?></p>
                                                <p><span>Availability:</span><?php echo ($itemHome[0]["availabity"] == 1) ? "En stock" : "En rupture de stock" ?></p>	
                                            </div>						    

                                            <div class="prod-end">
                                                    <a href="#" class="medium-button button-red add-cart">Add to Cart</a>
                                                    <input type="text" placeholder="1">
                                                    <ul>
                                                            <li><a href="#" class="wishlist"><i class="fa fa-heart"></i> Add to Wishlist</a></li>
                                                            <li><a href="#" class="compare"><i class="fa fa-retweet"></i>Add to Compare</a></li>
                                                    </ul>
                                                    <div class="clear"></div>
                                            </div>

                                            <div class="single-descript">
                                                    <p><?php echo $itemHome[0]["description"] ?></p>
                                            </div>

                                                <div class="share">
                                                        <span>Share</span>
                                                        <ul>
                                                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                                                        </ul>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
                <!-- End Product Single -->

                <div class="tabs-single">
                        <div class="container">
                                <div id="tabs">
                                        <ul>
                                                <li class="active"><a href="#tabs-1">Description</a></li>
                                                <li><a href="#tabs-2">ADDITIONAL INFORMATION</a></li>
                                                <li><a href="#tabs-3">REVIEWS</a></li>
                                        </ul>
                                        <div class="tab-border"></div>
                                        <div id="tabs-1">
                                                <p>We possess within us two minds. So far I have written only of the conscious mind.. Our subconscious mind contains such power and complexity that it literally staggers the imagination. We know that this subconscious mind controls and orchestrates our bodily functions, from pumping blood to all parts of our body. We possess within us two minds. So far I have written only of the conscious mind.. Our subconscious mind contains such power and complexity that it literally staggers the imagination. We know that this subconscious mind controls and orchestrates our bodily functions, from pumping blood to all parts of our body.</p>
                                        </div>
                                        <div id="tabs-2">
                                                <p>We possess within us two minds. So far I have written only of the conscious mind.. Our subconscious mind contains such power and complexity that it literally staggers the imagination. We know that this subconscious mind controls and orchestrates our bodily functions, from pumping blood to all parts of our body. We possess within us two minds. So far I have written only of the conscious mind.. Our subconscious mind contains such power and complexity that it literally staggers the imagination. We know that this subconscious mind controls and orchestrates our bodily functions, from pumping blood to all parts of our body.</p>
                                        </div>
                                        <div id="tabs-3">
                                        </div>
                                </div>
                                <!-- End First Tabs -->
                        </div>
                </div>		
                <!-- End tab Signle -->	


                <div class="feat-items mb30">
                        <div class="container">
                                <h1>RELATED ITEMS</h1>
                                <div class="list_carousel1 responsive">
                        <ul id="foo1">
                                <?php 
                                    $i = 0;
                                    foreach($itemsHome as $item): 
                                ?>

                                <li>
                                        <div class="arrival-overlay">
                                            <!-- <img src="upload/arrival1.jpg" alt=""> -->
                                            <img src="<?php echo $item["url"] ?>" alt="">
                                            <img src="upload/new.png" alt="" class="new">
                                            <div class="arrival-mask">
                                                <a href="#" class="medium-button button-red add-cart">Add to Cart</a>
                                                <a href="#" class="wishlist"><i class="fa fa-heart"></i> Add to Wishlist</a>
                                                <a href="#" class="compare"><i class="fa fa-retweet"></i>Add to Compare</a>
                                            </div>
                                        </div>
                                        <div class="arr-content">
                                                <a href="<?php echo HOST.FOLDER."single/".$item["iditems"] ?>"> 
                                                        <!-- <p>Brown Coat</p> -->
                                                        <p><?php echo $item["libelle"] ?></p>
                                                </a>
                                                <ul>
                                                        <!-- <li><span class="low-price">$899.00</span></li> -->
                                                        <li><span class="low-price"><?php echo $item["price"]?></span></li>
                                                </ul>

                                                <div class="stars"><img src="upload/stars.png" alt=""></div>
                                        </div>
                                </li>
                                <?php
                                    $i = ($i + 1)%4;
                                    endforeach;
                                ?>
                        </ul>

                        <div class="clearfix"></div>
                                        <div class="arrows">
                                                <a id="prev1" class="prev1" href="#"><i class="fa fa-angle-left"></i></a>
                                                <a id="next1" class="next1" href="#"><i class="fa fa-angle-right"></i></a>
                                        </div>
                                </div>
                                <!-- End List Carousel -->
                        </div>
                </div>
                <!-- feat-items -->

                <div class="partners">
                        <div class="container">
                                <div class="row">
                                        <div class="col-sm-2">
                                                <a href="#"><img src="<?php echo HOST.FOLDER ?>upload/partners1.png" alt=""></a>
                                        </div>
                                        <div class="col-sm-2">
                                                <a href="#"><img src="<?php echo HOST.FOLDER ?>upload/partners2.png" alt=""></a>
                                        </div>
                                        <div class="col-sm-2">
                                                <a href="#"><img src="<?php echo HOST.FOLDER ?>upload/partners3.png" alt=""></a>
                                        </div>
                                        <div class="col-sm-2">
                                                <a href="#"><img src="<?php echo HOST.FOLDER ?>upload/partners4.png" alt=""></a>
                                        </div>
                                        <div class="col-sm-2">
                                                <a href="#"><img src="<?php echo HOST.FOLDER ?>upload/partners5.png" alt=""></a>
                                        </div>
                                        <div class="col-sm-2">
                                                <a href="#"><img src="<?php echo HOST.FOLDER ?>upload/partners6.png" alt=""></a>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
        <!-- End content -->

	<script>
	    $( "#tabs" ).tabs();
	    $( "#accordion" ).accordion();
	</script>
	<script type="text/javascript" src="<?php echo HOST.FOLDER ?>js/smoothproducts.min.js"></script>

 	<!-- include jQuery + carouFredSel plugin -->
        <script type="text/javascript" src="<?php echo HOST.FOLDER ?>js/jquery.carouFredSel.js"></script>

        <!-- optionally include helper plugins -->
        <script type="text/javascript" src="<?php echo HOST.FOLDER ?>js/jquery.mousewheel.min.js"></script>
        <script type="text/javascript" src="<?php echo HOST.FOLDER ?>js/jquery.touchSwipe.min.js"></script>
	<script src="<?php echo HOST.FOLDER ?>js/myScripts.js"></script>
<?php require("footer.php"); ?>