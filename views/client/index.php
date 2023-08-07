<?php 

session_start();
ob_start();
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
    switch ($feature) {
        case 'movie-grid':{
        $praham= $_GET['id'];
        if($praham === 'playing'){
            $listFilm = loadall_playing_film();
            $name = "playing now";
            include "./contents/movie-grid.php";
        }
        if($praham === 'coming'){
                    $listFilm = loadall_coming_film();
                    $name = "coming soon";
                    include "./contents/movie-grid.php";
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
                $client_login = client_login($userName,$password);
                if($userName == ""){   
                    $errors['userName'] = "Username can not be blank";
                }   
                if($password == ""){
                    $errors['password'] = "password can not be blank";
                }
                if (!isset($errors)) {
                    if (is_array($client_login)) {
                        $_SESSION['userName'] = $client_login;
                        header('Location: http://localhost/Cinema-Film/views/client/index.php');
                    } else {
                        $popup = "User name or password invalid";
                        header("Location: index.php?act=sign-in&popup=$popup");
                    }
                }else{
                    $popup = "User name or password invalid";
                    header("Location: index.php?act=sign-in&popup=$popup");
                }
                }
                include "./contents/sign-in.php";
            break;
        case 'exit':{
            session_unset();
            header('Location: http://localhost/Cinema-Film/views/client/index.php');
        }
        break;
        case 'movie-detail': {
                include "./contents/movie-detail.php";
            }
            break;
        case "ticket-plant":
            {
                include "./contents/movie-ticket-plan.php";
            }
            break;  

        case 'seat-plan':
            {
                // nhận vào idshedulehour 
                if(isset($_GET['idScheduleHour'])){
                    $idScheduleHour = $_GET['idScheduleHour'];
                    $scheduleHourInfo = getScheduleHoursById($idScheduleHour);
                    if($scheduleHourInfo == []){
                        include "./contents/invalidateData.php";
                    }else{
                        $seatList = groupSeatById($scheduleHourInfo['idRoom']);
                        // $seatList = array_reduce($seatList,'group_seat',[]);
                        $bookedSeat = getBookedSeat($idScheduleHour);
                        include "./contents/movie-seat-plan.php";
                    }
                   
                }else{
                   include "./contents/invalidateData.php";
                }
            } 
        break;
        case 'movie-checkout':
        { 
            router_login();
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
                router_login();
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
function router_login()
{
    if (empty($_SESSION['userName'])){
        $alert = "Please login first";
        header('Location:index.php?act=sign-in&alert='.$alert);
    }
}

// content heaar

include "./footer.php";
function group_seat (array $carry,array $item) {
    $seat_key = $item['seat_key'];
    $key = substr($seat_key,0,1);
    if(isset($carry[$key])){
        return [...$carry, $key => [$item]];
    }else  if(isset($carry[$key])){
        return [...$carry, $key => [...$carry[$key]],$item];
    }
    return $carry;
}
?>