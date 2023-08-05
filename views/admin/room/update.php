<?php
    if(isset($_GET['idRoom'])&&$_GET['idRoom']){
        if(is_array(selectOne_room($_GET['idRoom']))){
            extract(selectOne_room($_GET['idRoom']));
        }
    }
?>
<style>
    label{
        margin: 10px;
    }
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
            <h1 style="margin-left: 0px; margin-bottom: 24px;">Sửa phòng chiếu</h1>
        </div>
        <div class="row fromcontent">
                <form action="index.php?act=room-update" method="post">
                <div class="row mb10">
                    <label for="">Tên Phòng Chiếu</label> <br>
                    <input type="text" name="nameRoom" value="<?php if(isset($nameRoom)&&($nameRoom!="")) echo $nameRoom; ?>">
                </div>
                <div class="row mb10">
                    <label for="">Danh Sách Ghế</label><br>
                    <input type="text" name="seatList" value='<?php echo "$seatList" ?>'>
                </div>
                <div class="row mb10">
                    <label style="padding-bottom: 20px;" for="">Tên Rạp Chiếu</label><br>
                    <select name="idCinema" id="" style="margin: 10px 10px; padding: 10px 10px;" >
                    <option value="<?php echo "$idCinema" ?>" selected> <?php echo "$nameCinema" ?></option>
                    <?php
                        $listCinema = selectAll_cinema();
                        foreach($listCinema as $list){
                            extract($list);
                            echo '
                            <option value='.$idCinema.'>'.$nameCinema.'</option>';
                        }
                     ?>
                     </select>
                </div>
                <div class="row mb10">
                    <input type="hidden" name="idRoom" value="<?= $idRoom ?>">
                    <input type="submit" name="updateRoom" value="Cập Nhật">
                    <a href="index.php?act=room"><input type="button" value="Danh Sách"></a>
                </div>
                </form>
                <?php
                    if(isset($tb)&&$tb!=""){
                        echo $tb;
                    }
                 ?>
            </div>
</div>