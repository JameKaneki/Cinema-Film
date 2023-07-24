<?php
function insert_user($userName,$password,$email,$name,$phoneNumber,$address)
{
    $sql = "INSERT INTO `users`(`userName`,`password`,`email`,`name`,`phoneNumber`,`address`) VALUES('$userName','$password','$email','$name','$phoneNumber','$address')";
    pdo_execute($sql);
}

function update_account($idUser,$userName,$password,$email,$name,$phoneNumber,$address){
    $sql="UPDATE `users` SET `userName`='$userName',`password`='$password',`email`='$email',`name`='$name',
    `phoneNumber`='$phoneNumber',`address`='$address' WHERE `idUser`='$idUser'";
    pdo_execute($sql);
}

function delete_account($idUser){
    $sql = "DELETE FROM `users` WHERE `idUser`=".$idUser;
    pdo_execute($sql);
}

function loadall_acount(){
    $sql = "SELECT * FROM `users` ORDER BY idUser DESC";
    $list_acount=pdo_query($sql);
    return $list_acount;
}
function check_acount($userName,$password){
    $sql="SELECT * FROM users WHERE `userName`='".$userName."' AND password='".$password."'";
    $user=pdo_query_one($sql);
    return $user;
}
?>
