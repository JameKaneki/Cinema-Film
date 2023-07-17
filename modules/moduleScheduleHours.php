<?php 
    // function getAllScheduleHours(){
    //     $sql = "SELECT * FROM `schedule_hours` WHERE 1";
    //     return pdo_query($sql);
    // }
    function  getAllScheduleHoursInfo(){
        $sql = "SELECT sh.idScheduleHour, s.date,sh.time,f.nameFilm,r.nameRoom FROM `schedule_hours` as sh INNER JOIN schedules as s ON sh.idSchedule = s.idSchedule INNER JOIN films as f ON f.idFilm = s.idSchedule INNER JOIN rooms as r on r.idRoom = sh.idRoom";
        return pdo_query($sql);
    }
    function filterScheduleHours($date,$idFilm,$idRoom){
        $sql = "SELECT sh.idScheduleHour, s.date,sh.time,f.nameFilm,r.nameRoom,f.idFilm FROM `schedule_hours` as sh INNER JOIN schedules as s ON sh.idSchedule = s.idSchedule INNER JOIN films as f ON f.idFilm = s.idSchedule INNER JOIN rooms as r on r.idRoom = sh.idRoom";
        if(empty($date)){
            $sql .= " AND s.date = $date";
        }
        if(empty($idFilm)){
            $sql .= " AND f.idFilm = $idFilm";
        }
        if(empty($idRoom)){
            $sql .= " AND  "
        }
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
    function getScheduleHoursByIdSchedule($idSchedule){
        $sql = "SELECT * FROM `schedule_hours` WHERE `idSchedule` = $idSchedule";
        return pdo_query($sql);
    }
    function createScheduleHours($idSchedule,$hour,$idRoom){
        $sql = "INSERT INTO `schedule_hours`('time', 'idSchedule', 'idRoom') VALUES ($idSchedule,$hour,$idRoom)";
        return pdo_execute(($sql));
    }
    function removeScheduleHoursById($idScheduleHour){
        $sql = "DELETE FROM `schedule_hours` WHERE `idScheduleHour` = $idScheduleHour";
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

    function groupData( array $carry,array $current){
        if(isset($carry[$current["idSchedule"]]) ){
            return [...$carry,$current['idSchedule']=>[...$carry[$current['idSchedule']],$current['time']] ];
        }else{
            return [...$carry,$current["idSchedule"]=>[$current['time']]];
        }
    }
?>