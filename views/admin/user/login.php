
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
    
        <?php   
        if (isset($_SESSION['userName'])) {
            extract($_SESSION['userName']);
        }
        else{
            echo '<div class="row mb ">
            <div class="title">
                ACCOUNT
            </div>
            <div class="content sign_in">
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
        </div>
        </div>';
        }
        ?> 