
    <style>
        .box{
            width: 450px;
            border: 1px solid gray;
            position: relative;
            left: 700px;
            top: 150px;
            border-radius: 20px;
            padding: 10px;  
        }
        .title{
            font-size: 32px;
            font-weight: 600;
        }
        .title p{
            margin-left: 175px;
            color: gray;
        }
        .input input{
            width: 320px;
            height: 40px;
            margin-left: 55px;
            margin-bottom: 20px;
            border:none;
            border-bottom: 3px solid gray; 
            font-size: 16px;
            margin-top: 10px;
        }

        .forgot a{
            font-size: 22px;
            margin-left: 155px;
            margin-top: 10px;
            color: gray;
            text-decoration: none;
        }
        .forgot a:hover{
            color: blue;
        }
        .submit input{
            width: 400px;
            background-color:  rgb(61, 133, 242);
            height: 50px;
            margin: 30px 25px;
            font-size: 20px;
            color: white;
            font-weight: bold;
            border-radius: 15px;
            cursor: pointer;}
        .submit input:hover{
            background-color:  red;
        }
    </style>
    
        <?php   
        if (isset($_SESSION['userName'])) {
            extract($_SESSION['userName']);
        }
        else{
            echo '<div class="box">
            <div class="title">
                <p>Login</p>
            </div>
            <hr> </hr>
            <div class="content sign_in">
            <form action="index.php?act=login" method="post">
            <div class="input">
                <input type="text" name="userName" id="" placeholder="UserName">
               
            </div>

            <div class="input">
                <input type="password" name="password" id="" placeholder="Password">
                
            </div>
            <div class="forgot">
            <a href="#">Forgot Password?</a>
            </div>
            <div class="submit">
                <input type="submit" value="Login" name="signin">
            </div>
        </form>
        </div>
        </div>';
        }
        ?> 