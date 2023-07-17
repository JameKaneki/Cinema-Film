<?php

//  yêu cầu : -tên case cần tuân thủ một vài yêu cầu mình đặt ra được note ở file header.php 
//            - Mỗi code trong case cần phải được đóng gói trong {} break; sau đó mới tiếp tục qua case khác 
        //    - mình đã cmt phần làm ở dưới nên yêu cầu mn làm trong mình đã cmt tránh việc lộn xộn khó đọc
          //  - một số trường hợp code nhiều việc sử lý thì nên cmt và note lại vào chú ý hạn chế cmt quá nhiều dẫn tới lem luốc k clear code 
  
  
  //   trước mắt mình sẽ hoàn thành phần admin trước ngày 16/7, sau 16/7 mình sẽ quay qua làm client và nó sẽ cần cháy hơn nhiều. MÌnh sẽ code base header và footer trước cho mn nên cứ yên tâm
  // phần admin chỉ là xúc miệng để mn chuẩn bị cho client thôi nên cứ là clear nhất có thể nha
  // mong ae hợp tác , đúng giờ, mọi thắc mắc hay cần giúp đỡ có thể hỏi lại mình qua zalo trực mọi lúc có thể và rep sớm nhất cso thể
  include "../../modules/module.php";
  include "header.php";
  include "../../modules/product.php";  
  include "../../modules/moduleSchedule.php";
  include "../../modules/moduleScheduleHours.php";
  //controller
  if(isset($_GET['act'])){
    $act = $_GET['act'];
    switch ($act){
        case 'home':
            include "home.php";
            break;
//controller film
        case 'film-add':{
            // kiem tra nguoi dung click vao nut add
          if(isset($_POST['addnew'])&& $_POST['addnew']){
            $name_film = $_POST['name_film'];
            $director = $_POST['director'];
            $performer = $_POST['performer'];
            $premiere = $_POST['premiere'];
            $duration = $_POST['duration'];
            $language = $_POST['language'];
            $description = $_POST['description'];
            $Trailer = $_POST['Trailer'];
            $poster = $_FILES['poster']['tmp_name'];
            $target_dir = "../upload/";
            $target_file = $target_dir . basename($_FILES['poster']['name']);
            if (move_uploaded_file($_FILES["poster"]["tmp_name"], $target_file)) {
              // echo"The file". htmlspecialchars(basename($_FILES['img_sp']['name'])) . "has been upload ";
          } else {
          }
          insert_film($nameFilm,$director,$performer,$duration,$language,$description,$trailer,$poster,$rate,$note,$cagetory);
          $result = "Create successfully";
        }
        
        include "views/admin/../product/add.php";
        }
        break;
        
// controller film


// controller user

// controller user



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
          case 'scheduleHours':
            {
              
            }
          break;
// controller scheduleHours


// controller ticket

// controller ticket


          default :
          echo "unKnow router";
            }
  }
?> 