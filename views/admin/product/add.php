<div class="wrapper">
        <h1>Thêm Mới Phim</h1>
    <div class="box">
        <form action="index.php?act=film_add" method="post" enctype="multipart/form-data">
            <div class="input">
                Name<br>
                <input type="text" name="nameFilm" id="">
            </div>
            <div class="input">
                Director<br>
                <input type="text" name="director" id="">
            </div>
            <div class="input">
                Performer<br>
                <input type="text" name="performer" id="">
            </div>
            <div class="input">
                Premiere<br>
                <input type="text" name="premiere" id="">
            </div>
            <div class="input">
                Duration<br>
                <input type="text" name="duration" id="">
            </div>
            <div class="input">
                Language<br>
                <input type="text" name="language" id="">
            </div>
            <div class="input">
                Description <br>
               <textarea name="description" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="input">
                Category<br>
                <input type="text" name="category" id="">
            </div>
            <div class="input">
                Trailer<br>
                <input type="text" name="trailer" id="">
            </div>
            <div class="input">
                Poster<br>
                <input type="text" name="poster" id="">
            </div>
            <div class="input">
                Rate<br>
                <input type="text" name="rate" id="">
            </div>
            <div class="input">
                LikeAmount<br>
                <input type="text" name="likeAmount" id="">
            </div>
            <div class="input">
                <input type="submit" name="addnew" value="Thêm Mới">
                <input type="reset" value="Nhập Lại">
                <a href="index.php?act=film"> <input type="button" value="Danh Sách"></a>
            </div>
            <?php
            if (isset($thongbao) && ($thongbao != ""))
                echo $thongbao;

            ?>
        </form>
    </div>
</div>
