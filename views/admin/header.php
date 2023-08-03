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
.boxcenter{
    width: 100%;
    margin: 0 auto;
}
.sidebar {
    max-width: 30%;
    border: 1px solid gray;
    box-shadow: 2px 2px 2px gray;
    margin-right: 20px;
    position: fixed;
}

.user{
    font-size: 18px;
    
}
.information {
    margin: 20px 50px;
    margin-left: 20px;
}

.information h2{
    font-size: 20px;
}


.manager h2 {
    margin-left: 25px;
    font-size: 20px;
    font-weight: 700;
    color: gray;
    text-shadow: 0.5px 0.5px gray;
}

.nav-arrow-down-head {
    font-size: 18px;
    margin-right: 15px;
    font-weight: 700;
}

.nav {
    list-style: none;
}

.nav li {
    padding: 10px;
    margin-left: -25px;
    margin-right: 15px;
}

.nav {
    margin-top: 10px;
}

.nav li a {
    text-decoration: none;
    font-size: 18px;
    font-weight: 600;
    color: black;
}

.nav li:hover {
    background-color: rgba(244, 228, 244, 0.833);
    border-left:2px solid blue;
}

.nav li a:hover {
    color: blue;
}
.header{
    display: flex;
    width: 100%;
    height: 70px;
    border: 1px solid gray;
    box-shadow: 2px 2px 2px gray;
}

.logout{
    margin-left: 1500px;
    line-height: 70px;
}
.logout a{
    text-decoration: none;
    font-size: 28px;
    color: white;
    border: 1px solid red;
    background-color: red;
    padding: 5px;
}

.logout a:hover{
    background-color: gray;
    color: black;
    border: 1px solid gray;
}

.logo{
    line-height: 70px;
}

.logo .icon-2{
    color: rgb(0, 72, 255);
    font-size: 24px;
}

.logo a{
    margin-left: 30px;
    background-color: rgb(206, 230, 241);
    text-decoration: none;
    font-weight: 300;
    font-size: 32px;
    color: rgb(123, 59, 123);
    padding: 5px;
}


    </style>
</head>


<body>
    
        <?php
        if (isset($_SESSION['email'])) {
            extract($_SESSION['email']);
        ?>
        <div class="boxcenter">
        <div class="header">
            <div class="logo">
            <a href="index.php?act=home">
            <i class="icon-2 ti-joomla"></i>
                Beta Admin
            </a>
            </div>
        
            <div class="logout">
                <a href="index.php?act=user_exit">Logout</a>
            </div>
            </div>
        <div class="sidebar">
            <div class="information">
                <h2><span class="user">User: </span><?=$userName?></h2>
            </div>  
                <div class="manager">
                <h2> Manager </h2> 
                <ul class="nav">
                    <li><a href="index.php?act=home">
                            <i class="nav-arrow-down-head ti-home"></i>
                            Home
                        </a></li>
                    <li><a href="index.php?act=film">
                            <i class="nav-arrow-down-head ti-video-clapper"></i>
                            film
                        </a></li>
                    <li><a href="index.php?act=user">
                            <i class="nav-arrow-down-head ti-user"></i>
                            User
                        </a></li>
                    <li><a href="index.php?act=room">
                            <i class="nav-arrow-down-head ti-layout-sidebar-2"></i>
                            Room
                        </a></li>
                    <li><a href="index.php?act=seat">
                            <i class="nav-arrow-down-head ti-car"></i>
                            Seat
                        </a></li>
                    <li><a href="index.php?act=schedules">
                            <i class="nav-arrow-down-head ti-time"></i>
                            Schedules
                        </a></li>
                    <li><a href="index.php?act=schedule_hours">
                            <i class="nav-arrow-down-head ti-timer"></i>
                            Schedule Hours
                        </a></li>
                    <li><a href="index.php?act=ticket">
                            <i class="nav-arrow-down-head ti-ticket"></i>
                            Ticket
                        </a></li>
                    <li><a href="index.php?act=cinema">
                            <i class="nav-arrow-down-head ti-blackboard"></i>
                            Cinema
                        </a></li>
                    <li><a href="index.php?act=comment">
                            <i class="nav-arrow-down-head ti-comment"></i>
                            Comment
                        </a></li>
                    </li>

                </ul>
            </div>
                <?php
                } 
                ?>          
</body>