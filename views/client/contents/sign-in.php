<?php
    if (isset($_GET['popup'])) {
        $popup = $_GET['popup'];
        echo '<script type="text/javascript">

            window.onload = function () { alert("' . $popup . '"); }

</script>';
    }
    ?>
    <!-- ==========Sign-In-Section========== -->
    <section class="account-section bg_img" data-background="assets/images/account/account-bg.jpg">
        <div class="container">
            <div class="padding-top padding-bottom">
                <div class="account-area">
                    <div class="section-header-3">
                        <span class="cate">hello</span>
                        <h2 class="title">welcome back</h2>
                    </div>
                    <form class="account-form" action="index.php?act=sign-in" method="post">
                        <div class="form-group">
                            <label for="userName">Username<span>*</span></label>
                            <input type="text" placeholder="Enter Your userName" id="userName" name="userName"  required >
                            <span style="color:red">
                                <?=$errors['userName'] ?? '' ?>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="password">Password<span>*</span></label>
                            <input type="password" placeholder="Password" id="password" name="password" required >
                            <span style="color:red">
                                <?=$errors['password'] ?? '' ?>
                            </span>
                        </div>
                        <div class="form-group checkgroup">
                            <input type="checkbox" id="bal2" required checked>
                            <label for="bal2">remember password</label>
                            <a href="#0" class="forget-pass">Forget Password</a>
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" value="log in" name="sign-in">
                        </div>
                    </form>
                    <div class="option">
                        Don't have an account? <a href="index.php?act=sign-up">sign up now</a>
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