<!--
    - lấy film lọc ra thành 2 bảng là sắp chiếu và đang chiếu thông qua ngày khởi chiếu   tưởng đương là playing và in comming mỗi phần 3 phim
    - view all gọi tới movie-grid call hết film có ngày chiếu tương tự 
    - ấn vào film thì gội tới movie-details.php kèm idFilm

-->

<section class="banner-section">
        <div class="banner-bg bg_img bg-fixed" data-background="assets/images/banner/banner01.jpg"></div>
        <div class="container">
            <div class="banner-content">
                <h1 class="title  cd-headline clip"><span class="">book your</span> tickets for 
                    <span class="color-theme cd-words-wrapper p-0 m-0">
                        <b class="is-visible">new movie</b>
                    </span>
                </h1>
                <p>Safe, secure, reliable ticketing.Your ticket to live entertainment!</p>
            </div>
        </div>
</section>

<section class="movie-section padding-top padding-bottom bg-two">
        <div class="container">
            <div class="row flex-wrap-reverse justify-content-center">
                <div class="col-lg-3 col-sm-10  mt-50 mt-lg-0">
                    <div class="widget-1 widget-banner">
                        <div class="widget-1-body">
                            <a href="index.php?act=movie-detail&idFilm=1">
                                <img src="assets/images/sidebar/banner/banner01.jpg" alt="banner">
                            </a>
                        </div>
                    </div>
                    <div class="widget-1 widget-trending-search">
                        <h3 class="title">Hot Movies</h3>
                        <div class="widget-1-body">
                            <ul>
                               <?php
                                    $list5Film = loadtop5_film();
                                    foreach ($list5Film as $list){
                                        extract($list);
                                        echo '<li>
                                        <h6 class="sub-title" style="text-transform: uppercase;">
                                            <a href="index.php?act=movie-detail&idFilm='.$idFilm.'">'.$nameFilm.'</a>
                                        </h6>
                                    </li>';
                                    }
                               ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="article-section padding-bottom">
                        <div class="section-header-1">
                            <h2 class="title">movies</h2>
                            <a class="view-all" href="index.php?act=movie-grid&id=playing">View All</a>
                        </div>
                        <div class="row mb-30-none justify-content-center">
                            <?php
                                $listFilm = loadtop3playing_film();
                                foreach ($listFilm as $list){
                                    extract($list);
                                    echo '<div class="col-sm-6 col-lg-4">
                                    <div class="movie-grid">
                                        <div class="movie-thumb c-thumb">
                                            <a href="index.php?act=movie-detail&idFilm='.$idFilm.'">
                                                <img src="'.$poster.'" style="max-height: 330px;" alt="movie">
                                            </a>
                                        </div>
                                        <div class="movie-content bg-one">
                                            <h5 class="title m-0" style="font-size: large;  height: 120px;">
                                                <a href="index.php?act=movie-detail&idFilm='.$idFilm.'" >'.$nameFilm.'</a>
                                            </h5>
                                            <ul class="movie-rating-percent">
                                                <li>
                                                    <span class="content">'.$premiere.'</span>
                                                </li>
                                                <li>
                                                    <span class="content" style="margin-left: 20px;">'.$duration.' mins</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>';
                                }
                            ?>
                        </div>
                    </div>
                    <div class="article-section padding-bottom">
                        <div class="section-header-1">
                            <h2 class="title">Coming soon</h2>
                            <a class="view-all" href="index.php?act=movie-grid&id=coming">View All</a>
                        </div>
                            <div class="row mb-30-none justify-content-center">
                                <?php
                                    $listFilm = loadtop3coming_film();
                                    foreach ($listFilm as $list){
                                        extract($list);
                                        echo '<div class="col-sm-6 col-lg-4">
                                        <div class="movie-grid">
                                            <div class="movie-thumb c-thumb">
                                                <a href="index.php?act=movie-detail&idFilm='.$idFilm.'">
                                                    <img src="'.$poster.'" style="max-height: 330px;" alt="movie">
                                                </a>
                                            </div>
                                            <div class="movie-content bg-one">
                                                <h5 class="title m-0" style="font-size: large; height: 120px;">
                                                    <a href="index.php?act=movie-detail&idFilm='.$idFilm.'">'.$nameFilm.'</a>
                                                </h5>
                                                <ul class="movie-rating-percent">
                                                    <li>
                                                        <span class="content">'.$premiere.'</span>
                                                    </li>
                                                    <li>
                                                        <span class="content" style="margin-left: 20px;">'.$duration.' mins</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>';
                                    }
                                ?>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>