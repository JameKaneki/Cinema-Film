<?php
    if (isset($_GET['notify'])) {
        $notify = $_GET['notify'];
        echo '<script type="text/javascript">

            window.onload = function () { alert("' . $notify . '"); }

</script>';
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
                        <div class="form-group">
                            <label for="userName">UserName<span>*</span></label>
                            <input type="userName" placeholder="Enter Your userName" id="userName" name="userName" value ="" required>
                            <span style="color:red">
                                <?=$errors['userName'] ?? ''?>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="pass1">Password<span>*</span></label>
                            <input type="password" placeholder="Password" id="password" name="password" required>
                        </div>
                        <span style="color:red">
                                <?=$errors['password'] ?? ''?>
                            </span>
                        <div class="form-group">
                            <label for="pass2">Confirm Password<span>*</span></label>
                            <input type="password" placeholder="Password" id="password2" name="password2" required>
                        </div>
                        <span style="color:red">
                                <?=$errors['password2'] ?? ''?>
                            </span>
                        <div class="form-group checkgroup">
                            <input type="checkbox" id="bal" required checked>
                            <label for="bal">I agree to the <a href="#0">Terms, Privacy Policy</a> and <a href="#0">Fees</a></label>
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" value="Sign Up" name="sign-up">
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