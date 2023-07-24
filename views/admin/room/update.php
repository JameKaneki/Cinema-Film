<?php
    if(isset($_GET['idRoom'])&&$_GET['idRoom']){
        if(is_array(selectOne_room($_GET['idRoom']))){
            extract(selectOne_room($_GET['idRoom']));
        }
    }
?>
<div class="row">
<div class="row fromtitle">
            <h1>Sửa phòng chiếu</h1>
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
                    <label for="">Tên Rạp Chiếu</label><br>
                    <select name="idCinema" id="">
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
                    <input type="reset" value="Nhập lại">
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