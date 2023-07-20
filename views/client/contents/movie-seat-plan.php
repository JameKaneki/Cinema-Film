<!-- 
đổ ra bảng ghế , nhớ thêm vào trước khi đổ 
chọn ghế xong thì trả ra giá luôn - giá để default cũng đc

khi ấn proceed thì kiểm tra xem đã đăng nhập chưa nếu chauw thì ra màn login  -->

<?php 
$seatList = "A1,A2,A3,A4,A5,A6,A7,A8,A9,A10,A11,A12,B1,B2,B3,B4,B5,B6,B7,B8,B9,B10,B11,B12,C1,C2,C3,C4,C5,C6,C7,C8,C9,C10,C11,C12,C13,D1,D2,D3,D4,D5,D6,D7,D88,D9,D10,D11,D12,E1,E2,E3,E4,E5,E6,E7,E8,E9,E10,E11,E12,F1,F2,F3,F4,F5,F6,F7,F8,F9,F10,F11,F12],G1,G2,G3,G4,G5,G6,G7,G8,G9,G10,G11,G12],H1,H2,H3,H4,H5,H6,H7,H8,H9,H10.H11.H12],I1,I2,I3,I4,I5,I6,I7,I8,I9,I10,I11,I12,K1,K2,K3,K4,K5,K6,K7,L8,K9,K10,K11,K12,DOU1,DOU2,Dou3,DOU4,DOU5"
?>



<section class="details-banner hero-area bg_img seat-plan-banner" data-background="assets/images/banner/banner04.jpg">
        <div class="container">
            <div class="details-banner-wrapper">
                <div class="details-banner-content style-two">
                    <h3 class="title">Venus</h3>
                    <div class="tags">
                        <a href="#0">City Walk</a>
                        <a href="#0">English - 2D</a>

                        <div class="item date-item">
                            <span class="date">MON, SEP 09 2020 - 09:40</span>
                        </div>

                        <div class="item md-order-1 pt-4">
                            <a href="movie-ticket-plan.html" class="custom-button back-button">
                                <i class="flaticon-double-right-arrows-angles"></i>back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<div class="seat-plan-section padding-bottom padding-top">
        <div class="container">
            <div class="screen-area">
                <h4 class="screen">screen</h4>
                <div class="screen-thumb">
                    <img src="assets/images/movie/screen-thumb.png" alt="movie">
                </div>
                <h5 class="subtitle">silver plus</h5>
             
                <div class="seat-line-wrapper">
                    <ul class="seat-line">
                            <li class="seat"><div class="seat-key" id="E1">E1</div></li>
                            <li class="seat"><div class="seat-key" id="E2">E2</div></li>
                            <li class="seat"><div class="seat-key" id="E3">E3</div></li>
                            <li class="seat"><div class="seat-key" id="E4">E4</div></li>
                            <li class="seat"><div class="seat-key" id="E5">E5</div></li>
                            <li class="seat"><div class="seat-key" id="E6">E6</div></li>
                            <li class="seat"><div class="seat-key" id="E7">E7</div></li>
                            <li class="seat"><div class="seat-key" id="E8">E8</div></li>
                            <li class="seat"><div class="seat-key" id="E9">E9</div></li>
                            <li class="seat"><div class="seat-key" id="E10">E10</div></li>
                            <li class="seat"><div class="seat-key" id="E11">E11</div></li>
                        </ul> 
                        <ul class="seat-line">
                            <li class="seat"><div class="seat-key" id="F1">F1</div></li>
                            <li class="seat"><div class="seat-key" id="F2">F2</div></li>
                            <li class="seat"><div class="seat-key" id="F3">F3</div></li>
                            <li class="seat"><div class="seat-key" id="F4">F4</div></li>
                            <li class="seat"><div class="seat-key" id="F5">F5</div></li>
                            <li class="seat"><div class="seat-key" id="F6">F6</div></li>
                            <li class="seat"><div class="seat-key" id="F7">F7</div></li>
                            <li class="seat"><div class="seat-key" id="F8">F8</div></li>
                            <li class="seat"><div class="seat-key" id="F9">F9</div></li>
                            <li class="seat"><div class="seat-key" id="F10">F10</div></li>
                            <li class="seat"><div class="seat-key" id="F11">F11</div></li>
                            <li class="seat"><div class="seat-key" id="F12">F12</div></li>
                            <li class="seat"><div class="seat-key" id="F13">F13</div></li>
                            <li class="seat"><div class="seat-key" id="F14">F14</div></li>
                            <li class="seat"><div class="seat-key" id="F15">F15</div></li>
                            <li class="seat"><div class="seat-key" id="F16">F16</div></li>
                        </ul> 
                </div>
                <h5 class="subtitle">silver plus</h5>
            <div class="proceed-book bg_img" data-background="assets/images/movie/movie-bg-proceed.jpg">
                <div class="proceed-to-book">
                    <div class="book-item">
                        <span>You have Choosed Seat</span>
                        <h3 class="title">d9, d10</h3>
                    </div>
                    <div class="book-item">
                        <span>total price</span>
                        <h3 class="title">$150</h3>
                    </div>
                    <div class="book-item">
                        <a href="movie-checkout.html" class="custom-button">proceed</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <style>
        .seat-line-wrapper{
            margin: 20px;
        }
        .seat-line{
            display: flex;
            justify-content: center;
            margin-top: 12px;
        }
        .seat{
            padding: 20px;
            margin:2px;
            background-image: url("assets/images/movie/seat01.png");
            position: relative;
        }
        .seat:hover{
            cursor: pointer;
        }
        .seat-key{
            position: absolute;
            transform: translateX(-42%) translateY(-50%);
            font-size: 14px;
        }

    </style>