<?php 
    function create_bill (int $price){
        $now = date("Y-m-d H:i:s");
        $sql = "INSERT INTO `bill`(`create_at`,`price`) VALUES ('$now' ,$price)";
        return pdo_execute_return($sql);
    }
    function remove_bill($id){
        $sql = "DELETE FROM `bill` WHERE id_bill = $id";
        pdo_execute($sql);
    }

?>