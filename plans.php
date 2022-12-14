<?php
session_start();
require_once('php/link.php');
$client = 'https://ipfs.fleek.co/ipfs/';
$user_address = '';
$post_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
$super_pass_token_id = '';
$premium_pass = $_SESSION['premiumPass'];
$access_pass = $_SESSION['accessPass'];

if (isset($_SESSION['crypticUserAddress'])) {
    $user_address = $_SESSION['crypticUserAddress'];
} else {
    $user_address = '';
    header("Location:login");
}
if ($user_address != null && $user_address != '') {
    $queryNew = "SELECT * FROM `favourite_videos` INNER JOIN `video_info` ON `favourite_videos`.`video_info_id`=`video_info`.`video_uuid` WHERE `user_id`= '$user_address' ORDER BY `favourite_videos`.`favourite_video_id` DESC LIMIT 10;";
    $resultNew = mysqli_query($con, $queryNew);
    if (mysqli_num_rows($resultNew) > 0) {
        $style_set = 'pt-0 gen-section-padding-2';
    } else {
        $style_set = 'gen-section-padding-2';
    }
} else {
    $style_set = 'gen-section-padding-2';
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- Enter a proper description for the page in the meta description tag -->
    <meta name="description" content="Home to directors, editors, musicians, cinematographers, illustrators, producers, and other geeky, cool, misfits tied together by our one true love—Crypto">

    <!-- Enter a keywords for the page in tag -->
    <meta name="Keywords" content="">

    <!-- Enter Page title -->
    <meta property="og:title" content="Cryptic Entertainments" />

    <!-- Enter Page URL -->
    <meta property="og:url" content="https://platform.crypticentertainments.com" />

    <!-- Enter page description -->
    <meta property="og:description" content="Home to directors, editors, musicians, cinematographers, illustrators, producers, and other geeky, cool, misfits tied together by our one true love—Crypto">

    <!-- Enter Logo image URL for example : http://cryptonite.finstreet.in/images/cryptonitepost.png -->
    <meta property="og:image" itemprop="image" content="https://platform.crypticentertainments.com/images/logo-1.png" />
    <meta property="og:image:secure_url" itemprop="image" content="https://platform.crypticentertainments.com/images/logo-1.png" />
    <meta property="og:image:width" content="600">
    <meta property="og:image:height" content="315">
    <meta property="og:type" content="website" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cryptic Entertainments - Video Streaming Plateform</title>
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
                                                            <a href="more-video?module=<?= $rowCat['module_uuid'] ?>"><?= $rowCat['module'] ?></a>
                                                        </li>
                                                <?php }
                                                } ?>
                                            </ul>
                                        </li>
                                        <li class="menu-item">
                                            <a href="./more-web-series.php" aria-current="page">Web Series</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="gen-header-info-box">
                                <!-- <div class="gen-menu-search-block">
                                    <a href="javascript:void(0)" id="gen-seacrh-btn"><i class="fa fa-search"></i></a>
                                    <div class="gen-search-form">
                                        <form role="search" method="get" class="search-form" action="search">
                                            <label>
                                                <span class="screen-reader-text"></span>
                                                <input type="search" class="search-field" placeholder="Search …" value="" name="query">
                                            </label>
                                            <button type="submit" class="search-submit"><span class="screen-reader-text"></span></button>
                                        </form>
                                    </div>
                                </div> -->
                                <?php
                                if ($user_address !== null && $user_address !== '') {
                                ?>
                                    <div class="gen-account-holder">
                                        <a href="javascript:void(0)" id="gen-user-btn"><i class="fa fa-user"></i></a>
                                        <div class="gen-account-menu">
                                            <ul class="gen-account-menu">
                                                <!-- Pms Menu -->
                                                <li>
                                                    <a href="https://rinkeby.etherscan.io/address/<?= $user_address ?>"><i class="fa fa-user"></i>
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
                                <?php } else { ?>
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
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                                PASSES TABLE
                            </h1>
                        </div>
                        <!-- <div class="gen-breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index-2.html"><i
                                            class="fas fa-home mr-2"></i>Home</a></li>
                                <li class="breadcrumb-item active">Pricing Table</li>
                            </ol>
                        </div> -->
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->

    <!-- Pricing Table Start -->
    <div class="gen-section-padding-3">
        <div class="container container-2">
            <div class="row">
                <div class="col-lg-12">
                    <div class="gen-comparison-table table-style-1 table-responsive">
                        <table class="table table-striped table-bordered" style="margin: auto; width: 90%;">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="cell-inner">
                                        </div>
                                        <div class="cell-tag">
                                            <span></span>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="cell-inner">
                                            <span>Early Access Pass</span>
                                        </div>
                                        <div class="cell-tag">
                                            <span></span>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="cell-inner">
                                            <span>Super Pass</span>
                                        </div>
                                        <div class="cell-tag">
                                            <span></span>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="cell-inner">
                                            <span>Premium Pass</span>
                                        </div>
                                        <div class="cell-tag">
                                            <span></span>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="cell-inner">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cell-inner">
                                            <span>0.1 MATIC</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cell-inner">
                                            <span>0.05 MATIC</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cell-inner">
                                            <span>0.1 MATIC</span>
                                            <!-- <span> / Month</span> -->
                                        </div>
                                    </td>
                                </tr>
                                <!-- <tr>
                                    <td>
                                        <div class="cell-inner">
                                            <span>Number Of Screen</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cell-inner">
                                            <span>1</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cell-inner">
                                            <span>2</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cell-inner">
                                            <span>4</span>
                                        </div>
                                    </td>
                                </tr> -->
                                <!-- <tr>
                                    <td>
                                        <div class="cell-inner">
                                            <span>On how many device you can Download</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cell-inner">
                                            <span>1</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cell-inner">
                                            <span>2</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cell-inner">
                                            <span>4</span>
                                        </div>
                                    </td>
                                </tr> -->
                                <tr>
                                    <td>
                                        <div class="cell-inner">
                                            <span>Free Videos and YouTube Videos Access</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cell-inner">
                                            <i class="far fa-check-circle"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cell-inner">
                                            <i class="far fa-check-circle"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cell-inner">
                                            <i class="far fa-check-circle"></i>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="cell-inner">
                                            <span>Specific Web Series Access</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cell-inner">
                                        <i class="fas fa-times-circle"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cell-inner">
                                            <i class="far fa-check-circle"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cell-inner">
                                            <i class="far fa-check-circle"></i>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="cell-inner">
                                            <span>All Web Series Access</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cell-inner">
                                        <i class="fas fa-times-circle"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cell-inner">
                                        <i class="fas fa-times-circle"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cell-inner">
                                            <i class="far fa-check-circle"></i>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="cell-inner">
                                            <span>watch on mobile and tablet</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cell-inner">
                                            <i class="far fa-check-circle"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cell-inner">
                                            <i class="far fa-check-circle"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cell-inner">
                                            <i class="far fa-check-circle"></i>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="cell-inner">
                                            <span>watch on laptop and tv</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cell-inner">
                                            <i class="far fa-check-circle"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cell-inner">
                                            <i class="far fa-check-circle"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cell-inner">
                                            <i class="far fa-check-circle"></i>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="cell-inner">
                                            <span>HD available</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cell-inner">
                                        <i class="far fa-check-circle"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cell-inner">
                                            <i class="far fa-check-circle"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cell-inner">
                                            <i class="far fa-check-circle"></i>
                                        </div>
                                    </td>
                                </tr>
                                <!-- <tr>
                                    <td>
                                        <div class="cell-inner">
                                            <span>ultra HD available</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cell-inner">
                                            <i class="fas fa-times-circle"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cell-inner">
                                            <i class="far fa-check-circle"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cell-inner">
                                            <i class="far fa-check-circle"></i>
                                        </div>
                                    </td>
                                </tr> -->
                                <tr>
                                    <td>
                                        <div class="cell-inner">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cell-inner">
                                        </div>
                                        <div class="cell-btn-holder">
                                            <div class="gen-btn-container">
                                                <div class="gen-button-block">
                                                    <a class="gen-button" href="https://rarible.com/token/polygon/0xa2d9ded6115b7b7208459450d676f0127418ae7a:35330667205828808645805771972788148449949166894449166732923665699564597280769?tab=owners">
                                                        <span class="text">Subscribe</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cell-inner">
                                        </div>
                                        <div class="cell-btn-holder">
                                            <div class="gen-btn-container">
                                                <div class="gen-button-block">
                                                    <a class="gen-button" href="https://rarible.com/token/polygon/0xa2d9ded6115b7b7208459450d676f0127418ae7a:35330667205828808645805771972788148449949166894449166732923665699564597280771?tab=owners">
                                                        <span class="text">Subscribe</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cell-inner">
                                        </div>
                                        <div class="cell-btn-holder">
                                            <div class="gen-btn-container">
                                                <div class="gen-button-block">
                                                    <a class="gen-button" href="https://rarible.com/token/polygon/0xa2d9ded6115b7b7208459450d676f0127418ae7a:35330667205828808645805771972788148449949166894449166732923665699564597280770?tab=owners">
                                                        <span class="text">Subscribe</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pricing Table End -->

    <!-- footer start -->
    <!-- <footer id="gen-footer">
        <div class="gen-footer-style-1">
            <div class="gen-footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="widget">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <img src="images/logo-1.png" class="gen-footer-logo" alt="gen-footer-logo">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        </p>
                                        <ul class="social-link">
                                            <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#" class="facebook"><i class="fab fa-instagram"></i></a></li>
                                            <li><a href="#" class="facebook"><i class="fab fa-skype"></i></a></li>
                                            <li><a href="#" class="facebook"><i class="fab fa-twitter"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="widget">
                                <h4 class="footer-title">Explore</h4>
                                <div class="menu-explore-container">
                                    <ul class="menu">
                                        <li class="menu-item">
                                            <a href="index-2.html" aria-current="page">Home</a>
                                        </li>
                                        <li class="menu-item"><a href="movies-pagination.html">Movies</a></li>
                                        <li class="menu-item"><a href="tv-shows-pagination.html">Tv Shows</a></li>
                                        <li class="menu-item"><a href="video-pagination.html">Videos</a></li>
                                        <li class="menu-item"><a href="#">Actors</a></li>
                                        <li class="menu-item"><a href="#">Basketball</a></li>
                                        <li class="menu-item"><a href="#">Celebrity</a></li>
                                        <li class="menu-item"><a href="#">Cross</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="widget">
                                <h4 class="footer-title">Company</h4>
                                <div class="menu-about-container">
                                    <ul class="menu">
                                        <li class="menu-item"><a href="contact-us.html">Company</a>
                                        </li>
                                        <li class="menu-item"><a href="contact-us.html">Privacy
                                                Policy</a></li>
                                        <li class="menu-item"><a href="contact-us.html">Terms Of
                                                Use</a></li>
                                        <li class="menu-item"><a href="contact-us.html">Help
                                                Center</a></li>
                                        <li class="menu-item"><a href="contact-us.html">contact us</a></li>
                                        <li class="menu-item"><a href="pricing-style-1.html">Subscribe</a></li>
                                        <li class="menu-item"><a href="#">Our Team</a></li>
                                        <li class="menu-item"><a href="contact-us.html">Faq</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3  col-md-6">
                            <div class="widget">
                                <h4 class="footer-title">Downlaod App</h4>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="gen-copyright-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 align-self-center">
                            <span class="gen-copyright"><a target="_blank" href="#"> Copyright 2022 stremlab All Rights
                                    Reserved.</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer> -->
    <!-- footer End -->

    <!-- footer start -->
    <footer id="gen-footer">
        <div class="gen-footer-style-1">
            <div class="gen-footer-top" style="display: flex; justify-content:space-between;">
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
                                            <li><a href="https://www.instagram.com/crypticentertainments/" class="facebook"><i class="fab fa-instagram"></i></a></li>
                                            <li><a href="https://twitter.com/Cryptic_Media" class="facebook"><i class="fab fa-twitter"></i></a></li>
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
                                                <li class="menu-item"><a href="more-video?module=<?= $rowCat['module_uuid'] ?>"><?= $rowCat['module'] ?></a>
                                                </li>
                                        <?php }
                                        } ?>
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


</body>


<!-- Mirrored from template.gentechtreedesign.com/html/streamlab/red-html/pricing-style-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Nov 2022 10:39:29 GMT -->
</html>