<?php

//  yêu cầu : -tên case cần tuân thủ một vài yêu cầu mình đặt ra được note ở file header.php 
//            - Mỗi code trong case cần phải được đóng gói trong {} break; sau đó mới tiếp tục qua case khác 
        //    - mình đã cmt phần làm ở dưới nên yêu cầu mn làm trong mình đã cmt tránh việc lộn xộn khó đọc
          //  - một số trường hợp code nhiều việc sử lý thì nên cmt và note lại vào chú ý hạn chế cmt quá nhiều dẫn tới lem luốc k clear code 
  
  
  //   trước mắt mình sẽ hoàn thành phần admin trước ngày 16/7, sau 16/7 mình sẽ quay qua làm client và nó sẽ cần cháy hơn nhiều. MÌnh sẽ code base header và footer trước cho mn nên cứ yên tâm
  // phần admin chỉ là xúc miệng để mn chuẩn bị cho client thôi nên cứ là clear nhất có thể nha
  // mong ae hợp tác , đúng giờ, mọi thắc mắc hay cần giúp đỡ có thể hỏi lại mình qua zalo trực mọi lúc có thể và rep sớm nhất cso thể
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
  //controller
  if(isset($_GET['act']) && isset($_SESSION['email'])){
    $act = $_GET['act'];
    switch ($act){
        case 'home':
          include "home.php";
            break;

          // Cinema
          case 'cinema-add':
            if(isset($_POST['addCinema'])&&($_POST['addCinema'])){
              $nameCinema=$_POST['nameCinema'];
              $addressCinema=$_POST['addressCinema'];
              insert_cinema($nameCinema,$addressCinema);
              $tb="Thành công";
            }          
            include "cinema/add.php";         
            break;

          case 'cinema':
            selectAll_cinema();
            include "cinema/list.php";
            break;
          
          case 'cinema-edit':
            if(isset($_GET['idCinema'])&&($_GET['idCinema']>0)){
              $listOne= selectOne_cinema($_GET['idCinema']);  
              $idCinema = $_GET['idCinema'];   
            }
            include "cinema/update.php";
            break;

          case 'cinema-update': 
            if(isset($_POST['update'])&&($_POST['update'])){
              $idCinema=$_POST['idCinema'];
              $nameCinema=$_POST['nameCinema'];
              $addressCinema=$_POST['addressCinema'];
              update_cinema($idCinema,$nameCinema,$addressCinema);
              $tb="Thành công";
            } 
            selectAll_cinema();          
            include "cinema/list.php";
            break;

          case 'cinema-delete':
          if(isset($_GET['idCinema'])&&(($_GET['idCinema']>0))){
            $idCinema = $_GET['idCinema'];
            delete_cinema($idCinema);
          }
          selectAll_cinema($idCinema);
            
            include "cinema/list.php";
            break;

            // Ticket

            // case 'ticket-add':
            //     if(isset($_POST['addTicket'])&&($_POST['addTicket'])){
            //       $price=$_POST['price'];
            //       $idUser=$_POST['idUser'];
            //       $idScheduleHour=$_POST['idScheduleHour'];
            //       $seat=$_POST['seat'];
            //       insert_ticket($price,$idUser,$idScheduleHour,$seat);
            //     }
            //     include "ticket/add.php";
            //     break;
            
            case 'ticket':
                  selectAll_ticket();
                  include "ticket/list.php";
                  break;
            
            // case 'ticket-edit':
            //   if(isset($_GET['idTicket'])&&$_GET['idTicket']){
            //     $listOne = selectOne_ticket($_GET['idTicket']);
            //     $idCinema = $_GET['idTicket'];
            //     include "ticket/update.php";
            //     break;
            //   }
            // case 'ticket-update':        
            //       if(isset($_POST['updateTicket'])&&($_POST['updateTicket'])){
            //         $idTicket= $_POST['idTicket'];
            //         $price=$_POST['price'];
            //         $idScheduleHour=$_POST['idScheduleHour'];
            //         $idUser=$_POST['idUser'];
            //         $seat=$_POST['seat'];
            //         update_ticket($idTicket,$price,$seat,$idUser,$idScheduleHour);
            //       }
            //       selectAll_ticket();
            //       include "ticket/list.php";
            //       break;

            case 'ticket-delete':
              if(isset($_GET['idTicket'])&&($_GET['idTicket'])){
              $idTicket = $_GET['idTicket'];
              delete_ticket($idTicket);
              }
              selectAll_ticket($idTicket);
              include "ticket/list.php";
              break;
            
            // comment

            case 'comment':
              selectAll_comment();
              include "comment/list.php";
              break;

            case 'comment-delete':
              if(isset($_GET['idComment'])&&($_GET['idComment'])){
                $idComment = $_GET['idComment'];
                delete_comment($idComment);
              }
              selectAll_comment();
              include "comment/list.php";
              break;

            case 'comment-add':
              if(isset($_POST['addComment'])&&$_POST['addComment']){
                $idUser = $_POST['idUser'];
                $idFilm = $_POST['idFilm'];
                $timeComment= $_POST['timeComment'];
                $content = $_POST['content'];
                add_comment($idUser,$idFilm,$timeComment,$content);
                $tb="thành công";
              }
              include "comment/add.php";
              break;

              // room

            case 'room':
              selectAll_room();
              include "room/list.php";
              break;

            case 'room-add':
              if(isset($_POST['addRoom'])&&($_POST['addRoom'])){
                $nameRoom = $_POST['nameRoom'];
                $idCinema = $_POST['idCinema'];
                $seatList = $_POST['seatList'];
                insert_room($nameRoom,$idCinema,$seatList);
              }
              include "room/add.php";
              break;    

            case 'room-delete':
              if(isset($_GET['idRoom'])&&($_GET['idRoom'])){
                delete_room($_GET['idRoom']);
              }
              selectAll_room();
              include "room/list.php";
              break;

            case 'room-edit':
              if(isset($_GET['idRoom'])&&$_GET['idRoom']){
                selectOne_room($_GET['idRoom']);
              }
              include "room/update.php";
              break;

            case 'room-update':
              {
                if(isset($_POST['updateRoom'])&&$_POST['updateRoom']){
                  $idRoom = $_POST['idRoom'];
                  $nameRoom = $_POST['nameRoom'];
                  $idCinema = $_POST['idCinema'];
                  $seatList = $_POST['seatList'];
                  update_room($idRoom,$nameRoom,$idCinema,$seatList);
                }
                selectAll_room();
                include "room/list.php";
              }
              break;
       //controller film
        case 'film_add':{
            // kiem tra nguoi dung click vao nut add
          if(isset($_POST['addnew'])&& $_POST['addnew']){
            $nameFilm = $_POST['nameFilm'];
            $director = $_POST['director'];
            $performer = $_POST['performer'];
            $premiere = $_POST['premiere'];
            $duration = $_POST['duration'];
            $language = $_POST['language'];
            $description = $_POST['description'];
            $category = $_POST['category'];
            $trailer = $_POST['trailer'];
            $poster = $_POST['poster'];
            $rate = $_POST['rate'];
          insert_film($nameFilm,$director,$performer,$premiere,$duration,$language,$description,$category,$trailer,$poster,$rate);
          $result = "Create successfully";
        }
      }
        $listfilm = loadall_film();
        include "./product/add.php";
        break;
        // List film
        case 'film':{
          $listfilm = loadall_film();
          include "./product/list.php";
        }
        break;
        // Delete film
        case 'film_delete':{
          if (isset($_GET['idFilm']) && ($_GET['idFilm'] > 0)) {
            delete_film($_GET['idFilm']);
        }
        $listfilm = loadall_film("", 0);
        include "./product/list.php";
        }
        break;
        case 'film_edit':{
          if (isset($_GET['idFilm']) && ($_GET['idFilm'] > 0)){
            $film=loadone_film($_GET['idFilm']);
        }
        include "./product/update.php";
        break;
        }
        case 'film_update':{
          if(isset($_POST['capnhat'])&& $_POST['capnhat']){
            $idFilm = $_POST['idFilm'];
            $nameFilm = $_POST['nameFilm'];
            $director = $_POST['director'];
            $performer = $_POST['performer'];
            $premiere = $_POST['premiere'];
            $duration = $_POST['duration'];
            $language = $_POST['language'];
            $description = $_POST['description'];
            $category = $_POST['category'];
            $trailer = $_POST['trailer'];
            $poster = $_POST['poster'];
            $rate = $_POST['rate'];
          update_film($idFilm,$nameFilm,$director,$performer,$premiere,$duration,$language,$description,$category,$trailer,$poster,$rate);
          $result = "Update successfully";
        }
        $listfilm = loadall_film("", 0);
        include "./product/list.php";
        break;
        }
        // controller user
          case 'user':{
            $list_user=loadall_acount();
            include "./user/list.php";
          }
          break;
          case 'user_delete':{
            if (isset($_GET['idUser']) && ($_GET['idUser'] > 0)) {
              delete_account($_GET['idUser']);
          }
          $list_user=loadall_acount();
          include "./user/list.php";
          }
          break;
          case 'user_login':{
            include "./user/login.php"; 
          }
          break;
          case 'user_exit':{
            session_unset();
            header("Location:index.php?act=login");
          }
          break;

          

      // controller user

      // controller seat

          case 'seat':{
            $listseat=loadall_seat();
            include "./seat/list.php";
          }
          break;
          case 'seat_add':{
            if(isset($_POST['addnew'])&& $_POST['addnew']){
              $seat_key = $_POST['seat_key'];
              $idRoom = $_POST['idRoom'];
              insert_seat($seat_key,$idRoom);
            $result = "Create successfully";
          }
          }
          include "./seat/add.php";
          break;

          case 'seat_delete':{
            if (isset($_GET['id_seat']) && ($_GET['id_seat'] > 0)) {
              delete_seat($_GET['id_seat']);
          }
          $listseat = loadall_seat();
          include "./seat/list.php";
          }
          break;
          case 'seat_edit':{
            if (isset($_GET['id_seat']) && ($_GET['id_seat'] > 0)){
          $listseat = loadone_seat($_GET['id_seat']);
          }
          include "./seat/update.php";
          break;
          }
          case 'seat_update':{
            if(isset($_POST['capnhat'])&& $_POST['capnhat']){
              $id_seat = $_POST['id_seat'];
              $seat_key = $_POST['seat_key'];
              $idRoom  = $_POST['idRoom'];
              update_seat($id_seat,$seat_key,$idRoom);
            $result = "Update successfully";
          }
          $listseat=loadall_seat();
          include "./seat/list.php";
          break;
          }
          // controller seat

          // controller room

          // controller room


          // controller schedules
        case 'schedules' :
          {
            include "./schedule/scheduleList.php";
          }
          break;
        case "schedule-delete":
          {
            $id = $_GET['id'];
            removeSchedule($id);
            header('Location:index.php?ctx=schedules');
          }
         break;
        case "schedule-create":
          {
            include "./schedule/scheduleAdd.php";
          }
         break;
        case "schedule-edit":
          {
              $id=$_GET['id'];
              $scheduleInfo = getOneSchedule($id,'','');
              include "./schedule/scheduleEdit.php";
          }
          break;
// controller schedules
// controller scheduleHours
          case 'schedule_hours':
            {
              $schedule_hours = [];
              $time = '';$idRoom = '';$idFilm = '';
              if(isset($_POST['search'])){
                $time = $_POST['time'];
                $idFilm = empty($_POST['$idFilm']) ? "" : $_POST['$idFilm'];
                $idRoom = empty($_POST['idRoom']) ? "" : $_POST['idRoom'];
              }
              $schedule_hours = getScheduleHoursWithDateIdFilmIdRoom($time,$idFilm,$idRoom);

              include "./scheduleHours/scheduleHoursList.php";
            }
          break;
          case 'schedule_hours-delete':
            {
              $id = $_POST['id'];
              removeScheduleHoursById($id);
              header("Location:index.php?act=schedule_hours");
            }
          break;
          case "schedule_hours-edit" :
            {
              
            }
          break;
          case 'schedule_hours-create':
            {
              include "./scheduleHours/scheduleHoursAdd.php";
            }
          break;
// controller scheduleHours


// controller ticket

// controller ticket


          default :
            include "./home.php";
          }
  }
  include 'user/login.php';
?> 