<?php 

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
       
        case 'playing':
                include "./contents/movie-grid-1.php";
            break;

        case 'coming':
            {
                include "./contents/movie-grid-2.php";
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
        // case 'seat-plan' :
        //     {
        //         // nhận vào idshedulehour 
        //         $idScheduleHour = 17;
        //         $scheduleHourInfo = getScheduleHoursById($idScheduleHour);
        //         $seatList = groupScheduleHoursById($scheduleHourInfo['idRoom']);
        //         $booedSeat = getBookedSeat($idScheduleHour,$scheduleHourInfo['idRoom']);
        //         include "./contents/movie-seat-plan.php";
        //     } 
        //     break;
        default:
            include "./contents/home.php";
        break;
    }

}
else{
    include "./contents/home.php";
}




// content heaar





include "./footer.php";
?>