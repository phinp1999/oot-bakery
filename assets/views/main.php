<?php
    if(session_id() == '' || !isset($_SESSION)) {
        session_start();
    }
?>


<!DOCTYPE html>
<html>

<head>
    <title>OOT Bakery Restaurants</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />

    <!-- //Meta tag Keywords -->

    <!-- Custom-Files -->
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <!-- Bootstrap-Core-CSS -->

    <link rel="stylesheet" href="/assets/css/style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="/assets/css/profile.css" type="text/css" />
    <link rel="stylesheet" href="/assets/css/cart.css" type="text/css" />
    <link rel="stylesheet" href="/assets/css/payment.css" type="text/css" />
    <link rel="stylesheet" href="/assets/css/style_customer.css" />
    <!-- Style-CSS -->
    <link rel="stylesheet" href="/assets/css/fontawesome-all.css">
    <link rel="stylesheet" href="/assets/css/owl.theme.default.css">
    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">

    <!-- Font-Awesome-Icons-CSS -->
    <!-- //Custom-Files -->

    <!-- Web-Fonts -->
    <link href="//fonts.googleapis.com/css?family=Oxygen:300,400,700&amp;subset=latin-ext" rel="stylesheet">
    <link
        href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
        rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Pacifico&amp;subset=cyrillic,latin-ext,vietnamese" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style_form2.css">
    <!-- //Web-Fonts -->
</head>

<body>

    <?php include_once("components/header.php"); ?>

    <!-- Here is where we include a subtemplate -->
    <?php include($subview.'.php');?>


    <?php include_once("components/footer.php"); ?>

    <!-- Js files -->
    <!-- JavaScript -->
    <script src="/assets/js/jquery-2.2.3.min.js"></script>
    <!-- Default-JavaScript-File -->

    <!-- flexisel (for special offers) -->
    <script src="/assets/js/jquery.flexisel.js"></script>
    <script>
    //chỗ mấy tk sanpham ơ đâu wtf sanpham khachhang chu
    $(window).load(function() {
        $("#flexiselDemo1").flexisel({
            visibleItems: 1,
            animationSpeed: 1000,
            autoPlay: true,
            autoPlaySpeed: 3000,
            pauseOnHover: true,
            enableResponsiveBreakpoints: true,
            // responsiveBreakpoints: {
            // 	portrait: {
            // 		changePoint: 480,
            // 		visibleItems: 1
            // 	},
            // 	landscape: {
            // 		changePoint: 640,
            // 		visibleItems: 2
            // 	},
            // 	tablet: {
            // 		changePoint: 768,
            // 		visibleItems: 2
            // 	}
            // }
        });

    });
    </script>
    <!-- //flexisel (for special offers) -->

    <!-- script for tabs -->
    <script>
    $(function() {

        var menu_ul = $('.faq > li > ul'),
            menu_a = $('.faq > li > a');

        menu_ul.hide();

        menu_a.click(function(e) {
            e.preventDefault();
            if (!$(this).hasClass('active')) {
                menu_a.removeClass('active');
                menu_ul.filter(':visible').slideUp('normal');
                $(this).addClass('active').next().stop(true, true).slideDown('normal');
            } else {
                $(this).removeClass('active');
                $(this).next().stop(true, true).slideUp('normal');
            }
        });

    });
    </script>
    <!-- script for tabs -->

    <!-- stats -->
    <script src="/assets/js/jquery.waypoints.min.js"></script>
    <script src="/assets/js/jquery.countup.js"></script>
    <script>
    $('.counter').countUp();
    </script>
    <!-- //stats -->

    <!-- menu-js -->
    <script>
    $('.navicon').on('click', function(e) {
        e.preventDefault();
        $(this).toggleClass('navicon--active');
        $('.toggle').toggleClass('toggle--active');
    });
    </script>
    <!-- //menu-js -->

    <!-- banner slider -->
    <script src="/assets/js/image-slider.js"></script>
    <link rel="stylesheet" type="text/css" href="/assets/css/image-slider.css">
    <!-- //banner slider -->

    <!-- smooth scrolling -->

    <script src="/assets/js/SmoothScroll.min.js"></script>

    <!-- move-top -->
    <script src="/assets/js/move-top.js"></script>
    <!-- easing -->
    <script src="/assets/js/easing.js"></script>
    <!--  necessary snippets for few javascript files -->
    <script src="/assets/js/cakes-bakery.js"></script>

    <script src="/assets/js/bootstrap.js"></script>
    <script src="/assets/js/form2.js"></script>
    <script src="/assets/js/index.js"></script>
    <!-- Necessary-JavaScript-File-For-Bootstrap -->
    <script src="/assets/js/sweetalert.min.js"></script>

    <!-- //Js files -->
    <script src="/assets/js/owl.carousel.min.js"></script>
	<script>
        $('.team_oot').owlCarousel({
            loop: true,
            margin: 20,
            nav: true,
            dots: true,
            responsive: {
                0: {
                    items: 1
                },
                991: {
                    items: 2
                },
                1000: {
                    items: 4
                },
                1200: {
                    items: 4
                }
            }
        })
    </script>
</body>

</html>