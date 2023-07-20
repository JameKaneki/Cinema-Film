<?php
  include "../../modules/module.php";
  include "header.php";
  include "../../modules/product.php";
  include "../../modules/cinema.php";
  include "../../modules/ticket.php";
  include "../../modules/comment.php";
  include "../../modules/room.php";
  //controller
  if(isset($_GET['act'])){
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
          if(isset($_GET['idCinema'])&&(int($_GET['idCinema']>0))){
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
              if(isset($_POST['updateRoom'])&&$_POST['updateRoom']){
                $idRoom = $_POST['idRoom'];
                $nameRoom = $_POST['nameRoom'];
                $idCinema = $_POST['idCinema'];
                $seatList = $_POST['seatList'];
                update_room($idRoom,$nameRoom,$idCinema,$seatList);
              }
              selectAll_room();
              include "room/list.php";
              break;

  }
}
?> 