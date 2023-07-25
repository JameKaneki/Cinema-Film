<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="css/themify-icons/themify-icons.css">
    <style>  
.sidebar {
    max-width: 400px;
    border: 1px solid gray;
    box-shadow: 2px 2px 2px gray;
    float: left;
    margin-right: 20px
}

.information {
    margin: 20px 50px;
}

.information h2{
    font-size: 20px;
}

.information p {
    margin-top: 10px;
    font-size: 20px;
}

.manager h2 {
    margin-left: 30px;
    font-size: 24px;
}

.nav-arrow-down-head {
    font-size: 28px;
    margin-right: 15px;
    /* background-color: white;
    boder: 1px solid white; */
}

.nav {
    list-style: none;
}

.nav li {
    padding: 15px;
    padding-left: 15px;
}

.nav {
    margin-top: 20px;
}

.nav li a {
    text-decoration: none;
    font-size: 24px;
    color: black;
}

.nav li:hover {
    background-color: rgba(244, 228, 244, 0.833);
}

.nav li a:hover {
    color: blue;
}
    </style>
</head>


<body>
    <div class="boxcenter">
        <div class="row mb headeraddmin" style="display:flex;justify-content: space-between;">
            <h1>
                Admin
            </h1>
            <li style="margin-top:20px;">
                <a href="index.php?act=user_exit" style="font-size: 2vw;color: #666;">Logout</a>
            </li>
        </div>
        <?php
        if (isset($_SESSION['userName'])) {
            extract($_SESSION['userName']);
        ?>
        <div class="sidebar">
            <div class="information">
                <h2><?=$userName?></h2>
                <p><?=$email?></p>
            </div>
                <?php   
                if($role == 1){
                ?>
                <div class="manager">
                <h2></i> Manager </h2>
                <ul class="nav">
                    <li><a href="index.php?act=home">
                            <i class="nav-arrow-down-head ti-bag"></i>
                            Home
                        </a></li>
                    <li><a href="index.php?act=film">
                            <i class="nav-arrow-down-head ti-bag"></i>
                            film
                        </a></li>
                    <li><a href="index.php?act=user">
                            <i class="nav-arrow-down-head ti-bag"></i>
                            User
                        </a></li>
                    <li><a href="index.php?act=room">
                            <i class="nav-arrow-down-head ti-bag"></i>
                            Room
                        </a></li>
                    <li><a href="index.php?act=seat">
                            <i class="nav-arrow-down-head ti-bag"></i>
                            Seat
                        </a></li>
                    <li><a href="index.php?act=schedules">
                            <i class="nav-arrow-down-head ti-bag"></i>
                            Schedules
                        </a></li>
                    <li><a href="index.php?act=schedule_hours">
                            <i class="nav-arrow-down-head ti-bag"></i>
                            Schedule Hours
                        </a></li>
                    <li><a href="index.php?act=ticket">
                            <i class="nav-arrow-down-head ti-bag"></i>
                            Ticket
                        </a></li>
                    <li><a href="index.php?act=cinema">
                            <i class="nav-arrow-down-head ti-bag"></i>
                            Cinema
                        </a></li>
                    <li><a href="index.php?act=comment">
                            <i class="nav-arrow-down-head ti-bag"></i>
                            Comment
                        </a></li>
                    </li>

                </ul>
            </div>
                <?php
                } 
                ?>
                <?php
                if($role == 2){
                ?>
                <li><a href="index.php?act=home">
                            <i class="nav-arrow-down-head ti-bag"></i>
                            Home
                        </a></li>
                <li><a href="index.php?act=film">
                            <i class="nav-arrow-down-head ti-bag"></i>
                            film
                        </a></li>
                <li><a href="index.php?act=room">
                            <i class="nav-arrow-down-head ti-bag"></i>
                            Room
                        </a></li>
                <li><a href="index.php?act=schedules">
                            <i class="nav-arrow-down-head ti-bag"></i>
                            Schedules
                        </a></li>
                <li><a href="index.php?act=schedule_hours">
                            <i class="nav-arrow-down-head ti-bag"></i>
                            Schedule Hours
                        </a></li>
                <li><a href="index.php?act=ticket">
                            <i class="nav-arrow-down-head ti-bag"></i>
                            Ticket
                        </a></li>
                <?php
                }
                ?>
            </div>
            </div>
            <?php }
            ?>
            
</body>