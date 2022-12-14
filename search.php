<?php
session_start();
include("php/link.php");
$client = 'https://ipfs.fleek.co/ipfs/';
$user_address = '';
if(isset($_SESSION['crypticUserAddress'])){
    $user_address = $_SESSION['crypticUserAddress'];
}else{
    $user_address = '';
    header("Location:login");
}
$current_search_name = '';
$query = '';
$total_count = 0;
if (isset($_GET['query'])) {
      $query = $_GET['query'];
      $result2 = mysqli_query($con, "SELECT * FROM `video_info` WHERE `name` like '%$query%' OR `video_id` like '%$query%' OR `video_uuid` like '%$query%' OR `module` like '%$query%' OR `video_desc` like '%$query%'");
      if (mysqli_num_rows($result2) > 0) {
        $total_count = mysqli_num_rows($result2);
      }else{
        $total_count = 0;        
      }
   } else {
      header("Location: /");
   }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- Enter a proper description for the page in the meta description tag -->
    <meta name="description"
        content="Home to directors, editors, musicians, cinematographers, illustrators, producers, and other geeky, cool, misfits tied together by our one true love—Crypto">

    <!-- Enter a keywords for the page in tag -->
    <meta name="Keywords" content="">

    <!-- Enter Page title -->
    <meta property="og:title" content="Cryptic Entertainments" />

    <!-- Enter Page URL -->
    <meta property="og:url" content="https://platform.crypticentertainments.com" />

    <!-- Enter page description -->
    <meta property="og:description"
        content="Home to directors, editors, musicians, cinematographers, illustrators, producers, and other geeky, cool, misfits tied together by our one true love—Crypto">

    <!-- Enter Logo image URL for example : http://cryptonite.finstreet.in/images/cryptonitepost.png -->
    <meta property="og:image" itemprop="image" content="https://platform.crypticentertainments.com/images/logo-1.png" />
    <meta property="og:image:secure_url" itemprop="image" content="https://platform.crypticentertainments.com/images/logo-1.png" />
    <meta property="og:image:width" content="600">
    <meta property="og:image:height" content="315">
    <meta property="og:type" content="website" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Search - Cryptic Entertainments</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <!-- CSS bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!--  Style -->
    <link rel="stylesheet" href="css/style.css" />
    <!--  Responsive -->
    <link rel="stylesheet" href="css/responsive.css" />
    <link href="js/sweetalert/sweetalert.css" rel="stylesheet">
</head>

