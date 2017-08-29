<?php require("head.php"); ?>
<body>
    <!-- Preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>

    <!-- Container -->
    <div id="container">
        <!-- Header
		    ================================================== -->
        <header class="clearfix">

            <div class="top-line">
                <div class="container">
                    <div class="left-line">
                        <ul class="lang clearfix">
                            <li><span>Language: </span> <a href="#">Eng <i class="fa fa-angle-down"></i></a>
                                <ul class="drop-down2">
                                    <li><a href="#">Fra</a></li>
                                    <li><a href="#">Rus</a></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="curr clearfix">
                            <li><span>Currency: </span><a href="#">Usd <i class="fa fa-angle-down"></i></a>
                                <ul class="drop-down2">
                                    <li><a href="#">GPB</a></li>
                                    <li><a href="#">Eur</a></li>
                                </ul>
                            </li>
                        </ul>

                        <div class="mobile-a">
                            <a href="#login-box" class="login-window"><i class="fa fa-user"></i></a>
                            <a href="#"><i class="fa fa-heart"></i></a>
                        </div>
                    </div>
                    <div class="right-line clearfix">
                        <ul>
                        <?php if(isset($_SESSION["user"]["idclients"])) :  ?>  <!-- les sessions sont stockees dans le tableau User -->
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">My Wishlist</a></li>
                            <li><a href="/alsaleh_keita/Git/php-object-webforce3/logout">Checkout</a></li>
                            <?php else: ?>
                            <li><a href="#login-box" class="login-window">Login</a></li>
                            <?php endif; ?>
                        </ul>
                        <div class="mobile-version">
                            <div class="cart-icon">
                                <a href="#"><img src="<?php echo HOST.FOLDER ?>images/cart-white.png" alt="">
                                    <span>8 Items</span></a>
                            </div>
                        </div>                    

                        <div id="login-box" class="login-popup">
                            <a href="#" class="close"><img src="<?php echo HOST.FOLDER ?>images/delete.png" class="btn_close" title="Close Window" alt="Close" /></a>
                            <form method="post" class="signin" action="http://localhost/alsaleh_keita/Git/php-object-webforce3/user-register">
                                <fieldset class="textbox">
                                    <h4 class="login-title">LOGIN </h4>

                                    <input name="firstname" type="text" placeholder="Firstname*">
                                    <input name="lastname" type="text" placeholder="Lastname*">
                                    <input name="email" type="email" placeholder="Email*">
                                    <input name="password" type="password" placeholder="Password*">


                                    <input type="checkbox" name="signed" value="Stayin"> <span class="signed">Remember Me</span>

                                    <button class="submit button" type="submit">Login</button>
                                    <p>
                                        <a class="recover" href="#">Sign up</a>
                                        <a href="#" class="forgot2">Forgot password?</a>
                                    </p>
                                    <div class="clear"></div>

                                    <div class="log-socials">
                                        <h6>LOGIN WITH</h6>
                                        <ul>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>

                                        <div class="clear"></div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                            
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <!-- end topline -->

            <div class="upper-header">
                <div class="container">

                    <div class="search-input">
                        <form action="#">
                            <input type="text" placeholder="Type and Search">
                            <input type="submit" value="">
                        </form>
                    </div>

                    <div class="logo">
                        <a href="index.html"><img src="<?php echo HOST.FOLDER ?>images/logo.png" alt=""></a>
                    </div>

                    <div class="cart">
                        <a href="#" class="cartmain"> Cart  /  $ 1 199.00</a>
                        <div class="card-icon">
                            <img src="<?php echo HOST.FOLDER ?>images/cart.png" alt="">
                            <div class="shop-items">10</div>
                        </div>
                        <div class="hover-cart">

                            <div class="hover-box">

                                <a href="#"><img src="<?php echo HOST.FOLDER ?>images/hover1.png" alt="" class="left-hover"></a>
                                <div class="hover-details">
                                    <p>Grey California Dress</p>
                                    <span>$ 3 199.00</span>
                                    <div class="quantity">Quantity: 1</div>
                                </div>

                                <a href="#" class="right-hover"><img src="<?php echo HOST.FOLDER ?>images/delete.png" alt=""></a>

                                <div class="clear"></div>

                            </div>

                            <div class="hover-box bd0">

                                <img src="<?php echo HOST.FOLDER ?>images/hover2.png" alt="" class="left-hover">
                                <div class="hover-details">
                                    <p>Grey California Dress</p>
                                    <span>$ 3 199.00</span>
                                    <div class="quantity">Quantity: 1</div>
                                </div>

                                <a href="#" class="right-hover"><img src="<?php echo HOST.FOLDER ?>images/delete.png" alt=""></a>

                                <div class="clear"></div>

                            </div>

                            <div class="subtotal">
                                Cart Subtotal: <span>$ 4 372</span>
                            </div>

                            <button class="viewcard"> View Cart</button>
                            <button class="proceedcard"> Proceed</button>

                        </div>
                    </div>

                    <div class="clear"></div>

                </div>
                <!-- End container -->
            </div>
            <!-- End Upper-header -->

            <div class="nav-border"></div>
            <div class="container">
                <!-- Navigation -->
                <nav id="nav">
                    <ul id="navlist" class="sf-menu clearfix">
                        <li class="current"><a href="<?php echo HOST.FOLDER ?>">Home</a>
                        </li>
                        <li><a href="#">Shop</a>
                            <ul class="sub-menu">
                                <li><a href="shop-single.html"><span>--</span>Single Product</a></li>
								<li><a href="<?php echo HOST.FOLDER."shop-list" ?>"><span>--</span>
                                <li><a href="shop-list.html"><span>--</span>Products List</a></li>
                                <li><a href="shop-grid.html"><span>--</span>Products Grid</a></li>
                                <li><a href="cart.html"><span>--</span>Shopping Cart</a></li>
                                <li><a href="checkout.html"><span>--</span>Checkout</a></li>
                            </ul>
                        </li>
<!--                         <li><a href="#">Women</a></li>
                        <li><a href="#">Men</a></li>
                        <li><a href="#">Accesories</a></li> -->
                        <li><a href="#">Catégorie</a>
                            <ul class="sub-menu">
<!--                                 <li><a href="about.html"><span>--</span>About</a></li>
                                <li><a href="shortcodes.html"><span>--</span>Shortcodes</a></li>
                                <li><a href="typography.html"><span>--</span>Typography</a></li> */
                                <li><a href="404.php"><span>--</span>404</a></li> -->
								<?php 
									foreach($this->categories as $categorie)
										echo "<li><a href='about.html'><span>--</span>".$categorie["name"]."</a></li>";
								?>
                            </ul>
                        </li>
<!--                        <li><a href="#">Blog</a>
                            <ul class="sub-menu">
                                <li><a href="blog.html"><span>--</span>Blog</a></li>
                                <li><a href="blog-single.html"><span>--</span>Blog Single</a></li>
                            </ul>
                        </li> -->
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </nav>
                <!-- Navigation -->
            </div>


        </header>
        <!-- End Header -->