<?php
    if(is_array($listseat)){
        extract($listseat);
    }
?>

<div class="row">
    <div class="row fromtitle">
        <h1>Edit Seat</h1>
    </div>
    <div class="row fromcontent">
        <form action="index.php?act=seat_update" method="post" enctype="multipart/form-data">
            <div class="row mb">
                Seat Key<br>
                <input type="text" name="seat_key" id="" value="<?=$seat_key?>">
            </div>
            <div class="row mb">
                ID ROOM<br>
                <input type="text" name="idRoom" id="" value="<?=$idRoom?>">
            </div>
            <div class="row mb20">
                <input type="hidden" name="id_seat" value="<?=$id_seat?>">
                <input type="submit" name="capnhat" value="Cập Nhật">
                <input type="reset" value="Nhập Lại">
                <a href="index.php?act=seat"> <input type="button" value="Danh Sách"></a>
            </div>
            <?php
            if (isset($thongbao) && ($thongbao != ""))
                echo $thongbao;

            ?>
        </form>
    </div>
</div>
