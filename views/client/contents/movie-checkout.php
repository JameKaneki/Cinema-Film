<?php
    if (isset($_GET['popup'])) {
        $popup = $_GET['popup'];
        echo '<script type="text/javascript">

            window.onload = function () { alert("' . $popup . '"); }

</script>';
    }
    ?>
<div class="movie-facility padding-bottom padding-top ">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 details-banner hero-area bg_img seat-plan-banner" data-background="assets/images/banner/banner04.jpg">
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
                                        <span class='date'>{$MovieCheckout['date']}-{$time}</span>
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
                <div class="col-lg-6">
                    <div class="booking-summery bg-one">
                         <h4 class='title'>booking summery</h4>
                       <?php 
                        echo "
                            <ul>
                                <li>
                                    <h6 class='subtitle'><span>{$MovieCheckout['nameCinema']}<h6><br>
                                    <div class='info'><span>{$MovieCheckout['date']}  $time</span> </div>
                                </li>
                            </ul>
                        ";
                        echo "<ul>
                                <li>
                                  <h6 class='subtitle'><span>Ticket Price<h6>
                                </li>
                               <li>
                        ";
                        foreach($seatList as $seat){
                            echo "
                                <span class='info'><span>{$seat['seat_key']}</span><span>{$seat['price']} $</span></span>
                            ";
                            }
                            echo "
                                </li>                               
                            </ul>";
                            $vat = $total*1/10;
                            echo "
                            <ul>
                                <li>
                                    <span class='info'><span>Total</span><span>$ $total</span></span>
                                    <span class='info'><span>vat</span><span>$ $vat</span></span>
                                </li>
                            </ul>
                            ";
                       ?>
                        
                    </div>
                    <div class="proceed-area  text-center">
                            <?php 
                            $amountPayable = $total + $vat;
                                echo "
                                    <h6 class='subtitle'><span>Amount Payable</span><span>$ {$amountPayable}</span></h6>
                                ";
                            ?>
                                <a href="#0" class="custom-button back-button">proceed</a>
                    </div>
                </div>
            </div>
        </div>
    </div>