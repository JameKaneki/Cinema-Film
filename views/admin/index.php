<?php

//  yêu cầu : -tên case cần tuân thủ một vài yêu cầu mình đặt ra được note ở file header.php 
//            - Mỗi code trong case cần phải được đóng gói trong {} break; sau đó mới tiếp tục qua case khác 
        //    - mình đã cmt phần làm ở dưới nên yêu cầu mn làm trong mình đã cmt tránh việc lộn xộn khó đọc
          //  - một số trường hợp code nhiều việc sử lý thì nên cmt và note lại vào chú ý hạn chế cmt quá nhiều dẫn tới lem luốc k clear code 
  
  
  //   trước mắt mình sẽ hoàn thành phần admin trước ngày 16/7, sau 16/7 mình sẽ quay qua làm client và nó sẽ cần cháy hơn nhiều. MÌnh sẽ code base header và footer trước cho mn nên cứ yên tâm
  // phần admin chỉ là xúc miệng để mn chuẩn bị cho client thôi nên cứ là clear nhất có thể nha
  // mong ae hợp tác , đúng giờ, mọi thắc mắc hay cần giúp đỡ có thể hỏi lại mình qua zalo trực mọi lúc có thể và rep sớm nhất cso thể
  session_start();
  include "../../modules/module.php";
  include "header.php";
  include "../../modules/user.php";
  include "../../modules/seat.php";
  include "../../modules/product.php";  
  include "../../modules/moduleSchedule.php";
  include "../../modules/moduleScheduleHours.php";
  include "../../modules/moduleRoom.php";
  //controller
  if(isset($_GET['act']) && isset($_SESSION['userName'])){
    $act = $_GET['act'];
    switch ($act){
        case 'home':
          include "home.php";
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
            $poster = $_FILES['poster']['tmp_name'];
            $target_dir = "./upload/";
            $target_file = $target_dir . basename($_FILES['poster']['name']);
            if (move_uploaded_file($_FILES["poster"]["tmp_name"], $target_file)) {
              // echo"The file". htmlspecialchars(basename($_FILES['img_sp']['name'])) . "has been upload ";
          } else {
          }
            $rate = $_POST['rate'];
            $likeAmount = $_POST['likeAmount'];
          insert_film($nameFilm,$director,$performer,$premiere,$duration,$language,$description,$category,$trailer,$poster,$rate,$likeAmount);
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
            $poster = $_FILES['poster']['tmp_name'];
            $target_dir = "./upload/";
            $target_file = $target_dir . basename($_FILES['poster']['name']);
            if (move_uploaded_file($_FILES["poster"]["tmp_name"], $target_file)) {
              // echo"The file". htmlspecialchars(basename($_FILES['img_sp']['name'])) . "has been upload ";
          } else {
          }
            $rate = $_POST['rate'];
            $likeAmount = $_POST['likeAmount'];
          update_film($idFilm,$nameFilm,$director,$performer,$premiere,$duration,$language,$description,$category,$trailer,$poster,$rate,$likeAmount);
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
          case 'user_exit':{
            session_unset();
            header("Location:index.php?act=home");
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
          echo "unKnow router";
          }
  }
  else{
    include "./user/login.php";
     if (isset($_POST['signin']) && ($_POST['signin'] > 0)) {
      $userName = $_POST['userName'];
      $password = $_POST['password'];
      $check = check_acount($userName,$password);
      if(is_array($check)){
        $_SESSION['userName'] = $check;
        header("Location:index.php?act=home");
      }else{
        $thongbao = "Tài khoản không tồn tại. Vui lòng kiểm tra lại tài khoản hoặc mật khẩu";
  }              

}
  }
?> 