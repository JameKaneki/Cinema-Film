

<!-- call film theo yêu cầu playing / coming soon - in comming 
ấn vào film thì gọi tới movie-details
ấn vào book ticket -> movie-ticket-plan  -->

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



<section class="movie-section padding-top padding-bottom" action='playing'>
        <div class="container">
            <div class="row flex-wrap-reverse justify-content-center">
                <div class="col-sm-10 col-md-8 col-lg-3">
                    <div class="widget-1 widget-banner">
                        <div class="widget-1-body">
                            <a href="index.php?act=movie-detail&idFilm=1">
                                <img src="assets/images/sidebar/banner/banner01.jpg" alt="banner">
                            </a>
                        </div>
                    </div>
                    
                    <div class="widget-1 widget-banner">
                        <div class="widget-1-body">
                            <a href="index.php?act=movie-detail&idFilm=2">
                                <img src="assets/images/sidebar/banner/banner02.jpg" alt="banner">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 mb-50 mb-lg-0">
                    <div class="filter-tab tab">
                        <div class="" style="margin-bottom: 30px; text-transform: uppercase;" >
                            <div class="pb-10">
                                <!-- commit -->
                                <h2>Playing now</h2>
                           </div>
                        </div>
                        <div class="tab-area">
                            <div class="tab-item active">
                                <div class="row mb-10 justify-content-start">
                                   <?php
                                        $listFilm = loadall_playing_film();
                                        foreach ($listFilm as $list){
                                            extract($list);
                                            echo ' <div class="col-sm-6 col-lg-4" >
                                            <div class="movie-grid">
                                                <div class="movie-thumb c-thumb">
                                                    <a href="index.php?act=movie-detail&idFilm='.$idFilm.'">
                                                        <img src="'.$poster.'" style="max-height: 330px;" alt="movie">
                                                    </a>
                                                </div>
                                                <div class="movie-content bg-one">
                                                    <h5 class="title m-0" " style="font-size: large; height: 80px;">
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
    </section>

   
    <section class="movie-section padding-top padding-bottom" action='coming'>
        <div class="container">
            <div class="row flex-wrap-reverse justify-content-center">
                <div class="col-sm-10 col-md-8 col-lg-3">
                    <div class="widget-1 widget-banner">
                        <div class="widget-1-body">
                            <a href="index.php?act=movie-detail&idFilm=1">
                                <img src="assets/images/sidebar/banner/banner01.jpg" alt="banner">
                            </a>
                        </div>
                    </div>
                    <div class="widget-1 widget-banner">
                        <div class="widget-1-body">
                            <a href="index.php?act=movie-detail&idFilm=2">
                                <img src="assets/images/sidebar/banner/banner02.jpg" alt="banner">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 mb-50 mb-lg-0">
                    <div class="filter-tab tab">
                        <div class="" style="margin-bottom: 30px; text-transform: uppercase;">
                            <div class="pb-10">
                                <h2>Comming soon</h2>
                           </div>
                        </div>
                        <div class="tab-area">
                            <div class="tab-item active">
                                <div class="row mb-10 justify-content-center">
                                   <?php
                                        $listFilm = loadall_coming_film();
                                        foreach ($listFilm as $list){
                                            extract($list);
                                            echo ' <div class="col-sm-6 col-lg-4">
                                            <div class="movie-grid">
                                                <div class="movie-thumb c-thumb">
                                                    <a href="index.php?act=movie-detail&idFilm='.$idFilm.'">
                                                        <img src="'.$poster.'" style="max-height: 330px;" alt="movie">
                                                    </a>
                                                </div>
                                                <div class="movie-content bg-one">
                                                    <h5 class="title m-0" style="font-size: large; height: 120px;">
                                                        <a href="index.php?act=movie-details&idFilm='.$idFilm.'">'.$nameFilm.'</a>
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
    </section>

