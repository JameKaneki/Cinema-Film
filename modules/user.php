<?php
function insert_user($email,$password)
{
    $sql = "INSERT INTO `users`(`email`,`password`) VALUES('$email','$password')";
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
function check_client_acount($email,$password){
    $sql="SELECT * FROM users WHERE `email`='".$email."' AND password='".$password."'";
    $user=pdo_query_one($sql);
    return $user;
}
?>
