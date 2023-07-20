<?php 
    function getAllRoom(){
        $sql = "SELECT r.idRoom,r.nameRoom,c.idCinema,c.nameCinema,c.addressCinema FROM `rooms` as r INNER JOIN `cinemas` as c ON r.idCinema = c.idCinema WHERE 1";
        return pdo_query($sql);
    }

?>