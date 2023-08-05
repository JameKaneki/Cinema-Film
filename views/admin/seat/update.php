<?php
    if(is_array($listseat)){
        extract($listseat);
    }
?>
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
<div class="row" style="text-align: center;">
    <div class="row fromtitle">
        <h1 style="margin-left: 0px;">Edit Seat</h1>
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
                <a href="index.php?act=seat"> <input type="button" value="Danh Sách"></a>
            </div>
            <?php
            if (isset($thongbao) && ($thongbao != ""))
                echo $thongbao;

            ?>
        </form>
    </div>
</div>
