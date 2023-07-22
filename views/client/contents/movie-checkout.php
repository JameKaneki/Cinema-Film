
<?php  


?>

<div class="movie-facility padding-bottom padding-top mt">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 details-banner hero-area bg_img seat-plan-banner" data-background="assets/images/banner/banner04.jpg">
                    <div class="container">
                        <div class="details-banner-wrapper">
                            <div class="details-banner-content style-two">
                            <?php 
                                $time = substr($MovieCheckout['time'],0,5);
                                echo "
                                    <h4 class=''>{$MovieCheckout['nameFilm']}</h4><br>
                                    <div class='tags'>
                                        <p >{$MovieCheckout['nameCinema']}</p>
                                    </div>
                                    <div>
                                        <span class='date'>{$MovieCheckout['date']}--{$time}</span>
                                    </div>
                                    <div class='item md-order-1 pt-4'>
                                        <a href='javascript:history.back()' class='custom-button back-button'>
                                            <i class='flaticon-double-right-arrows-angles'></i>back
                                        </a>
                                    </div>
                                ";
                            
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="booking-summery bg-one">
                       <?php 
                        echo "
                            <h4 class='title'>booking summery</h4>
                            <ul>
                                <li>
                                    <h4 class=''>{$MovieCheckout['nameFilm']}</h4>
                                    <span class='info'>{$MovieCheckout['language']}</span>
                                </li>
                                <li>
                                    <h6 class='subtitle'><span>{$MovieCheckout['nameCinema']}<span> </h6>
                                    <div class='info'><span>{$MovieCheckout['date']} -- $time</span> </div>
                                </li>
                                <li>
                                    <h6 class='subtitle mb-0'><span>Tickets  Price</span></h6><br>
                                    <h6 class='info'><span>$seatList</span><span>$150</span></h6>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <span class='info'><span>price</span><span>under input</span></span>
                                    <span class='info'><span>vat</span><span>under input</span></span>
                                </li>
                            </ul>
                        
                        ";
                       
                       ?>
                    </div>
                    <div class="proceed-area  text-center">
                        <h6 class="subtitle"><span>Amount Payable</span><span>$222</span></h6>
                        <a href="#0" class="custom-button back-button">proceed</a>
                    </div>
                </div>
            </div>
        </div>
    </div>