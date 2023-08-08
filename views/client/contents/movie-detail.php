<?php
    if(isset($_GET['idFilm'])&&($_GET['idFilm'])){
        if(is_array(loadone_film($_GET['idFilm']))){
            extract(loadone_film($_GET['idFilm']));
            
        }
      
    }
?>
<section class="details-banner bg_img" data-background="<?php echo $poster ?> " action="index.php?act=movie-detail">
        <div class="container">
            <div class="details-banner-wrapper">
                <div class="details-banner-thumb">
                    <img src="<?php echo $poster ?>" alt="movie">
                </div>
                <div class="details-banner-content offset-lg-3">
                    <h3 class="title"><?php echo $nameFilm ?></h3>
                    <a href="#0" class="button" style="margin-top: 20px;"><?php echo $category ?></a>
                    <div class="tags" style="margin-top: 10px;">
                        <h6><?php echo $language ?></h6>
                    </div>
                    <div class="social-and-duration">
                        <div class="duration-area">
                            <div class="item">
                                <i class="fas fa-calendar-alt"></i><span><?php echo $premiere ?></span>
                            </div>
                            <div class="item">
                                <i class="far fa-clock"></i><span><?php echo $duration ?> mins</span>
                            </div>  
                        </div>
                        <ul class="social-share">
                            <li><a href="#0"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#0"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#0"><i class="fab fa-pinterest-p"></i></a></li>
                            <li><a href="#0"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="#0"><i class="fab fa-google-plus-g"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- ==========Banner-Section========== -->

    <!-- ==========Book-Section========== -->
    <section class="book-section bg-one">
        <div class="container">
            <div class="book-wrapper offset-lg-3">
                <div class="left-side">
                    <div class="item">
                        <div class="item-header">
                            <h5 class="title">4.5</h5>
                            <div class="rated">
                                <i class="fas fa-heart"></i>
                                <i class="fas fa-heart"></i>
                                <i class="fas fa-heart"></i>
                                <i class="fas fa-heart"></i>
                                <i class="fas fa-heart"></i>
                            </div>
                        </div>
                        <p>Users Rating</p>
                    </div>
                </div>
                <a href="index.php?act=ticket-plant&idFilm=<?php echo $idFilm ?>" class="custom-button">book tickets</a>
            </div>
        </div>
    </section>
    <!-- ==========Book-Section========== -->

    <!-- ==========Movie-Section========== -->
    <section class="movie-details-section padding-top padding-bottom">
        <div class="container">
            <div class="row justify-content-center flex-wrap-reverse mb--50">
                <div class="col-lg-3 col-sm-10 col-md-6 mb-50">
                    <!-- QUảng cáo thôi -->
                    <div class="widget-1 widget-banner">
                        <div class="widget-1-body">
                                <img src="assets/images/sidebar/banner/banner01.jpg" alt="banner">
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 mb-50">
                    <div class="movie-details">
                        <div class="tab summery-review">
                            <div class="tab-area">
                                <div class="tab-item active">
                                    <div class="item">
                                        <h5 class="sub-title">Description</h5>
                                        <h6><?php echo $description ?></h6>
                                    </div>
                                    <div class='item'>
                                        <h5 class="sub-title">Category</h5>
                                        <h6><?php echo $category ?></h6>
                                    </div>
                                    <div class='item'>
                                        <h5 class="sub-title">Category</h5>
                                        <h6><?php echo $language ?></h6>
                                    </div>
                                    <div class='item'>
                                        <?php
                                            $link = explode('/',$trailer);   
                                            $trailer = "https://www.youtube.com/embed/".$link[3];                
                                        ?>
                                        <h5 class="sub-title">Trailer</h5>
                                        <iframe src="<?php echo $trailer; ?>" width='70%' height="300px"></iframe>
                                    </div>
                                </div>
                                <!-- review -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
function myFunction() {
  confirm("Please login first!");
}
</script>
    </section>
