<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from pixner.net/boleto/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Jul 2023 02:50:25 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- <link rel="stylesheet" href="assets/css/main.css"> -->
    <link rel="stylesheet" href="assets/css/abc.css">
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


    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Boleto - Online Ticket Booking Website HTML Template</title>

    <style>
        .navbar {
            /* overflow: hidden; */
            background-color: #333;
        }

        .navbar a {
            float: left;
            font-size: 16px;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }ikjjmj        .subnav {
            float: left;
            /* overflow: hidden; */
        }

        .navbar:hover{
            background: gray;
        }

        .subnav .subnavbtn {
            font-size: 16px;
            border: none;
            outline: none;
            color: white;
            padding: 14px 16px;
            background-color: inherit;
            font-family: inherit;
            margin: 0;
        }

        .navbar a:hover,
        .subnav:hover .subnavbtn {
            background-color: gray;
        }

        .subnav-content {
            display: none;
            position: absolute;
            right: 0;
            background: transparent;
            width: 100%;
            z-index: 1;
            /* margin-top: 8px; */
        }

        .subnav-content:hover {
            display: block;
            z-index: 9999;
        }

        .subnav-content a {
            padding: 1px;
            float: left;
            color: white;
            text-decoration: none;
        }

        .subnav-content a:hover {
            background-color: #eee !important;
            color: black !important;
            border: none !important;
            box-shadow: none !important;
            --webkit-box-shadow: none !important;
        }

        .subnav:hover .subnav-content {
            display: block;
            z-index: 9999;
            background-color: gray;
        }

        .subnav:hover .subnav-content a {
            background: none !important;
        }
    </style>
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
                        <a href="#0">Move</a>
                        <ul class="submenu" style="z-index:10;">
                            <li>
                                <a href="index.php?act=playing">Movie playing now</a>
                            </li>
                            <li>
                                <a href="index.php?act=coming">Movie coming soon</a>
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
                        if (isset($_SESSION['email'])) {
                            extract($_SESSION['email']);
                        ?>
                            <!-- <div>
                            
                        </div>
                        <li>
                            <a href="">My ticket</a>
                        </li>
                        <li>
                            <a href="index.php?act=exit">Thoát</a>
                        </li> -->
                    <li>
                        <a href="#0"><?= $email ?></a>
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
                            <a href="index.php?act=sign-up">join us</a>
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