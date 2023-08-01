<?php 

session_start();
include "./header.php";
include "../../modules/module.php";
include "../../modules/cinema.php";
include "../../modules/ticket.php";
include "../../modules/comment.php";
include "../../modules/room.php";
include "../../modules/user.php";
include "../../modules/seat.php";
include "../../modules/product.php";  
include "../../modules/moduleSchedule.php";
include "../../modules/moduleScheduleHours.php";
include "../../modules/moduleRoom.php";
include "../../modules/module_bill.php";



if(isset($_GET['act'])){
    $feature = $_GET['act'];
    
    switch($feature){
        case 'movie-grid':{
            $param = $_GET['p'];
            $filmList = [];
            if('playing'){
                
            }
        }
        break;
        case 'sign-up':
            include "./contents/sign-up.php";
        break;
        case 'sign-in':
            if (isset($_POST['sign-in']) && ($_POST['sign-in'])) {
                $userName = $_POST['userName'];
                $password = $_POST['password'];
                $check = login_acount($userName,$password);
                if($userName == ""){   
                    $errors['userName'] = "Username can not be blank";
                }   
                if($password == ""){
                    $errors['password'] = "password can not be blank";
                }
                if(!isset($errors)){
                if (is_array($check)) {
                    $_SESSION['userName'] = $check;
                    header('Location:http://localhost/Cinema-Film/views/client/index.php');
                } else {
                    $thongbao = "Tài khoản không tồn tại. Vui lòng kiểm tra lại";
                }
                $thongbao = "Chúc mừng bạn. Đã đăng ký thành công";
            }
        }else{
                include "./contents/sign-in.php";
        }
         break;
        case 'exit':
            unset($_SESSION['userName']);
            header("Location:http://localhost/Cinema-Film/views/client/index.php");
        break;
        case 'playing':
                include "./contents/movie-grid-1.php";
            // {
            //     include "./contents/movie-grid.php";
            // }
            break;

        case 'coming':
            {
                include "./contents/movie-grid-2.php";
                // include "./contents/movie-grid.php";
            }
            break;
        case 'movie-detail':
            {
                include "./contents/movie-detail.php";
            }
            break;
        case "ticket-plant":
            {
                include "./contents/movie-ticket-plan.php";
            }
            break;  
        case 'seat-plan' :
            {
                // nhận vào idshedulehour 
                $idScheduleHour = 17;
                $scheduleHourInfo = getScheduleHoursById($idScheduleHour);
                $seatList = groupScheduleHoursById($scheduleHourInfo['idRoom']);
                $bookedSeat = getBookedSeat($idScheduleHour);
                include "./contents/movie-seat-plan.php";
            } 
        break;
        case 'movie-checkout':
        {
            if(isset($_GET['s'])&& isset($_GET['sh'])  && isset($_GET['r']) && isset($_GET['total'])){
                    $seatList= $_GET['s'];
                    $idScheduleHour = $_GET['sh'];
                    $idRoom = intval($_GET['r']);
                    $total = $_GET['total'];
                    $vat = intval($total*1/10);
                    $amountPayable = intval($total + $vat);
                    $MovieCheckout = getMovieCheckoutInfo($idScheduleHour);
                include "./contents/movie-checkout.php";
            }
        }
        break;
        case 'my-ticket':
            {
                include "./contents/my-ticket.php";
            }
        break;
        default :
            include "./contents/home.php";
        break;
    }
}else{
    include "./contents/home.php";
}



// content heaar





include "./footer.php";



?>