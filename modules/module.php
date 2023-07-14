<?php 
   function connection(){
    $host = "localhost";
    $dbName = "duan1";
    $userName = "root";
    $password = "";
    
    try{
        $connect = new PDO("mysql:host=$host;dbname=$dbName;",$userName,$password);
        $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        echo "connect successfully";
        return $connect;
    }catch(PDOException $e){
        $e->getMessage();
    }
   }

   function pdo_execute($sql){
        try{
            $connect = connection();
            $stmt = $connect->prepare($sql);
            $stmt->execute($sql);
        }catch(PDOException $e){
            throw $e;
        }finally{
            unset($connect);
        }
   }

   function pdo_query_one($sql){
    try{
        $connect = connection();
        $stmt = $connect->prepare($sql);
        $stmt->execute($sql);
        $result = $stmt->fetch();
        return $result;
    }catch(PDOException $e){
        throw $e;
    }finally{
        unset($connect);
    }
   }
   function pdo_query($sql){
    try{
        $connect = connection();
        $stmt = $connect->prepare($sql);
        $stmt->execute($sql);
        $result = $stmt->fetchAll();
    }catch(PDOException $e){
        throw $e;
    }finally{
        unset($connect);
    }
   }


?>