<?php
    // function selectAll_bill(){
    //     $sql= "SELECT DISTINCT b.id_bill,u.userName,b.status,b.create_at,b.price,f.nameFilm,se.seat_key From `bill` as b
    //     inner join `tickets` as t on t.id_bill = b.id_bill
    //     inner join `schedule_hours` as sh on t.idScheduleHour = sh.idScheduleHour
    //     inner join `schedules` as s on sh.idSchedule = s.idSchedule
    //     inner join `seats` as se on t.id_seat = se.id_seat
    //     inner join `users` as u On u.idUser = b.idUser
    //     inner join `films` as f on s.idFilm = f.idFilm";
    //     return pdo_query($sql);
    // }

    function getBill_By_idUser_nameFilm($idUser,$idFilm){
        $sql=" SELECT DISTINCT b.id_bill,u.userName,b.status,b.create_at,b.price,f.nameFilm,se.seat_key From `bill` as b
        inner join `tickets` as t on t.id_bill = b.id_bill
        inner join `schedule_hours` as sh on t.idScheduleHour = sh.idScheduleHour
        inner join `schedules` as s on sh.idSchedule = s.idSchedule
        inner join `seats` as se on t.id_seat = se.id_seat
        inner join `users` as u On u.idUser = b.idUser
        inner join `films` as f on s.idFilm = f.idFilm";
        if($idUser != ''){
            $sql .= " AND u.idUser = '$idUser' ";
        }
        if($idFilm != ''){
            $sql .= " AND s.idFilm = '$idFilm' ";
        }
    }

    function groupData_bill($idUser,$idFilm){
        $data = selectAll_bill($idUser,$idFilm);
        return array_reduce($data, "groupData_bill_seat",[]);
    }

    function groupData_bill_seat( array $carry, array $current){
        if(isset($carry[$current["id_bill"]]) ){
            return [...$carry,$current['id_bill']=>[...$carry[$current['id_bill']],$current['seat_key']]];
        }else{
            return [...$carry,$current["id_bill"]=>[$current['seat_key']]];
        }
        }
    
    

?>