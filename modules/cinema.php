<?php
    function insert_cinema($nameCinema,$addressCinema){
        $sql= "INSERT INTO `cinemas`(`nameCinema`, `addressCinema`) VALUES ('$nameCinema','$addressCinema')";
        pdo_execute($sql);
    }
    function delete_cinema($idCinema){
            $sql= "DELETE FROM `cinemas` WHERE idCinema=".$idCinema;
            pdo_execute($sql);
    }
    function update_cinema($idCinema,$nameCinema,$addressCinema){
            $sql= "UPDATE `cinemas` SET `nameCinema`='$nameCinema',`addressCinema`='$addressCinema' WHERE idCinema=".$idCinema;
            pdo_execute($sql);
    }       
    function selectAll_cinema(){
        $sql="SELECT * FROM `cinemas` order by 'idCinema' desc";
        return pdo_query($sql);
    }

    function selectOne_cinema($idCinema){
            $sql="SELECT * FROM `cinemas` where idCinema = " .$idCinema;
            return pdo_query_one($sql);
            }
?>