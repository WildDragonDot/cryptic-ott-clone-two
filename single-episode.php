<?php
session_start();
include("php/link.php");
$client = 'https://ipfs.fleek.co/ipfs/';
$user_address = '';
if (isset($_SESSION['crypticUserAddress'])) {
    $user_address = $_SESSION['crypticUserAddress'];
} else {
    $user_address = '';
    header("Location:login");
}
$total_count = 0;
$showYoutube = 'none';
$showPaid = 'none';
$p_id = '';
$subtitles = "";
$src180 = "";
$src270 = "";
$src360 = "";
$src540 = "";
$src720 = "";
$course = "";
$event_name = '';
$video_url = '';
$module_name = '';
$webseries_name = '';
$post_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if (isset($_GET['course']) && isset($_GET['module']) && ($_GET['module'] !== '') && ($_GET['module'] !== '')) {
    $course = $_GET['course'];
    $module = $_GET['module'];

    $queryNew = "SELECT * FROM `web-series-episodes-info` WHERE `web_series_uuid` = '$module'";
    $result3 = mysqli_query($con, $queryNew);
    if (mysqli_num_rows($result3) > 0) {
        $total_count = mysqli_num_rows($result3);
    }


    $result2 = mysqli_query($con, "SELECT * FROM `web-series-episodes-info` WHERE `video_uuid` = '$course' AND `web_series_uuid` = '$module'");
    if (mysqli_num_rows($result2) > 0) {
        while ($row = mysqli_fetch_assoc($result2)) {
            $webseries_uuid = $row['web_series_uuid'];
            $showYoutube = 'none';
            $showPaid = 'block';
            $course_ID = $row['video_id'];
            $subtitles = '';
            $title = $row['name_of_episode'];
            $date = $row['from_time'];
            $desc = $row['video_desc'];
            $module_name = $row['module'];
            $episode_no = $row['episode_no'];
            $thumbnail2 =  $client . $row['thumbnail_ipfs'];
            $video_view = $row['video_view'];
            $from_time = $row['from_time'];
            $date = date_create($from_time);
            $published_date = date_format($date, "d M,Y");
            $video_url = $row['video_uid'];
        }
    } else {
        header("Location: index");
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
    <title>Player - Cryptic Entertainments</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <!-- CSS bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!--  Style -->
    <link rel="stylesheet" href="css/style.css" />
    <!--  Responsive -->
    <link rel="stylesheet" href="css/responsive.css" />
    <link href="js/sweetalert/sweetalert.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.2/plyr.css" />
    <style type="text/css">
        .plyr__progress input {
            float: inherit !important;
        }

        .setvideoSize,
        .setvideoSize2 {
            height: 98vh;
        }

        .vjs-control-bar {
            font-size: 1rem;
        }

        .back_button {
            z-index: 888;
            position: absolute;
            padding: 0.5rem;
            left: 0.8rem;
        }

        .back_button i {
            font-size: 2.5rem;
            color: #fff;
            padding: 0.3rem 0.8rem;
            border-radius: 10px;
        }

        @media screen and (min-width: 991px) and (max-width: 1200px) {
            .back_button {
                padding: 0.3rem !important;
            }

            .back_button i {
                font-size: 2.3rem;
            }

            .vjs-resolution-button {
                font-size: 1.2rem;
            }

            .vjs-control-bar {
                font-size: 0.8rem;
            }

            .vjs-resolution-button {
                font-size: 1.5rem !important;
            }

            .vjs-icon-next-item:before {
                font-size: 1.6rem !important;
            }

            .setvideoSize,
            .setvideoSize2 {
                height: 90vh !important;
            }
        }

        @media screen and (min-width: 480px) and (max-width: 991px) {
            .back_button {
                padding: 0.1rem !important;
            }

            .back_button i {
                font-size: 2.3rem;
            }

            .vjs-control-bar {
                font-size: 0.7rem;
            }

            .vjs-resolution-button {
                font-size: 1rem;
            }

            .vjs-icon-next-item:before {
                font-size: 1.5rem !important;
            }

            .setvideoSize,
            .setvideoSize2 {
                height: 45vh;
                display: flex;
                justify-content: center;
            }
        }

        @media screen and (min-width: 0) and (max-width: 480px) {
            .back_button {
                padding: 0.1rem !important;
            }

            .back_button i {
                font-size: 2.2rem;
            }

            .vjs-control-bar {
                font-size: inherit;
            }

            .vjs-icon-next-item:before {
                font-size: 1.2rem !important;
            }
        }

        @media screen and (max-width: 480px) {
            .back_button {
                padding: 0.1rem !important;
            }

            .setvideoSize,
            .setvideoSize2 {
                height: 45vh;
                display: flex;
                justify-content: center;
            }
        }

        .back_button i:hover {
            background: #06bfc9;
        }

        .circular {
            height: 100px;
            width: 100px;
            /* position: relative;
            transform: scale(2); */
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 45;
        }

        .circular .inner {
            position: absolute;
            z-index: 6;
            top: 50%;
            left: 50%;
            height: 80px;
            width: 80px;
            margin: -40px 0 0 -40px;
            background: #dde6f0;
            border-radius: 100%;
        }

        .circular .number {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 10;
            font-size: 18px;
            font-weight: 500;
            color: rgb(6 191 201);
        }

        .circular .bar {
            position: absolute;
            height: 100%;
            width: 100%;
            background: #fff;
            -webkit-border-radius: 100%;
            clip: rect(0px, 100px, 100px, 50px);
        }

        .circle .bar .progress {
            position: absolute;
            height: 100%;
            width: 100%;
            -webkit-border-radius: 100%;
            clip: rect(0px, 50px, 100px, 0px);
            background: rgb(6 191 201);
        }

        .circle .right .progress {
            z-index: 1;
            animation: left 1s linear both;
        }

        /* @keyframes left {
            100% {
                transform: rotate(180deg);
            }
        } */

        .circle .right {
            transform: rotate(180deg);
            z-index: 3;
        }

        .circle .right .progress {
            animation: right 1s linear both;
            animation-delay: 1s;
        }

        /* @keyframes right {
            100% {
                transform: rotate(180deg);
            }
        } */

        @media screen and (max-width: 480px) {
            .circular {
            height: 100px;
            width: 100px;
            /* position: relative;
            transform: scale(2); */
            position: absolute;
            top: 35%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 45;
        }

        .circular .inner {
            position: absolute;
            z-index: 6;
            top: 50%;
            left: 50%;
            height: 80px;
            width: 80px;
            margin: -40px 0 0 -40px;
            background: #dde6f0;
            border-radius: 100%;
        }

        .circular .number {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 10;
            font-size: 18px;
            font-weight: 500;
            color: rgb(6 191 201);
        }

        .circular .bar {
            position: absolute;
            height: 100%;
            width: 100%;
            background: #fff;
            -webkit-border-radius: 100%;
            clip: rect(0px, 100px, 100px, 50px);
        }

        .circle .bar .progress {
            position: absolute;
            height: 100%;
            width: 100%;
            -webkit-border-radius: 100%;
            clip: rect(0px, 50px, 100px, 0px);
            background: rgb(6 191 201);
        }

        .circle .right .progress {
            z-index: 1;
            animation: left 1s linear both;
        }

        /* @keyframes left {
            100% {
                transform: rotate(180deg);
            }
        } */

        .circle .right {
            transform: rotate(180deg);
            z-index: 3;
        }

        .circle .right .progress {
            animation: right 1s linear both;
            animation-delay: 1s;
        }
            
        }

        .noneDisplay {
            display: none;
        }
    </style>
</head>

<body>
    <input type="hidden" name="video_uuid" value="<?= $module ?>" id="video_uuid">
    <input type="hidden" name="module_uuid" value="<?= $module ?>" id="module_uuid">
    <input type="hidden" id="rowCount" value="0">
    <input type="hidden" id="module_uid" value="<?= $module ?>">
    <input type="hidden" id="total_count" value="<?= $total_count ?>">
    <input type="hidden" name="video_url" id="video_url" value="<?= $video_url ?>">
    <!--=========== Loader =============-->
    <div id="gen-loading">
        <div id="gen-loading-center">
            <img src="images/logo-1.png" alt="loading">
        </div>
    </div>
    <!--=========== Loader =============-->

    <!--========== Header ==============-->

    <!--========== Header ==============-->

    <?php
    if (empty($_SESSION['superPass']) && $_SESSION['premiumPass'] == "") {
    ?>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            swal({
                title: "Error!",
                text: "You are not authenticate user to access this page. Please buy the pass to access this page!",
                icon: "error",
                button: 'Visit Now',
                dangerMode: true,
            }).then((value) => {
                window.location.href = "./plans";
            })
        </script>
    <?php
    } else if ($_SESSION['premiumPass'] == "verified_premium_pass" || in_array($webseries_uuid, $_SESSION['superPassVideoUuid'])) {
    ?>
        <!-- Single movie Start -->
        <section class="gen-section-padding-3 gen-single-movie pt-3">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-lg-12">
                        <div class="gen-single-movie-wrapper style-1">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="gen-video-holder">
                                        <!-- <iframe width="100%" height="550px" src="https://www.youtube.com/embed/LXb3EKWsInQ"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen>
                                    </iframe> -->
                                        <!-- plyr code start -->
                                        <div class="container p-0 setvideoSize">
                                            <a href="/" class="back_button" style="z-index: 888;position:absolute;padding:0.5rem;">
                                                <i class="fas fa-arrow-left"></i>
                                            </a>
                                            <div class="video_container" style="position: relative; z-index: 1;">
                                                <div class="circular">
                                                    <div class="inner"></div>
                                                    <div class="number">0%</div>
                                                    <div class="circle">
                                                        <div class="bar left">
                                                            <div class="progress progress_left"></div>
                                                        </div>
                                                        <div class="bar right">
                                                            <div class="progress progress_right"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <video src="#" controls crossorigin playsinline poster="<?= $thumbnail2 ?>" id="myVideo">
                                                    <source type="video/mp4" size="576">
                                                    <source type="video/mp4" size="720">
                                                    <source type="video/mp4" size="1080">

                                                    <!-- Caption files -->
                                                    <!-- <track kind="captions" label="English" srclang="en"
                                                    src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.en.vtt"
                                                    default>
                                                <track kind="captions" label="Français" srclang="fr"
                                                    src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.fr.vtt"> -->
                                                    <!-- Fallback for browsers that don't support the <video> element -->
                                                    <!-- <a href="<?= $video_url ?>" download>Download</a> -->
                                                </video>
                                            </div>

                                        </div>
                                        <div class="next_button" style="z-index: 888;position:absolute;padding:1.5rem;margin-top:-85px;right:1rem;display:none;">
                                            <?php
                                            $episode_no = $episode_no + 1;
                                            $query = "SELECT * FROM `web-series-episodes-info` WHERE `web_series_uuid`= '$module' AND `episode_no`='$episode_no' limit 1";
                                            $result = mysqli_query($con, $query);
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $video_id_other = $row['video_uuid'];
                                                    $module_other = $row['web_series_uuid'];
                                            ?>
                                                    <a href="single-episode?course=<?= $video_id_other ?>&module=<?= $module_other ?>&episodeNo=<?= $episode_no ?>" style="padding: 0.5rem 1rem;" class="btn btn-hover noneDisplay" id="setNextEpisode">Next
                                                        Video</a>
                                            <?php }
                                            } ?>
                                        </div>
                                        <!-- Plyr resources and browser polyfills are specified in the pen settings -->
                                        <!-- plyr code end -->
                                    </div>
                                    <div class="gen-single-movie-info">
                                        <h2 class="gen-title"><?= $title ?></h2>
                                        <div class="gen-single-meta-holder">
                                            <ul>
                                                <li class="gen-sen-rating"><?= $module_name ?></li>
                                                <li>
                                                    <i class="fas fa-eye">
                                                    </i>
                                                    <span><?= $video_view ?> Views</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <p><?= $desc ?></p>
                                        <div class="gen-after-excerpt">
                                            <div class="gen-extra-data">
                                                <ul>
                                                    <!-- <li>
                                                    <span>Web Series : </span>
                                                    <span><?php echo $webseries_name ?></span>
                                                </li> -->
                                                    <li>
                                                        <span>Language :</span>
                                                        <span>Hindi,English</span>
                                                    </li>
                                                    <!-- <li>
                                                    <span>Subtitles :</span>
                                                    <span>English</span>
                                                </li> -->
                                                    <li>
                                                        <span>Audio Languages :</span>
                                                        <span>Hindi</span>
                                                    </li>
                                                    <li><span>Genre :</span>
                                                        <span>
                                                            <a href="web-series-episodes?video_uuid=<?= $webseries_uuid ?>">
                                                                <?= $module_name ?></a>
                                                        </span>
                                                    </li>
                                                    <li><span>Run Time :</span>
                                                        <span id="setVideoDurationData">Calculationg ...</span>
                                                    </li>
                                                    <li>
                                                        <span>Release Date :</span>
                                                        <span><?= $published_date ?></span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="gen-socail-share">
                                                <h4 class="align-self-center">Social Share :</h4>
                                                <ul class="social-inner">
                                                    <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?= $post_link; ?>&t=<?= $title; ?>" class="facebook" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Facebook"><i class="fab fa-facebook-f"></i></a>
                                                    </li>
                                                    <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= $post_link; ?>&t=<?= $title; ?>" class="facebook" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Linkedin"><i class="fab fa-linkedin"></i></a>
                                                    </li>
                                                    <li><a href="https://twitter.com/share?url=<?= $post_link; ?>&text=<?= $title; ?>" class="facebook" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Twitter"><i class="fab fa-twitter"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="pm-inner">
                                        <div class="gen-more-like">
                                            <h5 class="gen-more-title">All Episodes</h5>
                                            <div class="row all-follower">
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12" id="lets_hide">
                                                    <div class="gen-load-more-button">
                                                        <div class="gen-btn-container">
                                                            <a class="gen-button gen-button-loadmore" id="loadMore">
                                                                <span class="button-text">Load More</span>
                                                                <span class="loadmore-icon" style="display: none;"><i class="fa fa-spinner fa-spin"></i></span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Single movie End -->

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
                                            $queryCat = "SELECT DISTINCT `module`,`module_uuid` FROM `web-series-episodes-info`;";
                                            $resultCat = mysqli_query($con, $queryCat);
                                            if (mysqli_num_rows($resultCat) > 0) {
                                                while ($rowCat = mysqli_fetch_assoc($resultCat)) {
                                            ?>
                                                    <li class="menu-item"><a href="more-video?module=<?= $rowCat['module_uuid'] ?>"><?= $rowCat['module'] ?></a>
                                                    </li>
                                            <?php }
                                            } ?>
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
    <?php
    } else {
    ?>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            swal({
                title: "Error!",
                text: "You are not authenticate user to access this page! Please buy the super pass to access this page!",
                icon: "error",
                button: 'Ok',
                dangerMode: true,
            }).then((value) => {
                window.location.href = "/";
            })
        </script>
    <?php
    }
    ?>

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
    <script src="https://cdn.plyr.io/3.7.2/plyr.js"></script>

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
        const player = new Plyr('video', {
            captions: {
                active: true
            }
        });
        window.player = player;

        var oneTime = 0;

        player.on('timeupdate', function(event) {
            if ((player.currentTime) > (player.duration) - 10) {
                if (oneTime == 0) {
                    $('.next_button').css('display', 'block');
                }
                oneTime = oneTime + 1;
            } else {
                $('.next_button').css('display', 'none');
                oneTime = 0;
            }
        });

        if (window.innerHeight < window.innerWidth) {
            $('.setvideoSize').css("height", '100%');
        } else {
            if ((window.innerWidth) <= '991') {
                $('.setvideoSize').css("height", '45vh');
            } else {
                $('.setvideoSize').css("height", '97vh');
            }
        }
        window.addEventListener("orientationchange", (event) => {
            if (window.innerHeight < window.innerWidth) {
                $('.setvideoSize').css("height", '100%');
            } else {
                if ((window.innerWidth) <= '991') {
                    $('.setvideoSize').css("height", '45vh');
                } else {
                    $('.setvideoSize').css("height", '97vh');
                }
            }
        });
        $(document).ready(function() {
            createFile2();

            // video duration calculation start
            setTimeout(function() {
                function convertHMS(value) {
                    const sec = parseInt(value, 10); // convert value to number if it's string
                    let hours = Math.floor(sec / 3600); // get hours
                    let minutes = Math.floor((sec - (hours * 3600)) / 60); // get minutes
                    let seconds = sec - (hours * 3600) - (minutes * 60); //  get seconds
                    // add 0 if value < 10; Example: 2 => 02
                    if (hours < 10) {
                        hours = "0" + hours;
                    }
                    if (minutes < 10) {
                        minutes = "0" + minutes;
                    }
                    if (seconds < 10) {
                        seconds = "0" + seconds;
                    }
                    return hours + 'hr ' + minutes + ' mins'; // Return is HH : MM : SS
                }
                var x = document.getElementById("myVideo").duration;
                if (convertHMS(x)) {
                    document.getElementById("setVideoDurationData").textContent = convertHMS(x);
                }
            }, 4000);
            // video duration calculation end

            // visitor view add start
            function addView(video_uuid, module_uuid) {
                $.ajax({
                    url: "php/addViewOnEpisodes.php",
                    method: "POST",
                    dataType: "json",
                    data: {
                        add_video_uuid: video_uuid,
                        add_module_uuid: module_uuid
                    },
                    success: function(data) {
                        if (data.status == 201) {
                            console.log("success");
                        } else if (data.status == 301) {
                            console.log(data.error);
                        } else {
                            console.log('other error');
                        }
                    }
                });
            }
            const video_uuid = $('#video_uuid').val();
            const module_uuid = $('#module_uuid').val();
            addView(video_uuid, module_uuid);
            // visitor view add end         
        });
    </script>
    <script>
        $(document).ready(function() {
            var currentRow = $('#rowCount').val();
            var limit = parseInt(10);
            var row = parseInt($('#rowCount').val());
            var count = parseInt($('#total_count').val());
            var video_uuid = $('#video_uuid').val();

            function loadNow(row, limit, video_uuid) {
                $('.button-text').css("display", "none");
                $('.loadmore-icon').css("display", "block");
                $.ajax({
                    type: 'POST',
                    url: 'php/loadMoreWebSeriesEpisodeData.php',
                    data: {
                        "rowCount": row,
                        "limit": limit,
                        "video_uuid": video_uuid
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
            loadNow(row, limit, video_uuid);
            $('#loadMore').click(function() {
                row = parseInt($('#rowCount').val());
                loadNow(row, limit, video_uuid);
            });

        });
        $(document).ready(function() {
            function getValue() {
                const storage = window?.sessionStorage;
                if (!storage) return;
                const prePath = storage.getItem("prevPath");
                const currPath = storage.getItem("currentPath");
                if (prePath) {
                    if (prePath != currPath) {
                        $(".back_button").attr("href", prePath);
                    } else {
                        $(".back_button").attr("href", '/');
                    }
                } else {
                    $(".back_button").attr("href", '/');
                }
            }
            getValue();
        });

        async function createFile2() {
            const video = document.getElementById('video_url').value;
            var request = new XMLHttpRequest();
            request.open('GET', `${video}`, true);
            request.responseType = 'blob';
            request.onprogress = function(e) {
                if (e.lengthComputable) {
                    var percentComplete = ((e.loaded / e.total) * 100).toFixed(2);
                    if (percentComplete == 100) {
                        document.querySelector('.number').innerHTML = '100%';
                        document.querySelector('.progress_right').style.transform = 'rotate(180deg)';
                        document.querySelector('.progress_left').style.transform = 'rotate(180deg)';
                        setTimeout(function() {
                            document.querySelector('.circular').style.display = 'none';
                            $('#setNextEpisode').removeClass("noneDisplay");
                        }, 1000);
                    } else {

                        if (Number(percentComplete) <= 50.00) {
                            document.querySelector('.number').innerHTML = percentComplete + '%';
                            document.querySelector('.progress_left').style.transform = 'rotate(' + (percentComplete * 3.6) + 'deg)';
                        } else {
                            document.querySelector('.number').innerHTML = percentComplete + '%';
                            document.querySelector('.progress_right').style.transform = 'rotate(' + ((percentComplete % 50) * 3.6) + 'deg)';
                        }
                    }
                }
            };
            request.onload = function() {
                if (this.status === 200) {
                    var file = new File([this.response], 'test.mp4', { type: 'video/mp4' });
                    let url2 = URL.createObjectURL(file);
                    document.getElementById('myVideo').src = url2;
                }
            };
            request.send();
        }
    </script>
</body>

</html>