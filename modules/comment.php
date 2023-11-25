<?php
    function delete_comment($idComment){
        $sql="DELETE FROM `comments` WHERE idComment=".$idComment;
        pdo_execute($sql);
    }

    function add_comment($idUser,$idFilm,$timeComment,$content){
        $sql="INSERT INTO `comments`(`id`, `idFilm`, `timeComment`, `content`) VALUES ('$idUser','$idFilm','$timeComment','$content')";
        pdo_execute($sql);
    }

    function selectAll_comment(){
        $sql="SELECT `comments`.`idComment`,`timeComment`,`content`, `users`.`id`,`name`,`films`.`idFilm`,`nameFilm` FROM `comments`
        INNER JOIN `films` ON `films`.`idFilm` =  `comments`.`idFilm`
        INNER JOIN `users` ON  `users`.`id` = `comments`.`id`
         Order by 'idComment' desc";
        return pdo_query($sql);
    }

    function selectOne_comment($idComment){
        $sql="SELECT `comments`.`idComment`,`timeComment`,`content`, `users`.`id`,`name`,`films`.`idFilm`,`nameFilm` FROM `comments`
        INNER JOIN `films` ON `films`.`idFilm` =  `comments`.`idFilm`
        INNER JOIN `users` ON  `users`.`id` = `comments`.`id`
        WHERE idComment=" .$idComment;
        return pdo_query($sql);
    }

    function selectAll_film(){
        $sql="SELECT * FROM `films` order by 'idFilm' desc";
        return pdo_query($sql);
    }
?>