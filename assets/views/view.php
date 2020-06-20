<!-- banner -->
<!-- main image slider container -->
<div id="slider-main">
    <div class="banner-text-agile text-center">
        <div class="container">
            <h3 class="text-white font-weight-bold mb-3" style="width: 800px; margin:0 auto">Hương vị của những chiếc bánh tuyệt vời của chúng tôi</h3>

            <button type="button" class="btn btn-primary button mt-md-5 mt-4" data-toggle="modal" data-target=".bd-example-modal-lg">

                <span>Watch Our Video </span>

            </button>
        </div>
    </div>
    <!-- previous button -->
    <button id="prev">
        <i class="fas fa-chevron-left"></i>
    </button>

    <!-- image container -->
    <div id="slider"></div>

    <!-- next button -->
    <button id="next">
        <i class="fas fa-chevron-right"></i>
    </button>

    <!-- small circles container -->
    <div id="circles"></div>

</div>
<!-- end of main image slider container -->
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalCenterTitle">OOT Bakery</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-0">
                <iframe src="https://player.vimeo.com/video/58582025" style="border:none"></iframe>
            </div>
        </div>
    </div>
</div>
<!-- //Model -->
<!-- //banner -->

<!-- banner bottom icons -->
<div class="icons-banner-botom">
    <div class="container">
        <ul class="list-unstyled my-4 text-center">
            <?php foreach ($categories as $item) : ?>
                <li class="icons-mkw3ls">
                    <p class="mb-2"><?php echo $item->tenDanhMuc ?></p>
                    <a href="/trangchu/index/<?php echo $item->maDanhMuc ?>"> <img src="/assets/img_category/<?php echo $item->hinhAnh ?>" class="img-fluid" alt=""></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
<!-- //banner bottom icons -->
</div>
<!-- //main -->

<!-- banner-bottom -->
<div class="featured-section py-5" id="products">
    <div class="container py-xl-5 py-lg-3">
        <div class="title text-center mb-5">
            <h3 class="text-dark mb-2"><?= $category->tenDanhMuc; ?></h3>
            <p class="text-dark mb-2" style="width:800px;margin:0 auto;"><?= $category->moTa; ?></p>
        </div>
        <div class="content-bottom-in">
            <ul id="flexiselDemo1">
                <?php foreach ($products as $item) : ?>
                    <li>
                        <div class="w3l-specilamk">
                            <div class="row">
                                <div class="col-lg-6 product-name-w3l">
                                    <h4 class="font-weight-bold"><?php echo $item->tenSP ?></h4>
                                    <p class="dont-inti-w3ls mt-4 mb-2">Niềm vui của chúng tối là giúp cho các bạn vui tại mỗi bữa ăn.Hương vị đặc biệt tại mỗi loại bánh của tiệm của chúng tôi sẻ giúp cho các bạn có hứng thú hơn với các món ăn nhẹ. </p>
                                    <p><?php echo $item->moTa ?>.</p>
                                    <?php if (isset($_SESSION["order"])) : ?>
                                        <a href="/TrangChu/addcart/<?php $_($item->maSP) ?>" class="button-3 active mt-5 py-4">Order Now</a>
                                    <?php endif ?>
                                    <?php if (!isset($_SESSION["order"])) : ?>
                                        <a style="cursor: pointer" onClick="alert()" class="button-3 active mt-5 py-4">Order
                                            Now</a>
                                    <?php endif ?>
                                </div>
                                <div class="col-lg-6 speioffer-agile">
                                    <img src="/assets/img_product/<?php echo $item->hinhAnh ?>" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<!-- services -->
