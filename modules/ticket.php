<?php
    function insert_ticket($price,$idUser,$idScheduleHour,$seat){
        $sql="INSERT INTO `tickets`(`price`, `idUser`, `idScheduleHour`, `seat`) VALUES ('$price','$idUser','$idScheduleHour','$seat')";
        pdo_execute($sql);
    }
    function delete_ticket($idTicket){
        $sql="DELETE FROM `tickets` WHERE `idTicket`=".$idTicket;
        pdo_execute($sql);
    }
    function update_ticket($idTicket,$price,$seat,$idUser,$idScheduleHour){
        $sql="UPDATE `tickets` SET `price`='$price',`idUser`='$idUser',`idScheduleHour`='$idScheduleHour',`seat`='$seat' WHERE `idTicket`=".$idTicket;
        pdo_execute($sql);
    }

    function selectAll_ticket(){
        $sql="SELECT `tickets`.`idTicket`,`price`,`seat`,`schedule_hours`.`idScheduleHour`,`time`,`users`.`idUser`,`name`,`cinemas`.`idCinema`,`nameCinema`,`films`.`idFilm`,`nameFilm`,`schedules`.`idSchedule`,`date`,`rooms`.`idRoom`,`nameRoom` FROM `tickets`
        Inner join `schedule_hours` On `schedule_hours`.`idScheduleHour` = `tickets`.`idScheduleHour`
        Inner join `users` On `users`.`idUser` = `tickets`.`idUser`
        Inner join `schedules` On `schedule_hours`.`idSchedule` = `schedules`.`idSchedule`
        Inner join `films` On `schedules`.`idFilm` = `films`.`idFilm`
        Inner join `rooms` On `schedule_hours`.`idRoom` = `rooms`.`idRoom`
        Inner join `cinemas`On `rooms`.`idCinema` = `cinemas`.`idCinema`  Order by 'idTicket' desc";
        return pdo_query($sql);
        // $sql="SELECT * From `tickets` Order by 'idTicket' desc";
        // return pdo_query($sql);
    }
    function selectOne_ticket($idTicket){
        $sql="SELECT `tickets`.`idTicket`,`price`,`seat`,`schedule_hours`.`idScheduleHour`,`time`,`users`.`idUser`,`name` FROM `tickets`
        Inner join `schedule_hours` On `schedule_hours`.`idScheduleHour` = `tickets`.`idScheduleHour`
        Inner join `users` On `users`.`idUser` = `tickets`.`idUser` Where idTicket=".$idTicket;
        return pdo_query_one($sql);
    }

    function selectAll_schedule_hours(){
        $sql="SELECT * FROM `schedule_hours` Order by 'idSchedulesHour' desc ";
        return pdo_query($sql);
    }

    function selectAll_user(){
        $sql="SELECT * FROM `users` Order by 'idUser' desc";
        return pdo_query($sql);
    }
    function getMovieCheckoutInfo($idScheduleHour,$idRoom){
        $sql = "SELECT f.nameFilm,c.nameCinema,r.nameRoom,s.date,sh.time,f.language FROM schedule_hours as sh 
        INNER JOIN schedules as s ON s.idSchedule = sh.idScheduleHour
        INNER JOIN rooms as r ON r.idRoom = sh.idRoom
        INNER JOIN films as f ON f.idFilm = s.idFilm
        INNER JOIN cinemas as c ON c.idCinema = r.idCinema
        WHERE sh.idScheduleHour = $idScheduleHour AND r.idRoom = $idRoom";
        return pdo_query_one($sql);
    }

?>