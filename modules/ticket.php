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
        $sql="SELECT `tickets`.`idTicket`,`price`,`seat`,`schedule_hours`.`idScheduleHour`,`time`,`users`.`idUser`,`name` FROM `tickets`
        Inner join `schedule_hours` On `schedule_hours`.`idScheduleHour` = `tickets`.`idScheduleHour`
        Inner join `users` On `users`.`idUser` = `tickets`.`idUser`  Order by 'idTicket' desc";
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

?>