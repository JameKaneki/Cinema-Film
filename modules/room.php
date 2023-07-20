<?php 
    function insert_room($nameRoom,$idCinema,$seatList){
        $sql="INSERT INTO `rooms`(`nameRoom`, `idCinema`, `seatList`) VALUES ('$nameRoom','$idCinema','$seatList')";
        pdo_execute($sql);
    }

    function delete_room($idRoom){
        $sql="DELETE FROM `rooms` where `idRoom`=".$idRoom;
        pdo_execute($sql);
    }

    function update_room($idRoom,$nameRoom,$idCinema,$seatList){
        $sql="UPDATE `rooms` SET `nameRoom`='$nameRoom',`idCinema`='$idCinema',`seatList`='$seatList' WHERE idRoom=".$idRoom;
        pdo_execute($sql);
    }

    function selectAll_room(){
        $sql="SELECT `rooms`.`idRoom`,`nameRoom`,`seatList`,`cinemas`.`idCinema`,`nameCinema` FROM `rooms`
        inner join `cinemas` on `cinemas`.`idCinema` = `rooms`.`idCinema`  order by idRoom desc";
        return pdo_query($sql);
    }

    function selectOne_room($idRoom){
        $sql="SELECT `rooms`.`idRoom`,`nameRoom`,`seatList`,`cinemas`.`idCinema`,`nameCinema` FROM `rooms` 
        inner join `cinemas` on `cinemas`.`idCinema` = `rooms`.`idCinema`
        where `idRoom`=".$idRoom;
        return pdo_query_one($sql);
    }

    // function selectAll_cinema(){
    //     $sql="SELECT * From `cinemas` order by `idCinema` desc";
    //     return pdo_query($sql);
    // }
?>