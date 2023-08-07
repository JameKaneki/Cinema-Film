
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
                <input type="date" name="premiere" id="" value="<?=$premiere?>">
            </div>
            <div class="row mb">
                Duration<br>
                <input type="number" name="duration" id="" value="<?=$duration?>">
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
                <label for="action">Action</label>
                <input type="checkbox" name="category" id="action" value="Action">

                <label for="romantic">Romantic</label>
                <input type="checkbox" name="category" id="romantic" value="Romantic">

                <label for="sciencefiction">Science Fiction</label>
                <input type="checkbox" name="category" id="sciencefiction" value="Science Fiction">

                <label for="cartoon">Cartoon</label>
                <input type="checkbox" name="category" id="cartoon" value="Cartoon">

                <label for="mentality">Mentality</label>
                <input type="checkbox" name="category" id="mentality" value="Mentality">

                <label for="aventure">Aventure</label>
                <input type="checkbox" name="category" id="aventure" value="Aventure">

                <label for="horrified">Horrified</label>
                <input type="checkbox" name="category" id="horrified" value="Horrified">

                <label for="detective">Detective</label>
                <input type="checkbox" name="category" id="detective" value="Detective">
            </div>
            <div class="row mb">
                Trailer<br>
                <input type="text" name="trailer" id="" value="<?=$trailer?>" placeholder="link">
            </div>
            <div class="row mb">
                Poster<br>
                <input type="text" name="poster" id="" value="<?=$poster?>" placeholder="link">
            </div>
            <div class="row mb">
                Rate<br>
                <select name="rate" id="">
                    <?php
                        if($rate==0){
                           echo ' <option value="0">Mọi độ Tuổi</option>';
                        }
                        if($rate==1){
                           echo'<option value="1">Trên 8 Tuổi</option>';
                        }
                        if($rate==2){
                           echo'<option value="2">Trên 12 Tuổi</option>';
                        }
                        if($rate==3){
                            echo '<option value="3">Trên 16 Tuổi</option>';
                        }
                        else{
                            echo '<option value="4">Trên 18 Tuổi</option>';
                        }
                    ?>
                    <option value="">-----</option>
                    <option value="4">Trên 18 Tuổi</option>
                    <option value="3">Trên 16 Tuổi</option>
                    <option value="2">Trên 12 Tuổi</option>
                    <option value="1">Trên 8 Tuổi</option>
                    <option value="0">Mọi độ Tuổi</option>
                </select>
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
