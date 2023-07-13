<?php 
    function getAllSchedule(){
        $sql = "SELECT * FROM `schedules`";
        return pdo_query($sql);
    }

?>