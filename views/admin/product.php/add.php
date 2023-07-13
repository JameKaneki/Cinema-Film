<div class="row">
    <div class="row fromtitle">
        <h1>Thêm Mới Phim</h1>
    </div>
    <div class="row fromcontent">
        <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">
            <div class="row mb">
            Danh Mục Phim<br>
                <!-- <input type="text" name="id_sp" disabled> -->
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
                Tên phim<br>
                <input type="text" name="name_film" id="">
            </div>
            <div class="row mb">
                Tên đạo diễn <br>
                <input type="text" name="director" id="">
            </div>
            <div class="row mb">
                Tên diễn viên <br>
                <input type="text" name="performer" id="">
            </div>
            <div class="row mb">
                Ngày khởi chiếu <br>
                <input type="number" name="premiere" id="">
            </div>
            <div class="row mb">
                Thời lượng <br>
                <input type="number" name="duration" id="">
            </div>
            <div class="row mb">
                Ngôn ngữ <br>
                <input type="text" name="language" id="">
            </div>
            <div class="row mb">
                Mô tả <br>
               <textarea name="description" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="row mb">
                Poster <br>
                <input type="file" name="poster" id="">
            </div>
            <div class="row mb">
                Trailer <br>
                <input type="text" name="Trailer" id="">
            </div>
            <div class="row mb20">
                <input type="submit" name="addnew" value="Thêm Mới">
                <input type="reset" value="Nhập Lại">
                <a href="index.php?act=listsp"> <input type="button" value="Danh Sách"></a>
            </div>
            <?php
            if (isset($thongbao) && ($thongbao != ""))
                echo $thongbao;

            ?>
        </form>
    </div>
</div>