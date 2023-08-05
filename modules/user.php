<?php
function insert_user($userName,$password,$email)
{
    $sql = "INSERT INTO `users`(`userName`, `password`, `email`) VALUES ('$userName','$password','$email')";
    return pdo_execute_return($sql);
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
function check_acount($userName,$email){
    $sql="SELECT * FROM `users` WHERE userName = '$userName' OR email = '$email'";
    return pdo_query($sql);
}
function checkaccount($userName){
    $sql = "SELECT * FROM `users` WHERE `userName`='$userName'";
    $list_acount=pdo_query($sql);
    return $list_acount;
}
function client_login($userName,$password){
    $sql = "SELECT * FROM `users` WHERE userName = '$userName' AND `password` = '$password'";
    return pdo_query_one($sql);
}
function admin_login($email, $password){
    $sql = "SELECT * FROM `users` WHERE email = '$email' AND `password` = '$password'";
    return pdo_query_one($sql);
}
?>
