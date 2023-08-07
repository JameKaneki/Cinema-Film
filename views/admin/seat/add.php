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
        <h1 style="margin-left: 0px">Add New Seat</h1>
    </div>
    <div class="row fromcontent">
        <form action="index.php?act=seat_add" method="post" enctype="multipart/form-data">
            <div class="row mb">
                Seat Key<br>
                <input type="text" name="seat_key" id="">
            </div>
            <div class="row mb">
                Room<br>
                <select name="idRoom" id="">
                    <option value="">------</option>
                <?php
                    $listRoom=selectAll_room();
                    foreach($listRoom as $list){
                        extract($list);
                        echo "<option value=".$idRoom.">$nameRoom</option>";
                    }
                 ?>
                </select>
            </div>
            <div class="row mb20">
                <input type="submit" name="addnew" value="Thêm Mới">
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
