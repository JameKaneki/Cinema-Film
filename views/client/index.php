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



if(isset($_GET['act'])){
    $feature = $_GET['act'];
    switch($feature){
        case 'movie-grid':{
            $param = $_GET['id'];
            if($param === 'playing'){
                $listFilm = loadall_playing_film();
                $name='Playing Now';
                include "./contents/movie-grid.php";
            }
            if($param ==='coming'){
                $name='Coming Soon';
                $listFilm = loadall_coming_film();
                include "./contents/movie-grid.php";
            }
        }
        break;
        //  case 'playing':
        //      {
        //          
        //      }
        //     }
        //     break;

        // case 'coming':
        //     {
        //       include "./contents/movie-grid.php";
        //     }
        //      break;
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

        // case 'date-search':
        //     {
        //     $schedule_hours = [];
        //     $group = [];
        //     $date = '';$idFilm = '';
        //       if(isset($_POST['search'])){
        //         $date = $_POST['date'];
        //         $idFilm =$_POST['$idFilm'];
        //       }
        //       $schedule_hours = getAllScheduleHours($date,$idFilm);
        //       $group = groupScheduleHours($date,$idFilm,'');
        //     }
        //     include "./contents/movie-ticket-plan.php";
        //     break;
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