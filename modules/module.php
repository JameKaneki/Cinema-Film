<?php 
    $host = "localhost";
    $dbName = "duan1";
    $userName = "root";
    $password = "";
    
    try{
        $connect = new PDO("mysql:host=$host;dbname=$dbName;",$userName,$password);
        $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        echo "connect successfully";
    }catch(PDOException $e){
        $e->getMessage();
    }


?>