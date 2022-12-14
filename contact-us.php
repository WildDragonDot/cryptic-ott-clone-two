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



if ((isset($_GET['name'])) && (isset($_GET['email'])) && (isset($_GET['phone'])) && (isset($_GET['address'])) && (isset($_GET['message']))) {
    $data = array();
    $from_ip = $_SERVER['REMOTE_ADDR'];
    $from_browser = $_SERVER['HTTP_USER_AGENT'];
    date_default_timezone_set("Asia/Calcutta");
    $date_now = date("r");    
    function guidv4($data)
    {
        assert(strlen($data) == 16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    } 
        
    $enquiry_id = guidv4(openssl_random_pseudo_bytes(16)); 
    $name = mysqli_real_escape_string($con, $_GET['name']);
    $email = mysqli_real_escape_string($con, $_GET['email']);
    $phone = mysqli_real_escape_string($con, $_GET['phone']);
    $address = mysqli_real_escape_string($con, $_GET['address']);
    $message = mysqli_real_escape_string($con, $_GET['message']);


    $query = "INSERT INTO `enquiry_info`(`enquiry_id`, `name`, `email`, `phone`,`address`,`message`, `from_ip`, `from_browser`, `from_time`) VALUES ('$enquiry_id','$name','$email','$phone','$address','$message','$from_ip','$from_browser','$date_now')";
        
    if (mysqli_query($con, $query) ) {
        header("Location: contact-us");
    } else {

    }
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
    <meta property="og:image:secure_url" itemprop="image"
        content="https://platform.crypticentertainments.com/images/logo-1.png" />
    <meta property="og:image:width" content="600">
    <meta property="og:image:height" content="315">
    <meta property="og:type" content="website" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Contact Us - Cryptic Entertainments</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <!-- CSS bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!--  Style -->
    <link rel="stylesheet" href="css/style.css" />
    <!--  Responsive -->
    <link rel="stylesheet" href="css/responsive.css" />
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
                                                    My Favourite </a>
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
                                contact us
                            </h1>
                        </div>
                        <div class="gen-breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/"><i class="fas fa-home mr-2"></i>Home</a></li>
                                <li class="breadcrumb-item active">Contact us</li>
                            </ol>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->

    <!-- Icon-Box Start -->
    <section class="gen-section-padding-3">
        <div class="container container-2">
            <div class="row">
                <!-- <div class="col-xl-4 col-md-6">
                    <div class="gen-icon-box-style-1">
                        <div class="gen-icon-box-icon">
                            <span class="gen-icon-animation">
                                <i class="fas fa-map-marker-alt"></i></span>
                        </div>
                        <div class="gen-icon-box-content">
                            <h3 class="pt-icon-box-title mb-2">
                                <span>Our Location</span>
                            </h3>
                            <p class="gen-icon-box-description">The Queen's Walk, Bishop's, London SE1 7PB, United
                                Kingdom</p>
                        </div>
                    </div>
                </div> -->
                <div class="col-xl-6 col-md-6 mt-4 mt-md-0">
                    <div class="gen-icon-box-style-1">
                        <div class="gen-icon-box-icon">
                            <span class="gen-icon-animation">
                                <i class="fas fa-phone-alt"></i></span>
                        </div>
                        <div class="gen-icon-box-content">
                            <h3 class="pt-icon-box-title mb-2">
                                <span>call us at</span>
                            </h3>
                            <p class="gen-icon-box-description">+ (91) 8728039991</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-12 mt-4 mt-xl-0">
                    <div class="gen-icon-box-style-1">
                        <div class="gen-icon-box-icon">
                            <span class="gen-icon-animation">
                                <i class="far fa-envelope"></i></span>
                        </div>
                        <div class="gen-icon-box-content">
                            <h3 class="pt-icon-box-title mb-2">
                                <span>Mail us</span>
                            </h3>
                            <p class="gen-icon-box-description">associations@crypticentertainments.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Icon-Box End -->

    <!-- Map Start -->
    <Section class="gen-section-padding-3 gen-top-border">
        <div class="container container-2">
            <div class="row">
                <div class="col-xl-12">
                    <h2 class="mb-5">get in touch</h2>
                    <form>
                        <div class="row gt-form">
                            <div class="col-md-6 mb-4"><input type="text" name="name" placeholder="Your Name"
                                    pattern="[a-zA-Z'-'\s]{5,}" title="Minimum 5 letters" required>
                            </div>
                            <div class="col-md-6 mb-4"><input type="email" name="email" placeholder="Email" required>
                            </div>
                            <div class="col-md-6 mb-4"><input type="text" name="phone" placeholder="Cell Phone"
                                    pattern="[6-9]{1}[0-9]{9}"
                                    title="Phone number with 6-9 and remaing 9 digit with 0-9" required>
                            </div>
                            <div class="col-md-6 mb-4"><input type="text" name="address" placeholder="Address" required>
                            </div>
                            <div class="col-md-12 mb-4"><textarea name="message" rows="6" placeholder="Your Message"
                                    required></textarea><br>
                                <input type="submit" value="Send" class="mt-4">
                            </div>
                        </div>
                    </form>
                </div>
                <!-- <div class="col-xl-6">
                    <div style="width: 100%"><iframe width="100%" height="550" frameborder="0" scrolling="no"
                            marginheight="0" marginwidth="0"
                            src="https://maps.google.com/maps?width=100%25&amp;height=550&amp;hl=en&amp;q=+(My%20BusiLondon%20Eye,%20London,%20United%20Kingdomness%20Name)&amp;t=&amp;z=9&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                    </div>
                </div> -->
            </div>
        </div>
    </Section>
    <!-- Map End -->

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


</body>



</html>