
<?php 
 if (isset($_GET['alert'])) {
    $alert = $_GET['alert'];
    echo '<script type="text/javascript">
          window.onload = function () { alert("' . $alert . '"); }
        </script>';
}
    $idUser = $_SESSION['userName']['id'];
    $id_bill =  create_bill($amountPayable,$idUser);
    $_SESSION['id_bill'] = $id_bill;
    $orderType = 190000;
    $lang = 'vn';
    $bankCode = 'VNPAYQR';
    $time = date("Y-m-d H:i:s");
    $order_des = 'MS:' .$id_bill.' ' .$_GET['s']. ' ' . $time ;
// get userinfo form SESSION
    $userName = "NGUYEN VAN A";
    $sendData = array(
        'order_id' => $id_bill,
        'order_desc' => $order_des,
        'order_type' => $orderType,
        'amount' => $amountPayable ,
        'language' => $lang,
        'bank_code'=> $bankCode,
        'txt_billing_fullname' => $userName,
        // 'redirect' => 1
    );
// create ticket
    $seatArray = explode(',',$seatList);

    $seatArray = array_reduce($seatArray,function (array $carry, $item){
        global $idRoom;
        $seatInfo = getSeatByIdRoomAndKey($idRoom,$item);
        if($carry == []){
            return [$item =>[...$seatInfo]];
        }else{
            return [...$carry,$item =>[...$seatInfo]];
        }
    } ,[]);
    foreach($seatArray as $seat){
        insert_ticket($idUser,$idScheduleHour,$seat['id_seat'],$id_bill);
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
                                        <span class='date'>{$MovieCheckout['date']} {$time}</span>
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
                            <ul>
                                <li>
                                  <h6 class='subtitle'><span>Ticket Price<h6>
                                </li>
                                <li>
                                  <span class='info'><span>$seatList</span><span>$total VND</span></span>
                                </li>                               
                            </ul>
                            <ul>
                                <li>
                                    <span class='info'><span>Total</span><span> $total VND</span></span>
                                    <span class='info'><span>vat</span><span> $vat VND</span></span>
                                </li>
                            </ul>
                            ";
                       ?>
                        
                    </div>
                    <div class="proceed-area  text-center">
                    <!-- handle -->
                            <?php 
                            // $amountPayable = $total + $vat;
                                echo "
                                    <h6 class='subtitle'><span>Amount Payable</span><span>{$amountPayable}</span></h6>
                                ";
                            ?>  
                        <!-- handle post data  -->
                       
                            <?php 
                                echo "<form action = '../../vnpay_php/getdeal-vnpay.php' method='POST'>";
                                foreach($sendData as $key => $value ){
                                    echo "<input name={$key} value={$value} type='hidden'/>";
                                } 
                                echo "
                                   <div class='button-wrapper'>
                                    <input class='custom-button back-button' type='submit' name='paying-late' value='Paying late'/>
                                    <input class='custom-button back-button' type='submit'  name='paying-now' value='QR Paying now'/>
                                   </div>
                                </form>";
                            ?>
                                
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .button-wrapper{
            display: flex;
        }
    </style>