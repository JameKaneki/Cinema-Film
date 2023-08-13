<?php 
    // function getAllScheduleHours(){
    //     $sql = "SELECT * FROM `schedule_hours` WHERE 1";
    //     return pdo_query($sql);
    // }
    function  getAllScheduleHoursInfo(){
        $sql = "SELECT sh.idScheduleHour, s.date,sh.time,f.nameFilm,r.nameRoom FROM `schedule_hours` as sh INNER JOIN schedules as s ON sh.idSchedule = s.idSchedule INNER JOIN films as f ON f.idFilm = s.idSchedule INNER JOIN rooms as r on r.idRoom = sh.idRoom";
        return pdo_query($sql);
    }
    function getScheduleHoursWithDateIdFilmIdRoom($time,$idFilm,$idRoom){
        $sql = "SELECT sh.idScheduleHour, s.date,sh.time,f.nameFilm,r.nameRoom,f.idFilm FROM `schedule_hours` as sh 
        INNER JOIN schedules as s ON s.idSchedule = sh.idScheduleHour
        INNER JOIN rooms as r ON r.idRoom = sh.idRoom
        INNER JOIN films as f ON f.idFilm = s.idFilm";
        if(!empty($time)){
            $hour = substr($time,0,2);
            $sql .= " AND sh.time like '$hour%'";
        }
        if(!empty($idFilm)){
            $sql .= " AND f.idFilm = '$idFilm' ";
        }
        if(!empty($idRoom)){
            $sql .= " AND  r.idRoom = '$idRoom' ";
        }
        return pdo_query($sql);
    }
    function getAllScheduleHours($date,$idFilm){
        $sql = "SELECT * FROM `schedule_hours` as sh INNER JOIN `schedules` as s ON sh.idSchedule = s.idSchedule ";
        if($date != ''){
            $sql .= " AND s.date = '$date' ";
        }
        if($idFilm != ''){
            $sql .= " AND s.idFilm = '$idFilm' ";
        }
        $sql .= " ORDER BY s.idFilm";
        return pdo_query($sql);
    }

    function getAllScheduleHours_dateTime($date,$idFilm){
        $sql = "SELECT sh.time,s.idFilm,s.date,c.nameCinema,c.idCinema,sh.idScheduleHour FROM `schedule_hours` as sh INNER JOIN `schedules` as s ON sh.idSchedule = s.idSchedule INNER JOIN `films` as f On s.idFilm = f.idFilm INNER JOIN `rooms` as r On r.idRoom =sh.idRoom INNER JOIN `cinemas` as c ON r.idCinema =c.idCinema";
          
        if($date != ''){
            $sql .= " AND s.date = '$date' ";
        }
        if($idFilm != ''){
            $sql .= " AND s.idFilm = '$idFilm' ";
        }
        $sql .= " ORDER BY sh.time";
        return pdo_query($sql);
    }

    

    function getScheduleHoursByIdSchedule($idSchedule){
        $sql = "SELECT * FROM `schedule_hours` WHERE `idSchedule` = $idSchedule";
        return pdo_query($sql);
    }
    function getScheduleHoursById($idScheduleHour){
        $sql = "SELECT sh.idScheduleHour,sh.time,sh.idSchedule,sh.idRoom,s.date,f.nameFilm,c.nameCinema,r.nameRoom FROM `schedule_hours` as sh 
        INNER JOIN schedules as s ON s.idSchedule=sh.idSchedule 
        INNER JOIN films as f ON f.idFilm = s.idFilm 
        INNER JOIN rooms as r on r.idRoom = sh.idRoom 
        INNER JOIN cinemas as c ON r.idCinema = c.idCinema
        WHERE sh.idScheduleHour = $idScheduleHour";
        return pdo_query_one($sql);
    }
    function createScheduleHours($idSchedule,$hour,$idRoom){
        $sql = "INSERT INTO `schedule_hours`('time', 'idSchedule', 'idRoom') VALUES ($idSchedule,$hour,$idRoom)";
        return pdo_execute(($sql));
    }
    function removeScheduleHoursById($idScheduleHour){
        $sql = "DELETE FROM `schedule_hours` WHERE `idScheduleHour` = '$idScheduleHour'";
        return pdo_execute($sql);
    }
    function removeScheduleHoursByIdSchedule($idSchedule){
        $sql = "DELETE FROM `schedule_hours` WHERE `idSchedule` = $idSchedule";
        return pdo_execute(($sql));
    }

    function groupScheduleHours($date,$idFilm){
            $data  = getAllScheduleHours($date,$idFilm);
            return array_reduce($data,"groupData",[]); 
    }

    function groupScheduleHours_dateTime($date,$idFilm){
        $data  = getAllScheduleHours_dateTime($date,$idFilm);
        return array_reduce($data,"groupData_dateTime",[]);
}

    function groupData_dateTime(array $carry,array $current){
        if(isset($carry[$current['nameCinema']])){
            return [...$carry,$current['nameCinema']=>[...$carry[$current['nameCinema']],"{$current['idScheduleHour']},{$current['time']}"]];
        }else{
            return [...$carry,$current["nameCinema"]=>["{$current['idScheduleHour']},{$current['time']}"]];
        }
    }

    function groupData( array $carry,array $current){
        if(isset($carry[$current["idSchedule"]]) ){
            return [...$carry,$current['idSchedule']=>[...$carry[$current['idSchedule']],$current['time']] ];
        }else{
            return [...$carry,$current["idSchedule"]=>[$current['time']]];
        }
    }
?>