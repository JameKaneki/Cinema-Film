<?php 
    if(isset($_GET['idTicket'])&&$_GET['idTicket']){
        $idTicket = $_GET['idTicket'];
    if(is_array(selectOne_ticket($idTicket))){
        extract(selectOne_ticket($idTicket));
    }
}
?>
<div class="row">
<div class="row fromtitle">
            <h1>Thêm vé phim</h1>
        </div>
        <div class="row fromcontent">
                <form action="index.php?act=ticket-update" method="post">
                <div class="row mb10">
                    <label for="">Giá vé</label> <br>
                    <input type="number" name="price" value="<?php echo "$price" ?>">
                </div>
                <div class="row mb10">
                    <label for="">Giờ chiếu </label><br>
                    <select name="idScheduleHour" id="">
                    <option value="<?php echo "$idScheduleHour" ?>" selected><?php echo "$time"?></option>
                    <?php
                        $listScheduleHour = selectAll_schedule_hours();
                        foreach($listScheduleHour as $list){
                            extract($list);
                            echo '
                            <option value='.$idScheduleHour.'>'.$time.'</option>';
                        }
                     ?>
                     </select>
                </div>
                <div class="row mb10">
                    <label for="">Người mua </label><br>
                    <select name="idUser" id="">
                    <option value="<?php echo "$idUser" ?>" selected><?php echo "$name" ?></option>
                    <?php
                        $listUser = selectAll_user();
                        foreach($listUser as $list){
                            extract($list);
                            echo '
                            <option value='.$idUser.'>'.$name.'</option>';
                        }
                     ?>
                     </select>
                </div>
                <div class="row mb10">
                    <label for="">Số ghế</label> <br>
                    <input type="text" name="seat" value= <?php echo "$seat" ?>>
                </div>
                <div class="row mb10">
                    <input type="hidden" name="idTicket" value="<?=$idTicket?>">
                    <input type="submit" name="updateTicket" value="Cập nhập">
                    <input type="reset" value="Nhập lại">
                    <a href="index.php?act=ticket"><input type="button" value="Danh Sách"></a>
                </div>
                </form>
                <?php
                    if(isset($tb)&&$tb!=""){
                        echo $tb;
                    }
                 ?>
            </div>
</div>