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
?>
