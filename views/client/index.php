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



if (isset($_GET['act'])) {
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
                $login = login_account($userName, $password);
                if ($userName == "") {
                    $errors['userName'] = "Username can not be blank";
                }
                if ($password == "") {
                    $errors['password'] = "password can not be blank";
                }
                if (!isset($errors)) {
                    if (is_array($login)) {
                        $_SESSION['userName'] = $login;
                        header('Location: http://localhost/Cinema-Film/views/client/index.php');
                    } else {
                        $popup = "User name or password invalid";
                        header("Location: index.php?act=sign-in&popup=$popup");
                    }
                } else {
                    $popup = "User name or password invalid";
                    header("Location: index.php?act=sign-in&popup=$popup");
                }
            } 
                include "./contents/sign-in.php";
            break;
        case 'movie-detail': {
                include "./contents/movie-detail.php";
            }
            break;
        case "ticket-plant": {
                include "./contents/movie-ticket-plan.php";
            }
            break;
        case 'seat-plan': {
                // nhận vào idshedulehour 
                $idScheduleHour = 17;
                $scheduleHourInfo = getScheduleHoursById($idScheduleHour);
                $seatList = groupScheduleHoursById($scheduleHourInfo['idRoom']);
                $bookedSeat = getBookedSeat($idScheduleHour, $scheduleHourInfo['idRoom']);
                include "./contents/movie-seat-plan.php";
            }
            break;
        case 'movie-checkout': {
                router_login();

                $check = true;
                if (isset($_GET['s']) && isset($_GET['sh'])  && isset($_GET['r'])) {
                    $seatList = explode(',', $_GET['s']);
                    $idScheduleHour = $_GET['sh'];
                    $idRoom = intval($_GET['r']);
                    $total;
                    $seatList = array_reduce($seatList, function ($carry, $item) {
                        global $idRoom, $check, $total;
                        $seatInfo = getSeatByIdRoomAndKey($idRoom, $item);
                        if (empty($seatInfo)) {
                            $check = false;
                        } else if ($carry == []) {
                            $total += intval($seatInfo['price']);
                            return [$item => [...$seatInfo]];
                        } else {
                            $total += intval($seatInfo['price']);
                            return [...$carry, $item => [...$seatInfo]];
                        }
                    }, []);
                    $MovieCheckout = getMovieCheckoutInfo($idScheduleHour, $idRoom);
                    if (!$check) {
                        include "./contents/invalidateData.php";
                    }
                    include "./contents/movie-checkout.php";
                }
            }
            break;
        case 'exit':
            session_unset();
            header("Location:http://localhost/Cinema-Film/views/client/index.php");
            break;
        default:
            include "./contents/home.php";
            break;
    }
} else {
    include "./contents/home.php";
}



// content heaar





include "./footer.php";
function router_login()
{
    
    if (empty($_SESSION['userName'])){
        $alert = "Please login first";
        header('Location: index.php?act=sign-in&alert='.$alert);
    }
}
