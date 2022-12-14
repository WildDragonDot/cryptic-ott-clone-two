<?php
session_start();
include("php/link.php");
$client = 'https://ipfs.fleek.co/ipfs/';
$user_address = '';
if(isset($_SESSION['crypticUserAddress'])){
    $user_address = $_SESSION['crypticUserAddress'];
    header("Location:index");
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
    <style>
    .bg-gray-200 {
        --tw-bg-opacity: 1;
        background-color: rgb(229 231 235);
    }

    .w-16 {
        width: 4rem;
    }

    .h-px {
        height: 1px;
    }

    .button:hover{
        background-color: #03939b !important;
    }
    </style>
</head>

<body>

    <!--=========== Loader =============-->
    <div id="gen-loading">
        <div id="gen-loading-center">
            <img src="images/logo-1.png" alt="loading">
        </div>
    </div>
    <!--=========== Loader =============-->

    <!-- Log-in  -->
    <section class="position-relative pb-0">
        <div class="gen-login-page-background" style="background-image: url('images/background/asset-54.jpg');"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <form name="pms_login" id="pms_login" action="#" method="post">
                            <div class="text-center mb-3">
                                <h2 class="mt-6 text-3xl font-bold text-gray-900"><img src="images/logo-1.png"
                                        class="w-50 pb-3"></h2>
                                <h5 class="mt-2 text-sm text-gray-500">Welcome Back !</h5>
                            </div>
                            <div class="d-flex flex-row justify-content-center align-items-center space-x-3"><a
                                    href="https://chrome.google.com/webstore/detail/metamask/nkbihfbeogaeaoehlefnkodbefgpgknn?hl=en"
                                    target="_blank"
                                    class="w-40 h-11 align-items-center justify-content-center d-inline-flex rounded-2xl font-bold text-lg  text-white hover:shadow-lg cursor-pointer transition ease-in duration-300"><img
                                        src="images/metamask-removebg-preview.png" class="w-75"></a>
                            </div>
                            <div class="d-flex align-items-center justify-content-center px-2"><span
                                    class="h-px w-16 bg-gray-200"></span><span
                                    class="text-gray-300 font-normal px-2">login
                                    with metamask</span><span class="h-px w-16 bg-gray-200"></span></div>

                            <p class="login-submit w-100 mt-4">
                                <input type="button" name="wp-submit" id="wp-submit" class="button button-primary w-100"
                                    value="Log In" onclick="userLoginOut()">
                            </p>
                            <p class="flex flex-col items-center justify-center mt-3 text-center text-md text-gray-500">
                                <span>Install metamask extension for login.</span><a
                                    href="https://chrome.google.com/webstore/detail/metamask/nkbihfbeogaeaoehlefnkodbefgpgknn?hl=en"
                                    target="_blank"
                                    class="text-indigo-400 hover:text-blue-500 no-underline hover:underline cursor-pointer transition ease-in duration-300">metamask
                                    extension</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Log-in  -->

    <!-- Back-to-Top start -->
    <div id="back-to-top">
        <a class="top" id="top" href="#top"> <i class="ion-ios-arrow-up"></i> </a>
    </div>
    <!-- Back-to-Top end -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="background:#333">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalCenterTitle">Error !</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 style="text-transform:inherit;">You are not a authenticate user to access this site. Please
                        visit on Rariable and buy a plan to get the access. Thank You .
                        For more information visit now.</a>
                    </h5>
                        <!-- <a
                            href="https://rarible.com/token/polygon/0xa2d9ded6115b7b7208459450d676f0127418ae7a:35330667205828808645805771972788148449949166894449166732923665699564597280769?tab=owners"
                            style="color:var(--primary-color)">Token</a> -->
                             
                </div>
                <div class="modal-footer">
                    <input type="button" class="button button-primary" data-dismiss="modal" value="Close"
                        style="padding:5px 20px;background:#666;">
                    <input type="button" class="button button-primary" value="Visit Now" style="padding:5px 20px;"
                        onclick="buyToken()">
                </div>
            </div>
        </div>
    </div>

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
    function buyToken() {
        window.location.replace(
            // "https://rarible.com/token/polygon/0xa2d9ded6115b7b7208459450d676f0127418ae7a:35330667205828808645805771972788148449949166894449166732923665699564597280769?tab=owners"
            "plans.php"
            );
    }
    </script>

</body>

</html>