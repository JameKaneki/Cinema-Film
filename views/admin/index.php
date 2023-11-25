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
  include "../../modules/module_bill.php";

  //controller
  if(isset($_GET['act']) && isset($_SESSION['email'])){
    $act = $_GET['act'];
    switch ($act){
        case 'home':
          include "home.php";
            break;

          // Cinema
          case 'cinema-add':
            {
            include "cinema/add.php";
            if(isset($_POST['addCinema'])&&($_POST['addCinema'])){
              if($_POST['nameCinema']!=""&&$_POST['addressCinema']!=""){
              $nameCinema=$_POST['nameCinema'];
              $addressCinema=$_POST['addressCinema'];
              insert_cinema($nameCinema,$addressCinema);
              header("Location:index.php?act=cinema");
            }
          }    
            break;
        }
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

          case 'cinema-update': {
            if(isset($_POST['update'])&&($_POST['update'])){
              if($_POST['nameCinema']!=""&&$_POST['addressCinema']!=""){
              $idCinema=$_POST['idCinema'];
              $nameCinema=$_POST['nameCinema'];
              $addressCinema=$_POST['addressCinema'];
              update_cinema($idCinema,$nameCinema,$addressCinema);
              header("Location:index.php?act=cinema");
            }
            else{
              header("Location:index.php?act=cinema-edit&idCinema=".$_POST['idCinema']);
            }
          }
            break;
        }
          case 'cinema-delete':
          if(isset($_GET['idCinema'])&&(($_GET['idCinema']>0))){
            $idCinema = $_GET['idCinema'];
            delete_cinema($idCinema);
          }
          selectAll_cinema($idCinema);
            
            include "cinema/list.php";
            break;

            // Ticket

            
            case 'ticket':
                  selectAll_ticket();
                  include "ticket/list.php";
                  break;
            

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
              include "room/add.php";
              if(isset($_POST['addRoom'])&&($_POST['addRoom'])){
                if($_POST['nameRoom']!=""&&$_POST['idCinema']!=""){
                $nameRoom = $_POST['nameRoom'];
                $idCinema = $_POST['idCinema'];
                insert_room($nameRoom,$idCinema);
                header("Location:index.php?act=room");
                }
              }
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
                  if($_POST['nameRoom']!=""&&$_POST['idCinema']!=""){
                    $idRoom = $_POST['idRoom'];
                    $nameRoom = $_POST['nameRoom'];
                    $idCinema = $_POST['idCinema'];
                    update_room($idRoom,$nameRoom,$idCinema);
                    header("Location:index.php?act=room");
                    }
                    else{
                      header("Location:index.php?act=room-edit&idRoom=".$_POST['idRoom']);
                    }
              }
            }
              break;
       //controller film
        case 'film_add':{
          include "./product/add.php";
          if(isset($_POST['addnew'])&& $_POST['addnew']){
            if($_POST['premiere']>getDateTimeNow()&&$_POST['duration']>=60&&$_POST['nameFilm']!=""&&$_POST['category']!=""){
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
              $likeAmount = 0;
              insert_film($nameFilm,$director,$performer,$premiere,$duration,$language,$description,$category,$trailer,$poster,$rate,$likeAmount);
              header("Location:index.php?act=film");
            }
        }
      }
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
            if($_POST['premiere']>getDateTimeNow()&&$_POST['duration']>=60&&$_POST['nameFilm']!=""&&$_POST['category']!=""){
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
              $likeAmount = 0;
              update_film($idFilm,$nameFilm,$director,$performer,$premiere,$duration,$language,$description,$category,$trailer,$poster,$rate,$likeAmount);
              header("Location:index.php?act=film");
            }
            else{
              header("Location:index.php?act=film_edit&idFilm=".$_POST['idFilm']);
            }
        break;
        }
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

        //   case 'seat':{
        //     $listseat=loadall_seat();
        //     include "./seat/list.php";
        //   }
        //   break;
        //   case 'seat_add':{
        //     include "./seat/add.php";
        //     if(isset($_POST['addnew'])&& $_POST['addnew']){
        //       if($_POST['seat_key']!=""&& $_POST['idRoom']!=""){
        //         $seat_key = $_POST['seat_key'];
        //         $idRoom = $_POST['idRoom'];
        //         insert_seat($seat_key,$idRoom);
        //         header("Location:index.php?act=seat");
        //       }
        //   }
          
        //   break;
        // }
        //   case 'seat_delete':{
        //     if (isset($_GET['id_seat']) && ($_GET['id_seat'] > 0)) {
        //       delete_seat($_GET['id_seat']);
        //   }
        //   $listseat = loadall_seat();
        //   include "./seat/list.php";
        //   }
        //   break;
        //   case 'seat_edit':{
        //     if (isset($_GET['id_seat']) && ($_GET['id_seat'] > 0)){
        //   $listseat = loadone_seat($_GET['id_seat']);
        //   }
        //   include "./seat/update.php";
        //   break;
        //   }
        //   case 'seat_update':{
        //     if(isset($_POST['capnhat'])&& $_POST['capnhat']){
        //       if($_POST['seat_key']!=""&& $_POST['idRoom']!=""){
        //       $id_seat = $_POST['id_seat'];
        //       $seat_key = $_POST['seat_key'];
        //       $idRoom  = $_POST['idRoom'];
        //       update_seat($id_seat,$seat_key,$idRoom);
        //       header("Location:index.php?act=seat");
        //       }
        //       else{
        //         header("Location:index.php?act=seat_edit&id_seat=".$_POST['id_seat']);
        //       }
        //       break;
        //   }
        //   }
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
              $time = '';$idRoom = 0;$idFilm = 0;
              if(isset($_POST['search'])){
                $time = $_POST['time'];
                $idFilm = isset($_POST['idFilm']) ? $_POST['idFilm'] : 0  ;
                $idRoom = isset($_POST['idRoom']) ? $_POST['idRoom'] : 0  ;
              }
              $schedule_hours = getScheduleHoursWithDateIdFilmIdRoom($time,$idFilm,$idRoom);
              include "./scheduleHours/scheduleHoursList.php";
            }
          break;
          case 'schedule_hours-delete':
            {
              $id = $_GET['id'];
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


// controller bill


            case 'bill':
              $showSeatList=[];
              $billList=[];
              $seatList=[];
              if(isset($_POST['search'])){
                  $idFilm = $_POST['idFilm'];
                  $billList=groupData_bill('',$idFilm);
              }
              else{
                  $billList=groupData_bill('','');
              }
              {
                include "./bill/billList.php";
              }
              break;
            case 'bill-delete':
              {
                if(isset($_GET['id_bill'])&&$_GET['id_bill']>0){
                  $id = $_GET['id_bill'];
                remove_bill($id);
                }
                header("Location:index.php?act=bill");
                 }
              break;
              case 'bill-qrpay':
                {
                  if(isset($_GET['id'])){
                    include "./bill/handlePaying.php";
                  }else{
                    echo "
                      <script>
                      location.href =`http://localhost/Cinema-Film/views/admin/index.php?act=bill`;
                      window.onload = function(){alert('Don't try to skip any step');}
                      </script>
                    ";
                  }
                }
              break;
              case 'bill-pay':
                {
                  include "./bill/change_bill_status.php";
                }
// controller bill

          default :
            include "./home.php";
          }
  }
  include 'user/login.php';
?> 