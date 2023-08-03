<?php
    function insert_ticket($idUser,$idScheduleHour,$seat,$id_bill){
        $sql="INSERT INTO `tickets`( `idUser`, `idScheduleHour`, `id_seat`,`id_bill`) VALUES ('$idUser',$idScheduleHour,$seat,$id_bill)";
        pdo_execute($sql);
    }
    function delete_ticket($idTicket){
        $sql="DELETE FROM `tickets` WHERE `idTicket`=".$idTicket;
        pdo_execute($sql);
    }
    function delete_ticket_by_id_bill($id_bill){
        $sql = "DELETE FROM `tickets` WHERE `id_bill` = $id_bill";
        pdo_execute($sql);
    }
    function update_ticket($idTicket,$price,$seat,$idUser,$idScheduleHour){
        $sql="UPDATE `tickets` SET `price`='$price',`idUser`='$idUser',`idScheduleHour`='$idScheduleHour',`seat`='$seat' WHERE `idTicket`=".$idTicket;
        pdo_execute($sql);
    }

    function selectAll_ticket(){
        $sql="SELECT `tickets`.`idTicket`,`schedule_hours`.`idScheduleHour`,`time`,`users`.`idUser`,`name`,`cinemas`.`idCinema`,`nameCinema`,`films`.`idFilm`,`nameFilm`,`schedules`.`idSchedule`,`date`,`rooms`.`idRoom`,`nameRoom`,`seats`.`id_seat`,`seat_key`,`price` FROM `tickets`
        Inner join `schedule_hours` On `schedule_hours`.`idScheduleHour` = `tickets`.`idScheduleHour`
        Inner join `users` On `users`.`idUser` = `tickets`.`idUser`
        Inner join `schedules` On `schedule_hours`.`idSchedule` = `schedules`.`idSchedule`
        Inner join `films` On `schedules`.`idFilm` = `films`.`idFilm`
        Inner join `rooms` On `schedule_hours`.`idRoom` = `rooms`.`idRoom`
        Inner join `cinemas`On `rooms`.`idCinema` = `cinemas`.`idCinema`
        Inner join `seats` on `seats`.`id_seat` = `tickets`.`id_seat`  Order by 'idTicket' desc";
        return pdo_query($sql);
        // $sql="SELECT * From `tickets` Order by 'idTicket' desc";
        // return pdo_query($sql);
    }

    function select_ticket_by_user_id($id){
        $sql = "SELECT c.nameCinema,s.date,sh.time,seats.seat_key,f.nameFilm,b.status,b.id_bill,r.nameRoom
        FROM `tickets` as t 
        INNER JOIN schedule_hours as sh ON t.idScheduleHour = sh.idScheduleHour 
        INNER JOIN bill as b ON b.id_bill = t.id_bill
        INNER JOIN rooms as r ON r.idRoom = sh.idRoom 
        INNER JOIN schedules as s ON s.idSchedule = sh.idSchedule
        INNER JOIN films as f ON f.idFilm = s.idFilm
        INNER JOIN seats ON seats.id_seat = t.id_seat
        INNER JOIN users as u ON u.idUser = t.idUser
        INNER JOIN cinemas as c ON c.idCinema = r.idCinema
        WHERE t.idUser = $id AND b.status = 1 ORDER BY id_bill DESC";
        return pdo_query($sql);
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
    function getMovieCheckoutInfo($idScheduleHour){
        $sql = "SELECT f.nameFilm,c.nameCinema,r.nameRoom,s.date,sh.time,f.language FROM schedule_hours as sh 
        INNER JOIN schedules as s ON s.idSchedule = sh.idScheduleHour
        INNER JOIN rooms as r ON r.idRoom = sh.idRoom
        INNER JOIN films as f ON f.idFilm = s.idFilm
        INNER JOIN cinemas as c ON c.idCinema = r.idCinema
        WHERE sh.idScheduleHour = $idScheduleHour";
        return pdo_query_one($sql);
    }


    function group_ticket_seat($id){
        $ticketList = select_ticket_by_user_id($id);
        return array_reduce($ticketList,'reduce_group_ticket_seat',[]);
    }

    function reduce_group_ticket_seat( array $carry,array $item){
        $seat_key = $item['seat_key'];
        $id_bill = $item['id_bill']; 
        // print_r($carry);
        if(isset($carry[$id_bill])){
            $seat_key_list = $carry[$id_bill]['seat_key'];
            $seat_key_list = [...$seat_key_list,$seat_key];
            $carry[$id_bill] = [...$carry[$id_bill], 'seat_key' => $seat_key_list];
            return $carry;
            // return [...$carry,$carry[$id_bill] => [...$carry[$id_bill],'seat_key' => $seat_key_list  ]];
        }else{
            return [...$carry,$id_bill => [...$item,'seat_key' => [$seat_key]]] ;
        }}
        
?>


<!-- SELECT * FROM `tickets` as t 
INNER JOIN schedule_hours as sh ON t.idScheduleHour = sh.idScheduleHour 
INNER JOIN rooms as r ON r.idRoom = sh.idRoom 
INNER JOIN schedules as s ON s.idSchedule = sh.idSchedule
INNER JOIN films as f ON s.idFilm = s.idFilm
INNER JOIN seats ON seats.id_seat = t.id_seat
INNER JOIN users as u ON u.idUser = t.idUser
INNER JOIN cinemas as c ON c.idCinema = r.idCinema
INNER JOIN bill as b ON b.id_bill = t.id_bill
WHERE t.idUser = 1 -->