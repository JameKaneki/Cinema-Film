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
<div class="row">
<div class="row fromtitle">
            <h1>Thêm vé phim</h1>
        </div>
        <div class="row fromcontent">
                <form action="index.php?act=ticket-add" method="post">
                <div class="row mb10">
                    <label for="">Giá vé</label> <br>
                    <input type="number" name="price">
                </div>
                <div class="row mb10">
                    <label for="">Giờ chiếu </label><br>
                    <select name="idScheduleHour" id="">
                    <option value="#" selected>Chọn</option>
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
                    <option value="#" selected>Chọn</option>
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
                    <input type="text" name="seat">
                </div>
                <div class="row mb10">
                    <input type="submit" name="addTicket" value="Thêm mới">
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