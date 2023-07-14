<?php
    function insert_cinema($nameCinema,$addressCinema){
        $sql= "INSERT INTO `cinema`(`nameCinema`, `addressCinema`) VALUES ('$nameCinema','$addressCinema')";
        pdo_execute($sql);
    }
    function delete_cinema($idCinema){
        $sql= "DELETE FROM `cinema` WHERE idCinema='$idCinema'";
        pdo_execute($sql);
    }
    function update_cinema($idCinema,$nameCinema,$addressCinema){
        $sql= "UPDATE `cinema` SET `nameCinema`='$nameCinema',`addressCinema`='$addressCinema' WHERE `idCinema`='$idCinema'";
        pdo_execute($sql);
    }
?>