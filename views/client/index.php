<?php 

session_start();
// include "./header.php";
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
            $errors = [];
            if(isset($_POST['sign-up']) && ($_POST['sign-up'])){
                
                $userName = $_POST['userName'];
                $password = $_POST['password'];
                $password2 = $_POST['password2'];
                $checkaccount = checkaccount($userName);
                if(is_array($checkaccount)){   
                    $errors['userName'] = "tai khoan da ton tai";
                }
                if($userName == ""){   
                    $errors['userName'] = "email ko dc de rong";
                }
                if($password == ""){
                    $errors['password'] = "password ko dc de rong";
                }
                if($password2 == ""){
                    $errors['password2'] = "Password nhap lai ko dc de rong";
                }
                // if(!is_array($checkaccount)){
                //     insert_user($userName,$password);
                //     header("Location: http://localhost/Cinema-Film/views/client/index.php?act=sign-in");
                // }else{
                //     $notify = "Tai khoan da ton tai";
                //     header("Location: index.php?act=sign-up&notify=$notify");
                // }
                if($errors != []){
                    $insert = insert_user($userName,$password);
                    // header("Location: http://localhost/Cinema-Film/views/client/index.php?act=sign-in");
                }else{
                    include "./contents/sign-up.php";
                }
            }else{
                include "./contents/sign-up.php";
            }
                    
        break;
        case 'sign-in':
            if (isset($_POST['sign-in']) && ($_POST['sign-in'])) {
                $userName = $_POST['userName'];
                $password = $_POST['password'];
                $check = check_acount($userName,$password);
                if($userName == ""){   
                    $errors['userName'] = "Username can not be blank";
                }   
                if($password == ""){
                    $errors['password'] = "password can not be blank";
                }
                if(!isset($errors)){
                if (is_array($check)) {
                    $_SESSION['userName'] = $check;
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
            unset($_SESSION['userName']);
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
                $bookedSeat = getBookedSeat($idScheduleHour,$scheduleHourInfo['idRoom']);
                include "./contents/movie-seat-plan.php";
            } 
        break;
        case 'movie-checkout':
            {
                $check = true;
                if(isset($_GET['s'])&& isset($_GET['sh'])  && isset($_GET['r'])){
                    $seatList= explode(',',$_GET['s']);
                    $idScheduleHour = $_GET['sh'];
                    $idRoom = intval($_GET['r']);
                    $total ;
                        $seatList = array_reduce($seatList,function ($carry,$item){
                            global $idRoom,$check,$total;
                            $seatInfo = getSeatByIdRoomAndKey($idRoom,$item);
                            if(empty($seatInfo)){
                                $check = false;
                            }else if($carry == []){
                                $total += intval($seatInfo['price']);
                                return [$item =>[...$seatInfo]];
                            }else{
                                $total += intval($seatInfo['price']);
                                return [...$carry,$item =>[...$seatInfo]];
                            }
                        } ,[]);
                    $MovieCheckout = getMovieCheckoutInfo($idScheduleHour,$idRoom);
                    
                    if(!$check){
                        include "./contents/invalidateData.php";
                    }
                include "./contents/movie-checkout.php";
            }}
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