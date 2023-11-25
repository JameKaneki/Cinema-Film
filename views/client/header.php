<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from pixner.net/boleto/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Jul 2023 02:50:25 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/odometer.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/jquery.animatedheadline.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- <link rel="stylesheet" href="assets/css/abc.css"> -->

    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Boleto - Online Ticket Booking Website HTML Template</title>
</head>

<body>
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ==========Preloader========== -->
    <!-- ==========Overlay========== -->
    <div class="overlay"></div>
    <a href="#0" class="scrollToTop">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- ==========Overlay========== -->

    <!-- ==========Header-Section========== -->
    <header class="header-section">
        <div class="container">
            <div class="header-wrapper">
                <div class="logo">
                    <a href="index.php">
                        <img src="assets/images/logo/logo.png" alt="logo">
                    </a>
                </div>
                <ul class="menu">
                    <li>
                        
                        <a href="index.php?act=home">Movie</a>
                        <ul class="submenu" style="z-index:10;">
                            <li>
                                <a href="index.php?act=movie-grid&id=playing">Movie playing now</a>
                            </li>
                            <li>
                                <a href="index.php?act=movie-grid&id=coming">Movie coming soon</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#0">Schedule today</a>
                    </li>
                    <li>
                        <a href="#0">Contact Us</a>
                    </li>
                    <li class="header-button pr-0">
                        <?php
                        if (!empty($_SESSION['userName'])) {
                            $userInfo = $_SESSION['userName'];
                        ?>
                    <li>
                        <a href="#0"><?= $userInfo['email']?></a>
                        <ul class="submenu" style="z-index:10;">
                            <li>
                                <a href="index.php?act=my-ticket">My ticket</a>
                            </li> 
                            <li>
                                <a href="index.php?act=exit">Logout</a>
                            </li>
                           
                        </ul>
                    </li>
                        <?php
                        } else {
                        ?>
                            <a href="index.php?act=sign-in">join us</a>
                        <?php
                        }
                        ?>
                    </li>
                </ul>
                <div class="header-bar d-lg-none">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </header>

    <!-- movie cái đoạn anyf tới trang nào cần thêm nhá . xem thêm ở giao diện -->

    <!-- <section class="banner-section">
        <div class="banner-bg bg_img bg-fixed" data-background="assets/images/banner/banner01.jpg"></div>
        <div class="container">
            <div class="banner-content">
                <h1 class="title  cd-headline clip"><span class="">book your</span> tickets for 
                    <span class="color-theme cd-words-wrapper p-0 m-0">
                        <b class="is-visible">new movie</b>
                    </span>
                </h1>
                <p>Safe, secure, reliable ticketing.Your ticket to live entertainment!</p>
            </div>
        </div>
    </section> -->