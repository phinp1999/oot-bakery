<div class="mian-content">
    <!-- header -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="logo text-left">
                <h1>
                    <a class="navbar-brand" href="/">
                        <img src="/assets/images/logo.png" alt="" class="img-fluid">OOT Bakery
                    </a>
                </h1>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">

                </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-lg-auto text-lg-right text-center">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">About Us</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/contact">Contact Us</a>
                    </li>
                    <li class="nav-item cart"><span class="nav-link icon">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        </span> <span class="count">
                            <?php 
                            if(isset($_SESSION["count"]))
                                 echo $_SESSION["count"];
                            else {
                                $_SESSION["count"] = 0;
                                echo 0;
                            };
                                 ?>
                        </span>
                        <div class="giohang p-2">
                            <div class="items">
                                <?php 
                                if(isset($_SESSION["order"]))
                                foreach ($_SESSION["spJoinCt"] as $item): ?>
                                <?php if($item->CtDonHang->donhang_id == $_SESSION["order"][0]){?>
                                <div class="order-item">
                                    <img src="/assets/img_product/<?php $_($item->hinhAnh) ?>" align="left"
                                        class="oi-img img-fluid">
                                    <p class="oi-name"><?php $_($item->tenSP) ?></p>
                                    <span class="oi-fee"><?php $_($item->giaSP) ?> <small>đ</small></span>
                                    <hr>
                                </div>
                                <?php }endforeach; ?>
                            </div>
                            <p class="sum">
                                <span class="text-success"></span>
                            </p>
                            <div class="buttons">
                                <a href="#" class="btn-view-cart">
                                    <div class="btn-123">
                                        <a href="/cart" class="btn-6"> Detail <span></span>
                                        </a>
                                    </div>
                                </a> <a href="#" class="btn-checkout">
                                    <div class="btn-123">
                                        <a href="/payment" class="btn-6"> Payment <span></span>
                                        </a>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </li>

                    <?php if(isset($_SESSION['user'])):?>
                    <?php $user_array = $_SESSION['user'];?>
                    <li class="nav-item login">
                        <div class="user-nav nav-link">
                            <span class="user-icon"><?php echo substr($user_array[2],0,1);?></span>
                        </div>
                        <div class="user-info">
                            <div class="user-email">
                                <div class="user mr-3">
                                    <span class="user-icon"><?php echo substr($user_array[2],0,1);?></span>
                                </div>
                                <div class="text">
                                    <span
                                        style="cursor: 'pointer'; text-transform: capitalize"><?php echo $user_array[2];?></span>
                                    </span> <br />
                                    <span class="text-muted">
                                        <?php echo $user_array[4];?></span>
                                </div>
                            </div>
                            <div class="item">
                                <i class="far fa-bell icon" aria-hidden="true"></i> <span>Notifications</span>
                            </div>
                            <div class="item">
                                <i class="far fa-comment icon" aria-hidden="true"></i> <span>Messages</span>
                            </div>
                            <a class="item profile" href="/profile"> <i class="far fa-user icon" aria-hidden="true"></i>
                                <span>Profile</span>
                            </a> <a class="item his" href="#"> <i class="fa fa-history icon" aria-hidden="true"></i>
                                <span>Purchare history</span>
                            </a>
                            <div class="item">
                                <i class="far fa-credit-card icon" aria-hidden="true"></i> <span>Payment
                                    methods</span>
                            </div>
                            <div class="item">
                                <a href="/form/logout" style="color: #fe3859;"><i class="fa fa-power-off icon"
                                        aria-hidden="true"></i> <span>Sign out</span></a>
                            </div>
                        </div>
                    </li>
                    <?php else:?>
                    <li class="nav-item">
                        <a class="nav-link" href="/form">SIGN IN</a>
                    </li>
                    <?php endif;?>

                </ul>
                <!-- menu button -->
                <div class="menu">
                    <a href="#" class="navicon"></a>
                    <div class="toggle">
                        <ul class="toggle-menu list-unstyled">
                            <li>
                                <a href="index.html">Index Page</a>
                            </li>
                            <li>
                                <a class="scroll" href="#products">New Products</a>
                            </li>
                            <li>
                                <a href="gallery.html">Latest Cakes</a>
                            </li>
                            <li>
                                <a class="scroll" href="#order">Order Cake</a>
                            </li>
                            <li>
                                <a class="scroll" href="#faqs">Faqs</a>
                            </li>
                            <li>
                                <a href="contact.html">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- //menu button -->
            </div>
        </nav>
    </header>
    <!-- //header -->

    <!-- banner 2 -->
    <div id="banner2" class="banner2-w3ls">

    </div>
    <!-- //banner 2 -->