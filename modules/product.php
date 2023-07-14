<?php
    /**
     * Thêm loại mới
     * @param String $name_dm là tên loại
     * @throws PDOException lỗi thêm mới
     */

    function insert_film($nameFilm,$director,$performer,$duration,$language,$description,$trailer,$poster,$rate,$note,$category)
{
    $sql = "INSERT INTO `film`(nameFilm,director,performer,duration,'language','description',trailer,rate,note,category)
    
     VALUES('$nameFilm','$director','$performer','$duration','$language',
     
     '$description','$trailer','$poster','$rate','$note','$category')";
    pdo_execute($sql);
}

/**
 * Xóa một hoặc nhiều loại
 * @param mix $id_sp là mã loại hoặc mảng mã loại
 * @throws PDOException lỗi xóa
 */

function delete_film($idFilm)
{
    $sql = "delete from film where id_sp=".$idFilm;
    pdo_execute($sql);
}

function   update_film( $idFilm , $nameFilm, $director, $performer,$duration,$language,$description,$trailer,$poster,$rate,$note){
    $sql = "UPDATE `film` SET   idFilm='".$idFilm."',`nameFilm`='".$nameFilm."',`director`='".$director."',`performer`='".$performer."'
    ,`duration`='".$duration."',`language`='".$language."',,`description`='".$description."',
    ,`trailer`='".$trailer."',`poster`='".$poster."',`rate`='".$rate."',`note`='".$note."' WHERE `idFilm`=". $idFilm;

    pdo_execute($sql);
}
?>

