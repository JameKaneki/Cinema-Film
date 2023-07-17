<?php
if (is_array($listfilm)) {
    extract($listfilm);
}

?>

<div class="row">
    <div class="row fromtitle">
        <h1>Cập nhật Phim</h1>
    </div>
    <div class="row fromcontent">
        <form action="index.php?act=film_update" method="post" enctype="multipart/form-data">
            <div class="row mb">
            Danh Mục Phim<br>
                <!-- <input type="text" name="id_sp" disabled>
                <select name="id_dm" id="">
                    <option value="0" selected>--Chọn--</option> -->
                    <?php
                    foreach($listfilm as $films){
                        extract($films);
                    }
                //     ?>
                 </select>
            </div>
            <div class="row mb">
                Name<br>
                <input type="text" name="nameFilm" id="" value="<?=$nameFilm?>">
            </div>
            <div class="row mb">
                Director<br>
                <input type="text" name="director" id="" value="<?=$director?>">
            </div>
            <div class="row mb">
                Performer<br>
                <input type="text" name="performer" id="" value="<?=$performer?>">
            </div>
            <div class="row mb">
                Premiere<br>
                <input type="text" name="premiere" id="" value="<?=$premiere?>">
            </div>
            <div class="row mb">
                Duration<br>
                <input type="text" name="duration" id="" value="<?=$duration?>">
            </div>
            <div class="row mb">
                Language<br>
                <input type="text" name="language" id="" value="<?=$language?>">
            </div>
            <div class="row mb">
                Description <br>
               <textarea name="description" id="" cols="30" rows="10"></textarea <?=$description?>>
            </div>
            <div class="row mb">
                Category<br>
                <input type="text" name="category" id="" value="<?=$category?>">
            </div>
            <div class="row mb">
                Trailer<br>
                <input type="text" name="trailer" id="" value="<?=$trailer?>">
            </div>
            <div class="row mb">
                Poster<br>
                <input type="file" name="poster" id="" value="<?=$poster?>">
            </div>
            <div class="row mb">
                Rate<br>
                <input type="text" name="rate" id="" value="<?=$rate?>">
            </div>
            <div class="row mb">
                LikeAmount<br>
                <input type="text" name="likeAmount" id="" value="<?=$likeAmount?>" >
            </div>
            <div class="row mb20">
                <input type="hidden" name="idFilm" value="<?= $idFilm ?>">
                <input type="submit" name="capnhat" value="Cập nhật">
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