<body>

    <!--=========== Loader =============-->
    <div id="gen-loading">
        <div id="gen-loading-center">
            <img src="images/logo-1.png" alt="loading">
        </div>
    </div>
    <!--=========== Loader =============-->

    <!--========== Header ==============-->
    <header id="gen-header" class="gen-header-style-1 gen-has-sticky">
        <div class="gen-bottom-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <a class="navbar-brand" href="/">
                                <img class="img-fluid logo" src="images/logo-1.png" alt="streamlab-image">
                            </a>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <div id="gen-menu-contain" class="gen-menu-contain">
                                    <ul id="gen-main-menu" class="navbar-nav ml-auto">
                                        <li class="menu-item">
                                            <a href="/" aria-current="page">Home</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="#">Videos</a>
                                            <i class="fa fa-chevron-down gen-submenu-icon"></i>
                                            <ul class="sub-menu">
                                                <?php 
                                                $queryCat = "SELECT DISTINCT `module`,`module_uuid` FROM `video_info`;";
                                                $resultCat = mysqli_query($con, $queryCat);
                                                if (mysqli_num_rows($resultCat) > 0) {
                                                    while ($rowCat = mysqli_fetch_assoc($resultCat)) {      
                                            ?>
                                                <li class="menu-item">
                                                    <a
                                                        href="more-video?module=<?= $rowCat['module_uuid'] ?>"><?= $rowCat['module'] ?></a>
                                                </li>
                                                <?php }} ?>
                                            </ul>
                                        </li>
                                        <li class="menu-item">
                                            <a href="./more-web-series.php" aria-current="page">Web Series</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="gen-header-info-box">
                                <div class="gen-menu-search-block">
                                    <a href="javascript:void(0)" id="gen-seacrh-btn"><i class="fa fa-search"></i></a>
                                    <div class="gen-search-form">
                                        <form role="search" method="get" class="search-form" action="search">
                                            <label>
                                                <span class="screen-reader-text"></span>
                                                <input type="search" class="search-field" placeholder="Search …"
                                                    value="" name="query">
                                            </label>
                                            <button type="submit" class="search-submit"><span
                                                    class="screen-reader-text"></span></button>
                                        </form>
                                    </div>
                                </div>
                                <?php 
                                    if($user_address !== null && $user_address !== ''){
                                ?>
                                <div class="gen-account-holder">
                                    <a href="javascript:void(0)" id="gen-user-btn"><i class="fa fa-user"></i></a>
                                    <div class="gen-account-menu">
                                        <ul class="gen-account-menu">
                                            <!-- Pms Menu -->
                                            <li>
                                                <a href="https://rinkeby.etherscan.io/address/<?= $user_address ?>"><i
                                                        class="fa fa-user"></i>
                                                    <?php echo substr($user_address, 0, 5) ?>...<?php echo substr($user_address, -5) ?>
                                                </a>
                                            </li>
                                            <!-- Library Menu -->
                                            <li>
                                                    <a href="favourite-videos">
                                                        <i class="fa fa-heart"></i>
                                                        My Favourite Videos     </a>
                                                </li>
                                                <li>
                                                    <a href="favourite-webseries">
                                                        <i class="fa fa-heart"></i>
                                                        My Favourite Webseries</a>
                                                </li>
                                            <li>
                                                <a href="logout"><i class="fa fa-sign-out-alt"></i>
                                                    Sign Out </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <?php }else{ ?>
                                <div class="gen-btn-container">
                                    <a href="javascript:void(0)" class="gen-button" onclick="userLoginOut()">
                                        <div class="gen-button-block">
                                            <span class="gen-button-line-left"></span>
                                            <span class="gen-button-text text-capitalize">Sign In</span>
                                        </div>
                                    </a>
                                </div>
                                <?php } ?>
                            </div>
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <i class="fas fa-bars"></i>
                            </button>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--========== Header ==============-->

    <!-- breadcrumb -->
    <div class="gen-breadcrumb" style="background-image: url('images/background/asset-25.jpg');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <div class="gen-breadcrumb-title">
                            <h1>
                                Search
                            </h1>
                        </div>
                        <div class="gen-breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/"><i class="fas fa-home mr-2"></i>Home</a>
                                </li>
                                <li class="breadcrumb-item active">Search</li>
                            </ol>
                        </div>
                    </nav>
                </div>
                <div class="col-lg-12">
                    <h6 class="mt-5">Result for <span
                            style="color:#06bfc9;text-transform:initial;">"<?= $query ?>"</span></h6>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->

    <!-- Section-1 Start -->
    <input type="hidden" id="rowCount" value="0">
    <input type="hidden" id="search_query" value="<?= $query ?>">
    <input type="hidden" id="total_count" value="<?= $total_count ?>">


    <section class="gen-section-padding-3">
        <div class="container">
            <?php 
            if($total_count>0){
            ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="gen-style-1">
                        <div class="row all-follower">
                        </div>
                    </div>
                </div>
                <div class="col-lg-12" id="lets_hide">
                    <div class="gen-load-more-button">
                        <div class="gen-btn-container">
                            <a class="gen-button gen-button-loadmore" id="loadMore">
                                <span class="button-text">Load More</span>
                                <span class="loadmore-icon" style="display: none;"><i
                                        class="fa fa-spinner fa-spin"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            }else{ ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="gen-style-1">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-6">
                                <h3 class="text-center">No data found</h3>
                                <p class="text-center p3-4">Explore more video on <a href="/" alt="link">Home</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            } ?>
        </div>
    </section>
    <!-- Section-1 End -->

    <!-- footer start -->
    <footer id="gen-footer">
        <div class="gen-footer-style-1">
            <div class="gen-footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-md-6">
                            <div class="widget">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <img src="images/logo-1.png" class="gen-footer-logo" alt="gen-footer-logo">
                                        <p>Cryptic Entertainments is home to
                                            directors, editors, musicians, mix engineers, cinematographers,
                                            illustrators, producers, and other geeky, cool, misfits
                                            tied together by our one true love—Crypto.
                                        </p>
                                        <ul class="social-link">                                            
                                            <li><a href="https://www.instagram.com/crypticentertainments/"
                                                    class="facebook"><i class="fab fa-instagram"></i></a></li>                                            
                                            <li><a href="https://twitter.com/Cryptic_Media" class="facebook"><i
                                                        class="fab fa-twitter"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="widget">
                                <h4 class="footer-title">Explore</h4>
                                <div class="menu-explore-container">
                                    <ul class="menu">
                                        <li class="menu-item">
                                            <a href="/" aria-current="page">Home</a>
                                        </li>
                                        <?php 
                                                $queryCat = "SELECT DISTINCT `module`,`module_uuid` FROM `video_info`;";
                                                $resultCat = mysqli_query($con, $queryCat);
                                                if (mysqli_num_rows($resultCat) > 0) {
                                                    while ($rowCat = mysqli_fetch_assoc($resultCat)) {      
                                            ?>
                                        <li class="menu-item"><a
                                                href="more-video?module=<?= $rowCat['module_uuid'] ?>"><?= $rowCat['module'] ?></a>
                                        </li>
                                        <?php }} ?>
                                        <li class="menu-item">
                                            <a href="./more-web-series.php" aria-current="page">Web Series</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="widget">
                                <h4 class="footer-title">Company</h4>
                                <div class="menu-about-container">
                                    <ul class="menu">
                                        <li class="menu-item"><a href="contact-us">Privacy
                                                Policy</a></li>
                                        <li class="menu-item"><a href="contact-us">Terms Of
                                                Use</a></li>
                                        <li class="menu-item"><a href="contact-us">Contact us</a></li>

                                        <li class="menu-item"><a href="contact-us">Faq</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-xl-3  col-md-6">
                            <div class="widget">
                                <h4 class="footer-title">Downlaod App</h4>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <p>Cryptic Entertainments is home to
                                            directors, editors, musicians, mix engineers, cinematographers,
                                            illustrators, producers, and other geeky, cool, misfits
                                            tied together by our one true love—Crypto.
                                        </p>
                                        <a href="#">
                                            <img src="images/asset-35.png" class="gen-playstore-logo" alt="playstore">
                                        </a>
                                        <a href="#">
                                            <img src="images/asset-36.png" class="gen-appstore-logo" alt="appstore">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="gen-copyright-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 align-self-center">
                            <span class="gen-copyright"><a target="_blank" href="#"> Copyright 2022 crypticent
                                    ertainments All Rights
                                    Reserved.</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer End -->

    <!-- Back-to-Top start -->
    <div id="back-to-top">
        <a class="top" id="top" href="#top"> <i class="ion-ios-arrow-up"></i> </a>
    </div>
    <!-- Back-to-Top end -->

    <!-- js-min -->
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/asyncloader.min.js"></script>
    <!-- JS bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- owl-carousel -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- counter-js -->
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <!-- popper-js -->
    <script src="js/popper.min.js"></script>
    <script src="js/swiper-bundle.min.js"></script>
    <!-- Iscotop -->
    <script src="js/isotope.pkgd.min.js"></script>

    <script src="js/jquery.magnific-popup.min.js"></script>

    <script src="js/slick.min.js"></script>

    <script src="js/streamlab-core.js"></script>

    <script src="js/script.js"></script>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/web3@latest/dist/web3.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/web3modal@1.9.7/dist/index.js"></script>
    <script type="text/javascript" src="https://unpkg.com/@walletconnect/web3-provider@1.7.8/dist/umd/index.min.js">
    </script>
    <script src="./frontend/web3-login.js?v=009">
    </script>
    <script src="./frontend/web3-modal.js?v=001"></script>
    <script src="js/sweetalert/sweetalert.min.js"></script>
    <script src="js/sweetalert/jquery.sweet-alert.custom.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script>
    $(document).ready(function() {
        var currentRow = $('#rowCount').val();
        var limit = parseInt(10);
        var row = parseInt($('#rowCount').val());
        var count = parseInt($('#total_count').val());
        var search_query = $('#search_query').val();

        function loadNow(row, limit, search_query) {
            $('.button-text').css("display", "none");
            $('.loadmore-icon').css("display", "block");
            $.ajax({
                type: 'POST',
                url: 'php/loadSearchData.php',
                data: {
                    "rowCount": row,
                    "limit": limit,
                    "search_query": search_query
                },
                success: function(data) {
                    row = parseInt(row) + parseInt(limit);
                    $('#rowCount').val(row);
                    $('.all-follower').append(data);
                    $('.button-text').css("display", "block");
                    $('.loadmore-icon').css("display", "none");
                    if (row >= count) {
                        $('#lets_hide').css("display", "none");
                    } else {
                        $("#lets_hide").val('Load More');
                    }
                }
            });
        }
        loadNow(row, limit, search_query);
        $('#loadMore').click(function() {
            row = parseInt($('#rowCount').val());
            loadNow(row, limit, search_query);
        });
    });
    </script>
</body>

</html>