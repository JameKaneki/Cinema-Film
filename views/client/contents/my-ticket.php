<?php 
//    $user_id = $_SESSION['user_id'];
   $ticket_infos = group_ticket_seat(1);

   echo json_encode($ticket_infos);

?>