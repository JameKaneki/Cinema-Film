<style>
    .row{
        margin: 30px;
    }

    label{
        line-height: 40px; 
    }

    select, input{
        padding: 10px 12px;
    }
</style>
<div class="row" style="    text-align: center;">
    <div class="row fromtitle">
        <h1 style="margin-left: 0px;">Thêm bình luận</h1>
    </div>
    <div class="row fromcontent">
        <form action="index.php?act=comment-add" method="post">
            <div class="row mb10">
                <label for="">Người bình luận</label> <br>
                <select name="idUser" id="">
                    <option value="#" selected>Chọn</option>
                    <?php
                    $listUser = selectAll_User();
                    foreach ($listUser as $list) {
                        extract($list);
                        echo '
                            <option value=' . $idUser . '>' . $name . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="row mb10">
                <label for="">Tên Phim </label><br>
                <select name="idFilm" id="">
                    <option value="#" selected>Chọn</option>
                    <?php
                    $listFilm = selectAll_film();
                    foreach ($listFilm as $list) {
                        extract($list);
                        echo '
                            <option value=' . $idFilm . '>' . $nameFilm . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="row mb10">
                <label for="">Thời gian bình luận </label><br>
                <input type="date" name="timeComment">
            </div>
            <div class="row mb10">
                <label for="">Nội dung</label> <br>
                <input type="text" name="content">
            </div>
            <div class="row mb10">
                <input type="submit" name="addComment" value="Thêm mới">
                <input type="reset" value="Nhập lại">
                <a href="index.php?act=comment"><input type="button" value="Danh Sách"></a>
            </div>
        </form>
        <?php
        if (isset($tb) && $tb != "") {
            echo $tb;
        }
        ?>
    </div>
</div>