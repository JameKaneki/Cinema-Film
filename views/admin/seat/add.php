<div class="row">
    <div class="row fromtitle">
        <h1>Add New Seat</h1>
    </div>
    <div class="row fromcontent">
        <form action="index.php?act=seat_add" method="post" enctype="multipart/form-data">
            <div class="row mb">
                Seat Key<br>
                <input type="text" name="seat_key" id="">
            </div>
            <div class="row mb">
                ID ROOM<br>
                <input type="text" name="idRoom" id="">
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