<div class="serives-agile py-5 bg-light border-top" id="services">
    <div class="container py-xl-5 py-lg-3">
        <div class="row support-bottom text-center">
            <div class="col-md-4 support-grid">
                <i class="far fa-heart"></i>
                <h5 class="text-dark text-uppercase mt-4 mb-3">
                    Làm bằng tình yêu</h5>
                <p>Chúng tối làm bánh ở đây bằng tình yêu,nó sẻ giúp các bạn hạnh phúc khi thưởng thức chúng. </p>
            </div>
            <div class="col-md-4 support-grid my-md-0 my-4">
                <i class="fas fa-birthday-cake"></i>
                <h5 class="text-dark text-uppercase mt-4 mb-3">Hương Vị bánh</h5>
                <p>Các loại bánh của chúng tôi luôn mang 1 hương vị đặc biệt mà mỗi chúng tôi mới có.</p>
            </div>
            <div class="col-md-4 support-grid">
                <i class="far fa-calendar"></i>
                <h5 class="text-dark text-uppercase mt-4 mb-3">
                    Phục vụ sự kiện</h5>
                <p>Chúng tối còn phục vụ nhưng món ăn đặc biệt để đảm ứng được các sự kiện của khách hàng.</p>
            </div>
        </div>
    </div>
</div>
<!-- //services -->

<!-- stats section -->
<div class="middlesection-agile ">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 text-lg-left text-center pt-4">
                <img src="/assets/images/women.png" alt="" class="img-fluid women-style" />
            </div>
            <div class="col-lg-6 left-build-wthree aboutright-agilewthree mt-0 py-5">
                <div class=" py-xl-5 py-lg-3">
                    <h2 class="title-2 text-white mb-sm-5 mb-4">
                        Một số sự kiện thống kê</h2>
                    <div class="row mb-xl-5 mb-4">
                        <div class="col-4 w3layouts_stats_left w3_counter_grid">
                            <p class="counter">1680</p>
                            <p class="para-text-w3ls text-light">Phổ biến</p>
                        </div>
                        <div class="col-4 w3layouts_stats_left w3_counter_grid2">
                            <p class="counter">1200</p>
                            <p class="para-text-w3ls text-light">
                                Khách hàng hạnh phúc</p>
                        </div>
                        <div class="col-4 w3layouts_stats_left w3_counter_grid1">
                            <p class="counter">400</p>
                            <p class="para-text-w3ls text-light">
                                Giải thưởng đã giành được</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //stats section -->

<!-- new products -->

<!-- //new products	-->

<!-- news -->

<!-- //news -->

<!-- support -->
<div class="serives-agile py-5" id="support">
    <div class="container py-xl-5 py-lg-3">
        <div class="title text-center mb-5">
            <h3 class="text-dark mb-2">Trợ giúp & Hỗ trợ</h3>
            <p>Chúng tôi lun ở đay mỗi khi các bạn cần.</p>
        </div>
        <div class="row support-bottom text-center">
            <div class="col-md-4 support-grid">
                <i class="fas fa-headphones"></i>
                <h5 class="text-dark text-uppercase mt-4 mb-3">
                    HỖ TRỢ TRỰC TUYẾN</h5>
                <p>Hỗ trợ trực tuyến các bạn 24/7</p>
                <button type="button" class="button button-2" onclick="window.location='/contact'">
                    <span>Call Us</span>
                </button>
            </div>
            <div class="col-md-4 support-grid my-md-0 my-5">
                <i class="far fa-comments"></i>
                <h5 class="text-dark text-uppercase mt-4 mb-3">
                    CHAT 24/7</h5>
                <p>Bạn có thể chát với nhân viên bên quán 24/7 để phục vị các bạn.</p>
                <button type="button" class="button button-2 active" onclick="window.location='/contact'">
                    <span>Let's Chart</span>
                </button>
            </div>
            <div class="col-md-4 support-grid">
                <i class="fas fa-question"></i>
                <h5 class="text-dark text-uppercase mt-4 mb-3">
                    bất kỳ câu hỏi</h5>
                <p>Bạn có thể hỏi các câu hỏi cho chúng tôi thông các mail .</p>
                <button type="button" class="button button-2" onclick="window.location='/contact'">
                    <span>Learn More</span>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- support -->