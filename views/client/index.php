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
            if(isset($_POST['sign-up']) && ($_POST['sign-up'])){
                $email = $_POST['email'];
                $password = $_POST['password'];
                $password2 = $_POST['password2'];
                if($email == ""){   
                    $errors['email'] = "email ko dc de rong";
                }   
                if($password == ""){
                    $errors['password'] = "password ko dc de rong";
                }
                if($password2 == ""){
                    $errors['password2'] = "Password nhap lai ko dc de rong";
                }
                if(!isset($errors)){
                    insert_user($email,$password);
                }else{
                    include "./contents/sign-up.php";           
                }
            }
        break;
        case 'sign-in':
            if (isset($_POST['sign-in']) && ($_POST['sign-in'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $check = check_client_acount($email,$password);
                if($email == ""){   
                    $errors['email'] = "email ko dc de rong";
                }   
                if($password == ""){
                    $errors['password'] = "password ko dc de rong";
                }
                if(!isset($errors)){
                if (is_array($check)) {
                    $_SESSION['email'] = $check;
                    header('Location: index.php');
                } else {
                    $thongbao = "Tài khoản không tồn tại. Vui lòng kiểm tra lại";
                }
                $thongbao = "Chúc mừng bạn. Đã đăng ký thành công";
            }
        }else{
                include "./contents/sign-in.php";
        }
            break;
        break;
        case 'exit':
            unset($_SESSION['email']);
            header("location:index.php");
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