<!-- 
đổ ra bảng ghế , nhớ thêm vào trước khi đổ 
chọn ghế xong thì trả ra giá luôn - giá để default cũng đc

khi ấn proceed thì kiểm tra xem đã đăng nhập chưa nếu chauw thì ra màn login  -->

<?php 
if (!isset($_SESSION['userName'])) {
    header("Location: http://localhost/Cinema-Film/views/client/index.php?act=sign-in");
    die;
}?>



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
<div class="seat-plan-section padding-bottom padding-top margin-bottom">
        <div class="container">
            <div class="screen-area">
                <h4 class="screen">screen</h4>
                <div class="screen-thumb">
                    <img src="assets/images/movie/screen-thumb.png" alt="movie">
                </div>
                <h5 class="subtitle">silver plus</h5>
            <div class="seat-wrapper">
                <?php 
                    foreach($seatList as $seatKey => $seats){
                       echo  "
                          <div class='seat-line-wrapper'>
                          <div class='seat-key'>$seatKey</div>
                       ";
                       echo "
                          <ul class='seat-line'>
                       ";
                        foreach($seats as $seat){
                            if(in_array($seat['seat_key'],$bookedSeat)){
                                echo "
                                  <li class='seat booked'><div class='seat-index' >{$seat['seat_key']}</div></li>
                                ";
                            }else{
                                echo "
                                <li class='seat ' id='{$seat['seat_key']} - {$seat['price']}'><div class='seat-index'>{$seat['seat_key']}</div></li>
                             ";
                            }
                        }
                       echo "</ul>
                       </div>
                       ";
                    }
                
                ?>
            </div> 
               
            <div class="proceed-book bg_img" data-background="assets/images/movie/movie-bg-proceed.jpg">
                <div class="proceed-to-book">
                    <div class="book-item">
                        <span>You have Choosed Seat</span>
                        <h4 class="title selected-seat" id='selected-seat'>No think being selected</h4>
                    </div>
                    <div class="book-item">
                        <span>total price</span>
                        <h3 class="title" id='total-price'>0$</h3>
                    </div>
                    <div class="book-item">
                        <button <?php echo " onclick='postData($idScheduleHour,{$scheduleHourInfo['idRoom']})'"; ?> class="custom-button">proceed</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./assets/js/customer.js"></script>

    <style>
        .seat-wrapper{
            max-width: 80%;
            margin: 20px auto;
            margin-bottom: 100px;
        }
        .seat-line-wrapper{
            display: flex;
            justify-content: start;
            margin: 10px 0;
        }
        .seat-line{
            display: flex;
            justify-content: center;
            flex: 1;
            margin-left: -12px;

        }
        .seat{
            padding: 20px;
            margin:2px;
            background-image: url("assets/images/movie/seat01.png") ;
            position: relative;
            cursor: pointer;

        }
        .seat:hover{
            background-image: url("assets/images/movie/seat01-free.png");
        }
        .seat:hover .seat-index{
            opacity: 1;
        }
        .seat.booked{
            background-image: url("assets/images/movie/seat01-free.png");
            cursor: default;
        }
        .seat.booked .seat-index{
            opacity: 0;
        }
        .seat.selected{
            background-image: url("assets/images/movie/seat01-free.png");
        }
        .seat.selected .seat-index{
            opacity: 1;
        }
        .seat-index{
            position: absolute;
            transform: translateX(-42%) translateY(-50%);
            font-size: 12px;
            opacity: 0;
        }
        .seat-key{
            font-size: 1.6rem;
            font-weight: 700;
            margin-top: 10px;
        }
        .selected-seat{
            font-size: 1.6rem;
            max-width: 250px;
            overflow-wrap:break-word;
        }
    </style>