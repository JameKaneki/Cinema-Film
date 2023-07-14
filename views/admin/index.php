<?php
  include "../../modules/module.php";
  include "header.php";
  include "../../modules/product.php";
  //controller
  if(isset($_GET['act'])){
    $act = $_GET['act'];
    switch ($act){
        case 'home':
            include "home.php";
            break;
            //controller sản phẩm
        case 'film-add':
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
  }
?> 