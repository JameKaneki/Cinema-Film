<?php 
    function createSchedule($date,$idFilm){
        $sql = "INSERT INTO `schedules`( `date`, `idFilm`) VALUES ($date,$idFilm)";
        echo $sql;
        return pdo_execute($sql);
    }
    function removeSchedule($idSchedule) {
        $sql = "DELETE FROM 'schedules' WHERE 'idSchedule' = $idSchedule";
        return pdo_execute($sql);
    }
    function editSchedule($idSchedule,$date,$idFilm){
        $sql = "UPDATE 'schedules' SET 'date'=$date,'idFilm'= $idFilm WHERE 'idSchedule' = $idSchedule";
        return pdo_execute(($sql));
    }
    function getOneSchedule($idSchedule,$date,$idFilm){
        $sql = "SELECT s.date,s.idFilm,f.nameFilm FROM `schedules` as s INNER JOIN `films` as f ON f.idFilm = s.idFilm WHERE 1";
        if($idSchedule != ''){
            $sql .= " AND `idSchedule` = $idSchedule";
        }
        if($idFilm != ''){
            $sql .= " AND s.idFilm = $idFilm";
        }
        if($date != ''){
            $sql .= " AND s.date =  '$date'";
        }
        return pdo_query_one($sql);
    }

    function getScheduleByDate($date){
        $formatedDate = date_format($date,"Y-m-d");
        $sql = "SELECT s.idSchedule,s.date,f.nameFilm,s.idFilm FROM 'schedules' as s INNER JOIN 'films' as f ON s.idFilm = f.idFilm WHERE s.'date' = $formatedDate";
        return pdo_query($sql);
    }
    function getScheduleByDateAndIdFilm($date,$idFilm){
        $formatedDate = date_format($date,"Y-m-d");
        $sql = "SELECT s.idSchedule,s.date,f.nameFilm,s.idFilm FROM 'schedules' as s INNER JOIN 'films' as f ON s.idFilm = f.idFilm WHERE s.date = $formatedDate AND s.idFilm = $idFilm";
        return pdo_query($sql);
    }
    function getAllSchedule($date,$idFilm){
        $sql = "SELECT s.idSchedule,s.date,s.idFilm,f.nameFilm FROM `schedules` as s  INNER JOIN `films` as f ON f.idFilm = s.idFilm ";
        if($date != ''){
            $sql .= " AND s.date = '$date' ";
        }
        if($idFilm != ''){
            $sql .= " AND s.idFilm = '$idFilm' ";
        }
        return pdo_query($sql);
    }
    
    function getAllSchedule_dateTime($date,$idFilm){
        $sql = "SELECT DiSTINCT s.date,f.idFilm,c.nameCinema FROM `schedules` as s  
        INNER JOIN `films` as f ON f.idFilm = s.idFilm
        INNER JOIN `schedule_hours` as sh On sh.idSchedule = s.idSchedule
        INNER JOIN `rooms` as r ON r.idRoom = sh.idRoom
        INNER JOIN `cinemas` as c ON c.idCinema = r.idCinema";
        if($date != ''){
            $sql .= " AND s.date = '$date' ";
        }
        if($idFilm != ''){
            $sql .= " AND s.idFilm = '$idFilm' ";
        }
        // $sql .= " ORDER BY c.nameCinema";
        return pdo_query($sql);
    }

    // function groupAllSchedule_dateTime($date, $idFilm){
    //     $data= getAllSchedule_dateTime($date,$idFilm);
    //     return array_reduce($data,"groupSchedule_dateTime",[]);
    // } 

    // function groupSchedule_dateTime(array $carry , array $current){
    //     if(isset($carry[$current["nameCinema"]])){
    //         return [...$carry,$current['nameCinema']=> [...$carry,$current['nameCinema'],$current['idScheduleHour']]];
    //     }else{
    //         return [...$carry,$current["nameCinema"]=>[$current['idScheduleHour']]];
    //     }
    //     }

    function getScheduleByFilm($idFilm){
        $sql = "SELECT * FROM 'schedules' as s INNER JOIN 'schedule_hours' as sh ON s.idSchedule = sh.idScheduleHour INNER JOIN 'films' as f ON f.idFilm = s.idFilm WHERE s.idFilm = 6";
        return pdo_query($sql);
    }

?>