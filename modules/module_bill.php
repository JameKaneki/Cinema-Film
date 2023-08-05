<?php 
    function create_bill (int $price,int $idUser){
        $now = date("Y-m-d H:i:s");
        $sql = "INSERT INTO `bill`(`create_at`,`price`,`idUser`) VALUES ('$now' ,$price,$idUser)";
        return pdo_execute_return($sql);
    }
    function remove_bill($id){
        $sql = "DELETE FROM `bill` WHERE id_bill = $id";
        pdo_execute($sql);
    }
    function update_status_bill ($id_bill,$status){
        $sql = "UPDATE `bill` SET `status`='$status' WHERE id_bill = '$id_bill'";
        pdo_execute($sql);
    }
    function select_by_id_bill($id_bill){
        $sql = "SELECT * FROM `bill` WHERE id_bill = $id_bill";
        return pdo_query_one($sql);
    }

    function getBill_By_idUser_nameFilm($idUser,$idFilm){
        $sql=" SELECT DISTINCT b.id_bill,se.seat_key From `bill` as b
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
        $sql .= " ORDER BY se.seat_key asc";
        return pdo_query($sql);
    }
    
    function groupData_bill($idUser,$idFilm){
        $data = getBill_By_idUser_nameFilm($idUser,$idFilm);
        return array_reduce($data,"groupData_bill_seat",[]);
    }
    
    function groupData_bill_seat($carry, array $current){
        if(isset($carry[$current["id_bill"]])){
            return [...$carry,$current["id_bill"]=>[...$carry[$current['id_bill']],$current['seat_key']]];
        }else{
            return [...$carry,$current["id_bill"]=>[$current['seat_key']]];
        }
        }
    function select_bill($idUser,$idFilm){
        $sql=" SELECT DISTINCT b.id_bill,u.userName,b.status,b.create_at,b.price,f.nameFilm From `bill` as b
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
        $sql .= " ORDER BY b.id_bill";
        return pdo_query($sql);{
    }
    }
    function add_link_bill($id_bill,$link){
        $sql = "UPDATE `bill` SET `link`='$link' WHERE id_bill = '$id_bill'";
        return pdo_execute($sql);
    }
?>