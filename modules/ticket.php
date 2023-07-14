<?php
    function insert_ticket($idSchedules,$price,$showTime,$seatKey,$idRoom,$idUser){
        $sql="INSERT INTO `ticket (`idSchedules`, `price`, `showTime`, `seatKey`, `idRoom`, `idUser`) VALUES ('$idSchedules','$price','$showTime','$seatKey','$idRoom','$idUser')";
        pdo_execute($sql);
    }
    function delete_ticket($idTicket){
        $sql="DELETE FROM `ticket` WHERE `idTicket`='$ticket'";
        pdo_execute($sql);
    }
    function update_ticket($idTicket,$idSchedules,$price,$showTime,$seatKey,$idRoom,$idUser){
        $sql="UPDATE `ticket` SET `idSchedules`='$idSchedules',`price`='$price',`showTime`='$showTime',`seatKey`='$seatKey',`idRoom`='$idRoom',`idUser`='$idUser' WHERE `ticket`='$idTicket'";
        pdo_execute($sql);
    }
?>