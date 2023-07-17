<?php
function insert_user($userName,$password,$email,$name,$phoneNumber,$address)
{
    $sql = "INSERT INTO `user`(`userName`,`password`,`email`,`name`,`phoneNumber`,`address`) VALUES('$userName','$password','$email','$name','$phoneNumber','$address')";
    pdo_execute($sql);
}

function update_account($idUser,$userName,$password,$email,$name,$phoneNumber,$address){
    $sql="UPDATE `user` SET `userName`='$userName',`password`='$password',`email`='$email',`name`='$name',
    `phoneNumber`='$phoneNumber',`address`='$address' WHERE `idUser`='$idUser'";
    pdo_execute($sql);
}

function delete_account($idUser){
    $sql = "DELETE FROM `user` WHERE `idUser`=".$idUser;
    pdo_execute($sql);
}

function loadall_acount(){
    $sql = "SELECT * FROM `khachhang` ORDER BY id_kh DESC";
    $list_acount=pdo_query($sql);
    return $list_acount;
}
?>
