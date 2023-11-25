<?php 
    function insert_room($nameRoom,$idCinema){
        $sql="INSERT INTO `rooms`(`nameRoom`, `idCinema`) VALUES ('$nameRoom','$idCinema')";
        pdo_execute($sql);
    }

    function delete_room($idRoom){
        $sql="DELETE FROM `rooms` where `idRoom`=".$idRoom;
        pdo_execute($sql);
    }

    function update_room($idRoom,$nameRoom,$idCinema){
        $sql="UPDATE `rooms` SET `nameRoom`='$nameRoom',`idCinema`='$idCinema' WHERE idRoom=".$idRoom;
        pdo_execute($sql);
    }

    function selectAll_room(){
        $sql="SELECT `rooms`.`idRoom`,`nameRoom`,`cinemas`.`idCinema`,`nameCinema` FROM `rooms`
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