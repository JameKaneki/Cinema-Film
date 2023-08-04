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
        <h1 style="margin-left: 0px;">Thêm phòng chiếu </h1>
    </div>
    <div style="    text-align: center;" class="row fromcontent">
        <form action="index.php?act=room-add" method="post">
            <div class="row mb10">
                <label for="">Tên Phòng Chiếu</label> <br>
                <input type="text" name="nameRoom">
            </div>
            <div class="row mb10">
                <label for="">Danh Sách Ghế</label><br>
                <input type="text" name="seatList">
            </div>
            <div class="row mb10">
                <label for="">Tên Rạp Chiếu</label><br>
                <select name="idCinema" id="">
                    <option value="#" selected>Chọn</option>
                    <?php
                    $listCinema = selectAll_cinema();
                    foreach ($listCinema as $list) {
                        extract($list);
                        echo '
                            <option value=' . $idCinema . '>' . $nameCinema . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="row mb10">
                <input type="submit" name="addRoom" value="Thêm mới">
                <input type="reset" value="Nhập lại">
                <a href="index.php?act=room"><input type="button" value="Danh Sách"></a>
            </div>
        </form>
        <?php
        if (isset($tb) && $tb != "") {
            echo $tb;
        }
        ?>
    </div>
</div>