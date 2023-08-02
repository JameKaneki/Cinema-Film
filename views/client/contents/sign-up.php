<?php
     $errors = [];
     $values = [
        'userName' => '',
        'email' => '',
        'password' => '',
        're_password' => '',
     ];
     if(isset($_POST['sign-up'])){ 
        $values['userName'] = $_POST['userName'];
        $values['email']= $_POST['email'];
        $values['password'] = $_POST['password'];
        $values['re_password'] = $_POST['re_password'];

        $checkaccount = check_acount($values['userName'],$values['email']);
        $email_regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
         // user Name validate
        if(preg_match('/ ^.{5,50}$/',$values['userName'])){   
            $errors['userName'] = "userName lenght should between 3-50 character";
        }
         // password validate
        if(strlen($values['password']) < 6){
            $errors['password'] = "password length should longer more than 6 character";
        }
        if(strlen($values['password']) >50){
            $errors['password'] = "password length has a maximum  of 50 character";
        }
        if($values['re_password'] == ""){
             $errors['re_password'] = "re_password should match Password";
        }
         // email validate
        // if(preg_match($email_regex, $values['email'])){
        //     $errors['email'] = "invalidate email";
        // }
        if($checkaccount != []){   
            $errors['userName'] = "your userName or email has already used";
            $errors['email'] = "your userName or email has already used";
        }
        if($errors == []){
            $insert = insert_user($values['userName'],$values['password'],$values['email']);
            header("Location:http://localhost/Cinema-Film/views/client/index.php?act=sign-in");
       }
     }
?> 
    <!-- ==========Sign-In-Section========== -->
    <section class="account-section bg_img" data-background="assets/images/account/account-bg.jpg">
        <div class="container">
            <div class="padding-top padding-bottom">
                <div class="account-area">
                    <div class="section-header-3">
                        <span class="cate">welcome</span>
                        <h2 class="title">to Boleto </h2>
                    </div>  
                    <form class="account-form" action="index.php?act=sign-up" method="post">

                        <div>
                            <label >userName</label>
                            <input type='text' placeholder='Enter Your userName' id='userName' name='userName' 
                            value ='<?php
                            if(isset($values['userName']))  echo $values['userName'];
                            ?>' required>
                            <?php if(isset($errors['userName'])) echo "<span>{$errors['userName']}</span>"?>
                        </div>
                        <div>
                            <label >Email</label>
                            <input type='text' placeholder='Enter Your Email' id='email' name='email'                             value ='<?php
                              if(isset($values['email'])) echo $values['email'];
                            ?>' required>
                            <?php if(isset($errors['email'])) echo "<span>{$errors['email']}</span>"?>
                        </div>     
                         <div>
                            <label >Password</label>
                            <input type='password' placeholder='Enter Your Password' id='password' name='password'  required>
                            <?php if(isset($errors['password'])) echo "<span>{$errors['password']}</span>"?>
                        </div>     
                         <div>
                            <label >re-Password</label>
                            <input type='password' placeholder='Enter Your userName' id='userName' name='re_password'  required>
                            <?php if(isset($errors['re_password'])) echo "<span>{$errors['re_password']}</span>"?>

                        </div>
                        <div class="form-group text-center">
                            <input type="submit" name="sign-up">
                        </div>
                    </form>
                    <div class="option">
                        Already have an account? <a href="index.php?act=sign-in">Login</a>
                    </div>
                    <div class="or"><span>Or</span></div>
                    <ul class="social-icons">
                        <li>
                            <a href="#0">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#0" class="active">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#0">
                                <i class="fab fa-google"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Sign-In-Section========== -->