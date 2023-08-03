<?php
        if(isset($_GET['idFilm'])&&$_GET['idFilm']){
            $idFilm = $_GET['idFilm'];
            if(is_array(load_id_film($idFilm))){
                extract(load_id_film($idFilm));
                $showDateList = [];
                $listDate=[];
                $showDateList=group_id_film($idFilm);
                //  print_r($showDateList);
                $listDate=load_id_film($idFilm);
                // print_r($listDate);
            }
            if(is_array(loadone_film($_GET['idFilm']))){
                extract(loadone_film($_GET['idFilm']));

               
                           
        $showTimeList = [];
        $schedules = [];
       if(isset($_POST['search']))
       {
           $date = $_POST['date'];
           $id = $_GET['idFilm'];
           $showTimeList = groupScheduleHours_dateTime($date,$id);
           $schedules = getAllSchedule_dateTime($date, $id);
        //    print_r($schedules);
        //    print_r($showTimeList);
       }else{
           $date = getDateTimeNow();
           $id = $_GET['idFilm'];
           $showTimeList = groupScheduleHours_dateTime($date,$id);
           $schedules = getAllSchedule_dateTime($date, $id);
           
       }
        

            }
        }
        
       

?>

<div class="act" action="index.php?act=movie-ticket-plan">
   <!-- ==========Window-Warning-Section========== -->
    <!-- <section class="window-warning inActive">
        <div class="lay"></div>
        <div class="warning-item">
            <h6 class="subtitle">Welcome! </h6>
            <h4 class="title">Select Your Seats</h4>
            <div class="thumb">
                <img src="assets/images/movie/seat-plan.png" alt="movie">
            </div>
            <a href="movie-seat-plan.html" class="custom-button seatPlanButton">Seat Plans<i class="fas fa-angle-right"></i></a>
        </div>
    </section> -->
    <!-- ==========Window-Warning-Section========== -->

    <!-- ==========Banner-Section========== -->
    <section class="details-banner hero-area bg_img" data-background="<?=$poster?>">
        <div class="container">
            <div class="details-banner-wrapper">
                <div class="details-banner-content">
                    <h3 class="title"><?php echo $nameFilm?></h3>
                    <div class="tags">
                        <a href="#0"><?=$language?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Banner-Section========== -->

    <!-- ==========Book-Section========== -->
    <section class="book-section bg-one">
        <div class="container">
            <form class="ticket-search-form " method="post">
                <div class="form-group" style="margin-left: 370px;">
                    <div class="thumb">
                        <img src="assets/images/ticket/date.png" alt="ticket">
                    </div>
                    <span class="type">date</span>
                    <select class="select-bar" name="date">
                        <?php   
                                echo '<option value="'.$date.'" >'.$date.'</option>';
                                echo '<option value="#" >-----------------</option>';
                                foreach($listDate as $list){              
                                        extract($list);
                                if(isset($showDateList[$list['idFilm']])){
                                foreach($showDateList[$list['idFilm']] as $item){
                                    echo '<option value="'.$date.'" >'.$date.'</option>';
                                }
                            }
                        }
                         ?>                         
                    </select>               
                </div>
                <button type="submit" name="search" style="width: 100px; height: 30px; color: green; margin-right: 430px; margin-top:5px;">Search</button>
            </form>
        </div>
    </section>
    <!-- ==========Book-Section========== -->

    <!-- ==========Movie-Section========== -->
    <div class="ticket-plan-section padding-bottom padding-top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 mb-5 mb-lg-0">
                    <ul class="seat-plan-wrapper bg-five">
                        <?php
                            if($schedules!=[]){
                            foreach ($schedules as $schedule){
                                 extract($schedule);
                                    echo '<li>
                                    <div class="movie-name">
                                        <div class="icons">
                                            <i class="far fa-heart"></i>
                                            <i class="fas fa-heart"></i>
                                        </div>
                                        <a href="#0" class="name">'.$nameCinema.'</a>
                                        <div class="location-icon">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                    </div>';
                                    echo '<div class="movie-schedule justify-content-start" >';
                                    if(isset($showTimeList[$schedule['nameCinema']])){
                                        foreach($showTimeList[$schedule['nameCinema']] as $item){
                                            // extract($item);
                                            $scheduleHourInfo =  explode(",",$item);
                                            $idScheduleHour = $scheduleHourInfo[0];
                                            $time = $scheduleHourInfo[1];
                                            $time_four= substr($time,0,5);
                                            echo '
                                            <div class="item" style="margin-left: 20px;">
                                             <a href="index.php?act=seat-plan&idScheduleHour='.$idScheduleHour.'" class="time" style="color: white;">'.$time_four.'</a>
                                            </div>
                                            ';
                                        }
                                    }
                                    echo '</div>
                                    </li>';    
                            }
                        }
                        else{
                            echo '<li style="
                            width: 490px;margin-left: 400px;">
                                <h5 style="background: -webkit-linear-gradient(180deg, rgba(0, 18, 50, 0.134891) 0%, #001232 90%);">Chưa có lịch chiếu trong hôm nay </h5>
                                </li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- ==========Movie-Section========== -->
    </div>
