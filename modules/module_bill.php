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
    function add_link_bill($id_bill,$link){
        $sql = "UPDATE `bill` SET `link`='$link' WHERE id_bill = '$id_bill'";
        return pdo_execute($sql);
    }
?>