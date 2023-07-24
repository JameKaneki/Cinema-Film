<div class="row mb ">
    <div class="title">
        ACCOUNT
    </div>
    <style>
        li a{
            text-decoration: none; 
        }
        .sign_in li a{
            border:1px solid gray;
            border-radius:8px;
            padding: 5px 13px;  
        }

    </style>
    <div class="content sign_in">
        <?php
        if (isset($_SESSION['userName'])) {
            extract($_SESSION['userName']);
        ?>
            <div class="row mb10">
                WELCOME
            <?=$userName?>
            </div>
            <div class="row mb10" style="display:flex;
            justify-content:space-evenly;margin-top:54px;
            ">
                <?php   
                if($role == 1){
                ?>
                <li><a href="index.php?act=film">Film</a></li>
                <li><a href="index.php?act=user">User</a></li>
                <li><a href="index.php?act=room">Room</a></li>  
                <li><a href="index.php?act=seat">Seat</a></li>
                <li><a href="index.php?act=schedules">Schedules</a></li>
                <li><a href="index.php?act=schedule_hours">Schedule Hours</a></li>
                <li><a href="index.php?act=ticket">Ticket</a></li>
                <li><a href="index.php?act=cinema">Cinema</a></li>
                <?php
                } 
                ?>
                <?php
                if($role == 2){
                ?>
                <li><a href="index.php?act=film">Film</a></li>
                <li><a href="index.php?act=room">Room</a></li>
                <li><a href="index.php?act=schedules">Schedules</a></li>
                <li><a href="index.php?act=schedule_hours">Schedule Hours</a></li>
                <li><a href="index.php?act=ticket">Ticket</a></li>
                <?php
                }
                ?>
            </div>
        <?php
        } else {
        ?>
            <form action="index.php?act=user_login" method="post">
                <div class="row mb10">
                    Tên Đăng Nhập
                    <input type="text" name="userName" id="">
                </div>

                <div class="row mb10">
                    Mật Khẩu <br>
                    <input type="password" name="password" id="">
                </div>
                <div class="row mb10">
                    <input type="submit" value="Đăng Nhập" name="signin">
                </div>
            </form>
        <?php
        }
        ?>
                <h2 class="notify">
                    <?php
                    if (isset($thongbao) && ($thongbao != "")) {
                        echo $thongbao;
                    }
                    ?>
                </h2>
    </div>
</div>