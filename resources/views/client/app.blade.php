<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="../../image/png" href="/img/69.png">
    <title>Phim Việt 69</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap"
          rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="../../assets/client/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../../assets/client/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../../assets/client/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../../assets/client/css/plyr.css" type="text/css">
    <link rel="stylesheet" href="../../assets/client/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../../assets/client/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../../assets/client/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../../assets/client/css/style.css" type="text/css">
    <link id="pagestyle" href="../../../assets/css/custom.css" rel="stylesheet" />
</head>

<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Header Section Begin -->
<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <div class="header__logo">
                    <a href="{{ route('client.index') }}">
                        <img src="../../img/logo.svg" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="header__nav">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li id="class-home"><a href="{{ route('client.index') }}">Trang chủ</a></li>
                            <li id="class-chat"><a href="{{ route('client.chat') }}">Chat sex</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="header__right">
                    <a href="#" class="search-switch"><span class="icon_search"></span></a>
                </div>
            </div>
        </div>
        <div id="mobile-menu-wrap"></div>
    </div>
</header>
<!-- Header End -->


    @yield('content')

<!-- Footer Section Begin -->
<footer class="footer">
    <div class="page-up">
        <a href="#" id="scrollToTopButton"><span class="arrow_carrot-up"></span></a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="footer__logo">
                    <a href="{{ route('client.index') }}">
                        <img src="../../img/logo.svg" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="footer__nav">
                    <ul>
                        <li class="active"><a href="{{ route('client.index') }}">Trang chủ</a></li>
                        <li><a href="{{ route('client.chat') }}">Chat sex</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                     <a href="https://phimviet69.xyz" target="_blank">phimviet69.xyz</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>

            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Search model Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch"><i class="icon_close"></i></div>
        <form class="search-model-form">
            <input type="text" id="search-input" name="search" placeholder="Tìm kiếm.....">
        </form>
    </div>
</div>
<!-- Search model end -->

<!-- Js Plugins -->
<script src="../../assets/client/js/jquery-3.3.1.min.js"></script>
<script src="../../assets/client/js/bootstrap.min.js"></script>
<script src="../../assets/client/js/player.js"></script>
<script src="../../assets/client/js/jquery.nice-select.min.js"></script>
<script src="../../assets/client/js/mixitup.min.js"></script>
<script src="../../assets/client/js/jquery.slicknav.js"></script>
<script src="../../assets/client/js/owl.carousel.min.js"></script>
<script src="../../assets/client/js/main.js"></script>

<script>
    $(document).ready(function() {
        // Lấy URL hiện tại
        var currentURL = window.location.href;

        if (currentURL.includes("chat")) {
            $("#class-chat").addClass("active");
        } else {
            $("#class-home").addClass("active");
        }
    });
</script>
</body>

</html>
