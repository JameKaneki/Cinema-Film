<?php
    /**
     * Thêm loại mới
     * @param String $name_dm là tên loại
     * @throws PDOException lỗi thêm mới
     */

    function insert_film($nameFilm,$director,$performer,$premiere,$duration,$language,$description,$category,$trailer,$poster,$rate,$likeAmount)
{
    $sql = "INSERT INTO `films`(`nameFilm`, `director`, `performer`, `premiere`, `duration`, `language`, `description`,
     `category`, `trailer`, `poster`, `rate`, `likeAmount`) VALUES ('$nameFilm','$director','$performer','$premiere','$duration','$language',
     '$description','$category','$trailer','$poster','$rate','$likeAmount')";
    pdo_execute($sql);
}

/**
 * Xóa một hoặc nhiều loại
 * @param mix $id_sp là mã loại hoặc mảng mã loại
 * @throws PDOException lỗi xóa
 */

function delete_film($idFilm)
{
    $sql = "DELETE FROM `films` WHERE idFilm=".$idFilm;
    pdo_execute($sql);
}
function loadone_film($idFilm)
{
    $sql = "select * from films where idFilm=". $idFilm;
    echo $sql;

    return pdo_query_one($sql);
}

function update_film($idFilm,$nameFilm,$director,$performer,$premiere,$duration,$language,$description,$category,$trailer,$poster,$rate,$likeAmount){
    $sql = "UPDATE `films` SET `nameFilm`='".$nameFilm."',`director`='".$director."',`performer`='".$performer."',`premiere`='".$premiere."',
    `duration`='".$duration."',`language`='".$language."',`description`='".$description."',`category`='".$category."',`trailer`='".$trailer."',
    `poster`='".$poster."',`rate`='".$rate."',`likeAmount`='".$likeAmount."' WHERE idFilm=". $idFilm;
    pdo_execute($sql);
}
function loadall_film(){
    $sql="SELECT * FROM `films` WHERE 1 ORDER BY `idFilm` DESC"; 
    $listfilm = pdo_query($sql);
    return $listfilm;
}
?>

