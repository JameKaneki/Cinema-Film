<?php
    function insert_seat($seat_key,$idRoom){
        $sql = "INSERT INTO `seats`(`seat_key`,`idRoom`) VALUES ('$seat_key','$idRoom')";
        pdo_execute($sql);
    }
    function delete_seat($id_seat)
    {
        $sql = "DELETE FROM `seats` WHERE id_seat=".$id_seat;
        pdo_execute($sql);
    }
    function loadall_seat(){
        $sql="SELECT s.id_seat, s.seat_key,s.idRoom,r.nameRoom  FROM `seats` AS s INNER JOIN `rooms`
         as r on s.idRoom = r.idRoom ORDER BY `id_seat` DESC"; 
        $listseat = pdo_query($sql);
        return $listseat;
    }
    function update_seat($id_seat,$seat_key,$idRoom){
            $sql = "UPDATE `seats` SET `seat_key`='".$seat_key."',`idRoom`='".$idRoom."' WHERE `id_seat`=". $id_seat; 
            pdo_execute($sql);
    }
    function loadone_seat($id_seat)
    {
    $sql = "select * from seats where id_seat=". $id_seat;
    $listseat = pdo_query_one($sql);
    return $listseat;
    }
    function getSeatListByIdRoom($idRoom){
        $sql = "SELECT * FROM `seats` WHERE idRoom = 1";
        return pdo_query($sql);
    }
    function groupScheduleHoursById($idRoom){
        $seatList = getSeatListByIdRoom($idRoom);
        $groupedSeatList = array_reduce($seatList,function (array $carry,array $item){
            $seatKey = $item['seat_key'];
            if(isset($carry[substr($seatKey,0,1)])){
                return [...$carry,substr($seatKey,0,1) => [...$carry[substr($seatKey,0,1)],$item]];
            }else{
                return [...$carry,substr($seatKey,0,1) =>[$item]];
            }
        },[]);
        return $groupedSeatList;
    }
    function getBookedSeat($idScheduleHour,$idRoom){
        $sql =
        "SELECT seats.seat_key,seats.price,seats.id_seat,sh.idScheduleHour,sh.time,f.nameFilm,s.date,r.idRoom,c.nameCinema FROM `tickets` as t 
        INNER JOIN users as u on t.idUser=u.idUser 
        INNER JOIN schedule_hours as sh ON t.idScheduleHour=sh.idScheduleHour 
        INNER JOIN seats ON seats.id_seat = t.id_seat 
        INNER JOIN schedules as s on s.idSchedule = sh.idSchedule 
        INNER JOIN films as f on f.idFilm = s.idFilm
        INNER JOIN rooms as r ON r.idRoom = seats.idRoom
        INNER JOIN cinemas as c ON r.idCinema = c.idCinema
        WHERE sh.idScheduleHour = $idScheduleHour AND r.idRoom = $idRoom";
        $result = pdo_query($sql);
        return array_map(function($seat){
            return $seat['seat_key'];
        },$result);
    }
?>