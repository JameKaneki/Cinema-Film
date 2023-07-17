<div class="row">
    <div class="row fromtitle">
        <h1>Thêm Mới Phim</h1>
    </div>
    <div class="row fromcontent">
        <form action="index.php?act=film_add" method="post" enctype="multipart/form-data">
            <div class="row mb">
            Danh Mục Phim<br>
                <input type="text" name="id_sp" disabled>
                <!-- <select name="id_dm" id="">
                    <option value="0" selected>--Chọn--</option>
                    <!-- <?php
                    foreach($listdm as $dm){
                        extract($dm);
                        echo "  <option value='.$id_dm.'>$name_dm</option>";
                    }
                    ?> -->
                </select> -->
            </div>
            <div class="row mb">
                Name<br>
                <input type="text" name="nameFilm" id="">
            </div>
            <div class="row mb">
                Director<br>
                <input type="text" name="director" id="">
            </div>
            <div class="row mb">
                Performer<br>
                <input type="text" name="performer" id="">
            </div>
            <div class="row mb">
                Premiere<br>
                <input type="text" name="premiere" id="">
            </div>
            <div class="row mb">
                Duration<br>
                <input type="text" name="duration" id="">
            </div>
            <div class="row mb">
                Language<br>
                <input type="text" name="language" id="">
            </div>
            <div class="row mb">
                Description <br>
               <textarea name="description" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="row mb">
                Category<br>
                <input type="text" name="category" id="">
            </div>
            <div class="row mb">
                Trailer<br>
                <input type="text" name="trailer" id="">
            </div>
            <div class="row mb">
                Poster<br>
                <input type="file" name="poster" id="">
            </div>
            <div class="row mb">
                Rate<br>
                <input type="text" name="rate" id="">
            </div>
            <div class="row mb">
                LikeAmount<br>
                <input type="text" name="likeAmount" id="">
            </div>
            <div class="row mb20">
                <input type="submit" name="addnew" value="Thêm Mới">
                <input type="reset" value="Nhập Lại">
                <a href="index.php?act=film-list"> <input type="button" value="Danh Sách"></a>
            </div>
            <?php
            if (isset($thongbao) && ($thongbao != ""))
                echo $thongbao;

            ?>
        </form>
    </div>
</div>
