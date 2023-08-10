<?php
    /**
     * Thêm loại mới
     * @param String  là tên loại
     * @throws PDOException lỗi thêm mới
     */

    function insert_film($nameFilm,$director,$performer,$premiere,$duration,$language,$description,$category,$trailer,$poster,$rate,$likeAmount)
{
    $sql = "INSERT INTO `films`(`nameFilm`, `director`, `performer`, `premiere`, `duration`, `language`, `description`,
     `category`, `trailer`, `poster`, `rate`, `likeAmount`) VALUES ('$nameFilm','$director','$performer','$premiere','$duration','$language',
     '$description','$category','$trailer','$poster','$rate',$likeAmount)";
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
    $sql = "SELECT * from `films` where `idFilm`=". $idFilm;
    return pdo_query_one($sql);
}

function load_id_film($idFilm){
    $sql = "SELECT f.idFilm,s.date from `films` as f
    Inner join `schedules` as s On s.idFilm = f.idFilm
    WHERE f.idFilm = $idFilm and s.date >= now()  Order by s.date  asc";
    return pdo_query($sql);
}
function loadall_film(){
    $sql="SELECT * FROM `films` ORDER BY `idFilm` DESC"; 
    $listfilm = pdo_query($sql);
    return $listfilm;
}

function group_id_film($idFilm){
    $data = load_id_film($idFilm);
    return array_reduce($data,"groupData_id_film",[]);
}

function groupData_id_film($carry, array $current){
    if(isset($carry[$current['idFilm']])){
        return [...$carry,$current['idFilm']=> [$current['date']]];
    }
    else{
        return [...$carry,$current['idFilm']=> [$current['date']]];
    }
}


function getDateTimeNow(){
    $now= new DateTime('now');
    return $now->format('Y-m-d');
}

function   update_film($idFilm,$nameFilm,$director,$performer,$premiere,$duration,$language,$description,$category,$trailer,$poster,$rate,$likeAmount){
    $sql= "UPDATE `films` SET `nameFilm`='$nameFilm',`director`='$director',`performer`='$performer',`premiere`='$premiere',`duration`='$duration',`language`='$language',`description`='$description',`category`='$category',`trailer`='$trailer',`poster`='$poster',`rate`='$rate',`likeAmount`='$likeAmount' WHERE `idFilm`=$idFilm";
    pdo_execute($sql);
}


function loadtop5_film(){
    $sql="SELECT DISTINCT f.nameFilm,f.idFilm,f.director,f.performer,f.premiere,f.duration,f.language,f.description,f.category,f.trailer,f.poster,f.rate,f.likeAmount from `films` as f
    inner join `schedules` as s on s.idFilm = f.idFilm  WHERE s.date >= NOW() and f.premiere <= now() Order by `premiere` asc limit 0,5";
    return pdo_query($sql);
}

function loadtop3playing_film(){
    $sql="SELECT DISTINCT f.nameFilm,f.idFilm,f.director,f.performer,f.premiere,f.duration,f.language,f.description,f.category,f.trailer,f.poster,f.rate,f.likeAmount from `films` as f
    inner join `schedules` as s on s.idFilm = f.idFilm  WHERE s.date >= NOW() and f.premiere <= now() Order by `premiere` desc limit 0,3";
    return pdo_query($sql);
}

function loadtop3coming_film(){
    $sql="SELECT * FROM `films` WHERE `premiere` > NOW() Order by `premiere` asc limit 0,3";
    return pdo_query($sql);
}

function loadall_playing_film(){
    $sql="SELECT DISTINCT f.nameFilm,f.idFilm,f.director,f.performer,f.premiere,f.duration,f.language,f.description,f.category,f.trailer,f.poster,f.rate,f.likeAmount from `films` as f
    inner join `schedules` as s on s.idFilm = f.idFilm  WHERE s.date >= NOW() and f.premiere <= now() Order by `premiere` desc";
    return  pdo_query($sql);
}

function loadall_coming_film(){
    $sql="SELECT * FROM `films` WHERE `premiere` > NOW() ORDER BY `premiere` asc";
    return pdo_query($sql);
}

function loadIdFilm_nameFilm(){
    $sql = "SELECT f.idFilm,f.nameFilm FROM `films` as f Order by `idFilm` asc";
    return pdo_query($sql);
}

?>

