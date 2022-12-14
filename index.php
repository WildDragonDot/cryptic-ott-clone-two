<?php
session_start();
require_once('php/link.php');
$client = 'https://ipfs.fleek.co/ipfs/';
$user_address = '';
$post_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
$super_pass_token_id = '';
$premium_pass = $_SESSION['premiumPass'];
$access_pass = $_SESSION['accessPass'];
$super_pass = $_SESSION['superPass'];

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

    <!-- Hidden Inputs -->
    <input type="hidden" id="user_address" value="<?php echo $user_address; ?>">
    <input type="hidden" name="current_token_id" id="current_token_id">

    <!--=========== Loader =============-->
    <!-- <div id="gen-loading">
      <div id="gen-loading-center">
         <img src="images/logo-1.png" alt="loading">
      </div>
   </div> -->
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
                                <div class="gen-menu-search-block">
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
                                </div>
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
                                                        My Favourite Videos </a>
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

    <!-- owl-carousel Banner Start -->
    <section class="pt-0 pb-0">
        <div class="container-fluid px-0">
            <div class="row no-gutters">
                <div class="col-12">
                    <div class="gen-banner-movies banner-style-2">
                        <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true" data-desk_num="1" data-lap_num="1" data-tab_num="1" data-mob_num="1" data-mob_sm="1" data-autoplay="true" data-loop="true" data-margin="0">
                            <?php
                            $query = "SELECT * FROM `video_info` WHERE 1 ORDER BY `video_view` DESC LIMIT 5";
                            $result = mysqli_query($con, $query);
                            if (mysqli_num_rows($result) > 0) {
                                $i = 1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $thumbnail = $client . $row['thumbnail_ipfs'];
                                    $video_id = $row['video_uuid'];
                                    $chapter_part = $row['video_id'];
                                    $chapter_name = $row['name'];
                                    $chapter_desc = $row['video_desc'];
                                    $chapter_id = $row['video_id'];
                                    $module_name = $row['module'];
                                    $module = $row['module_uuid'];
                                    $from_time = $row['from_time'];
                                    $view = $row['video_view'];
                                    $youtube_trailer = $row['youtube_trailer'];
                                    $date = date_create($from_time);
                                    $published_date = date_format($date, "d M,Y");
                                    if (strlen($chapter_name) > 25) {
                                        $chapter_name = substr($chapter_name, 0, 25) . ' ...';
                                    }
                                    $href = ('single-movie?course=' . $video_id . '&module=' . $module_name)
                            ?>
                                    <div class="item" style="background: url(<?= $thumbnail ?>)" key='<?= $i ?>'>
                                        <div class="gen-movie-contain-style-2 h-100">
                                            <div class="container h-100">
                                                <div class="row flex-row-reverse align-items-center h-100">
                                                    <div class="col-xl-6">
                                                        <div class="gen-front-image">
                                                            <img src='<?= $thumbnail ?>' alt="owl-carousel-banner-image">
                                                            <a href="<?= $youtube_trailer ?>" class="playBut popup-youtube popup-vimeo popup-gmaps">
                                                                <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In  -->
                                                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="213.7px" height="213.7px" viewBox="0 0 213.7 213.7" enable-background="new 0 0 213.7 213.7" xml:space="preserve">
                                                                    <polygon class="triangle" id="XMLID_17_" fill="none" stroke-width="7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="
                                                            73.5,62.5 148.5,105.8 73.5,149.1 "></polygon>
                                                                    <circle class="circle" id="XMLID_18_" fill="none" stroke-width="7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" cx="106.8" cy="106.8" r="103.3">
                                                                    </circle>
                                                                </svg>
                                                                <span>Watch Trailer</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <div class="gen-tag-line"><span>Most Viewed</span></div>
                                                        <div class="gen-movie-info">
                                                            <h3><?= $chapter_name ?></h3>
                                                        </div>
                                                        <div class="gen-movie-meta-holder">
                                                            <ul class="gen-meta-after-title">
                                                                <li class="gen-sen-rating">
                                                                    <span><?= $module_name ?></span>
                                                                </li>
                                                                <li> <img src="images/asset-2.png" alt="rating-image">
                                                                    <span><?= $view ?></span>
                                                                </li>
                                                            </ul>
                                                            <p><?= $chapter_desc ?></p>
                                                            <div class="gen-meta-info">
                                                                <ul class="gen-meta-after-excerpt">
                                                                    <li>
                                                                        <strong>Language :</strong>
                                                                        Hindi,English
                                                                    </li>
                                                                    <li>
                                                                        <strong>Audio Languages :</strong>
                                                                        Hindi
                                                                    </li>
                                                                    <li>
                                                                        <strong>Genre :</strong>
                                                                        <span>
                                                                            <a href="more-video?module=<?= $module ?>">
                                                                                <?= $module_name ?></a>
                                                                        </span>
                                                                    </li>
                                                                    <li>
                                                                        <strong>Release Date :</strong>
                                                                        <span>
                                                                            <a href="#">
                                                                                <?= $published_date ?></a>
                                                                        </span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="gen-movie-action">
                                                            <div class="gen-btn-container">
                                                                <?php
                                                                if ($access_pass != "" || $premium_pass != "") {
                                                                ?>
                                                                    <a href="single-movie?course=<?= $video_id ?>&module=<?= $module ?>" class="gen-button .gen-button-dark">
                                                                        <i aria-hidden="true" class="fas fa-play"></i> <span class="text">Play Now</span>
                                                                    </a>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <button class="gen-button
                                                                    .gen-button-dark" onclick="CheckForAccessPass()">
                                                                        <i aria-hidden="true" class="fas fa-play"></i> <span class="text">Play Now</span>
                                                                    </button>
                                                                <?php
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                    $i = $i + 1;
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- owl-carousel Banner End -->

    <!-- owl-carousel Videos Section-1 Start -->
    <?php
    if ($user_address != null && $user_address != '') {
        $query = "SELECT * FROM `favourite_videos` INNER JOIN `video_info` ON `favourite_videos`.`video_info_id`=`video_info`.`video_uuid` WHERE `user_id`= '$user_address' ORDER BY `favourite_videos`.`favourite_video_id` DESC LIMIT 10;";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) > 0) {
            $i = 1;
    ?>
            <section class="gen-section-padding-2" style="padding-top: 40px;">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <h4 class="gen-heading-title">Favourite Videos</h4>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 d-none d-md-inline-block">
                            <div class="gen-movie-action">
                                <div class="gen-btn-container text-right">
                                    <a href="favourite-videos" class="gen-button gen-button-flat">
                                        <span class="text">More Videos</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="gen-style-2">
                                <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true" data-desk_num="4" data-lap_num="3" data-tab_num="2" data-mob_num="1" data-mob_sm="1" data-autoplay="false" data-loop="false" data-margin="30">
                                    <?php
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $thumbnail = $client . $row['thumbnail_ipfs'];
                                        $video_id = $row['video_uuid'];
                                        $chapter_part = $row['video_id'];
                                        $chapter_name = $row['name'];
                                        $chapter_id = $row['video_id'];
                                        $module_name = $row['module'];
                                        $video_uuid = $row['video_uuid'];
                                        $from_time = $row['from_time'];
                                        $date = date_create($from_time);
                                        $published_date = date_format($date, "d M,Y");
                                    ?>
                                        <div class="item">
                                            <div class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action movie_genre-adventure movie_genre-drama">
                                                <div class="gen-carousel-movies-style-2 movie-grid style-2">
                                                    <div class="gen-movie-contain">
                                                        <div class="gen-movie-img">
                                                            <img src="<?= $thumbnail ?>" alt="owl-carousel-video-image">
                                                            <div class="gen-movie-add">
                                                                <div class="wpulike wpulike-heart">
                                                                    <div class="wp_ulike_general_class wp_ulike_is_not_liked">
                                                                        <button type="button" class="wp_ulike_btn wp_ulike_put_image" onclick="removeVid('<?= $user_address ?>','<?= $video_uuid ?>')"></button>
                                                                    </div>
                                                                </div>
                                                                <ul class="menu bottomRight">
                                                                    <li class="share top">
                                                                        <i class="fa fa-share-alt"></i>
                                                                        <ul class="submenu">
                                                                            <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?= $post_link; ?>/single-movie?course=<?= $video_id ?>&module=<?= $module ?>&t=<?= $chapter_name;  ?>" class="facebook" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Facebook"><i class="fab fa-facebook-f"></i></a>
                                                                            </li>
                                                                    </li>
                                                                    <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= $post_link; ?>/single-movie?course=<?= $video_id ?>&module=<?= $module ?>&t=<?= $chapter_name;  ?>" class="facebook" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Linkedin"><i class="fab fa-linkedin"></i></a>
                                                                    </li>
                                                                    </li>
                                                                    <li><a href="https://twitter.com/share?url=<?= $post_link; ?>/single-movie?course=<?= $video_id ?>&module=<?= $module ?>&text=<?= $chapter_name;  ?>" class="facebook" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Twitter"><i class="fab fa-twitter"></i></a></li>
                                                                </ul>
                                                                </li>
                                                                </ul>

                                                            </div>
                                                            <?php
                                                            if ($access_pass != "" || $premium_pass != "") {
                                                            ?>
                                                                <div class="gen-movie-action">
                                                                    <a href="single-movie?course=<?= $video_id ?>&module=<?= $module ?>" class="gen-button">
                                                                        <i class="fa fa-play"></i>
                                                                    </a>
                                                                </div>
                                                        </div>
                                                        <div class="gen-info-contain">
                                                            <div class="gen-movie-info">
                                                                <h3><a href="single-movie?course=<?= $video_id ?>&module=<?= $module ?>"><?= $chapter_name ?></a>
                                                                </h3>
                                                            </div>
                                                        <?php
                                                            } else {
                                                        ?>
                                                            <div class="gen-movie-action">
                                                                <button class="gen-button" onclick="CheckForAccessPass()">
                                                                    <i class="fa fa-play"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="gen-info-contain">
                                                            <div class="gen-movie-info">
                                                                <h3><a onclick="CheckForAccessPass()"><?= $chapter_name ?></a>
                                                                </h3>
                                                            </div>
                                                        <?php
                                                            }
                                                        ?>
                                                        <div class="gen-movie-meta-holder">
                                                            <ul>
                                                                <li><?= $published_date ?></li>
                                                                <li>
                                                                    <a href="more-video?module=<?= $module ?>"><span><?= $module_name ?></span></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- #post-## -->
                                        </div>
                                    <?php
                                        $i = $i + 1;
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    <?php }
    } ?>
    <!-- owl-carousel Videos Section-1 End -->
    <!-- owl-carousel Videos Section-1 Start -->
    <?php
    if ($user_address != null && $user_address != '') {
        $query = "SELECT * FROM `favourite_webseries` INNER JOIN `web_series_info` ON `favourite_webseries`.`webseries_info_id`=`web_series_info`.`web_series_uuid` WHERE `user_id`= '$user_address' ORDER BY `favourite_webseries`.`favourite_webseries_id` DESC LIMIT 10;";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) > 0) {
            $i = 1;
    ?>
            <section class="gen-section-padding-2" style="padding-top: 0px;">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <h4 class="gen-heading-title">Favourite WebSeries</h4>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 d-none d-md-inline-block">
                            <div class="gen-movie-action">
                                <div class="gen-btn-container text-right">
                                    <a href="favourite-webseries" class="gen-button gen-button-flat">
                                        <span class="text">More WebSeries</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="gen-style-2">
                                <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true" data-desk_num="4" data-lap_num="3" data-tab_num="2" data-mob_num="1" data-mob_sm="1" data-autoplay="false" data-loop="false" data-margin="30">
                                    <?php
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $id = $row['web_series_id'];
                                        $thumbnail = $client . $row['web_series_thumb'];
                                        $chapter_name = $row['name_of_web_series'];
                                        $module_name = $row['module'];
                                        $web_series_module = $row['module_uuid'];
                                        $video_uuid = $row['web_series_uuid'];
                                        $token_id = $row['token_id'];
                                        $subscription_type = $row['subscription_type'];
                                        $from_time = $row['from_time'];
                                        $date = date_create($from_time);
                                        $published_date = date_format($date, "d M, Y");
                                    ?>
                                        <div class="item">
                                            <div class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action movie_genre-adventure movie_genre-drama">
                                                <div class="gen-carousel-movies-style-2 movie-grid style-2">
                                                    <div class="gen-movie-contain">
                                                        <div class="gen-movie-img">
                                                            <img src="<?= $thumbnail ?>" alt="owl-carousel-video-image">
                                                            <div class="gen-movie-add">
                                                                <div class="wpulike wpulike-heart">
                                                                    <div class="wp_ulike_general_class wp_ulike_is_not_liked">
                                                                        <button type="button" class="wp_ulike_btn wp_ulike_put_image" onclick="removeWebSeries('<?= $user_address ?>','<?= $video_uuid ?>')"></button>
                                                                    </div>
                                                                </div>
                                                                <ul class="menu bottomRight">
                                                                    <li class="share top">
                                                                        <i class="fa fa-share-alt"></i>
                                                                        <ul class="submenu">
                                                                            <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?= $post_link; ?>/single-movie?course=<?= $video_id ?>&module=<?= $module ?>&t=<?= $chapter_name;  ?>" class="facebook" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Facebook"><i class="fab fa-facebook-f"></i></a>
                                                                            </li>
                                                                    </li>
                                                                    <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= $post_link; ?>/single-movie?course=<?= $video_id ?>&module=<?= $module ?>&t=<?= $chapter_name;  ?>" class="facebook" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Linkedin"><i class="fab fa-linkedin"></i></a>
                                                                    </li>
                                                                    </li>
                                                                    <li><a href="https://twitter.com/share?url=<?= $post_link; ?>/single-movie?course=<?= $video_id ?>&module=<?= $module ?>&text=<?= $chapter_name;  ?>" class="facebook" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Twitter"><i class="fab fa-twitter"></i></a></li>
                                                                </ul>
                                                                </li>
                                                                </ul>

                                                            </div>
                                                            <?php
                                                            if ($premium_pass == "verified_premium_pass") {
                                                            ?>
                                                                <div class="gen-movie-action">
                                                                    <a href="web-series-episodes?video_uuid=<?= $video_uuid ?>" class="gen-button">
                                                                        <i class="fa fa-play"></i>
                                                                    </a>
                                                                </div>
                                                        </div>
                                                        <div class="gen-info-contain">
                                                            <div class="gen-movie-info">
                                                                <h3><a href="web-series-episodes?video_uuid=<?= $video_uuid ?>"><?= $chapter_name ?></a>
                                                                </h3>
                                                            </div>
                                                        <?php
                                                            } else if (empty($_SESSION['superPass'])) {
                                                        ?>
                                                            <div class="gen-movie-action">
                                                                <button class="gen-button" id="token_id<?= $id ?>" onclick="fun2(this.id)">
                                                                    <input type="hidden" name="token_id<?= $id ?>" id="htoken_id<?= $id ?>" value="<?= $token_id ?>">
                                                                    <input type="hidden" name="nametoken_id<?= $id ?>" id="nametoken_id<?= $id ?>" value="<?= $chapter_name ?>">
                                                                    <input type="hidden" name="video_uuidtoken_id<?= $id ?>" id="video_uuidtoken_id<?= $id ?>" value="<?= $video_uuid ?>">
                                                                    <i class="fa fa-play"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="gen-info-contain">
                                                            <div class="gen-movie-info">
                                                                <h3><span><?= $chapter_name ?></span>
                                                                </h3>
                                                            </div>
                                                            <?php
                                                            } else {
                                                                if (in_array($chapter_name, $_SESSION['superPass'])) {
                                                            ?>
                                                                <div class="gen-movie-action">
                                                                    <a href="web-series-episodes?video_uuid=<?= $video_uuid ?>" class="gen-button">
                                                                        <i class="fa fa-play"></i>
                                                                    </a>
                                                                </div>
                                                        </div>
                                                        <div class="gen-info-contain">
                                                            <div class="gen-movie-info">
                                                                <h3><a href="web-series-episodes?video_uuid=<?= $video_uuid ?>"><?= $chapter_name ?></a>
                                                                </h3>
                                                            </div>
                                                        <?php
                                                                } else {
                                                        ?>
                                                            <div class="gen-movie-action">
                                                                <button class="gen-button" id="token_id<?= $id ?>" onclick="fun(this.id)">
                                                                    <input type="hidden" name="token_id<?= $id ?>" id="htoken_id<?= $id ?>" value="<?= $token_id ?>">
                                                                    <input type="hidden" name="nametoken_id<?= $id ?>" id="nametoken_id<?= $id ?>" value="<?= $chapter_name ?>">
                                                                    <input type="hidden" name="video_uuidtoken_id<?= $id ?>" id="video_uuidtoken_id<?= $id ?>" value="<?= $video_uuid ?>">
                                                                    <i class="fa fa-play"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="gen-info-contain">
                                                            <div class="gen-movie-info">
                                                                <h3><span><?= $chapter_name ?></span>
                                                                </h3>
                                                            </div>
                                                    <?php
                                                                }
                                                            }
                                                    ?>
                                                    <div class="gen-movie-meta-holder">
                                                        <ul>
                                                            <li><?= $published_date ?></li>
                                                            <li>
                                                                <a href="more-web-series?module=<?= $module ?>"><span><?= $module_name ?></span></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- #post-## -->
                                        </div>
                                    <?php
                                        $i = $i + 1;
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    <?php }
    } ?>
    <!-- owl-carousel Videos Section-1 End -->
    <!-- owl-carousel Videos Section-1 Start -->
    <section class="<?= $style_set ?>">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <h4 class="gen-heading-title">Recently Added</h4>
                </div>
                <!-- <div class="col-xl-6 col-lg-6 col-md-6 d-none d-md-inline-block">
                    <div class="gen-movie-action">
                        <div class="gen-btn-container text-right">
                            <a href="more-video?module=<?= $module ?>" class="gen-button gen-button-flat">
                                <span class="text">More Videos</span>
                            </a>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <div class="gen-style-2">
                        <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true" data-desk_num="4" data-lap_num="3" data-tab_num="2" data-mob_num="1" data-mob_sm="1" data-autoplay="false" data-loop="false" data-margin="30">
                            <?php
                            $query = "SELECT * FROM `video_info` WHERE 1 ORDER BY `video_id` DESC LIMIT 10";
                            $result = mysqli_query($con, $query);
                            if (mysqli_num_rows($result) > 0) {
                                $i = 1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $thumbnail = $client . $row['thumbnail_ipfs'];
                                    $video_id = $row['video_uuid'];
                                    $chapter_part = $row['video_id'];
                                    $chapter_name = $row['name'];
                                    $chapter_id = $row['video_id'];
                                    $module_name = $row['module'];
                                    $module = $row['module_uuid'];
                                    $video_uuid = $row['video_uuid'];
                                    $from_time = $row['from_time'];
                                    $date = date_create($from_time);
                                    $published_date = date_format($date, "d M,Y");
                            ?>
                                    <div class="item">
                                        <div class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action movie_genre-adventure movie_genre-drama">
                                            <div class="gen-carousel-movies-style-2 movie-grid style-2">
                                                <div class="gen-movie-contain">
                                                    <div class="gen-movie-img">
                                                        <img src="<?= $thumbnail ?>" alt="owl-carousel-video-image">
                                                        <div class="gen-movie-add">
                                                            <div class="wpulike wpulike-heart">
                                                                <div class="wp_ulike_general_class wp_ulike_is_not_liked">
                                                                    <button type="button" class="wp_ulike_btn wp_ulike_put_image" onclick="addFavourite('<?= $video_uuid ?>','<?= $user_address ?>')"></button>
                                                                </div>
                                                            </div>
                                                            <ul class="menu bottomRight">
                                                                <li class="share top">
                                                                    <i class="fa fa-share-alt"></i>
                                                                    <ul class="submenu">
                                                                        <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?= $post_link; ?>/single-movie?course=<?= $video_id ?>&module=<?= $module ?>&t=<?= $chapter_name;  ?>" class="facebook" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Facebook"><i class="fab fa-facebook-f"></i></a>
                                                                        </li>
                                                                </li>
                                                                <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= $post_link; ?>/single-movie?course=<?= $video_id ?>&module=<?= $module ?>&t=<?= $chapter_name;  ?>" class="facebook" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Linkedin"><i class="fab fa-linkedin"></i></a>
                                                                </li>
                                                                </li>
                                                                <li><a href="https://twitter.com/share?url=<?= $post_link; ?>/single-movie?course=<?= $video_id ?>&module=<?= $module ?>&text=<?= $chapter_name;  ?>" class="facebook" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Twitter"><i class="fab fa-twitter"></i></a></li>
                                                            </ul>
                                                            </li>
                                                            </ul>
                                                        </div>
                                                        <?php
                                                        if ($access_pass != "" || $premium_pass != "") {
                                                        ?>
                                                            <div class="gen-movie-action">
                                                                <a href="single-movie?course=<?= $video_id ?>&module=<?= $module ?>" class="gen-button">
                                                                    <i class="fa fa-play"></i>
                                                                </a>
                                                            </div>
                                                    </div>
                                                    <div class="gen-info-contain">
                                                        <div class="gen-movie-info">
                                                            <h3><a href="single-movie?course=<?= $video_id ?>&module=<?= $module ?>"><?= $chapter_name ?></a>
                                                            </h3>
                                                        </div>
                                                    <?php
                                                        } else {
                                                    ?>
                                                        <div class="gen-movie-action">
                                                            <button class="gen-button" onclick="CheckForAccessPass()">
                                                                <i class="fa fa-play"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="gen-info-contain">
                                                        <div class="gen-movie-info">
                                                            <h3><a onclick="CheckForAccessPass()"><?= $chapter_name ?></a>
                                                            </h3>
                                                        </div>
                                                    <?php
                                                        }
                                                    ?>
                                                    <div class="gen-movie-meta-holder">
                                                        <ul>
                                                            <li><?= $published_date ?></li>
                                                            <li>
                                                                <a href="more-video?module=<?= $module ?>"><span><?= $module_name ?></span></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- #post-## -->
                                    </div>
                            <?php
                                    $i = $i + 1;
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- owl-carousel Videos Section-1 End -->

    <!-- owl-carousel Videos Section-2 Start -->
    <section class="pt-0 gen-section-padding-2">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <h4 class="gen-heading-title">Music Videos</h4>
                </div>
                <?php
                $query = "SELECT module_uuid FROM `video_info` WHERE `module`='Music'";
                $result = mysqli_query($con, $query);
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $module = $row['module_uuid'];
                ?>
                    <div class="col-xl-6 col-lg-6 col-md-6 d-none d-md-inline-block">
                        <div class="gen-movie-action">
                            <div class="gen-btn-container text-right">
                                <a href="more-video?module=<?= $module ?>" class="gen-button gen-button-flat">
                                    <span class="text">More Videos</span>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <div class="gen-style-2">
                        <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true" data-desk_num="4" data-lap_num="3" data-tab_num="2" data-mob_num="1" data-mob_sm="1" data-autoplay="false" data-loop="false" data-margin="30">
                            <?php
                            $query = "SELECT * FROM `video_info` WHERE `module`= 'Music' LIMIT 10";
                            $result = mysqli_query($con, $query);
                            if (mysqli_num_rows($result) > 0) {
                                $i = 1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $thumbnail = $client . $row['thumbnail_ipfs'];
                                    $video_id = $row['video_uuid'];
                                    $chapter_part = $row['video_id'];
                                    $chapter_name = $row['name'];
                                    $chapter_id = $row['video_id'];
                                    $module_name = $row['module'];
                                    $module = $row['module_uuid'];
                                    $video_uuid = $row['video_uuid'];
                                    $from_time = $row['from_time'];
                                    $date = date_create($from_time);
                                    $published_date = date_format($date, "d M,Y");
                            ?>
                                    <div class="item">
                                        <div class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action movie_genre-adventure movie_genre-drama">
                                            <div class="gen-carousel-movies-style-2 movie-grid style-2">
                                                <div class="gen-movie-contain">
                                                    <div class="gen-movie-img">
                                                        <img src="<?= $thumbnail ?>" alt="owl-carousel-video-image">
                                                        <div class="gen-movie-add">
                                                            <div class="wpulike wpulike-heart">
                                                                <div class="wp_ulike_general_class wp_ulike_is_not_liked">
                                                                    <button type="button" class="wp_ulike_btn wp_ulike_put_image" onclick="addFavourite('<?= $video_uuid ?>','<?= $user_address ?>')"></button>
                                                                </div>
                                                            </div>
                                                            <ul class="menu bottomRight">
                                                                <li class="share top">
                                                                    <i class="fa fa-share-alt"></i>
                                                                    <ul class="submenu">
                                                                        <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?= $post_link; ?>/single-movie?course=<?= $video_id ?>&module=<?= $module ?>&t=<?= $chapter_name;  ?>" class="facebook" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Facebook"><i class="fab fa-facebook-f"></i></a>
                                                                        </li>
                                                                </li>
                                                                <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= $post_link; ?>/single-movie?course=<?= $video_id ?>&module=<?= $module ?>&t=<?= $chapter_name;  ?>" class="facebook" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Linkedin"><i class="fab fa-linkedin"></i></a>
                                                                </li>
                                                                </li>
                                                                <li><a href="https://twitter.com/share?url=<?= $post_link; ?>/single-movie?course=<?= $video_id ?>&module=<?= $module ?>&text=<?= $chapter_name;  ?>" class="facebook" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Twitter"><i class="fab fa-twitter"></i></a></li>
                                                            </ul>
                                                            </li>
                                                            </ul>

                                                        </div>
                                                        <?php
                                                        if ($access_pass != "" || $premium_pass != "") {
                                                        ?>
                                                            <div class="gen-movie-action">
                                                                <a href="single-movie?course=<?= $video_id ?>&module=<?= $module ?>" class="gen-button">
                                                                    <i class="fa fa-play"></i>
                                                                </a>
                                                            </div>
                                                    </div>
                                                    <div class="gen-info-contain">
                                                        <div class="gen-movie-info">
                                                            <h3><a href="single-movie?course=<?= $video_id ?>&module=<?= $module ?>"><?= $chapter_name ?></a>
                                                            </h3>
                                                        </div>
                                                    <?php
                                                        } else {
                                                    ?>
                                                        <div class="gen-movie-action">
                                                            <button class="gen-button" onclick="CheckForAccessPass()">
                                                                <i class="fa fa-play"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="gen-info-contain">
                                                        <div class="gen-movie-info">
                                                            <h3><a onclick="CheckForAccessPass()"><?= $chapter_name ?></a>
                                                            </h3>
                                                        </div>
                                                    <?php
                                                        }
                                                    ?>
                                                    <div class="gen-movie-meta-holder">
                                                        <ul>
                                                            <li><?= $published_date ?></li>
                                                            <li>
                                                                <a href="more-video?module=<?= $module ?>"><span><?= $module_name ?></span></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                    $i = $i + 1;
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- owl-carousel Videos Section-2 End -->

    <!-- Slick Slider start -->
    <section class="gen-section-padding-2 pt-0 pb-0">
        <div class="container">
            <div class="home-singal-silder">
                <div class="gen-nav-movies gen-banner-movies">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="slider slider-for">
                                <!-- Slider Items -->
                                <?php
                                $query = "SELECT * FROM `video_info` WHERE 1 ORDER BY `video_id` DESC LIMIT 6";
                                $result = mysqli_query($con, $query);
                                if (mysqli_num_rows($result) > 0) {
                                    $i = 1;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $thumbnail = $client . $row['thumbnail_ipfs'];
                                        $video_id = $row['video_uuid'];
                                        $chapter_part = $row['video_id'];
                                        $chapter_desc = $row['video_desc'];
                                        $chapter_name = $row['name'];
                                        $chapter_id = $row['video_id'];
                                        $module_name = $row['module'];
                                        $module = $row['module_uuid'];
                                        $date = $row['from_time'];
                                        $date = substr($date, 0, 17);
                                        if (strlen($chapter_name) > 35) {
                                            $chapter_name = substr($chapter_name, 0, 35) . ' ...';
                                        }
                                ?>
                                        <div class="slider-item" style="background: url('<?= $thumbnail ?>')">
                                            <div class="gen-slick-slider h-100">
                                                <div class="gen-movie-contain h-100">
                                                    <div class="container h-100">
                                                        <div class="row align-items-center h-100">
                                                            <div class="col-lg-6">
                                                                <div class="gen-movie-info">
                                                                    <h3><?= $chapter_name ?></h3>
                                                                    <p><?= $chapter_desc ?>
                                                                    </p>

                                                                </div>
                                                                <div class="gen-movie-action">
                                                                    <div class="gen-btn-container button-1">
                                                                        <?php
                                                                        if ($access_pass != "" || $premium_pass != "") {
                                                                        ?>
                                                                            <a href="single-movie?course=<?= $video_id ?>&module=<?= $module ?>" class="gen-button .gen-button-dark">
                                                                                <i aria-hidden="true" class="fas fa-play"></i> <span class="text">Play Now</span>
                                                                            </a>
                                                                        <?php
                                                                        } else {
                                                                        ?>
                                                                            <button class="gen-button
                                                                    .gen-button-dark" onclick="CheckForAccessPass()">
                                                                                <i aria-hidden="true" class="fas fa-play"></i> <span class="text">Play Now</span>
                                                                            </button>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php }
                                } ?>

                                <!-- Slider Items -->
                            </div>
                            <div class="slider slider-nav">
                                <?php
                                $query = "SELECT * FROM `video_info` WHERE 1 ORDER BY `video_id` DESC LIMIT 6";
                                $result = mysqli_query($con, $query);
                                if (mysqli_num_rows($result) > 0) {
                                    $i = 1;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $thumbnail = $client . $row['thumbnail_ipfs'];
                                        $chapter_name = $row['name'];
                                ?>
                                        <div class="slider-nav-contain">
                                            <div class="gen-nav-img">
                                                <img src="<?= $thumbnail ?>" alt="steamlab-image">
                                            </div>
                                            <div class="movie-info">
                                                <h3><?= $chapter_name ?></h3>
                                                <div class="gen-movie-meta-holder">
                                                    <ul>
                                                        <li><?= $published_date ?></li>
                                                        <li>
                                                            <a href="more-video?module=<?= $module ?>">
                                                                <?= $module_name ?> </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                <?php }
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Slick Slider End -->

    <!-- owl-carousel Videos Section-3 Start -->
    <section class="gen-section-padding-2">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <h4 class="gen-heading-title">Teasers </h4>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 d-none d-md-inline-block">
                    <div class="gen-movie-action">
                        <div class="gen-btn-container text-right">
                            <a href="more-video?module=<?= $module ?>" class="gen-button gen-button-flat">
                                <span class="text">More Videos</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <div class="gen-style-2">
                        <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true" data-desk_num="4" data-lap_num="3" data-tab_num="2" data-mob_num="1" data-mob_sm="1" data-autoplay="false" data-loop="false" data-margin="30">
                            <?php
                            $query = "SELECT * FROM `video_info` WHERE `module`= 'Teasers' LIMIT 10";
                            $result = mysqli_query($con, $query);
                            if (mysqli_num_rows($result) > 0) {
                                $i = 1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $thumbnail = $client . $row['thumbnail_ipfs'];
                                    $video_id = $row['video_uuid'];
                                    $chapter_part = $row['video_id'];
                                    $chapter_name = $row['name'];
                                    $chapter_id = $row['video_id'];
                                    $module_name = $row['module'];
                                    $module = $row['module_uuid'];
                                    $video_uuid = $row['video_uuid'];
                                    $from_time = $row['from_time'];
                                    $date = date_create($from_time);
                                    $published_date = date_format($date, "d M,Y");
                            ?>

                                    <div class="item">
                                        <div class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action movie_genre-adventure movie_genre-drama">
                                            <div class="gen-carousel-movies-style-2 movie-grid style-2">
                                                <div class="gen-movie-contain">
                                                    <div class="gen-movie-img">
                                                        <img src="<?= $thumbnail ?>" alt="owl-carousel-video-images">
                                                        <div class="gen-movie-add">
                                                            <div class="wpulike wpulike-heart">
                                                                <div class="wp_ulike_general_class wp_ulike_is_not_liked">
                                                                    <button type="button" class="wp_ulike_btn wp_ulike_put_image" onclick="addFavourite('<?= $video_uuid ?>','<?= $user_address ?>')"></button>
                                                                </div>
                                                            </div>
                                                            <ul class="menu bottomRight">
                                                                <li class="share top">
                                                                    <i class="fa fa-share-alt"></i>
                                                                    <ul class="submenu">
                                                                        <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?= $post_link; ?>/single-movie?course=<?= $video_id ?>&module=<?= $module ?>&t=<?= $chapter_name;  ?>" class="facebook" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Facebook"><i class="fab fa-facebook-f"></i></a>
                                                                        </li>
                                                                </li>
                                                                <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= $post_link; ?>/single-movie?course=<?= $video_id ?>&module=<?= $module ?>&t=<?= $chapter_name;  ?>" class="facebook" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Linkedin"><i class="fab fa-linkedin"></i></a>
                                                                </li>
                                                                </li>
                                                                <li><a href="https://twitter.com/share?url=<?= $post_link; ?>/single-movie?course=<?= $video_id ?>&module=<?= $module ?>&text=<?= $chapter_name;  ?>" class="facebook" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Twitter"><i class="fab fa-twitter"></i></a></li>
                                                            </ul>
                                                            </li>
                                                            </ul>

                                                        </div>
                                                        <?php
                                                        if ($access_pass != "" || $premium_pass != "") {
                                                        ?>
                                                            <div class="gen-movie-action">
                                                                <a href="single-movie?course=<?= $video_id ?>&module=<?= $module ?>" class="gen-button">
                                                                    <i class="fa fa-play"></i>
                                                                </a>
                                                            </div>
                                                    </div>
                                                    <div class="gen-info-contain">
                                                        <div class="gen-movie-info">
                                                            <h3><a href="single-movie?course=<?= $video_id ?>&module=<?= $module ?>"><?= $chapter_name ?></a>
                                                            </h3>
                                                        </div>
                                                    <?php
                                                        } else {
                                                    ?>
                                                        <div class="gen-movie-action">
                                                            <button class="gen-button" onclick="CheckForAccessPass()">
                                                                <i class="fa fa-play"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="gen-info-contain">
                                                        <div class="gen-movie-info">
                                                            <h3><a onclick="CheckForAccessPass()"><?= $chapter_name ?></a>
                                                            </h3>
                                                        </div>
                                                    <?php
                                                        }
                                                    ?>
                                                    <div class="gen-movie-meta-holder">
                                                        <ul>
                                                            <li><?= $published_date ?></li>
                                                            <li>
                                                                <a href="more-video?module=<?= $module ?>"><span><?= $module_name ?></span></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- #post-## -->
                                    </div>
                            <?php
                                    $i = $i + 1;
                                }
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- owl-carousel Videos Section-3 End -->
    <!-- owl-carousel Videos Section-4 Start -->
    <section class="gen-section-padding-2" style="padding: 10px 0px 60px 0px;">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <h4 class="gen-heading-title">Web Series </h4>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 d-none d-md-inline-block">
                    <div class="gen-movie-action">
                        <div class="gen-btn-container text-right">
                            <a href="more-web-series.php" class="gen-button gen-button-flat">
                                <span class="text">More Web Series</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <div class="gen-style-2">
                        <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true" data-desk_num="4" data-lap_num="3" data-tab_num="2" data-mob_num="1" data-mob_sm="1" data-autoplay="false" data-loop="false" data-margin="30">
                            <?php
                            $query = "SELECT * FROM `web_series_info` LIMIT 10";
                            $result = mysqli_query($con, $query);
                            if (mysqli_num_rows($result) > 0) {
                                $i = 1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row['web_series_id'];
                                    $thumbnail = $client . $row['web_series_thumb'];
                                    $chapter_name = $row['name_of_web_series'];
                                    $module_name = $row['module'];
                                    $web_series_module = $row['module_uuid'];
                                    $video_uuid = $row['web_series_uuid'];
                                    $token_id = $row['token_id'];
                                    $subscription_type = $row['subscription_type'];
                                    $from_time = $row['from_time'];
                                    $date = date_create($from_time);
                                    $published_date = date_format($date, "d M, Y");

                            ?>
                                    <div class="item">
                                        <div class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action movie_genre-adventure movie_genre-drama">
                                            <div class="gen-carousel-movies-style-2 movie-grid style-2">
                                                <div class="gen-movie-contain">
                                                    <div class="gen-movie-img">
                                                        <img src="<?= $thumbnail ?>" alt="owl-carousel-video-images">
                                                        <div class="gen-movie-add">
                                                            <div class="wpulike wpulike-heart">
                                                                <div class="wp_ulike_general_class wp_ulike_is_not_liked">
                                                                    <button type="button" class="wp_ulike_btn wp_ulike_put_image" onclick="addFavouriteWebseries('<?= $video_uuid ?>','<?= $user_address ?>')"></button>
                                                                </div>
                                                            </div>
                                                            <ul class="menu bottomRight">
                                                                <li class="share top">
                                                                    <i class="fa fa-share-alt"></i>
                                                                    <ul class="submenu">
                                                                        <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?= $post_link; ?>/single-movie?course=<?= $video_id ?>&module=<?= $module ?>&t=<?= $chapter_name;  ?>" class="facebook" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Facebook"><i class="fab fa-facebook-f"></i></a>
                                                                        </li>
                                                                </li>
                                                                <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= $post_link; ?>/single-movie?course=<?= $video_id ?>&module=<?= $module ?>&t=<?= $chapter_name;  ?>" class="facebook" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Linkedin"><i class="fab fa-linkedin"></i></a>
                                                                </li>
                                                                </li>
                                                                <li><a href="https://twitter.com/share?url=<?= $post_link; ?>/single-movie?course=<?= $video_id ?>&module=<?= $module ?>&text=<?= $chapter_name;  ?>" class="facebook" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Twitter"><i class="fab fa-twitter"></i></a></li>
                                                            </ul>
                                                            </li>
                                                            </ul>

                                                        </div>
                                                        <?php
                                                        if ($premium_pass == "verified_premium_pass") {
                                                        ?>
                                                            <div class="gen-movie-action">
                                                                <a href="web-series-episodes?video_uuid=<?= $video_uuid ?>" class="gen-button">
                                                                    <i class="fa fa-play"></i>
                                                                </a>
                                                            </div>
                                                    </div>
                                                    <div class="gen-info-contain">
                                                        <div class="gen-movie-info">
                                                            <h3><a href="web-series-episodes?video_uuid=<?= $video_uuid ?>"><?= $chapter_name ?></a>
                                                            </h3>
                                                        </div>
                                                    <?php
                                                        } else if (empty($_SESSION['superPass'])) {
                                                    ?>
                                                        <div class="gen-movie-action">
                                                            <button class="gen-button" id="token_id<?= $id ?>" onclick="fun(this.id)">
                                                                <input type="hidden" name="token_id<?= $id ?>" id="htoken_id<?= $id ?>" value="<?= $token_id ?>">
                                                                <input type="hidden" name="nametoken_id<?= $id ?>" id="nametoken_id<?= $id ?>" value="<?= $chapter_name ?>">
                                                                <input type="hidden" name="video_uuidtoken_id<?= $id ?>" id="video_uuidtoken_id<?= $id ?>" value="<?= $video_uuid ?>">
                                                                <i class="fa fa-play"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="gen-info-contain">
                                                        <div class="gen-movie-info">
                                                            <h3><span><?= $chapter_name ?></span>
                                                            </h3>
                                                        </div>
                                                        <?php
                                                        } else {
                                                            if (in_array($chapter_name, $_SESSION['superPass'])) {
                                                        ?>
                                                            <div class="gen-movie-action">
                                                                <a href="web-series-episodes?video_uuid=<?= $video_uuid ?>" class="gen-button">
                                                                    <i class="fa fa-play"></i>
                                                                </a>
                                                            </div>
                                                    </div>
                                                    <div class="gen-info-contain">
                                                        <div class="gen-movie-info">
                                                            <h3><a href="web-series-episodes?video_uuid=<?= $video_uuid ?>"><?= $chapter_name ?></a>
                                                            </h3>
                                                        </div>
                                                    <?php
                                                            } else {
                                                    ?>
                                                        <div class="gen-movie-action">
                                                            <button class="gen-button" id="token_id<?= $id ?>" onclick="fun(this.id)">
                                                                <input type="hidden" name="token_id<?= $id ?>" id="htoken_id<?= $id ?>" value="<?= $token_id ?>">
                                                                <input type="hidden" name="nametoken_id<?= $id ?>" id="nametoken_id<?= $id ?>" value="<?= $chapter_name ?>">
                                                                <input type="hidden" name="video_uuidtoken_id<?= $id ?>" id="video_uuidtoken_id<?= $id ?>" value="<?= $video_uuid ?>">
                                                                <i class="fa fa-play"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="gen-info-contain">
                                                        <div class="gen-movie-info">
                                                            <h3><span><?= $chapter_name ?></span>
                                                            </h3>
                                                        </div>
                                                <?php
                                                            }
                                                        }
                                                ?>
                                                <div class="gen-movie-meta-holder">
                                                    <ul>
                                                        <li><?= $published_date ?></li>
                                                        <li>
                                                            <a href="./more-web-series.php"><span><?= $module_name ?></span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- #post-## -->
                                    </div>
                            <?php
                                    $i = $i + 1;
                                }
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- owl-carousel Videos Section-4 End -->

    <!-- owl-carousel images Start -->
    <section class="pt-0 gen-section-padding-2 home-singal-silder">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="gen-banner-movies">
                        <div class="owl-carousel owl-loaded owl-drag" data-dots="true" data-nav="false" data-desk_num="1" data-lap_num="1" data-tab_num="1" data-mob_num="1" data-mob_sm="1" data-autoplay="true" data-loop="true" data-margin="30">
                            <?php
                            $query = "SELECT * FROM `video_info` WHERE 1 ORDER BY RAND() LIMIT 3";
                            $result = mysqli_query($con, $query);
                            if (mysqli_num_rows($result) > 0) {
                                $i = 1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $thumbnail = $client . $row['thumbnail_ipfs'];
                                    $video_id = $row['video_uuid'];
                                    $chapter_part = $row['video_id'];
                                    $chapter_desc = $row['video_desc'];
                                    $chapter_name = $row['name'];
                                    $chapter_id = $row['video_id'];
                                    $module_name = $row['module'];
                                    $module = $row['module_uuid'];
                                    $date = $row['from_time'];
                                    $date = substr($date, 0, 17);
                                    if (strlen($chapter_name) > 35) {
                                        $chapter_name = substr($chapter_name, 0, 35) . ' ...';
                                    }

                            ?>
                                    <div class="item" style="background: url('<?= $thumbnail ?>')">
                                        <div class="gen-movie-contain h-100">
                                            <div class="container h-100">
                                                <div class="row align-items-center h-100">
                                                    <div class="col-xl-6">
                                                        <div class="gen-movie-info">
                                                            <h3><?= $chapter_name ?></h3>
                                                        </div>
                                                        <div class="gen-movie-meta-holder">
                                                            <ul>
                                                                <li><?= $date ?></li>
                                                                <li>
                                                                    <a href="more-video?module=<?= $module ?>"><span><?= $module_name ?></span></a>
                                                                </li>
                                                            </ul>
                                                            <p><?= $chapter_desc ?></p>
                                                        </div>
                                                        <div class="gen-movie-action">
                                                            <div class="gen-btn-container">
                                                                <?php
                                                                if ($access_pass != "" || $premium_pass != "") {
                                                                ?>
                                                                    <a href="single-movie?course=<?= $video_id ?>&module=<?= $module ?>" class="gen-button .gen-button-dark">
                                                                        <i aria-hidden="true" class="fas fa-play"></i> <span class="text">Play Now</span>
                                                                    </a>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <button class="gen-button
                                                                    .gen-button-dark" onclick="CheckForAccessPass()">
                                                                        <i aria-hidden="true" class="fas fa-play"></i> <span class="text">Play Now</span>
                                                                    </button>
                                                                <?php
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- owl-carousel images End -->

    <!-- owl-carousel Videos Section-4 Start -->
    <section class="pt-0 gen-section-padding-2">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <h4 class="gen-heading-title">Into the Metaverse</h4>
                </div>
                <?php
                $query = "SELECT module_uuid FROM `video_info` WHERE `module`='Metaverse'";
                $result = mysqli_query($con, $query);
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $module = $row['module_uuid'];
                ?>
                    <div class="col-xl-6 col-lg-6 col-md-6 d-none d-md-inline-block">
                        <div class="gen-movie-action">
                            <div class="gen-btn-container text-right">
                                <a href="more-video?module=<?= $module ?>" class="gen-button gen-button-flat">
                                    <span class="text">More Videos</span>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <div class="gen-style-2">
                        <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true" data-desk_num="4" data-lap_num="3" data-tab_num="2" data-mob_num="1" data-mob_sm="1" data-autoplay="false" data-loop="false" data-margin="30">
                            <?php
                            $query = "SELECT * FROM `video_info` WHERE `module`='Metaverse' ORDER BY RAND() LIMIT 10";
                            $result = mysqli_query($con, $query);
                            if (mysqli_num_rows($result) > 0) {
                                $i = 1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $thumbnail = $client . $row['thumbnail_ipfs'];
                                    $video_id = $row['video_uuid'];
                                    $chapter_part = $row['video_id'];
                                    $chapter_name = $row['name'];
                                    $chapter_id = $row['video_id'];
                                    $module_name = $row['module'];
                                    $module = $row['module_uuid'];
                                    $video_uuid = $row['video_uuid'];
                                    $from_time = $row['from_time'];
                                    $date = date_create($from_time);
                                    $published_date = date_format($date, "d M,Y");
                                    // $chapter_id = $row['chapter_id'];
                            ?>
                                    <div class="item">
                                        <div class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action movie_genre-adventure movie_genre-drama">
                                            <div class="gen-carousel-movies-style-2 movie-grid style-2">
                                                <div class="gen-movie-contain">
                                                    <div class="gen-movie-img">
                                                        <img src="<?= $thumbnail ?>" alt="owl-carousel-video-image">
                                                        <div class="gen-movie-add">
                                                            <div class="wpulike wpulike-heart">
                                                                <div class="wp_ulike_general_class wp_ulike_is_not_liked">
                                                                    <button type="button" class="wp_ulike_btn wp_ulike_put_image" onclick="addFavourite('<?= $video_uuid ?>','<?= $user_address ?>')"></button>
                                                                </div>
                                                            </div>
                                                            <ul class="menu bottomRight">
                                                                <li class="share top">
                                                                    <i class="fa fa-share-alt"></i>
                                                                    <ul class="submenu">
                                                                        <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?= $post_link; ?>/single-movie?course=<?= $video_id ?>&module=<?= $module ?>&t=<?= $chapter_name;  ?>" class="facebook" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Facebook"><i class="fab fa-facebook-f"></i></a>
                                                                        </li>
                                                                </li>
                                                                <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= $post_link; ?>/single-movie?course=<?= $video_id ?>&module=<?= $module ?>&t=<?= $chapter_name;  ?>" class="facebook" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Linkedin"><i class="fab fa-linkedin"></i></a>
                                                                </li>
                                                                </li>
                                                                <li><a href="https://twitter.com/share?url=<?= $post_link; ?>/single-movie?course=<?= $video_id ?>&module=<?= $module ?>&text=<?= $chapter_name;  ?>" class="facebook" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Twitter"><i class="fab fa-twitter"></i></a></li>
                                                            </ul>
                                                            </li>
                                                            </ul>

                                                        </div>
                                                        <?php
                                                        if ($access_pass != "" || $premium_pass != "") {
                                                        ?>
                                                            <div class="gen-movie-action">
                                                                <a href="single-movie?course=<?= $video_id ?>&module=<?= $module ?>" class="gen-button">
                                                                    <i class="fa fa-play"></i>
                                                                </a>
                                                            </div>
                                                    </div>
                                                    <div class="gen-info-contain">
                                                        <div class="gen-movie-info">
                                                            <h3><a href="single-movie?course=<?= $video_id ?>&module=<?= $module ?>"><?= $chapter_name ?></a>
                                                            </h3>
                                                        </div>
                                                    <?php
                                                        } else {
                                                    ?>
                                                        <div class="gen-movie-action">
                                                            <button class="gen-button" onclick="CheckForAccessPass()">
                                                                <i class="fa fa-play"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="gen-info-contain">
                                                        <div class="gen-movie-info">
                                                            <h3><a onclick="CheckForAccessPass()"><?= $chapter_name ?></a>
                                                            </h3>
                                                        </div>
                                                    <?php
                                                        }
                                                    ?>
                                                    <div class="gen-movie-meta-holder">
                                                        <ul>
                                                            <li><?= $published_date ?></li>
                                                            <li>
                                                                <a href="more-video?module=<?= $module ?>"><span><?= $module_name ?></span></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- #post-## -->
                                    </div>
                            <?php
                                    $i = $i + 1;
                                }
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- owl-carousel Videos Section-4 End -->

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

    <!-- Access Pass Modal Start -->
    <div class="modal fade" id="access-pass-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="background:#333">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Error !</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 style="text-transform:inherit;">You are not a authenticate user to access this video. Please
                        visit on Rariable and buy a pass to get the access, Thank You. To get the pass <a href="https://rarible.com/token/polygon/0xa2d9ded6115b7b7208459450d676f0127418ae7a:35330667205828808645805771972788148449949166894449166732923665699564597280769?tab=owners" style="color:var(--primary-color)">Click here</a> Or
                        For more information visit plan page now.</a>
                    </h5>
                </div>
                <div class="modal-footer">
                    <input type="button" class="button button-primary" data-dismiss="modal" value="Close" style="padding:5px 20px;background:#666;">
                    <input type="button" class="button button-primary" value="Visit Now" style="padding:5px 20px;" onclick="visitPlanPage()">
                </div>
            </div>
        </div>
    </div>
    <!-- Access Pass Modal End -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="background:#333">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalCenterTitle">Error !</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 style="text-transform:inherit;">You are not a authenticate user to access this Web Series. Please
                        visit on Rariable and buy a pass to get the access for this series. To get the pass <a id="new_href" style="color:var(--primary-color)">Click here</a> Or
                        For more information visit plan page now. </h5>
                </div>
                <div class="modal-footer">
                    <input type="button" class="button button-primary" data-dismiss="modal" value="Close" style="padding:5px 20px;background:#666;">
                    <input type="button" class="button button-primary" value="Visit Now" style="padding:5px 20px;" onclick="visitPlanPage()">
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->

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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/sweetalert/sweetalert.min.js"></script>
    <script src="js/sweetalert/jquery.sweet-alert.custom.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script>
        function fun(id) {
            const token_id = document.getElementById("h" + id).value
            const web_series_name = document.getElementById("name" + id).value
            const user_address = document.getElementById("user_address").value
            const video_uuid = document.getElementById("video_uuid" + id).value
            document.getElementById("current_token_id").value = token_id
            document.getElementById("new_href").href = `https://rarible.com/token/polygon/${token_id}?tab=owners`
            varifySuperPass(token_id, user_address, web_series_name, video_uuid);
        }

        function fun2(id) {
            const token_id = document.getElementById("h" + id).value
            const web_series_name = document.getElementById("name" + id).value
            const user_address = document.getElementById("user_address").value
            const video_uuid = document.getElementById("video_uuid" + id).value
            document.getElementById("current_token_id").value = token_id
            document.getElementById("new_href").href = `https://rarible.com/token/polygon/${token_id}?tab=owners`
            varifySuperPass(token_id, user_address, web_series_name, video_uuid);
        }

        const CheckForAccessPass = async () => {
            const user_address = document.getElementById("user_address").value
            const tokenId = '0xa2d9ded6115b7b7208459450d676f0127418ae7a:35330667205828808645805771972788148449949166894449166732923665699564597280769';
            const options = {
                method: 'GET'
            };
            const blockChain = 'POLYGON';
            // const otherOption = 'continuation=POLYGON&size=1000';
            const otherOption = '';
            try {
                await fetch(`https://api.rarible.org/v0.1/ownerships/byItem?itemId=${blockChain}:${tokenId}&${otherOption}`, options)
                    .then(response => response.json())
                    .then(response => {
                        const ownerships = response.ownerships;
                        let passStatus = false;
                        ownerships.map((value, key) => {
                            const owner_address = value.owner;
                            const owner_meta_address = owner_address.split("ETHEREUM:")[1];
                            if (owner_meta_address === user_address) {
                            // if (false) {
                                $.ajax({
                                    type: 'POST',
                                    url: 'php/verifyAccessPass.php',
                                    'async': false,
                                    dataType: "json",
                                    data: {
                                        "user_address": user_address,
                                    },
                                    success: function(data) {
                                        if (data.status == '201') {
                                            console.log("Access Pass verified");
                                            window.location.reload();
                                        }
                                    }
                                });
                                passStatus = true;
                            }
                        });

                        if (!passStatus) {
                            $("#access-pass-modal").modal('show');
                        }
                    }).catch(err => console.error(err));
            } catch (err) {
                console.error(err);
            }
        }

        function visitPlanPage() {
            window.location.replace("plans.php");
        }

        const varifySuperPass = async (token_id, loginUserAddress, web_series_name, video_uuid) => {
            const options = {
                method: 'GET'
            };
            const blockChain = 'POLYGON';
            const tokenId = token_id;
            // const otherOption = 'continuation=POLYGON&size=1000';
            const otherOption = '';
            try {
                await fetch(`https://api.rarible.org/v0.1/ownerships/byItem?itemId=${blockChain}:${tokenId}&${otherOption}`, options)
                    .then(response => response.json())
                    .then(response => {
                        const ownerships = response.ownerships;
                        const passStatus = false;
                        ownerships.map((value, key) => {
                            const owner_address = value.owner;
                            const owner_meta_address = owner_address.split("ETHEREUM:")[1];
                            if (owner_meta_address === loginUserAddress) {
                            // if (false) {
                                $.ajax({
                                    type: 'POST',
                                    url: 'php/verifySuperPass.php',
                                    'async': false,
                                    dataType: "json",
                                    data: {
                                        "web_series_name": web_series_name,
                                        "video_uuid": video_uuid,
                                    },
                                    success: function(data) {
                                        if (data.status == '201') {
                                            window.location = `web-series-episodes?video_uuid=${video_uuid}`;
                                        }
                                    }
                                });
                                passStatus = true;
                            }
                        });

                        if (!passStatus) {
                            $('#exampleModalCenter').modal('show');
                        }
                    }).catch(err => console.error(err));
            } catch (err) {
                console.error(err);
            }
        }

        // Chcek for Premium Pass
        // const verifyPremiumPass = async (loginUserAddress) => {
        //     const options = {
        //         method: 'GET'
        //     };
        //     // https://rarible.com/token/polygon/0xa2d9ded6115b7b7208459450d676f0127418ae7a:35330667205828808645805771972788148449949166894449166732923665699564597280769?tab=owners
        //     const blockChain = 'POLYGON';
        //     const tokenId = '0xa2d9ded6115b7b7208459450d676f0127418ae7a:35330667205828808645805771972788148449949166894449166732923665699564597280769';
        //     // const otherOption = 'continuation=POLYGON&size=1000';
        //     const otherOption = '';
        //     try {
        //         await fetch(`https://api.rarible.org/v0.1/ownerships/byItem?itemId=${blockChain}:${tokenId}&${otherOption}`, options)
        //             .then(response => response.json())
        //             .then(response => {
        //                 const ownerships = response.ownerships;
        //                 ownerships.map((value, key) => {
        //                     const owner_address = value.owner;
        //                     const owner_meta_address = owner_address.split("ETHEREUM:")[1];
        //                     // if (owner_meta_address === loginUserAddress) {
        //                     if (true) {
        //                         $.ajax({
        //                             type: 'POST',
        //                             url: 'php/verifyPremiumPass.php',
        //                             'async': false,
        //                             dataType: "json",
        //                             data: {
        //                                 "user_address": loginUserAddress,
        //                             },
        //                             success: function(data) {
        //                                 if (data.status == '201') {
        //                                     console.log("Premium Pass verified");
        //                                 }
        //                             }
        //                         });
        //                     } else {
        //                         console.log("Premium Pass Not verified");
        //                     }
        //                 });
        //             }).catch(err => console.error(err));
        //     } catch (err) {
        //         console.error(err);
        //     }
        // }

        // const user_address = document.getElementById("user_address").value
        // verifyPremiumPass(user_address);

    </script>
</body>

</html>