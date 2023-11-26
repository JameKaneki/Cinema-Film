<?php 
//    $user_id = $_SESSION['user_id'];
$userInfo = $_SESSION['userName'];
$ticket_infos = group_ticket_seat($userInfo['id']);
?>
<section class="banner-section">
        <div class="banner-bg bg_img bg-fixed" data-background="assets/images/banner/banner01.jpg"></div>
        <div class="container">
            <div class="banner-content" height='300px'>
                <h1 class="title  cd-headline clip">
                    <span> <?php echo "{$userInfo['name']}"; ?> </span>
                </h1>
                <h2 class='color-theme'>HAVE A BEST EXPERIENCE AT BELETO CINEMA</h2>
            </div>
        </div>
</section>
<section class="movie-section padding-bottom bg-two">
        <div class="container">
            <div class="">  
                    <div class="">
                            <h2 class="title">Your Ticket</h2>
                        <div class='ticket-list'>
                           <?php 
                            if(count($ticket_infos) == 0){
                                echo "<h1>Chưa có vé nào được đặt</h1>";
                            }else{
                                foreach($ticket_infos as $ticket){
                                    $date = $ticket['date'];
                                    $time = substr($ticket['time'],0,5);
                                    $seats = join(',',$ticket['seat_key']);
                                    $status = $ticket['status'] == 1 ? 'Paid' : 'Unpaid';
                                    echo "
                                    <div class='ticket-wrapper'>
                                    <div class='ticket-qr-code' >
                                        <div class='logo'>
                                                <img src='./assets/images/logo/logo.png'/>
                                        </div>
                                        <div>
                                            <h4 class=''>TICKET QR</h4>
                                            <img  src='./assets/images/Qr.png' style='background-color: white;'/>
                                        </div>
                                    </div>
                                    <div class='ticket-info-wrap'>
                                        <div class='logo'>
                                            <img src='./assets/images/logo/logo.png'/>
                                        </div>
                                        <div class='ticket-info'>
                                            <h3>{$ticket['nameFilm']}</h3>
                                            <h4>{$ticket['nameCinema']}</h4>
                                            <div class='ticket-info-line'>
                                                <div class='title'>ROOM</div>
                                                <div class='content'>{$ticket['nameRoom']}</div>
                                            </div>
                                            <div class='ticket-info-line'>
                                                <div class='ticket-info-title'>DATE</div>
                                                <div class='ticket-info-content'>$date</div>
                                            </div>
                                            <div class='ticket-info-line'>
                                                <div class='title'>TIME</div>
                                                <div class='content'>$time</div>
                                            </div>
                                            <div class='ticket-info-line'>
                                                <div class='title'>SEATS</div>
                                                <div class='content'>{$seats}</div>
                                            </div>
                                            <div class='ticket-info-line '>
                                                 <div class='title '>STATUS</div>
                                                 <div class='content {$status}'>{$status}</div>
                                            </div>
                                        
                                        </div>
                                    </div>
                               </div>
                                    
                                    ";
                                }
                            }
                           
                           
                           ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<style>
 .ticket-list{
    margin: 20px auto;
    max-width: 800px;

 }
 .ticket-wrapper{
    display: flex;
    margin: 40px auto;  
    max-height: 400px;
    background-image: url('./assets/images/banner/banner04.jpg');
    box-sizing: content-box;
 }
 .ticket-qr-code{
    margin: 0px 20px;
    display: flex;
    justify-content: space-between;
    padding: 20px 16px;
    border-right: 1px dashed white;
 }
 .ticket-qr-code .logo {
    position: relative;
    width: 50px;

 }
 .ticket-qr-code .logo img{
    position: absolute; 
    transform:rotate(270deg);
     left: -150%;
     top: 40%;

 }
 .ticket-qr-code h4{
    margin-top: 10px;
    font-weight: 300;
    font-size: 1.4rem;
    margin-bottom: 10px;
    text-align: center;
 }
 .ticket-info-wrap{
    padding: 16px;
    width: 100%;
 }
 .ticket-info{
    margin-top: 16px;
    font-weight: 100;
 }
 .ticket-info h3{
    padding-bottom: 12px;
    font-weight: 300;
    font-size: 1.4rem;
 }
 .ticket-info h4{
    font-weight: 100;
    font-size: 1.2rem;
    border-bottom: 1px dashed white;
 }
 .ticket-info-line{
    display: flex;
    justify-content: space-between;
 }
 .Unpaid{
    color: red;
 }

</style>