
<style>
    .mb{
        padding: 10px 0;
    }
    input{
        margin: 10px 10px;
        padding: 5px 10px;
        font-size: 16px;
    }
    textarea{
        padding: 7px;
        font-size: 16px;
    }
</style>

<?php

    if(is_array($film)){
        extract($film);
    }
?>
<div class="row" style="text-align: center;">
    <div class="row fromtitle">
        <h1 style="margin-left: 0px;">Cập nhật Phim</h1>
    </div>
    <div class="row fromcontent">
        <form action="index.php?act=film_update" method="post" enctype="multipart/form-data">
            <div class="row mb">
            Danh Mục Phim<br>
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
               <textarea name="description" id="" cols="50" rows="15"><?=$description?></textarea>
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
                <input type="text" name="poster" id="" value="<?=$poster?>">
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
                <input type="hidden" name="idFilm" value="<?=$idFilm?>">
                <input type="submit" name="capnhat" value="Cập nhật">
                <a href="index.php?act=film"> <input type="button" value="Danh Sách"></a>
            </div>
            <?php
            if (isset($thongbao) && ($thongbao != ""))
                echo $thongbao;

            ?>
        </form>
    </div>
</div>
