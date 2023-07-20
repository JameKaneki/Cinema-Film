<?php 


include "./header.php";

if(isset($_GET['act'])){
    $feature = $_GET['act'];

    switch($feature){
       
        







        case 'movie-seat-plan' :
            {
                include "./contents/movie-seat-plan.php";
            } 
            break;
        default :
            echo "unKnow router";
        break;
    }
}else{
    include "./contents/home.php";
}







// content heaar





include "./footer.php";
?>