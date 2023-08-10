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
        $sql="SELECT 
        c.nameCinema,s.date,sh.time,seats.seat_key,f.nameFilm,b.status,b.id_bill,r.nameRoom,b.create_at,u.userName,b.price
        FROM `bill` as b 
        INNER JOIN tickets as t ON t.id_bill = b.id_bill
        INNER JOIN schedule_hours as sh ON t.idScheduleHour = sh.idScheduleHour 
        INNER JOIN rooms as r ON r.idRoom = sh.idRoom 
        INNER JOIN schedules as s ON s.idSchedule = sh.idSchedule
        INNER JOIN films as f ON f.idFilm = s.idFilm
        INNER JOIN seats ON seats.id_seat = t.id_seat
        INNER JOIN users as u ON u.idUser = t.idUser
        INNER JOIN cinemas as c ON c.idCinema = r.idCinema"; 
        if($idUser){
            $sql .= " AND u.idUser = '$idUser' ";
        }
        if($idFilm != ''){
            $sql .= " AND s.idFilm = '$idFilm' ";
        }
        $sql .= " WHERE b.status != 2";
        return pdo_query($sql);
    }
    
    function groupData_bill($idUser,$idFilm){
        $data = getBill_By_idUser_nameFilm($idUser,$idFilm);
        return array_reduce($data,"groupData_bill_seat",[]);
    }
    
    function groupData_bill_seat( array $carry, array $item){
        $seat_key = $item['seat_key'];
        $id_bill = $item['id_bill']; 
        if(isset($carry[$id_bill])){
            $seat_key_list = $carry[$id_bill]['seat_key'];
            $seat_key_list = [...$seat_key_list,$seat_key];
            $carry[$id_bill] = [...$carry[$id_bill], 'seat_key' => $seat_key_list];
            return $carry;
        }else{
            return [...$carry,$id_bill => [...$item,'seat_key' => [$seat_key]]] ;
        }}
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
        $sql .= " ORDER BY b.id_bill asc";
        return pdo_query($sql);{
    }
    }
    function add_link_bill($id_bill,$link){
        $sql = "UPDATE `bill` SET `link`='$link' WHERE id_bill = '$id_bill'";
        return pdo_execute($sql);
    }
?>