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
?>